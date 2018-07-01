<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package marketing
 * @since 1.0
 */
/**
 * Theme options variable $rs_theme_options
 */
define ('REDUX_OPT_NAME', 'marketing_theme_options');

/**
 * Theme version used for styles,js
 */
define ('MARKETING_THEME_VERSION','1.0');
/**
 * Setting constant to inform the plugin that theme is activated
 */
define ('MARKETING_THEME_ACTIVATED' , true);


require get_template_directory() . '/framework/includes/rs-theme-argument-class.php';
require get_template_directory() . '/framework/includes/rs-actions-config.php';
require get_template_directory() . '/framework/includes/rs-helper-functions.php';
require get_template_directory() . '/framework/includes/rs-frontend-functions.php';
require get_template_directory() . '/framework/includes/rs-woocommerce-config.php';
require get_template_directory() . '/framework/includes/plugins/tgm/class-tgm-plugin-activation.php';
require get_template_directory() . '/framework/includes/rs-filters-config.php';
require get_template_directory() . '/framework/includes/rs-menu-walker-class.php';
require get_template_directory() . '/framework/admin/admin-init.php';

$username = marketing_get_opt( 'envato_username' );
$apikey   = marketing_get_opt( 'envato_apikey' );
if( ! empty( $username ) && ! empty( $apikey ) ):
  require get_template_directory() . '/framework/includes/theme-updater/theme-updater.php';
endif;

if( !function_exists('marketing_after_setup')) {

  function marketing_after_setup() {

    add_image_size('marketing-thumb',        40,   40,  true );
    add_image_size('marketing-small-alt',    165,  112, true );
    add_image_size('marketing-medium',       392,  230, true );
    add_image_size('marketing-medium-alt',   263,  305, true );
    add_image_size('marketing-medium-hor',   748,  210, true );
    add_image_size('marketing-big',          750,  365, true );
    add_theme_support('woocommerce');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-background' );
    add_theme_support('automatic-feed-links' );
    add_theme_support('post-formats',   array('video') );
    add_theme_support('title-tag' );

    register_nav_menus (array(
      'primary-menu' => esc_html__( 'Main Menu', 'marketing' ),
    ) );
  }
  add_action( 'after_setup_theme', 'marketing_after_setup' );
}

if ( ! isset( $content_width ) ) {
  $content_width = 1140;
}

?>
