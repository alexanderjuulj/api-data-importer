<?php
function import_api_data() {
    // Inserting the API URL
    // Example is using https://randomuser.me/api/ to get information about a random fake user, including gender, name, email, address, etc.
    $api_url = 'https://randomuser.me/api/';

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

    // Get ready to loop through the results.
    $items = $data['results'];

    // Loop through the data and create custom post type entries
    foreach ($items as $item) {
        $name = $item['name']['first'] . ' ' . $item['name']['last'];
        $gender = $item['gender'];

        // Prepare post data
        $post_data = array(
            'post_title'    =>  $name,
            'post_content'  =>  $gender,
            'post_status'   =>  'publish', // Publish the post straight away
            'post_type'     =>  'api_data_importer', // Set to your custom post type
        );

        // Insert the post
        wp_insert_post($post_data);
    }

    // Send a success message
    echo 'Data imported successfully!';
    wp_die();
}
add_action('wp_ajax_import_api_data', 'import_api_data');