<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Callback for the dynamic JavaScript
 */
function spacexchimp_p008_load_scripts_dynamic_js( $options, $prefix ) {

    // Get settings and put them in variables
    $scroll_duration = !empty( $options['scroll_duration'] ) ? $options['scroll_duration'] : '300';

    // Create an array (JS object) with all the settings
    $script_params = array(
                           'scroll_duration' => $scroll_duration,
                           );

    // Inject the array into the JavaScript file
    wp_localize_script( $prefix . '-frontend-js', $prefix . '_scriptParams', $script_params );
}

/**
 * Callback for the dynamic CSS
 */
function spacexchimp_p008_load_scripts_dynamic_css( $options, $prefix ) {

    // Get settings and put them in variables
    $backgroun_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#000';
    $symbol_color = !empty( $options['symbol-color'] ) ? $options['symbol-color'] : '#fff';
    $size_button = !empty( $options['size_button'] ) ? $options['size_button'] : '32';

    // Create an array with all the settings (CSS code)
    $custom_css = "
                    #ssttbutton {
                        font-size: " . $size_button . "px;
                    }
                    .ssttbutton-background {
                        color: " . $backgroun_color . ";
                    }
                    .ssttbutton-symbol {
                        color: " . $symbol_color . ";
                    }
                  ";

    // Inject the array into the stylesheet
    wp_add_inline_style( $prefix . '-frontend-css', $custom_css );
}

/**
 * Load scripts and style sheet for settings page
 */
function spacexchimp_p008_load_scripts_admin( $hook ) {

    // Put value of constants to variables for easier access
    $slug = SPACEXCHIMP_P008_SLUG;
    $prefix = SPACEXCHIMP_P008_PREFIX;
    $url = SPACEXCHIMP_P008_URL;
    $settings = SPACEXCHIMP_P008_SETTINGS;
    $version = SPACEXCHIMP_P008_VERSION;

    // Return if the page is not a settings page of this plugin
    $settings_page = 'settings_page_' . $slug;
    if ( $settings_page != $hook ) return;

    // Read options from database
    $options = get_option( $settings . '_settings' );

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Load WordPress Color Picker library
    wp_enqueue_style( 'wp-color-picker' );

    // Bootstrap library
    wp_enqueue_style( $prefix . '-bootstrap-css', $url . 'inc/lib/bootstrap/bootstrap.css', array(), $version, 'all' );
    wp_enqueue_style( $prefix . '-bootstrap-theme-css', $url . 'inc/lib/bootstrap/bootstrap-theme.css', array(), $version, 'all' );
    wp_enqueue_script( $prefix . '-bootstrap-js', $url . 'inc/lib/bootstrap/bootstrap.js', array(), $version, false );

    // Font Awesome library
    wp_enqueue_style( $prefix . '-font-awesome-css', $url . 'inc/lib/font-awesome/css/font-awesome.css', array(), $version, 'screen' );

    // Other libraries
    wp_enqueue_script( $prefix . '-bootstrap-checkbox-js', $url . 'inc/lib/bootstrap-checkbox.js', array(), $version, false );

    // Style sheet
    wp_enqueue_style( $prefix . '-admin-css', $url . 'inc/css/admin.css', array(), $version, 'all' );
    wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css', array(), $version, 'all' );

    // JavaScript
    wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array('wp-color-picker'), $version, true );
    wp_enqueue_script( $prefix . '-frontend-js', $url . 'inc/js/frontend.js', array('jquery'), $version, true );

    // Call the function that contains the dynamic JavaScript
    spacexchimp_p008_load_scripts_dynamic_js( $options, $prefix );

    // Call the function that contains the dynamic CSS
    spacexchimp_p008_load_scripts_dynamic_css( $options, $prefix );

}
add_action( 'admin_enqueue_scripts', 'spacexchimp_p008_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end of website
 */
function spacexchimp_p008_load_scripts_frontend() {

    // Put value of constants to variables for easier access
    $prefix = SPACEXCHIMP_P008_PREFIX;
    $url = SPACEXCHIMP_P008_URL;
    $settings = SPACEXCHIMP_P008_SETTINGS;
    $version = SPACEXCHIMP_P008_VERSION;

    // Read options from database and declare variables
    $options = get_option( $settings . '_settings' );
    $display_on = !empty( $options['display-button'] ) ? $options['display-button'] : '';

    // Return if the button is disabled
    if ( empty( $options['enable_button'] ) ) return;

    // If enabled on current page
    if ( $display_on == '' OR $display_on == 'Home Page Only' AND is_home() OR $display_on == 'Home Page Only' AND is_front_page() ) {

        // Load jQuery library
        wp_enqueue_script( 'jquery' );

        // Font Awesome library
        wp_enqueue_style( $prefix . '-font-awesome-css-frontend', $url . 'inc/lib/font-awesome/css/font-awesome.css', array(), $version, 'screen' );

        // Style sheet
        wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css', array(), $version, 'all' );

        // JavaScript
        wp_enqueue_script( $prefix . '-frontend-js', $url . 'inc/js/frontend.js', array('jquery'), $version, true );

        // Call the function that contains the dynamic JavaScript
        spacexchimp_p008_load_scripts_dynamic_js( $options, $prefix );

        // Call the function that contains the dynamic CSS
        spacexchimp_p008_load_scripts_dynamic_css( $options, $prefix );

    }

}
add_action( 'wp_enqueue_scripts', 'spacexchimp_p008_load_scripts_frontend' );
