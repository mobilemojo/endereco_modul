E.$(document).ready(function(){
    var oxCountryDel = E.$('[name="deladr[oxaddress__oxcountryid]"]'),
        oxCountry = E.$('[name="invadr[oxuser__oxcountryid]"]'),
        oxZip = E.$('input[name="invadr[oxuser__oxzip]"]'),
        oxCity = E.$('input[name="invadr[oxuser__oxcity]"]'),
        oxStreet = E.$('input[name="invadr[oxuser__oxstreet]"]'),
        oxStreetNr = E.$('input[name="invadr[oxuser__oxstreetnr]"]'),
        oxZipDel = E.$('input[name="deladr[oxaddress__oxzip]"]'),
        oxCityDel = E.$('input[name="deladr[oxaddress__oxcity]"]'),
        oxStreetDel = E.$('input[name="deladr[oxaddress__oxstreet]"]'),
        oxStreetNrDel = E.$('input[name="deladr[oxaddress__oxstreetnr]"]'),
        oxSaveButton = E.$('#accUserSaveTop, #userNextStepTop, #userNextStepTop2, #userNextStepTop, #userNextStepBottom, #userNextStepBottom2'),
        oxForm = E.$(oxSaveButton.closest("form")[0]),
        shippingAddressHeadline = E.$("#shipping-address-suggestion-headline"),
        billingAddressHeadline = E.$("#billing-address-suggestion-headline");

    //do all of the Invoice fields exist?
    if(oxZip.length > 0 && oxCity.length > 0 && oxStreet.length > 0 && oxStreetNr.length > 0 && oxSaveButton.length > 0 && typeof E.addressCheckInvoice == "undefined")
    {
        E.addressCheckInvoice = new E.Validation.StandardOxidAddressCheck(oxCountry, oxZip, oxCity, oxStreet, oxStreetNr, oxSaveButton, oxForm, E.Validation.onValidationValueSet);
        E.addressCheckInvoice.on('setupPopup', function()
        {
            billingAddressHeadline.css('display', '');
            shippingAddressHeadline.css('display', 'none');
        });
    }

    //do all of the Delivery fields exist?
    if(oxZipDel.length > 0 && oxCityDel.length > 0 && oxStreetDel.length > 0 && oxStreetNrDel.length > 0 && oxSaveButton.length > 0 && typeof E.addressCheckDelivery == "undefined")
    {
        E.addressCheckDelivery = new E.Validation.StandardOxidAddressCheck(oxCountryDel, oxZipDel, oxCityDel, oxStreetDel, oxStreetNrDel, oxSaveButton, oxForm, E.Validation.onValidationValueSet);

        E.addressCheckDelivery.on('setupPopup', function()
        {
            billingAddressHeadline.css('display', 'none');
            shippingAddressHeadline.css('display', '');
        });

        E.$('#showShipAddress').change(function()
        {
            var isShipAddressEqualToInvoiceAddress = E.$('#showShipAddress').prop('checked');
            if(isShipAddressEqualToInvoiceAddress === true)
            {
                E.addressCheckDelivery.setAddressCheckNeeded(false);
            }
        });

        E.addressCheckDelivery.on('validate', function(e)
        {
            var isShipAddressEqualToInvoiceAddress = E.$('#showShipAddress').prop('checked');
            if(isShipAddressEqualToInvoiceAddress === true)
            {
                e.preventDefault();
                E.addressCheckDelivery.setAddressCheckNeeded(false);
            }
        });
        // Initial check, just in the case the addresscheck ist set to "check" always.
        // In this case we still don't want to check the delivery-address if its equal to the invoice-address.
        var isShipAddressEqualToInvoiceAddress = E.$('#showShipAddress').prop('checked');
        if(isShipAddressEqualToInvoiceAddress === true)
        {
            E.addressCheckDelivery.setAddressCheckNeeded(false);
        }
    }

    //add classes to style dropdown of awesomeplete according to current theme
    E.$('.awesomplete .awesomplete-dropdown').addClass(E.Validation.dropdownClass);

    $(document).trigger('addressCheckReady');
});
