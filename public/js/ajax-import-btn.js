$ = jQuery;

jQuery(document).ready(function(jQuery) {
    // Set ID from form and what to do on submission
    jQuery('#api-importer-form').on('submit', function(e) {
        e.preventDefault();

        // Set variable for the input field in your form
        var apiVariable = jQuery('#api-variable').val();

        jQuery.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'import_api_data',
                // Include the variable from the form
                api_variable: apiVariable
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
