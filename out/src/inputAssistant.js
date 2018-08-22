E.$(document).ready(function() {
    //Delivery address
    var oxCountryDel = E.$('[name="deladr[oxaddress__oxcountryid]"]'),
        oxNameDel = E.$('[name="deladr[oxaddress__oxfname]"]'),
        oxSalDel = E.$('[name="deladr[oxaddress__oxsal]"]'),
        oxZipDel = E.$('[name="deladr[oxaddress__oxzip]"]'),
        oxCityDel = E.$('[name="deladr[oxaddress__oxcity]"]'),
        oxStreetDel = E.$('[name="deladr[oxaddress__oxstreet]"]'),
        oxStreetNrDel = E.$('[name="deladr[oxaddress__oxstreetnr]"]');

    //do all of the fields exist?
    if (oxNameDel.length > 0 && oxSalDel.length > 0 && oxZipDel.length > 0 && oxCityDel.length > 0 && oxStreetDel.length > 0 && oxStreetNrDel.length > 0) {
        var inputAssistantDeliveryAddress = new E.Validation.StandardOxidInputAssitant(oxCountryDel, oxNameDel, oxSalDel, null, oxZipDel, oxCityDel, oxStreetDel, oxStreetNrDel, E.Validation.onValidationValueSet);
        //chrome autocomplete fix
        var isWebkit = 'WebkitAppearance' in document.documentElement.style;
        if (isWebkit) {
            oxNameDel.attr('autocomplete','address-level4 disable-autocomplete-on-chrome'+new Date().getTime());
        }

        oxZipDel.attr('autocomplete', 'off');
        oxCityDel.attr('autocomplete', 'off');
        oxStreetDel.attr('autocomplete', 'off');
        oxStreetNrDel.attr('autocomplete', 'off');
    }

    //Invoice address
    var oxCountry = E.$('[name="invadr[oxuser__oxcountryid]"]'),
        oxName = E.$('[name="invadr[oxuser__oxfname]"]'),
        oxSal = E.$('[name="invadr[oxuser__oxsal]"]'),
        oxZip = E.$('[name="invadr[oxuser__oxzip]"]'),
        oxCity = E.$('[name="invadr[oxuser__oxcity]"]'),
        oxStreet = E.$('[name="invadr[oxuser__oxstreet]"]'),
        oxStreetNr = E.$('[name="invadr[oxuser__oxstreetnr]"]');

    //do all of the fields exist?
    if (oxName.length > 0 && oxSal.length > 0 && oxZip.length > 0 && oxCity.length > 0 && oxStreet.length > 0 && oxStreetNr.length > 0) {
        var inputAssistantInvoiceAddress = new E.Validation.StandardOxidInputAssitant(oxCountry, oxName, oxSal, null, oxZip, oxCity, oxStreet, oxStreetNr, E.Validation.onValidationValueSet);
        //chrome autocomplete fix
        var isWebkit = 'WebkitAppearance' in document.documentElement.style;
        if (isWebkit) {
            oxName.attr('autocomplete','address-level4 disable-autocomplete-on-chrome');
        }

        oxZip.attr('autocomplete', 'off');
        oxCity.attr('autocomplete', 'off');
        oxStreet.attr('autocomplete', 'off');
        oxStreetNr.attr('autocomplete', 'off');
    }

    //upper case name
    var oxName = E.$('[name="invadr[oxuser__oxfname]"]'),
        oxLastName = E.$('[name="invadr[oxuser__oxlname]"]'),
        oxNameDel = E.$('[name="deladr[oxaddress__oxfname]"]'),
        oxLastNameDel = E.$('[name="deladr[oxaddress__oxlname]"]');

    if(oxName.length > 0 ) E.Validation.UpperCaseName(oxName);
    if(oxLastName.length > 0 ) E.Validation.UpperCaseName(oxLastName);
    if(oxNameDel.length > 0 ) E.Validation.UpperCaseName(oxNameDel);
    if(oxLastNameDel.length > 0 ) E.Validation.UpperCaseName(oxLastNameDel);
});