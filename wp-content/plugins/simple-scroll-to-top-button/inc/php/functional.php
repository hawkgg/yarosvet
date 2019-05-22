<?php

/**
 * Prevent Direct Access
 */
defined( 'ABSPATH' ) or die( "Restricted access!" );

/**
 * Add DIV container with button to footer.
 */
function spacexchimp_p008_add_container() {

    // Put value of plugin constants into an array for easier access
    $plugin = spacexchimp_p008_plugin();

    // Retrieve options from database
    $options = get_option( $plugin['settings'] . '_settings' );

    // Declare variables
    $display_on = !empty( $options['display-button'] ) ? $options['display-button'] : '';
    $transparency = (!empty( $options['transparency_button'] ) AND $options['transparency_button'] == 'on') ? 'ssttbutton-transparent' : '' ;
    $background_button = !empty( $options['background_button'] ) ? $options['background_button'] : 'fa-circle';
    $image_button = !empty( $options['image_button'] ) ? $options['image_button'] : 'fa-hand-o-up';

    // If enabled on current page
    if ( $display_on == '' OR $display_on == 'Home Page Only' AND is_home() OR $display_on == 'Home Page Only' AND is_front_page() ) {
        ?>
            <a id="ssttbutton" href="#top" class="<?php echo $transparency; ?>">
                <span class="fa-stack fa-lg">
                    <i class="ssttbutton-background fa <?php echo $background_button; ?> fa-stack-2x"></i>
                    <i class="ssttbutton-symbol fa <?php echo $image_button; ?> fa-stack-1x"></i>
                </span>
            </a>
        <?php
    }
}
add_action( 'wp_footer', 'spacexchimp_p008_add_container', 999 );
