$ = jQuery;

jQuery(document).ready(function(jQuery) {
    jQuery('#import-api-data').on('click', function() {
        jQuery.ajax({
            url: my_ajax_object.ajax_url,
            data: {
                action: 'import_api_data'
            },
            success: function(response) {
                alert(response);
            },
            error: function() {
                alert('Error while importing data from API.');
            }
        });
    });
});