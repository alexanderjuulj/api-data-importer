<?php 
// Options submenu page
function api_data_importer_options_page() {
    add_submenu_page(
        'edit.php?post_type=api_data_importer', // slug name for the parent menu 
        __( 'Data Importer', 'api-data-importer' ), // Title tags of the page when the menu is selected
        __( 'Data Importer', 'api-data-importer' ), // Menu title.    
        'manage_options', // Capability required for this menu to be displayed to the user
        'data-importer', // Unique slug name to refer to this menu by
        'api_data_importer_callback', // The function to be called to output the content for this page
        20 // Position in the menu order this item should appear
    );
}
add_action('admin_menu', 'api_data_importer_options_page');

// Callback function
function api_data_importer_callback() {
    // Check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>
            <?php echo esc_html(get_admin_page_title()); ?>
        </h1>
        <button id="import-api-data" class="button button-primary">
            <?php _e('Import Data from API', 'api-data-importer');?>
        </button>
    </div>
    <?php
}