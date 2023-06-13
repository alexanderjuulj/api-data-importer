<?php
function import_api_data() {


    // Get the API variable from the AJAX request
    $api_input_value = isset($_POST['api_variable']) ? sanitize_text_field($_POST['api_variable']) : '';

    // Inserting the API URL
    // Example is using https://restcountries.com/ to get information about a country
    $api_url = 'https://restcountries.com/v3.1/name/' . urlencode($api_input_value);

    // Fetch data from the API using cURL
    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        //'Authorization: Bearer YOUR_ACCESS_TOKEN' // Replace with your actual access token if needed
    ));

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        die("Error while connecting to API: $error");
    }

    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Loop through the data and create custom post type entries
    foreach ($data as $item) {
        // Post variables
        $type   =   'api_data_importer'; // custom post type
        $status =   'publish'; // draft or publish

        // Set values
        $name = $item['name']['common'];

        $content = 'The official name is ' . $item['flag'] . ' ' . $item['name']['official'] . '. The capital is ' . $item['capital'][0] . '. ' . $item['flags']['alt'] . ' The country belongs to ' . $item['subregion'];

        // Prepare post data
        $post_data = array(
            'post_title'    =>  $name,
            'post_content'  =>  $content,
            'post_status'   =>  $status, // Publish the post straight away
            'post_type'     =>  $type, // Set to your custom post type
        );

        // Check if a post exists with the same name
        if (post_exists($name, '', '', $type, $status)) {
            // Get the ID of the post if it already exists
            $pid = post_exists($name, '', '', $type, $status);

            // Override current post
            $post_update = array(
                'ID' => $pid,
                'post_content' => $content,
            );

            // Update the post with new content
            wp_update_post( $post_update );

            // Send a success message
            echo 'Post already exists. Data updated successfully!';
        } else {
            // Create a new post
            wp_insert_post($post_data);
            // Send a success message
            echo 'Data imported successfully!';
        }
    }

    wp_die();
}
add_action('wp_ajax_import_api_data', 'import_api_data');