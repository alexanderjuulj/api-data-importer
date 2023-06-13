<?php 
// Register the custom post type for API Fetch and Stores
function api_data_importer_register_post_type() {
    register_post_type('api_data_importer',
        array(
            'labels' => array(
                'name'                  => __('API Data Import', 'api-data-importer'),
                'singular_name'         => __('API Data Import', 'api-data-importer'),
                'menu_name'             => _x( 'API Data Import', 'Admin Menu text', 'api-data-importer' ),
                'name_admin_bar'        => _x( 'API Data Import', 'Add New on Toolbar', 'api-data-importer' ),
                'add_new'               => __( 'Add New', 'api-data-importer' ),
                'add_new_item'          => __( 'Add New API Data Import', 'api-data-importer' ),
                'new_item'              => __( 'New API Data Import', 'api-data-importer' ),
                'edit_item'             => __( 'Edit API Data Import', 'api-data-importer' ),
                'view_item'             => __( 'View API Data Import', 'api-data-importer' ),
                'all_items'             => __( 'All API Data Imports', 'api-data-importer' ),
                'search_items'          => __( 'Search API Data Imports', 'api-data-importer' ),
                'parent_item_colon'     => __( 'Parent API Data Imports:', 'api-data-importer' ),
                'not_found'             => __( 'No API Data Imports found.', 'api-data-importer' ),
                'not_found_in_trash'    => __( 'No API Data Imports found in Trash.', 'api-data-importer' ),
                'featured_image'        => _x( 'Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'api-data-importer' ),
                'set_featured_image'    => _x( 'Set image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'api-data-importer' ),
                'remove_featured_image' => _x( 'Remove image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'api-data-importer' ),
                'use_featured_image'    => _x( 'Use as image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'api-data-importer' ),
                'archives'              => _x( 'API Data Import archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'api-data-importer' ),
                'insert_into_item'      => _x( 'Insert into API Data Import', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'api-data-importer' ),
                'uploaded_to_this_item' => _x( 'Uploaded to this API Data Import', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'api-data-importer' ),
                'filter_items_list'     => _x( 'Filter API Data Imports list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'api-data-importer' ),
                'items_list_navigation' => _x( 'API Data Imports list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'api-data-importer' ),
                'items_list'            => _x( 'API Data Imports list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'api-data-importer' ),
            ),
            'public'            => true,
            'has_archive'       => true,
    		'menu_position'     => 21,
            'menu_icon'         => 'dashicons-controls-repeat',
            'rewrite'           => array( 'slug' => 'api-data-import' ), // my custom slug
            'supports'          => array( 'title', 'editor', 'thumbnail' ),
        )
    );
}
add_action('init', 'api_data_importer_register_post_type');