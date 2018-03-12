<?php
/**
 * Backend Theme Functions.
 *
 * @package make
 * @subpackage Template
 */

/**
 *
 * Hex to Rgba
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'marketing_hex2rgba' ) ) {
  function marketing_hex2rgba( $hexcolor, $opacity = 1 ) {

    $hex    = str_replace( '#', '', $hexcolor );

    if( strlen( $hex ) == 3 ) {
      $r    = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
      $g    = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
      $b    = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
    } else {
      $r    = hexdec( substr( $hex, 0, 2 ) );
      $g    = hexdec( substr( $hex, 2, 2 ) );
      $b    = hexdec( substr( $hex, 4, 2 ) );
    }

    return ( isset( $opacity ) && $opacity != 1 ) ? 'rgba('. $r .', '. $g .', '. $b .', '. $opacity .')' : ' ' . $hexcolor;
  }
}

/**
 * Get theme option value
 * @param string $option
 * @return mix|boolean
 */
if(!function_exists('marketing_get_opt')) {
  function marketing_get_opt($option) {
    global $marketing_theme_options;

    $local = false;

    //get local from main shop page
    if (class_exists( 'WooCommerce' ) && (is_shop() || is_product_category() || is_product_tag())) {

      $shop_page = woocommerce_get_page_id( 'shop' );

      if (!empty($shop_page)) {
        $value = marketing_get_post_opt( $option.'-local', (int)$shop_page);
        $local = true;
      }

    //get local from metaboxes for the post value and override if not empty
    } else if (is_singular()) {
      $value = marketing_get_post_opt( $option.'-local' );
      //print_r($value);
      $local = true;
    }

    //return local value if exists
    if ($local === true) {
      //if $value is an array we need to check if first element is not empty before we return $value
      $first_element = null;
      if (is_array($value)) {
        $first_element = reset($value);
      }
      if (is_string($value) && (strlen($value) > 0 || !empty($value)) || is_array($value) && !empty($first_element)) {
        return $value;
      }
    }

    if (isset($marketing_theme_options[$option])) {
      return $marketing_theme_options[$option];
    }
    return false;
  }
}

/**
 * Get next page URL
 * @param int $max_num_pages
 * @return string/boolean
 */
if(!function_exists('marketing_next_page_url')) {
  function marketing_next_page_url($max_num_pages = 0) {

    if ($max_num_pages === false) {
      global $wp_query;
      $max_num_pages = $wp_query->max_num_pages;
    }

    if ($max_num_pages > max(1, get_query_var('paged'))) {

      return get_pagenum_link(max(1, get_query_var('paged')) + 1);
    }
    return false;
  }
}

/**
 * Get single post option value
 * @param unknown $option
 * @param string $id
 * @return NULL|mixed
 */
if(!function_exists('marketing_get_post_opt')) {
  function marketing_get_post_opt( $option, $id = '' ) {

    global $post;

    if (!empty($id)) {
      $local_id = $id;
    } else {
      if(!isset($post->ID)) {
        return null;
      }
      $local_id = get_the_ID();

    }

    if(function_exists('redux_post_meta')) {
      $options = redux_post_meta(REDUX_OPT_NAME, $local_id);
    } else {
      $options = get_post_meta( $local_id, REDUX_OPT_NAME, true );
    }

    if( isset( $options[$option] ) ) {
      return $options[$option];
    } else {
      return null;
    }
  }
}

/**
 * Adding inline styles
 * @param string $style
 * @return void
 *
 * Usage:
 * marketing_add_inline_style(".className { color: #FF0000; }")
 */
if(!function_exists('marketing_add_inline_style')) {
  function marketing_add_inline_style( $style ) {

    $oArgs = ThemeArguments::getInstance('inline_style');
    $inline_styles = $oArgs -> get('inline_styles');
    if (!is_array($inline_styles)) {
      $inline_styles = array();
    }
    array_push( $inline_styles, $style );
    $oArgs -> set('inline_styles', $inline_styles);
  }  
}

/**
 * Inline styles
 * @param type $css
 * @return type
 */
if(!function_exists('marketing_css_compress')) {
  function marketing_css_compress($css) {
    $css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css = str_replace( ': ', ':', $css );
    $css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/**
 * Get custom sidebars list
 * @return array
 */
if(!function_exists('marketing_get_custom_sidebar')) {
  function marketing_get_custom_sidebars_list($add_default = true) {

    $sidebars = array();
    if ($add_default) {
      $sidebars['default'] = esc_html__('Default', 'marketing');
    }

    $options = get_option('marketing_theme_options');

    if (!isset($options['custom-sidebars']) || !is_array($options['custom-sidebars'])) {
      return $sidebars;
    }

    if (is_array($options['custom-sidebars'])) {
      foreach ($options['custom-sidebars'] as $sidebar) {
        $sidebars[sanitize_title ( $sidebar )] = $sidebar;
      }
    }

    return $sidebars;
  }
}

/**
 * Get custom sidebar, returns $default if custom sidebar is not defined
 * @param string $default
 * @param string $sidebar_option_field
 * @return string
 */
if( !function_exists('marketing_get_custom_sidebar')) {
  function marketing_get_custom_sidebar($default = '', $sidebar_option_field = 'sidebar') {

    $sidebar = marketing_get_opt($sidebar_option_field);

    if ($sidebar != 'default' && !empty($sidebar)) {
      return $sidebar;
    }
    return $default;
  }
}

/**
 *
 * Blog Excerpt Read More
 * @since 1.7.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'marketing_auto_post_excerpt' ) ) {
  function marketing_auto_post_excerpt( $limit = '' ) {
    $limit   = ( empty($limit)) ? 20:$limit;
    $content = get_the_excerpt();
    $content = strip_shortcodes( $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    $content = strip_tags( $content );
    $words   = explode( ' ', $content, $limit + 1 );

    if( count( $words ) > $limit ) {

      array_pop( $words );
      $content  = implode( ' ', $words );
      //$content .= ' &hellip;';

    }

    return $content;

  }
}

/**
*
* @return none
* @param  class
* multiple class sanitization
*
**/
if ( ! function_exists( 'marketing_sanitize_html_classes' ) && function_exists( 'sanitize_html_class' ) ) {
  function marketing_sanitize_html_classes( $class, $fallback = null ) {

    // Explode it, if it's a string
    if ( is_string( $class ) ) {
      $class = explode(" ", $class);
    }

    if ( is_array( $class ) && count( $class ) > 0 ) {
      $class = array_map("sanitize_html_class", $class);
      return implode(" ", $class);
    }
    else {
      return sanitize_html_class( $class, $fallback );
    }
  }
}

/**
 *
 * element values post, page, categories
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'marketing_element_values_page' ) ) {
  function marketing_element_values_page(  $type = '', $query_args = array() ) {

    $options = array();

    switch( $type ) {

      case 'pages':
      case 'page':
      $pages = get_pages( $query_args );

      if ( !empty($pages) ) {
        foreach ( $pages as $page ) {
          $options[$page->post_title] = $page->ID;
        }
      }
      break;

      case 'posts':
      case 'post':
      $posts = get_posts( $query_args );

      if ( !empty($posts) ) {
        foreach ( $posts as $post ) {
          $options[$post->post_title] = lcfirst($post->post_title);
        }
      }
      break;

      case 'tags':
      case 'tag':

      $tags = get_terms( $query_args['taxonomies'], $query_args['args'] );
        if ( !empty($tags) ) {
          foreach ( $tags as $tag ) {
            $options[$tag->term_id] = $tag->name;
        }
      }
      break;

      case 'categories':
      case 'category':

      $categories = get_categories( $query_args );
      if ( !empty($categories) ) {
        foreach ( $categories as $category ) {
          $options[$category->term_id] = $category->name;
        }
      }
      break;

      case 'custom':
      case 'callback':

      if( is_callable( $query_args['function'] ) ) {
        $options = call_user_func( $query_args['function'], $query_args['args'] );
      }

      break;

    }

    return $options;

  }
}

/**
 * Select marketing footer style
 * @since marketing 1.0
 */
if(!function_exists('marketing_header_template')) {
  function marketing_header_template($layout) {
    if(class_exists('ReduxFramework') && !marketing_get_opt('header-enable-switch')) { return; }
    switch ($layout) {
      case 'transparent':
        get_template_part('templates/header/transparent');
        break;
      case 'centered-logo-bottom-menu':
        get_template_part('templates/header/centered-logo-bottom-menu');
        break;
      case 'menu-left-with-social-right':
        get_template_part('templates/header/menu-left-with-social-right');
        break;
      case 'menu-right-with-contact-details':
        get_template_part('templates/header/menu-right-with-contact-details');
        break;
      case 'menu-right-with-social':
        get_template_part('templates/header/menu-right-with-social');
        break;
      case 'default':
      default:
        get_template_part('templates/header/default');
        break;
    }
  }
}

/**
 * Get associative terms array
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('marketing_get_terms_assoc')) {
  function marketing_get_terms_assoc($terms) {
    $terms = get_terms( $terms , array('fields' => 'all' ) );

    if (is_array($terms) && !is_wp_error($terms)) {
      $terms_assoc = array();

      foreach ($terms as $term) {
        $terms_assoc[$term -> term_id] = $term -> name;
      }
      return $terms_assoc;
    }
    return false;
  }
}


/**
 * Get associative special content array
 * 
 * @param type $terms
 * @return boolean
 */
if(!function_exists('marketing_get_special_content_array')) {
  function marketing_get_special_content_array() {
    
    $args = array(
      'posts_per_page' => -1,
      'offset'         => 0,
      'orderby'        => 'title',
      'order'          => 'ASC',
      'post_type'      => 'special-content',
      'post_status'    => 'publish'
    );
    
    $custom_query = new WP_Query($args);
    
    $special_content = array();
    
    if ( $custom_query->have_posts() ) {
      
      while ( $custom_query -> have_posts() ) {
        $custom_query -> the_post(); 
        $special_content[get_the_ID()] = get_the_title();
      }
      wp_reset_postdata();
    }
    
    return $special_content;
  }
}

/**
 * Displays special content set as after content page on page options>content
 * @return void
 */
if(!function_exists('marketing_after_content_special_content')) {
  function marketing_after_content_special_content() {
    
    if (!marketing_get_post_opt('page-show-special-content-after-content')) {return;}
    
    $page = marketing_get_post_opt('page-after-special-content');
    marketing_echo_page_content($page);
  }
}

/**
 * Echo page content
 * @param int $page
 * @return void
 */
if(!function_exists('marketing_echo_page_content')) {
  function marketing_echo_page_content($page) {

    if (!intval($page)) {return;}
    
    $args = array(
      'posts_per_page' => 1,
      'page_id'        => $page,
      'post_type'      => 'special-content',
      'post_status'    => 'publish'
    );
    $query = new WP_Query($args);
    
    if ($query -> have_posts()):
      while ($query -> have_posts()) : $query -> the_post();
        the_content();
      endwhile; 
      wp_reset_postdata();
    endif;
  }
}

/**
 * Load Google Font
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('marketing_fonts_url')) {
  function marketing_fonts_url() {
    $fonts_url = '';

    $roboto = _x( 'on', 'Roboto font: on or off', 'marketing' );

    if ( 'off' !== $roboto ) {
      $font_families = array();

      if ( 'off' !== $roboto ) {
        $font_families[] = 'Roboto:400,700,300';
      }

      $query_args = array('family' => urlencode( implode( '|', $font_families ) ), 'subset' => urlencode( 'latin,latin-ext' ));
      $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
  }
}

/**
 * Load Google Font
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('marketing_header_height')) {
  function marketing_header_height($value) {
    $class = (!$value && class_exists('ReduxFramework')) ? 'visible-xs-block visible-sm-block':'';
    echo '<div class="tt-header-margin '.marketing_sanitize_html_classes($class).'"></div>';
  }
}
