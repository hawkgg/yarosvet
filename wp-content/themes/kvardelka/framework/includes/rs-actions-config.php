<?php
/**
 * Action Hooks.
 *
 * @package marketing
 * @since 1.0
 */

/**
* @return null
* @param none
* register widgets
**/
if( !function_exists('marketing_register_sidebar') ) {

  function marketing_register_sidebar() {

    // register sidebars
    register_sidebar(array(
      'id'            => 'main',
      'name'          => esc_html__('Main Sidebar', 'marketing'),
      'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
      'after_widget'  => '</div><div class="empty-space marg-lg-b30"></div>',
      'before_title'  => '<h5 class="c-h4 widget-title">',
      'after_title'   => '</h5>',
      'description'   => 'Drag the widgets for sidebars.'
    ));

    for($i = 1; $i < 4; $i++) {
      register_sidebar(array(
        'id'            => 'footer-'.$i,
        'name'          => 'Footer Sidebar '.$i,
        'before_widget' => '<div id="%1$s" class="widget tt-footer-list footer_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="c-h5 color-3">',
        'after_title'   => '</h5><div class="empty-space marg-lg-b10"></div>',
        'before_desc'   => '<p>',
        'after_desc'    => '</p>',
        'description'   => 'Drag the widgets for sidebars.'
      ));
    }

    $custom_sidebars = marketing_get_opt('custom-sidebars');
    if (is_array($custom_sidebars)) {
      foreach ($custom_sidebars as $sidebar) {

        if (empty($sidebar)) {
          continue;
        }

        register_sidebar ( array (
          'name'          => $sidebar,
          'id'            => sanitize_title ( $sidebar ),
          'before_widget' => '<div id="%1$s" class="sidebar-item wow zoomIn widget %2$s" data-wow-delay="0.4s">',
          'after_widget'  => '</div><div class="empty-space marg-lg-b30"></div>',
          'before_title'  => '<h5 class="h5 widget-title">',
          'after_title'   => '</h5>',
        ) );
      }
    }
  }
  add_action( 'widgets_init', 'marketing_register_sidebar' );
}

/**
* @return null
* @param none
* showing style tags on footer
**/
if(!function_exists('marketing_enqueue_inline_styles')) {
  function marketing_enqueue_inline_styles() {
    $oArgs = ThemeArguments::getInstance('inline_style');
    $inline_styles = $oArgs -> get('inline_styles');
    if (is_array($inline_styles) && count($inline_styles) > 0) {
      echo '<style id="custom-shortcode-css" type="text/css">'. marketing_css_compress( htmlspecialchars_decode( wp_kses_data( join( '', $inline_styles ) ) ) ) .'</style>';
    }
    $oArgs -> reset();
  }
  add_action( 'wp_footer', 'marketing_enqueue_inline_styles' );
}
/**
 * Set up homepage and menu
 *
 * @package marketing
 * @since 1.0
 */
if(!function_exists('marketing_set_homepage_menu')) {
  function marketing_set_homepage_menu($demo_active_import, $demo_directory_path) {
    reset( $demo_active_import );
    $current_key = key( $demo_active_import );
    // set menu
    $wbc_menu_array = array( 'demo1');
    if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
      $top_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
      if ( isset( $top_menu->term_id ) ) {
        set_theme_mod( 'nav_menu_locations', array('primary-menu' => $top_menu->term_id));
      }
    }

    // set homepage
    $wbc_home_pages = array('demo1' => 'Home Marketer');
    if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
      $page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
      if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
      }
    }
  }
  add_action( 'wbc_importer_after_content_import', 'marketing_set_homepage_menu', 10, 2 );
}

/**
 * Inactive default widgets after import
 *
 * @package marketing
 * @since 1.0
 */
if ( !function_exists( 'marketing_after_content_import' ) ) {
  function marketing_after_content_import( $demo_active_import , $demo_data_directory_path ) {
    $inactive = array();
    $sidebars = wp_get_sidebars_widgets();

    if( isset( $sidebars['wp_inactive_widgets'] ) ) {
      $inactive = $sidebars['wp_inactive_widgets'];
      unset( $sidebars['wp_inactive_widgets'] );
    }

    foreach ( $sidebars as $sidebar => $widgets ) {
      if(is_array($widgets)):
        $inactive = array_merge( $inactive, $widgets );
      endif;
      $sidebars[$sidebar] = array();
    }

    $sidebars['wp_inactive_widgets'] = $inactive;

    wp_set_sidebars_widgets( $sidebars );
  }

  add_action( 'wbc_importer_after_content_import', 'marketing_after_content_import', 10, 2 );
}

/**
* @return null
* @param none
* loads all the js and css script to frontend
**/
if( !function_exists('marketing_enqueue_scripts')) {

  function marketing_enqueue_scripts() {

    if(( is_admin())) { return; }

    if (is_singular()) { wp_enqueue_script( 'comment-reply' ); }

    wp_enqueue_script('marketing-global',       get_template_directory_uri() .'/js/global.js',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_enqueue_script('form-stone',             get_template_directory_uri() .'/js/jquery.formstone.min.js',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_register_script('bootstrap',             get_template_directory_uri() .'/js/bootstrap.min.js',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_register_script('swiper',                get_template_directory_uri() .'/js/swiper.min.js',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_enqueue_script('isotope',                get_template_directory_uri() .'/js/isotope.pkgd.min.js',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_enqueue_script('ytplayer',               get_template_directory_uri() .'/js/YT.player.js',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_register_script('gmapsensor',            'http://maps.google.com/maps/api/js?key=AIzaSyDjttDw_zlwsJl27N8shtKX_I2DLydSZSo',array('jquery'), MARKETING_THEME_VERSION,true);
    wp_register_script('map',                   get_template_directory_uri() .'/js/map.js',array('gmapsensor'), MARKETING_THEME_VERSION,true);
    //Custom
    wp_register_script('maskedinput',           get_template_directory_uri() .'/js/jquery.maskedinput.min.js',array('jquery'), MARKETING_THEME_VERSION,true);
    
    wp_localize_script('map', 'get',
      array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'siteurl' => get_template_directory_uri()
      )
    );

    wp_enqueue_style('marketing-fonts',         marketing_fonts_url(), null, MARKETING_THEME_VERSION );
    wp_register_style('swiper',                 get_template_directory_uri(). '/css/swiper.min.css',null, MARKETING_THEME_VERSION);
    // landing
    wp_register_style('landing',                get_template_directory_uri(). '/css/landing.css',null, MARKETING_THEME_VERSION);
    wp_enqueue_style('ytplayer-css',            get_template_directory_uri(). '/css/YTPlayer.css',null, MARKETING_THEME_VERSION);
    wp_enqueue_style('bootstrap',               get_template_directory_uri(). '/css/bootstrap.min.css',null, MARKETING_THEME_VERSION);
    wp_enqueue_style('fontawesome',             get_template_directory_uri(). '/css/font-awesome.min.css',null, MARKETING_THEME_VERSION);
    wp_enqueue_style('font-icon',               get_template_directory_uri(). '/css/icon-font.min.css',null, MARKETING_THEME_VERSION);
    //if(function_exists('is_woocoomerce')):
      wp_enqueue_style('woocommerce',           get_template_directory_uri(). '/css/woocommerce.css',null, MARKETING_THEME_VERSION);
    //endif;
    wp_enqueue_style('marketing-main-style',    get_template_directory_uri(). '/css/style.css',null, MARKETING_THEME_VERSION);
    wp_enqueue_style('custom-styles',    get_template_directory_uri(). '/css/custom.css',null, MARKETING_THEME_VERSION);

    $pages = array();
  
    if (marketing_get_post_opt('page-show-special-content-after-content')) {
      $pages[] = marketing_get_post_opt('page-after-special-content');
    }
  
    if (is_array($pages) && count($pages) > 0) {
      foreach ($pages as $page) {        
        if (empty($page)) { continue; }
        $shortcodes_custom_css = get_post_meta( $page, '_wpb_shortcodes_custom_css', true );
        if(!empty($shortcodes_custom_css)) {
          wp_add_inline_style( 'marketing-main-style', $shortcodes_custom_css );
        }
      }
    }

    $css_code    = marketing_get_opt('css_editor');
    $accent_code = marketing_accent_css();
    //$inline_css  = marketing_inline_css();
    $style       = '';
    $style       .= ( !empty($css_code) || !empty($accent_code)|| !empty($inline_css)) ? $css_code.$accent_code:'';

    wp_add_inline_style('marketing-main-style', $style);
  }
  add_action( 'wp_enqueue_scripts', 'marketing_enqueue_scripts' );
}

if(! function_exists('marketing_include_required_plugins')) {

  function marketing_include_required_plugins() {

    $plugins = array(

      array(
        'name'     => 'Redux Framework',
        'slug'     => 'redux-framework',
        'required' => true,
      ),

      array(
        'name'               => esc_html__('Contact Form 7', 'marketing'), // The plugin name
        'slug'               => 'contact-form-7', // The plugin slug (typically the folder name)
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),

      array(
        'name'               => esc_html__('Newsletter', 'marketing'), // The plugin name
        'slug'               => 'newsletter', // The plugin slug (typically the folder name)
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),

      array(
        'name'               => esc_html__('Woocommerce', 'marketing'), // The plugin name
        'slug'               => 'woocommerce', // The plugin slug (typically the folder name)
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),

      array(
        'name'               => esc_html__('Convert Plug', 'marketing'), // The plugin name
        'slug'               => 'convertplug', // The plugin slug (typically the folder name)
        'source'             => get_template_directory_uri().'/plugins/convertplug.zip', // The plugin source
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),

      array(
        'name'               => esc_html__('Yellow Pencil', 'marketing'), // The plugin name
        'slug'               => 'waspthemes-yellow-pencil', // The plugin slug (typically the folder name)
        'source'             => get_template_directory_uri().'/plugins/yellow_pencil.zip', // The plugin source
        'required'           => false, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),

      array(
        'name'               => esc_html__('Marketing Demo Importer', 'marketing'), // The plugin name
        'slug'               => 'marketing-demo-importer', // The plugin slug (typically the folder name)
        'source'             => get_template_directory_uri().'/plugins/marketing-demo-import.zip', // The plugin source
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Visual Composer', 'marketing'), // The plugin name
        'slug'               => 'js_composer', // The plugin slug (typically the folder name)
        'source'             =>  get_template_directory_uri().'/plugins/js_composer.zip', // The plugin source
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
      array(
        'name'               => esc_html__('Marketing Addons', 'marketing'), // The plugin name
        'slug'               => 'marketing-addons', // The plugin slug (typically the folder name)
        'source'             =>  get_template_directory_uri().'/plugins/marketing-addons.zip', // The plugin source
        'required'           => true, // If false, the plugin is only 'recommended' instead of required
        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
        'external_url'       => '', // If set, overrides default API URL and points to an external URL
      ),
    );

    $config = array(
      'id'           => 'marketing',              // Unique ID for hashing notices for multiple instances of TGMPA.
      'default_path' => '',                      // Default absolute path to bundled plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'parent_slug'  => 'themes.php',            // Parent menu slug.
      'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );

  }
  add_action( 'tgmpa_register', 'marketing_include_required_plugins' );
}

