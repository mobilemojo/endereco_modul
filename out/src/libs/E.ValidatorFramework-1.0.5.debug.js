E = function(){
    var ComService;

    return {
        getCommunicationService: function()
        {
            if(!ComService) ComService = new E.Services.CommunicationService();
            return ComService;
        }
    }
}();

E.$ = jQuery.noConflict(true); //user our own version of jquery

E.Services = {};

E.UI = {};
/**
 *
 * @returns {*}
 * @class
 */
function CommunicationService()
{
    var $this = E.$(this),
        serverUri,
        requestSendCounter = 0,
        standardPath = "";

    $this.__ = {};

    /**
     *
     * @param uri {string} Server URI.
     */
    $this.setServerUri = function(uri)
    {
        serverUri = uri;
    }

    /**
     *
     * @returns {string} Server URI.
     */
    $this.getServerUri = function()
    {
        return serverUri;
    }

    /**
     *
     * @param path {string} Path.
     */
    $this.setStandardPath = function(path)
    {
        standardPath = path;
    }

    /**
     *
     * @returns {string} Path.
     */
    $this.getStandardPath = function()
    {
        return standardPath;
    }

    /**
     *
     * @returns {number} How many requests have been send.
     */
    $this.getRequestSendCount = function()
    {
        return requestSendCounter;
    }

    /**
     *
     * @param validationType {E.ValidationType}
     * @param onSuccess {CommunicationService~onSuccess}
     * @param onFailure {CommunicationService~onFailure}
     * @param customEndPoint {String}
     */
    $this.sendRequest = function(validationType, onSuccess, onFailure, customEndPoint)
    {
        var uri = $this.getServerUri(),
            data = validationType.getRequestBody();

        uri = typeof customEndPoint == "string" ? uri+customEndPoint : uri+$this.getStandardPath();

        if($this.isValidUri(uri))
        {
            var httpRequestConfig = validationType.getHttpRequestConfig();
            E.$.ajax({
                type: httpRequestConfig.type,
                url: uri,
                data: data,
                success: onSuccess,
                error: onFailure
            });
            requestSendCounter++;
        }
        else
        {
            E.log.error("Server URI has not been set yet, please set the serverUri to a valid value with setServerUri(uri).");
        }
    }

    /**
     * Checks if the uri is valid for the http request. Currently this only checks if the value is a string, but
     * this might change in the future.
     * @param uri
     * @returns {boolean}
     */
    $this.isValidUri = function(uri)
    {
        return typeof(uri) == "string";
    }

    /**
     *  @callback CommunicationService~onSuccess
     *  @param data {object}
     *  @param textStatus {string}
     *  @param xhr {object}
     */

    /**
     *
     *  @callback CommunicationService~onFailure
     *  @param data {object}
     *  @param textStatus {string}
     *  @param xhr {object}
     */

    return $this;
}

E.Services.CommunicationService = CommunicationService;


function InputFieldSuggest(inputFieldSelector, onValidate, validationTypeBuilder, customSelectBehaviour)
{
    var $this = E.$(this),
        inputFieldNode = (inputFieldSelector && (inputFieldSelector instanceof jQuery || inputFieldSelector.constructor.prototype.jquery))? inputFieldSelector : E.$(inputFieldSelector),
        validationType,
        validationField,
        onValidateCallback = onValidate,
        validationBehaviourObject = {},
        autocompleteWidget,
        blockedKeys = [13,37,38,39,40,9,17,18,16,20,27];

    if(inputFieldNode.length == 1) //check if anything has matched
    {
        function init()
        {
            validationType = validationTypeBuilder($this.getValue);
            validationField = new E.ValidationField({
                value: $this.getValue(),
                validationType: validationType,
                onValidation: function(answer, textStatus)
                {
                    var answerList = onValidateCallback(answer);
                    $this.expand(answerList);
                }
            });

            inputFieldNode.on('keyup', function(e)
            {
                if(blockedKeys.indexOf(e.keyCode) == -1) $this.validationBehaviour($this.getValue(), validationBehaviourObject, validationField.validate);
            });

            autocompleteWidget = new Awesomplete(inputFieldNode[0], {
                minChars: 1,
                maxItems: 15,
                autoFirst: true
            });

            inputFieldNode.on('awesomplete-select', function (e)
            {
                if(customSelectBehaviour)
                {
                    e.preventDefault();
                    customSelectBehaviour(e.originalEvent);
                    $this.close();
                }
            });

            inputFieldNode.on('awesomplete-selectcomplete', function(e)
            {
                $this.trigger('valueChanged', {value: e.text});
            });

            inputFieldNode.blur( function()
            {
                inputFieldNode.removeClass('focus');
                autocompleteWidget.close();
            });

            inputFieldNode.focus( function()
            {
                inputFieldNode.addClass('focus');
            });
        }

        $this.setAutocompleteData = function(data)
        {
            autocompleteWidget.list = data;
        };

        $this.getFieldNode = function()
        {
            return inputFieldNode;
        };

        $this.validationBehaviour = function(currentValue, validationBehaviourData, validate)
        {
            if(validationBehaviourData.timeOut) clearTimeout(validationBehaviourData.timeOut);
            validationBehaviourData.timeOut = setTimeout(function()
            {
                validate();
            }, 100);
        };

        $this.getValue = function()
        {
            return inputFieldNode.val();
        };

        $this.setValue = function(value)
        {
            inputFieldNode.val(value);
            $this.trigger('valueChanged', {value: value});
        };

        $this.expand = function(values)
        {
            if(inputFieldNode.hasClass('focus'))
            {
                if(values)
                {
                    autocompleteWidget.list = values;
                    autocompleteWidget.evaluate();
                }
                else
                {
                    autocompleteWidget.open();
                }
            }
        };

        $this.close = function()
        {
            autocompleteWidget.close();
        };

        init();
    }
    else if(inputFieldNode.length == 0)
    {
        E.log.debug("Selector \""+inputFieldSelector+"\" did not match any Input Fields. Could not initialize InputFieldExpander.");
    }
    else
    {
        E.log.debug("Selector \""+inputFieldSelector+"\" matched more than one input field. This is not supported.");
    }

    return $this;
}

E.UI.InputFieldSuggest = InputFieldSuggest;
if(typeof Logger == "undefined")
{
    console.log("Couldn't find Logger.js library.");
}
else
{
    Logger.useDefaults();
    Logger.setLevel(Logger.ERROR);
    E.log = Logger;
}
/**
 * This function takes a html form element node and submits it without actually using the "submit()" function.
 * Using the "submit()" function directly should be considered bad practice as it is impossible right now
 * to intercept or react in any way to a programmatically initiated submit event. This makes it much more friendly
 * for users of other libraries who also want to intercept the submit event.
 * @function
 */
function submitForm(form) {
    //get the form element's document to create the input control with
    //(this way will work across windows in IE8)
    var button = form.ownerDocument.createElement('input');
    //make sure it can't be seen/disrupts layout (even momentarily)
    button.style.display = 'none';
    //make it such that it will invoke submit if clicked
    button.type = 'submit';
    //append it and click it
    form.appendChild(button).click();
    //if it was prevented, make sure we don't get a build up of buttons
    form.removeChild(button);
}

E.submitForm = submitForm;



/**
 * This class provides a simple config validator. It only checks if keys are in the right place and structure.
 * Thus it also ignores the structure of non plain js objects (things instanced by new).
 * @class
 */
function ObjectValidator()
{
    /**
     * This function ensures that all keys in the validationObject exist in the config object.
     * This function ignores non-plain-js objects to avoid checking for objects created by the new statement.
     * @param config {object}
     * @param validationObject {object}
     */
    this.validateConfig = function(config, validationObject)
    {
        for(var key in validationObject)
        {
            if(!config.hasOwnProperty(key))
            {
                E.log.debug("Config object should have property \""+key+"\" but it did not.");
                return false;
            }

            if(E.$.isPlainObject(config[key])) //Do not check complex structures and instances of classes.
            {
                return this.validateConfig(config[key], validationObject[key]);
            }
        }

        return true;
    }
}

var OV = new ObjectValidator();

E.validateConfig = OV.validateConfig;


function submitForm(form) {
    //get the form element's document to create the input control with
    //(this way will work across windows in IE8)
    var button = form.ownerDocument.createElement('input');
    //make sure it can't be seen/disrupts layout (even momentarily)
    button.style.display = 'none';
    //make it such that it will invoke submit if clicked
    button.type = 'submit';
    //append it and click it
    form.appendChild(button).click();
    //if it was prevented, make sure we don't get a build up of buttons
    form.removeChild(button);
}
/**
 *
 * @param config {object} Config Object.
 * @param config.onValidation {FieldCombination~onValidation} How will the value be validated.
 * @returns {*}
 * @class
 */
function FieldCombination(configObject)
{
    var validConfig = {
            onValidation: function(){}
        },
        $this = E.$(this), fields, onValidation, communicationService,
        answers, requestCount, fieldCount = 0;

    if(E.validateConfig(configObject, validConfig)) {

        function init()
        {
            fields = {};
            onValidation = configObject.onValidation;
            communicationService = E.getCommunicationService();
            answers = {};
            requestCount = 0;

            if(configObject.fields)
            {
                for(var key in configObject.fields)
                {
                    $this.addField(key, configObject.fields[key]);
                }
            }
        }

        $this.getField = function(key) {
            if(fields[key]) {return fields[key];} else {E.log.debug("Couldn't find field with key \""+key+"\"."); return null;}
        };

        $this.addField = function(key, field) {
            if(!fields[key]) {fields[key] = field; fieldCount++;} else E.log.debug("Couldn't add field. Field \""+key+"\" already exists.");
        };

        $this.removeField = function(key) {
            if(fields[key]) {delete fields[key]; fieldCount--;} else E.log.debug("Couldn't remove field. Field \""+key+"\" does not exist.");
        };

        $this.validate = function () {
            requestCount = 0;
            answers = {};

            for(var key in fields)
            {
                communicationService.sendRequest(fields[key].getValidationType(), onSuccess.bind(this, key), onFailure.bind(this, key));
            }
        };

        /**
        *
        * @param data
        * @param textStatus
        * @param xhr
        * @private
        */
        function onSuccess(key, data, textStatus, xhr) {

            answers[key] = {data: data, textStatus: textStatus};
            requestCount++;
            if(requestCount == fieldCount) onValidation(answers, textStatus);
        }

        /**
        *
        * @param data
        * @param textStatus
        * @param xhr
        * @private
        */
        function onFailure(key, data, textStatus, xhr) {
            E.log.debug("A request has failed in ValidationField. \"" + textStatus + "\"");

            answers[key] = {data: data, textStatus: textStatus};
            requestCount++;

            if(requestCount == fieldCount) onValidation(answers, textStatus);
        }

        //exposing private members for testing purposes
        $this.__ = {};
        $this.__.onFailure = onFailure;
        $this.__.onSuccess = onSuccess;

        init();
    }
    else
    {
        E.log.debug("Could not create ValidationField. No valid config Object given.")
    }

    /**
    *  @callback FieldCombination~onValidation Callback function with the answer and the context.
    *   @param {object} answer The answer of the validation.
    *   @param {object} field This current field.
    */


return $this;
}

E.FieldCombination = FieldCombination;
/**
 *
 * @param config {object} Config Object.
 * @param config.value {*} The initial value.
 * @param config.validationType {E.ValidationType} How will the value be validated.
 * @param config.onValidation {ValidationField~onValidation} How will the value be validated.
 * @returns {*}
 * @class
 */
function ValidationField(configObject)
{
    var validConfig = {
        value: '',
        validationType: {},
        onValidation: function(){}
    },  $this = E.$(this), value, validationType, onValidation, communicationService;

    if(E.validateConfig(configObject, validConfig))
    {
        function init()
        {
            value = configObject.value,
            validationType = configObject.validationType,
            onValidation = configObject.onValidation,
            communicationService = E.getCommunicationService();
        }

        /**
         * Sets Value of the field.
         * @param value {*}
         */
        $this.setValue = function(setValue)
        {
            value = setValue;
        };

        /**
         * Returns value of the field
         * @returns {*} type of value of this field.
         */
        $this.getValue = function()
        {
            return this;
        };

        /**
         *
         * @returns {E.ValidationType}
         */
        $this.getValidationType = function()
        {
            return validationType;
        };

        /**
         * Validates the field.
         */
        $this.validate = function()
        {
            communicationService.sendRequest(validationType, onSuccess, onFailure);
        };

        /**
         *
         * @param data
         * @param textStatus
         * @param xhr
         * @private
         */
        function onSuccess(data, textStatus, xhr)
        {
            var processedData = validationType.processResponse(data);
            onValidation(processedData, textStatus);
        }

        /**
         *
         * @param data
         * @param textStatus
         * @param xhr
         * @private
         */
        function onFailure(data, textStatus, xhr)
        {
            E.log.debug("A request has failed in ValidationField. \""+textStatus+"\"");
            var processedData = validationType.processResponse(data);
            onValidation(processedData, textStatus);
        }

        init();
    }
    else
    {
        E.log.debug("Could not create ValidationField. No valid config Object given. ")
    }

    /**
     *  @callback ValidationField~onValidation Callback function with the answer and the context.
     *   @param {object} answer The answer of the validation.
     *   @param {object} field This current field.
     */

    return $this;
}

E.ValidationField = ValidationField;
/**
 *
 * @param config {object} Add config like how the httpRequest should be send.
 * @param requestBodyObject {object} All information to get the current requestBody. You may but a "key": function(){} pair into this object. It will be called right before the request is send to get the current information.
 * @returns {*}
 * @class
 */
function ValidationType(config, requestBodyObject)
{
    var $this = E.$(this),
        httpRequest = {
            type: "POST"
        },
        body;

    if(config.httpRequest) httpRequest = config.httpRequest;
    body = requestBodyObject;

    /**
     *
     * @returns {object} Current http request config.
     */
    $this.getHttpRequestConfig = function()
    {
        return httpRequest;
    }

    /**
     *  @returns {object} The current request body as a plain JS-object.
     */
    $this.getRequestBody = function()
    {
        var currentResponseBody = {};
        getCurrentResponseBodyState(currentResponseBody, body);

        currentResponseBody = $this.formatRequest(currentResponseBody);

        return currentResponseBody;
    }

    /**
     *  Overwrite this to create the request-object you need for your data-field.
     *  @param data
     *  @returns {*}
     */
    $this.formatRequest = function(data)
    {
        return data;
    }

    /**
     * Overwrite this function if the onValidate callback of validationField should get a more formatted response.
     * @param data
     * @returns {*}
     */
    $this.processResponse = function(data)
    {
        return data;
    }

    /**
     * Gets the current date for each field. Since fields can be functions which receive the current data.
     * @param bodyImage {object} The object that gets filled with the current body state.
     * @param currentBodyPart {object} The object that represents all information necessary to get the current state.
     * @private
     */
    function getCurrentResponseBodyState(bodyImage, currentBodyPart)
    {
        for(var key in currentBodyPart)
        {
            if(typeof(currentBodyPart[key]) == "function") bodyImage[key] = currentBodyPart[key]();
            else if(typeof(currentBodyPart[key]) == "object" && !E.$.isArray(currentBodyPart[key])) {
                bodyImage[key] = {};
                getCurrentResponseBodyState(bodyImage[key], currentBodyPart[key]);
            }
            else{
                bodyImage[key] = currentBodyPart[key];
            }
        }
    }

    return $this;
}

E.ValidationType = ValidationType;