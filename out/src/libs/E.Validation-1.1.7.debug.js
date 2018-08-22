E.Validation = {};

E.Validation.checkUnchangedAddresses = false;

E.Validation.onValidationValueSet = function(e){};
/**
 *
 *
 var sampleConfig =
     {
         gender: {node: "", nodeForErrorClass: "", isFemale: function(node){}, isMale: function(node){}, changeTrigger: function(validate){}},
         firstName: {node: ""},
         country: {node: "", isValidCountry: function(){}},
         postCode: {node: ""},
         city: {node: ""},
         street: {node: ""},
         form: {node: ""},
         valueSetCallback: function([{node:..., value:...}]){}
     }
     The property "node" is a string (CSS-Selector) or jQuery object as a DOM-Node.
     If not otherwise stated, the selector should only select ONE DOM-Node. If it selects more there might be empty requests to the server or other errors.
 
 *
 * The given valueSetCallback is called after the approval of an Address (even an approval of the original address given by the user will trigger the valueSetCallback).
 *
 * @param config
 * @constructor
 */
function StandardAddressCheck(config) {

    var $this = E.$(this),
        valueSetCallback, isValidCountry;

    if(config.country && typeof config.country.isValidCountry == "function")
        isValidCountry = config.country.isValidCountry;
    else
        isValidCountry = function(){return true;};
    valueSetCallback = typeof config.valueSetCallback == "function" ? config.valueSetCallback : function(){};

    function initializeAddressCheck(conf)
    {
        if(typeof conf.pathToAccountingController == "string" && conf.postCode && conf.postCode.node && conf.city && conf.city.node && conf.street && conf.street.node &&
           conf.streetNr && conf.streetNr.node && conf.saveButton && conf.saveButton.node && conf.form && conf.form.node)
        {
            //initializing values
            var modal = E.$('#enderecoAddressCheckModal'),
                currentAddressNode = E.$('#enderecoCurrentInput'),
                correctedAddressNode = E.$('#enderecoCorrectedSuggestions'),
                correctAddressButton = E.$('#enderecoCorrectAddressButton'),
                currentInputTemplate = E.$('#enderecoCurrentTypeTemplate').html(),
                correctionItemTemplate = E.$('#enderecoCorrectionTypeTemplate').html(),
                addressSaveButton = conf.saveButton.node,
                _isAddressCheckNeeded = typeof E.Validation.checkUnchangedAddresses == "boolean" ? E.Validation.checkUnchangedAddresses : false,
                latestSuggestions = [],
                formNode = conf.form.node,
                addressCheckDone,
                addressCheck,
                numberOfCurrentCorrections,
                disabled = false;

            $this.isAddressCheckNeeded = function()
            {
                if(disabled)
                {
                    return false;
                }
                var countryIsValid = isValidCountry();
                return countryIsValid ? _isAddressCheckNeeded : false;
            };

            $this.setAddressCheckNeeded = function(needed)
            {
                _isAddressCheckNeeded = needed;
            };

            $this.disableAddressCheck = function() {
                disabled = true;

            };

            $this.enableAddressCheck = function() {
                disabled = false;
            };

            E.ValidationIsRunning = false;
            E.IsAddressCheckNeededListener = E.IsAddressCheckNeededListener ? E.IsAddressCheckNeededListener : [];
            E.IsAddressCheckNeededListener.push(function(){return $this.isAddressCheckNeeded();});

            //functionality for whether we should check the address or not
            function relevantInputChanged()
            {
                $this.setAddressCheckNeeded(true);
            }

            conf.postCode.node.keyup(relevantInputChanged);
            conf.city.node.keyup(relevantInputChanged);
            conf.street.node.keyup(relevantInputChanged);
            conf.streetNr.node.keyup(relevantInputChanged);


            //TODO: This function seems to be deprecated. Event-Prevention behaviour must be refactored
            //helper functions to secure the right behaviour
            function areAddressChecksNeeded()
            {
                for(var i = 0; i < E.IsAddressCheckNeededListener.length; i++)
                {
                    if(E.IsAddressCheckNeededListener[i]())
                    {
                        return true;
                    }
                }
                return false;
            }

            //flow of the actual address validation
            //we try to bind the submit as late as possible
            E.$(document).ready(function()
            {
                setTimeout(function(){
                    formNode.on('submit', function(e)
                    {
                        /**
                         * In case the submit has been prevented, the StandardAddressCheck wants to invoke its
                         * validation routines only if the prevention has been set by another AddressCheck-routine (i.e.
                         * a form that contains more than one address).
                         *
                         * However: If non-StandardAddressCheck-logic prevented the submit, the AddressCheck won't do anything.
                         *
                         * In case the submit has not been prevented (yet), the StandardAddressCheck routines will be executed.
                         */
                        if(e.isDefaultPrevented())
                        {
                            if(e.enderecoPreventedDefault)
                            {
                                if(areAddressChecksNeeded())
                                {
                                    e.preventDefault();
                                    e.enderecoPreventedDefault = true;
                                }
                                tryValidation();
                            }
                        }
                        else
                        {
                            if(areAddressChecksNeeded())
                            {
                                e.preventDefault();
                                e.enderecoPreventedDefault = true;
                            }
                            tryValidation();
                        }
                    });
                }, 10);
            });

            function tryValidation()
            {
                if($this.isAddressCheckNeeded())
                {
                    var event = E.$.Event("validate");
                    $this.trigger(event);
                    if(!event.isDefaultPrevented())//TODO: in case this event has been blocked - who makes sure that buttons, disabled by other libraries, are clickable again?
                    {
                        /**
                         * Since the modal of this StandardAddressCheck is shared between all StandardAddressCheck instances,
                         * we want to make one SAC instance the "owner" (or current user) of the modal.
                         *
                         * In order to avoid unnecessary requests and undefined behaviour, we block other SAC instances
                         * from validating as soon as one SAC instance has started to validate.
                         */
                        if(!E.ValidationIsRunning)
                        {
                            E.ValidationIsRunning = true;
                            validate();
                        }
                    }
                }
            }

            function validate()
            {
                addressSaveButton.attr('disabled', true);
                addressCheck.validate();
            }

            var callEnderecoAccounting = function(doneCallback){
                E.log.info("Doing accounting now.");

                var accountingRequest = {
                        "service"		: "accountingTrigger",
                        "fieldId"		: "isserviceused"
                    },
                    done = typeof doneCallback == "function" ? doneCallback : function(){};

                //serialize JSON object
                var requestSerialized = JSON.stringify(accountingRequest);

                E.$.ajax({ type: "POST",
                    url: E.getCommunicationService().getServerUri()+conf.pathToAccountingController,
                    data: {
                        orwellServiceData: requestSerialized
                    },
                    async: false
                }).done(function(text){
                    E.log.info("Accounting successful.");
                }).fail(function(response){
                    E.log.error("Accounting was not successful.");
                }).always(function(response)
                {
                    done();
                });
            };

            addressCheckDone = function(serverObject)
            {
                $this.setAddressCheckNeeded(false);
                addressSaveButton.attr('disabled', false);
                E.ValidationIsRunning = false;
                var nothingWrongWithAddress = false;

                if(isServerSuggestionDifferentFromCurrentState(serverObject.elements))
                {
                    serverObject.elements.sort(function(a,b) {return parseFloat(a.fuzzyValue) < parseFloat(b.fuzzyValue);});
                    serverObject.elements = serverObject.elements.splice(0, 5);
                    setupSuggestionPopup(serverObject);
                    latestSuggestions = serverObject.elements;
                    correctAddressButton.one('click', correctAddress);
                    modal.modal('show');
                }
                else
                {
                    nothingWrongWithAddress = true;
                }

                callEnderecoAccounting(function()
                {
                    if(nothingWrongWithAddress)
                    {
                        E.submitForm(formNode[0]);
                    }
                });
            };

            function isServerSuggestionDifferentFromCurrentState(elements)
            {
                var postCode = conf.postCode.node.val(),
                    city = conf.city.node.val(),
                    street = conf.street.node.val(),
                    houseNumber = conf.streetNr.node.val();

                for(var i = 0; i < elements.length; i++)
                {
                    if(postCode !== elements[i].postCode ||
                        city !== elements[i].city ||
                        street !== elements[i].street ||
                        houseNumber !== elements[i].houseNumber)
                        return true;
                }

                return false;
            }

            function setupSuggestionPopup(serverObject)
            {
                var i = 0,currentEntry = createCorrectionChoiceNode(currentInputTemplate, conf.postCode.node.val(), conf.city.node.val(), conf.street.node.val(), conf.streetNr.node.val(), i),
                    correctedValues, element;

                numberOfCurrentCorrections = 0;

                currentEntry.find('input').attr('checked', true);
                currentAddressNode.html('');
                currentAddressNode.append(currentEntry);
                correctedAddressNode.html('');
                for(i = 0; i < serverObject.elements.length; i++)
                {
                    correctedValues = serverObject.elements[i];
                    if(isCorrectionChoiceValid(correctedValues))
                    {
                        element = createCorrectionChoiceNode(correctionItemTemplate, correctedValues.postCode,correctedValues.city,correctedValues.street,correctedValues.houseNumber, i+1);
                        correctedAddressNode.append(element);
                        numberOfCurrentCorrections++;
                    }
                }
                if(numberOfCurrentCorrections == 0) modal.addClass('no-corrections-found'); else modal.removeClass('no-corrections-found');

                var event = E.$.Event("setupPopup");
                $this.trigger(event);
            }

            function isCorrectionChoiceValid(choice)
            {
                return  (typeof choice.postCode == "string" && choice.postCode.length > 0) ||
                        (typeof choice.city == "string" && choice.city.length > 0) ||
                        (typeof choice.street == "string" && choice.street.length > 0) ||
                        (typeof choice.houseNumber == "string" && choice.houseNumber.length > 0);
            }

            function createCorrectionChoiceNode(template, postCode, city, street, streetNumber, id)
            {
                var element = Mustache.render(template, {postCode: postCode, city: city, street: street, streetNumber: streetNumber, id:id});
                return E.$(element);
            }

            function correctAddress()
            {
                var currentIndex = E.$('input[name=addressCorrection]:checked').data('id'), currentItem;
                if(currentIndex > 0)
                {
                    currentItem = latestSuggestions[currentIndex-1];
                    if(currentItem)
                    {
                        conf.postCode.node.val(currentItem.postCode);
                        conf.city.node.val(currentItem.city);
                        conf.street.node.val(currentItem.street);
                        conf.streetNr.node.val(currentItem.houseNumber);
                        valueSetCallback([
                            {node: conf.postCode.node, value: currentItem.postCode},
                            {node: conf.city.node, value: currentItem.city},
                            {node: conf.street.node, value: currentItem.street},
                            {node: conf.streetNr.node, value: currentItem.houseNumber}]);
                    }
                }
                modal.modal('hide');

                //Once the address has been corrected we want to automatically go to the next step to prevent the user from needing to do another input
                //If there are no corrections though, we don't want that the user is encouraged to recheck the given input
                if(!areAddressChecksNeeded() && numberOfCurrentCorrections > 0)
                {
                    formNode.submit();
                }
            }

            modal.on('hidden.bs.modal', function()
            {
                var event = E.$.Event("closedPopup");
                $this.trigger(event);
                correctAddressButton.off('click');
                tryValidation();//TODO is this still needed?
            });

            //defining address check
            addressCheck = new E.ValidationField({
                value: "",
                validationType: new E.Validation.AddressCheck(
                    function(){return conf.postCode.node.val()},
                    function(){return conf.city.node.val()},
                    function(){return conf.street.node.val()},
                    function(){return conf.streetNr.node.val()}
                ),
                onValidation: addressCheckDone
            });
        }
        else
        {
            E.log.debug("Could not initialize StandardAddressCheck, one ore more of the required fields/nodes were missing.");
        }
    }

    initializeAddressCheck(config);

    return $this;
};

E.Validation.StandardAddressCheck = StandardAddressCheck;
/**
 *
 *
 var sampleConfig =
     {
         gender: {node: "", nodeForErrorClass: "", isFemale: function(node){}, isMale: function(node){}, changeTrigger: function(validate){}},
         firstName: {node: ""},
         country: {node: "", isValidCountry: function(){}},
         postCode: {node: ""},
         city: {node: ""},
         street: {node: ""},
         valueSetCallback: function([{node:..., value:...}]){}
     }
     The property "node" is a string (CSS-Selector) or jQuery object as a DOM-Node.
     If not otherwise stated, the selector should only select ONE DOM-Node. If it selects more there might be empty requests to the server or other errors.

 * The given valueSetCallback is called after a suggestion has been chosen and applied.
 *
 * @param config
 * @constructor
 */
function StandardInputAssistant(config) {

    var isValidCountry, valueSetCallback;

    if(config.country && typeof config.country.isValidCountry == "function")
        isValidCountry = config.country.isValidCountry;
    else
        isValidCountry = function(){return true;}
    valueSetCallback = typeof config.valueSetCallback == "function" ? config.valueSetCallback : function(){};

    function initializeGenderCheck(conf)
    {
        if(conf.firstName && conf.firstName.node && conf.gender && conf.gender.node &&
            typeof conf.gender.isMale == "function" && typeof conf.gender.isFemale == "function" )
        {
            if(!conf.gender.nodeForErrorClass) conf.gender.nodeForErrorClass = conf.gender.node;

            var firstNameFieldCheck = function (serverData) {
                var statuses = serverData.statuses,
                    FNCStatus = E.Validation.FirstNameCheckStatus;
                for (var i = 0; i < statuses.length; i++) {
                    switch (statuses[i]) {
                        case FNCStatus.FIRST_NAME_FOUND:
                            break;
                        case FNCStatus.FIRST_NAME_NOT_FOUND:
                            conf.gender.nodeForErrorClass.removeClass("gender-mismatch");
                            break;
                        case FNCStatus.FIRST_NAME_IS_FEMALE:
                            if (conf.gender.isMale(conf.gender.node)) conf.gender.nodeForErrorClass.addClass("gender-mismatch");
                            else conf.gender.nodeForErrorClass.removeClass("gender-mismatch");
                            break;
                        case FNCStatus.FIRST_NAME_IS_MALE:
                            if (conf.gender.isFemale(conf.gender.node)) conf.gender.nodeForErrorClass.addClass("gender-mismatch");
                            else conf.gender.nodeForErrorClass.removeClass("gender-mismatch");
                            break;
                    }
                }
            },
            //Field for validation
            firstNameField = new E.ValidationField({
                value: conf.firstName.node.val(),
                validationType: new E.Validation.FirstNameCheck(function () {
                    return conf.firstName.node.val();
                }, 0),
                onValidation: firstNameFieldCheck
            });

            //When to validate
            conf.gender.changeTrigger(function () {firstNameField.validate();}, conf.gender.node);
            conf.firstName.node.on('blur', function () {
                firstNameField.setValue(conf.gender.node.val());
                firstNameField.validate();
            });
        }
        else
        {
            E.log.warn('Could not initialize Gender check, one or more fields or necessary callbacks are missing.')
        }
    }

    function initializePostCodAndCityExpansion(conf)
    {
        if(conf.postCode && conf.postCode.node && conf.city && conf.city.node)
        {
            var postCodeAndCityExpansionData = function (serverData) {
                    var statuses = serverData.statuses, PCStatus = E.Validation.PostCodeExpansionStatus, suggestions = [];
                    for (var i = 0; i < serverData.elements.length; i++) {
                        suggestions.push(serverData.elements[i].postCode + '\t' + serverData.elements[i].city);
                    }
                    return suggestions;
                },
                postCodeAndCitySelect = function (e) {
                    var selection = e.text, data = selection.split('\t');
                    conf.postCode.node.val(data[0]);
                    conf.city.node.val(data[1]);
                    valueSetCallback([
                        {node: conf.postCode.node, value: data[0]},
                        {node: conf.city.node, value: data[1]}
                    ]);
                };

            var postCodeField = new E.UI.InputFieldSuggest(
                conf.postCode.node,
                postCodeAndCityExpansionData,
                function (currentValue) {
                    return new E.Validation.PostCodeExpansion(currentValue);
                },
                postCodeAndCitySelect
            ),
                cityField = new E.UI.InputFieldSuggest(
                    conf.city.node,
                    postCodeAndCityExpansionData,
                    function (currentValue) {
                        return new E.Validation.CityExpansion(currentValue);
                    },
                    postCodeAndCitySelect
                );

            var postCodeValidationBehaviour = postCodeField.validationBehaviour;
            postCodeField.validationBehaviour = function(currentValue, validationBehaviourData, validate)
            {
                if(isValidCountry())
                {
                    postCodeValidationBehaviour(currentValue, validationBehaviourData, validate);
                }
            };

            var cityValidationBehaviour = cityField.validationBehaviour;
            cityField.validationBehaviour = function(currentValue, validationBehaviourData, validate)
            {
                if(isValidCountry())
                {
                    cityValidationBehaviour(currentValue, validationBehaviourData, validate);
                }
            };
        }
        else
        {
            E.log.warn('Could not initialize postCode and City expansion, one or more fields/nodes were missing.')
        }
    }

    function initializeStreetExpansion(conf)
    {
        if(conf.street && conf.street.node && conf.postCode && conf.postCode.node && conf.city && conf.city.node)
        {
            //Data and data-selection behaviour
            var streetExpansionData = function (serverData) {
                    var statuses = serverData.statuses, PCStatus = E.Validation.PostCodeExpansionStatus, suggestions = [];
                    for (var i = 0; i < serverData.elements.length; i++)
                        suggestions.push(serverData.elements[i].street);

                    return suggestions;
                },
                streetSelect = function(e)
                {
                    conf.street.node.val(e.text);
                    valueSetCallback([{node: conf.street.node, value: e.text}]);
                };

            //validation fields
            var streetField = new E.UI.InputFieldSuggest(
                conf.street.node,
                streetExpansionData,
                function (currentValue) {
                    return new E.Validation.StreetExpansion(
                        currentValue,
                        function () {
                            return conf.postCode.node.val();
                        },
                        function () {
                            return conf.city.node.val();
                        }
                    )
                },
                streetSelect
            );

            var streetValidationBehaviour = streetField.validationBehaviour;
            streetField.validationBehaviour = function(currentValue, validationBehaviourData, validate)
            {
                if(isValidCountry())
                {
                    streetValidationBehaviour(currentValue, validationBehaviourData, validate);
                }
            };
        }
        else
        {
            E.log.warn('Could not initialize postCode and City expansion, one or more fields/nodes were missing.')
        }
    }

    initializeGenderCheck(config);
    initializePostCodAndCityExpansion(config);
    initializeStreetExpansion(config);
};

E.Validation.StandardInputAssistant = StandardInputAssistant;
function StandardOxidAddressCheck(selectedCountryField, postCodeField, cityField, streetField, streetNrField, saveButton, form, setValueCallback) {

    //Dom nodes to validate
    var addressCheck,
        selectedCountryField = typeof selectedCountryField == "string" ? E.$(selectedCountryField) : selectedCountryField,
        postCodeFieldNode = typeof postCodeField == "string" ? E.$(postCodeField) : postCodeField,
        cityFieldNode = typeof cityField == "string" ? E.$(cityField) : cityField,
        streetFieldNode = typeof streetField == "string" ? E.$(streetField) : streetField,
        streetNrFieldNode = typeof streetNrField == "string" ? E.$(streetNrField) : streetNrField,
        saveButtonNode = typeof saveButton == "string" ? E.$(saveButton) : saveButton,
        formNode = typeof form == "string" ? E.$(form) : form,
        valueSetCallback = typeof setValueCallback == "function" ? setValueCallback : function(){};

    if(selectedCountryField.length > 0 && postCodeFieldNode.length > 0 && cityFieldNode.length > 0 && streetFieldNode.length > 0 && streetNrFieldNode.length > 0 && saveButtonNode.length > 0 && formNode.length == 1)
    {
        var isValidCountry = function() {
            if (selectedCountryField.length > 0) {
                if (selectedCountryField.val() == '') {
                    return true;
                }

                if (selectedCountryField.val() != 'a7c40f631fc920687.20179984') {
                    return false;
                }
            }
            return true;
        };

        addressCheck = new E.Validation.StandardAddressCheck({
            pathToAccountingController: "?cl=enderecocontroller2",
            country: {node: selectedCountryField, isValidCountry: isValidCountry},
            postCode: {node: postCodeFieldNode},
            city: {node: cityFieldNode},
            street: {node: streetFieldNode},
            streetNr: {node: streetNrFieldNode},
            saveButton: {node: saveButtonNode},
            form: {node: formNode},
            valueSetCallback: valueSetCallback
        });
    }
    else
    {
        E.log.debug("Could not initialize StandardOxidAddressCheck, one or more of the required fields were missing.");
    }

    return addressCheck;
};

E.Validation.StandardOxidAddressCheck = StandardOxidAddressCheck;

function StandardOxidInputAssistant(selectedCountryField, firstNameField, genderField, genderErrorClassNode, postCodeField, cityField, streetField, streetNrField, setValueCallback) {
//Dom nodes to validate
    var selectedCountryField = typeof selectedCountryField == "string" ? E.$(selectedCountryField) : selectedCountryField,
        firstNameFieldNode = typeof firstNameField == "string" ? E.$(firstNameField) : firstNameField,
        genderFieldNode = typeof genderField == "string" ? E.$(genderField) : genderField,
        postCodeFieldNode = typeof postCodeField == "string" ? E.$(postCodeField) : postCodeField,
        cityFieldNode = typeof cityField == "string" ? E.$(cityField) : cityField,
        streetFieldNode = typeof streetField == "string" ? E.$(streetField) : streetField,
        streetNrFieldNode = typeof streetNrField == "string" ? E.$(streetNrField) : streetNrField,
        genderFieldErrorClassNode = typeof genderErrorClassNode == "string" ? E.$(genderErrorClassNode) : genderFieldNode.parent(),
        valueSetCallback = typeof setValueCallback == "function" ? setValueCallback : function(){};

    if(firstNameFieldNode.length > 0 && genderFieldNode.length > 0 && postCodeFieldNode.length > 0 && cityFieldNode.length > 0 && streetFieldNode.length > 0 && streetNrFieldNode.length > 0)
    {
        streetNrFieldNode.wrap('<div class="awesomplete"></div>'); //fixes design bug

        if( typeof E.Validation.genderInputType != "string") E.Validation.genderInputType = "select";

        var isFemale = function()
        {
            if(E.Validation.genderInputType == "select")
            {
                return genderFieldNode.val() == 'MRS';
            }
            else if(E.Validation.genderInputType == "radio")
            {
                return genderFieldNode.filter(':checked').val() == 'MRS';
            }
        },
        isMale = function()
        {
            if(E.Validation.genderInputType == "select")
            {
                return genderFieldNode.val() == 'MR';
            }
            else if(E.Validation.genderInputType == "radio")
            {
                return genderFieldNode.filter(':checked').val() == 'MR';
            }
        },
        changeTrigger = function(validate)
        {
            genderFieldNode.change(validate);
        },
        isValidCountry = function()
        {
            if(selectedCountryField.length > 0)
            {
                if(selectedCountryField.val() == '')
                {
                    return true;
                }

                if(selectedCountryField.val() != 'a7c40f631fc920687.20179984')
                {
                    return false;
                }
            }

            return true;
        };

        E.Validation.StandardInputAssistant({
            gender: {node: genderFieldNode, nodeForErrorClass: genderFieldErrorClassNode, isFemale: isFemale, isMale: isMale, changeTrigger: changeTrigger},
            firstName: {node: firstNameFieldNode},
            country: {node: selectedCountryField, isValidCountry: isValidCountry},
            postCode: {node: postCodeFieldNode},
            city: {node: cityFieldNode},
            street: {node: streetFieldNode},
            valueSetCallback: valueSetCallback
        });
    }
    else
    {
        E.log.debug("Could not initialize StandardOxidInputAssistant, one ore more of the required fields were missing.");
    }
};

E.Validation.StandardOxidInputAssitant = StandardOxidInputAssistant;
/**
 *
 * UpperCaseName capitalizes a field when the user leaves it (on blur event)
 */
function UpperCaseName(field)
{
    function capitalizeOnBlur(field) {
        if (field.length > 0) {
            field.on('blur', function () {
                var name = field.val();
                E.$(this).val(titleCase(name));
            });
        }
    }

    function titleCase(value) {
        value = value ? value : '';
        var result = [],
            separators = [' ', '-', '–', '_', '.'],
            upperCase = true;

        for(var i = 0; i < value.length; i++)
        {
            result.push(upperCase ? value[i].toUpperCase() : value[i]);
            upperCase = false;
            if(separators.indexOf(value[i]) >= 0)
                upperCase = true;
        }

        result = result.join('');
        return result.replace(/\s{2,}/g, ' ').trim();
    }

    if(typeof field == "string") field = E.$(field);
    else if(typeof field != "object" || typeof field.val != "function" || typeof field.val() != "string")
    {
        E.log.error('UpperCaseName: The field for uppercase must be a input text field as either a css selector or a jQuery object.');
        return;
    }
    capitalizeOnBlur(field);
}

E.Validation.UpperCaseName = UpperCaseName;
/**
 *
 * TODO: Outdated Documentation. Copy & Paste has been detected!
 *
 *  @param firstName {string|function}
 *  @param sort {string}
 *  @returns {E.ValidationType}
 *  @class
 */
function AddressCheck(postcode, city, street, streetNumber)
{
    var dataObject = {
            "service"		: "addressCheck",
            "fieldId"		: "noLongerUsed",
            "postcode"		: postcode,
            "city"			: city,
            "street"		: street,
            "housenumber"	: streetNumber,
            callNo: function(){ return E.getCommunicationService().getRequestSendCount()+1; }
        },
        config={},
        validationType;

    // if(httpRequestConfig) config.httpRequest = httpRequestConfig; //change http config if you so desire

    validationType = new E.ValidationType(config, dataObject);
    validationType.formatRequest = function(data) { return { orwellServiceData: JSON.stringify(data) } };
    validationType.processResponse = function(data) {
        var dataObject = {status:[],elements:[]};

        try {
            dataObject = JSON.parse(data);
        }
        catch (e)
        {
            console.log(e);
        }
        //only return stati
        return {statuses: dataObject.status, elements: dataObject.elements};
    };

    return validationType;
}

E.Validation.AddressCheck = AddressCheck;

E.Validation.AddressCheckStatus = {
   ADDRESS_CORRECT : 'A1000',
    ADDRESS_NORMED : 'A1100',
    POSTCODE_NORMED: 'A1130',
    CITY_NORMED: 'A1140',
    STREET_NORMED: 'A1160',
    STREET_NR_NORMED: 'A1180',
    ADDRESS_OUTDATED: 'A1200',
    POSTCODE_OUTDATED: 'A1230',
    CITY_OUTDATED: 'A1240',
    STREET_OUTDATED: 'A1260',
    STREET_NR_OUTDATED: 'A1280',
    ADDRESS_AUTOMATICALLY_CORRECTED: 'A1300',
    ADDRESS_IS_CORRECTABLE: 'A2000',
    ADDRESS_HAS_BEEN_CORRECTED: 'A2100',
    ADDRESS_IS_TOO_AMBIGUOUS: 'A3000',
    ADDRESS_COULD_NOT_BE_FOUND: 'A4000',
    POSTCODE_COULD_NOT_BE_FOUND: 'A4030',
    CITY_COULD_NOT_BE_FOUND: 'A4040',
    STREET_COULD_NOT_BE_FOUND: 'A4060',
    STREET_NR_COULD_NOT_BE_FOUND: 'A4070',
};




/**
 *
 *  @param firstName {string|function}
 *  @param sort {string}
 *  @returns {E.ValidationType}
 *  @class
 */
function FirstNameCheck(firstName, sort)
{
    var dataObject = {
            service: "firstNameCheck",
            firstName: firstName,
            fieldId: "noLongerUsed",
            transaction: "new",
            search: "0",
            sort: sort ? sort: "0",
            callNo: function(){ return E.getCommunicationService().getRequestSendCount()+1; }
        },
        config={},
        validationType;

    // if(httpRequestConfig) config.httpRequest = httpRequestConfig; //change http config if you so desire

    validationType = new E.ValidationType(config, dataObject);
    validationType.formatRequest = function(data) { return { orwellServiceData: JSON.stringify(data) } };
    validationType.processResponse = function(data) {
        var dataObject = {status:[]};

        try {
            dataObject = JSON.parse(data);
        }
        catch (e)
        {
            console.log(e);
        }
        //only return stati
        return {statuses: dataObject.status};
    };

    return validationType;
}

E.Validation.FirstNameCheck = FirstNameCheck;

E.Validation.FirstNameCheckStatus = {
    FIRST_NAME_NOT_FOUND: 'A2000',
    FIRST_NAME_FOUND: 'A1000',
    FIRST_NAME_IS_MALE: 'A1100',
    FIRST_NAME_IS_FEMALE: 'A1200'
};




/**
 *
 *  @param postCode {string|function}
 *  @param sort {string}
 *  @returns {E.ValidationType}
 *  @class
 */
function CityExpansion(city, sort)
{
    var dataObject = {
            "service" 		: "cityExpansion",
            "city"	  		: city,
            "fieldId" : "noLongerUsed",
            "transaction" : "current",
            search: "0",
            sort: sort ? sort: "0",
            callNo: function(){ return E.getCommunicationService().getRequestSendCount()+1; }
        },
        config={},
        validationType;

    // if(httpRequestConfiStag) config.httpRequest = httpRequestConfig; //change http config if you so desire

    validationType = new E.ValidationType(config, dataObject);
    validationType.formatRequest = function(data) { return { orwellServiceData: JSON.stringify(data) } };
    validationType.processResponse = function(data) {
        var dataObject = {status:[],elements:[]};

        try {
            dataObject = JSON.parse(data);
        }
        catch (e)
        {
            console.log(e);
        }
        //only return stati
        return {statuses: dataObject.status, elements:dataObject.elements};
    };
    return validationType;
}

E.Validation.CityExpansion = CityExpansion;

E.Validation.CityExpansionStatus = {

};




/**
 *
 *  @param postCode {string|function}
 *  @param sort {string}
 *  @returns {E.ValidationType}
 *  @class
 */
function PostCodeExpansion(postCode, sort)
{
    var dataObject = {
            "service" : "postCodeExpansion",
            "fieldId" : "noLongerUsed",
            "postCode": postCode,
            "transaction" : "current",
            search: "0",
            sort: sort ? sort: "0",
            callNo: function(){ return E.getCommunicationService().getRequestSendCount()+1; }
        },
        config={},
        validationType;

    // if(httpRequestConfig) config.httpRequest = httpRequestConfig; //change http config if you so desire

    validationType = new E.ValidationType(config, dataObject);
    validationType.formatRequest = function(data) { return { orwellServiceData: JSON.stringify(data) } };
    validationType.processResponse = function(data) {
        var dataObject = {status:[],elements:[]};

        try {
            dataObject = JSON.parse(data);
        }
        catch (e)
        {
            console.log(e);
        }
        //only return stati
        return {statuses: dataObject.status, elements:dataObject.elements};
    };
    return validationType;
}

E.Validation.PostCodeExpansion = PostCodeExpansion;

E.Validation.PostCodeExpansionStatus = {
    FOUND_ONE_POSTCODE_TOWN_COMBINATION: 'A1000',
    FOUND_MULTIPLE_POSTCODE_TOWN_COMBINATIONS: 'A2000',
    GOT_MAX_NUMBER_OF_RESULTS__RESULT_LIST_IS_INCOMPLETE: 'A2100',
    POSTCODE_NOT_FOUND :'A3000',
    POSTCODE_NOT_FOUND2 :'A3500',
    POSTCODE_INVALID :'A4000',
    MAJOR_FIELD_INVALID: 'A4500',
    POSTCODE_CONTAINS_INVALID_SIGNS: 'A4510',
    POSTCODE_EMPTY:'A4520',
    POSTCODE_TOO_LONG:'A4530'
};




/**
 *
 *  @param postCode {string|function}
 *  @param sort {string}
 *  @returns {E.ValidationType}
 *  @class
 */
function StreetExpansion(street, postCode, city, sort)
{
    var dataObject = {
            "service" 	: "streetExpansion",
            "fieldId" : "noLongerUsed",
            "postCode" 	: postCode,
            "city"		: city,
            "street"	: street,
            "transaction" : "current",
            search: "0",
            sort: sort ? sort: "0",
            callNo: function(){ return E.getCommunicationService().getRequestSendCount()+1; }
        },
        config={},
        validationType;

    // if(httpRequestConfig) config.httpRequest = httpRequestConfig; //change http config if you so desire

    validationType = new E.ValidationType(config, dataObject);
    validationType.formatRequest = function(data) { return { orwellServiceData: JSON.stringify(data) } };
    validationType.processResponse = function(data) {
        var dataObject = {status:[],elements:[]};

        try {
            dataObject = JSON.parse(data);
        }
        catch (e)
        {
            console.log(e);
        }
        //only return stati
        return {statuses: dataObject.status, elements:dataObject.elements};
    };
    return validationType;
}

E.Validation.StreetExpansion = StreetExpansion;

E.Validation.StreetExpansionStatus = {

};



