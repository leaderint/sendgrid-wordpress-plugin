<?php
/**
 * Plugin Name: SG Widget 
 * Description: Insert Sendgrid Subscription Widgets on your pages with a shortcode 
 * Version: 1.0
 * Author: SGWidget.com
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

    // Retrieve the API token from the database
    $api_token = get_option('sg_widget_api_token', '');

    // Construct the API URL with the token
    $api_url = "https://app.sgwidget.com/api/widget/{$id}?api_token={$api_token}";

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

// Add a menu item for the plugin settings page
add_action('admin_menu', 'sg_widget_add_admin_menu');

function sg_widget_add_admin_menu() {
    add_options_page(
        'SG Widget Settings',
        'SG Widget',
        'manage_options',
        'sg-widget',
        'sg_widget_options_page'
    );
}

function sg_widget_options_page() {
    ?>
    <div class="wrap">
        <h1>SG Widget Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('sg_widget_options');
            do_settings_sections('sg-widget');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register the settings
add_action('admin_init', 'sg_widget_settings_init');

function sg_widget_settings_init() {
    register_setting('sg_widget_options', 'sg_widget_api_token');

    add_settings_section(
        'sg_widget_section',
        __('API Settings', 'sg_widget'),
        null,
        'sg-widget'
    );

    add_settings_field(
        'sg_widget_api_token',
        __('API Token', 'sg_widget'),
        'sg_widget_api_token_render',
        'sg-widget',
        'sg_widget_section'
    );
}

function sg_widget_api_token_render() {
    $api_token = get_option('sg_widget_api_token', '');
    ?>
    <input type='text' name='sg_widget_api_token' value='<?php echo esc_attr($api_token); ?>' style='width: 100%;'>
    <p class="description">
        <?php _e('Enter your API token from SG Widget above.', 'sg_widget'); ?>
        <?php _e('It can be copied from your SG Widget settings by clicking', 'sg_widget'); ?>
        <a href="https://app.sgwidget.com/settings#/security" target="_blank"><?php _e('here', 'sg_widget'); ?></a>.
    </p>
    <?php
}

// Add a settings link on the plugins page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'sg_widget_add_action_links');

function sg_widget_add_action_links($links) {
    $settings_link = '<a href="options-general.php?page=sg-widget">' . __('Settings', 'sg_widget') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}