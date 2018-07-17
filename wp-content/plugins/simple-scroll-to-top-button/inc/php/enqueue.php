<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Base for the _load_scripts hook
 */
function spacexchimp_p008_load_scripts_base( $options ) {

    // Put value of constants to variables for easier access
    $prefix = SPACEXCHIMP_P008_PREFIX;
    $url = SPACEXCHIMP_P008_URL;
    $version = SPACEXCHIMP_P008_VERSION;

    // Load jQuery library
    wp_enqueue_script( 'jquery' );

    // Style sheet
    wp_enqueue_style( $prefix . '-frontend-css', $url . 'inc/css/frontend.css', array(), $version, 'all' );

    // JavaScript
    wp_enqueue_script( $prefix . '-frontend-js', $url . 'inc/js/frontend.js', array('jquery'), $version, true );

    // Dynamic CSS. Create CSS and injected it into the stylesheet
    $backgroun_color = !empty( $options['background-color'] ) ? $options['background-color'] : '#000';
    $symbol_color = !empty( $options['symbol-color'] ) ? $options['symbol-color'] : '#fff';
    $size_button = !empty( $options['size_button'] ) ? $options['size_button'] : '32';
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
    wp_add_inline_style( $prefix . '-frontend-css', $custom_css );

    // Dynamic JS. Create JS object and injected it into the JS file
    $scroll_duration = !empty( $options['scroll_duration'] ) ? $options['scroll_duration'] : '300';
    $script_params = array(
                           'scroll_duration' => $scroll_duration,
                           );
    wp_localize_script( $prefix . '-frontend-js', $prefix . '_scriptParams', $script_params );

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

    // JavaScript
    wp_enqueue_script( $prefix . '-admin-js', $url . 'inc/js/admin.js', array('wp-color-picker'), $version, true );

    // Call the function that contain a basis of scripts
    spacexchimp_p008_load_scripts_base( $options );

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

        // Call the function that contain a basis of scripts
        spacexchimp_p008_load_scripts_base( $options );

        // Font Awesome library
        wp_enqueue_style( $prefix . '-font-awesome-css-frontend', $url . 'inc/lib/font-awesome/css/font-awesome.css', array(), $version, 'screen' );

    }

}
add_action( 'wp_enqueue_scripts', 'spacexchimp_p008_load_scripts_frontend' );
