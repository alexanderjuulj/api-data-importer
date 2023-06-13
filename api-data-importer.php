<?php
/*
 * Plugin Name:       API Data Importer
 * Description:       Fetch and store data as a post type from any API.
 * Version:           1.0.0
 * Author:            Alexander Juul Jakobsen
 * Author URI:        https://alexanderjuulj.com
 * License:           The MIT License
 * License URI:       https://opensource.org/license/mit/
 * Requires PHP:      7.1.0
 * Text Domain:       api-data-importer
*/

// Enqueue scripts and styles for the plugin 
function api_data_importer_enqueue_admin_scripts() { 
    wp_enqueue_script('api-data-script', plugins_url('public/js/ajax-import-btn.js', __FILE__ ), array(), '1.0.0', true);
    wp_localize_script('api-data-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));  
    // Styles
    //wp_enqueue_style( 'api_data_importer_style', plugin_dir_url( __FILE__ ) . 'public/scss/main.css', '1.0.0' );
}
add_action('admin_enqueue_scripts', 'api_data_importer_enqueue_admin_scripts');
// Set up custom post type
include plugin_dir_path(__FILE__) . '/inc/post-type.php';

// Include the template functions
include plugin_dir_path(__FILE__) . '/inc/template-function.php';

// Set up options page
include plugin_dir_path(__FILE__) . '/inc/options-page.php';

// Curl init (Where the magic happens)
include plugin_dir_path(__FILE__) . '/inc/curl-init.php';
