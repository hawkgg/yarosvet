<?php
/**
 * Filter Hooks
 *
 * @package make
 * @since 1.0
 */

/**
 * Title Filter
 *
 * @package make
 * @since 1.0
 */
if (! function_exists('marketing_wp_title') ) {
  function marketing_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
      return $title;
    } // end if

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title = "$title $sep $site_description";
    } // end if

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
      $title = sprintf( __( 'Page %s', 'marketing' ), max( $paged, $page ) ) . " $sep $title";
    } // end if

    return $title;

  } // end rs_wp_title
  add_filter( 'wp_title', 'marketing_wp_title', 10, 2 );
}

/**
 * Allow xml file to upload
 *
 * @package adios
 * @since 1.0
 */
if(!function_exists('marketing_upload_xml')) {
  function marketing_upload_xml($mimes) {
    $mimes = array_merge($mimes, array('xml' => 'application/xml'));
    return $mimes;
  }
  add_filter('upload_mimes', 'marketing_upload_xml');
}

/**
 * Body Filter Hook
 *
 * @package make
 * @since 1.0
 */
if( !function_exists('marketing_body_class')) {
  function marketing_body_class($classes) {
    $classes[] = '';
    $classes[] = marketing_get_opt('header-template');
    $classes[] = (!class_exists('ReduxFramework')) || marketing_get_opt('main-layout') == 'default' ? 'default-layout':marketing_get_opt('main-layout');
    $classes[] = marketing_get_opt('theme-skin');
    $classes[] = marketing_get_opt('header-template');
    return $classes;
  }
  add_filter('body_class', 'marketing_body_class');
}

/**
 * Content Froce
 *
 * @package make
 * @since 1.0
 */
if(!function_exists('marketing_the_content_force')) {
  global $marketing_force_content;
  function marketing_the_content_force( $content ){

    global $marketing_force_content;

    if( is_singular() && ! empty( $marketing_force_content ) ) {
      $content = $marketing_force_content;
      $marketing_force_content = 0;
    }
    return $content;
  }
  add_filter('the_content', 'marketing_the_content_force' );
}

/**
 * SVG Filter
 *
 * @package make
 * @since 1.0
 */
if( ! function_exists( 'marketing_upload_mimes' ) ) {
  function marketing_upload_mimes( $mimes ) {
    $mimes['svg'] = 'font/svg';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'marketing_upload_mimes' );
}

/**
 * Allow demo name to be changed
 *
 * @package marketing
 * @since 1.0
 */
if(!function_exists('marketing_importer_filter_title')) {
  function marketing_importer_filter_title( $title ) {
    $title = esc_html__('Demo Content', 'marketing');
    return trim( ucfirst( str_replace( '-', ' ', $title ) ) );
  }
  add_filter( 'wbc_importer_directory_title', 'marketing_importer_filter_title', 10 );
}
