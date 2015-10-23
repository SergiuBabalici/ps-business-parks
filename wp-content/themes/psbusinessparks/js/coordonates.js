jQuery(document).ready(function() {

    var latitude =  jQuery('.field_type-google_map .acf-google-map > div:first-child .input-lat');
    var longitude = jQuery('.field_type-google_map .acf-google-map > div:first-child .input-lng');
    var address =   jQuery('.field_type-google_map .acf-google-map .input-address');



    longitude.on('change', (function() {
        jQuery('#acf-latitude #acf-field-latitude').val(latitude.val());
    }));

    longitude.on('change', (function() {
        jQuery('#acf-longitude #acf-field-longitude').val(longitude.val());
    }));

    address.on('change', (function() {
        jQuery('#acf-address #acf-field-address').val(address.val());
    }));

});