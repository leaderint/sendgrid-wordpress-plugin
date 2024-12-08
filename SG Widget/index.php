<?php
/**
 * Plugin Name: SG Widget 
 * Description: A plugin to detect and process the [[sg_widget]] shortcode.
 * Version: 1.0
 * Author: Your Name
 */

function sg_widget_shortcode($atts) {
    // Extract the ID attribute from the shortcode
    $atts = shortcode_atts(array(
        'id' => '',
    ), $atts, 'sg_widget');

    $id = $atts['id'];

    if (empty($id)) {
        return '<p>Error: No ID provided for sg_widget shortcode.</p>';
    }

    // Construct the API URL
    $api_url = "https://app.sgwidget.com/api/widget/{$id}";

    // Make the GET request
    $response = wp_remote_get($api_url);

    // Check for errors
    if (is_wp_error($response)) {
        return '<p>Error: Unable to retrieve widget data.</p>';
    }

    // Get the response body
    $body = wp_remote_retrieve_body($response);

    // Return the HTML content
    return $body;
}

// Register the shortcode
add_shortcode('sg_widget', 'sg_widget_shortcode');