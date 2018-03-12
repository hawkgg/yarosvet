<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_google_map( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('gmapsensor');
  wp_enqueue_script('map');
  extract( shortcode_atts( array(
    'id'               => '',
    'class'            => '',
    'latitude'         => '38.934274',
    'longitude'        => '-78.198075',
    'string'           => '',
    'zoom_size'        => '10',
    'map_color_first'  => '#aadd55',
    'map_color_second' => '#7ab55c',
  ), $atts ) );

  $theme_skin = marketing_get_opt('theme-skin');

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  switch ($theme_skin) {
    case 'theme-orange':
      $map_color_first  = '#ef662f';
      $map_color_second = '#d15625';
      break;
    
    case 'theme-accent':
      $map_color_first  = marketing_get_opt('theme-skin-accent-first');
      $map_color_second = marketing_get_opt('theme-skin-accent-second');
      break;
  }

  $output = '<div '.$id.' class="tt-contact-map map-block'.$class.'" id="map-canvas" data-map-color-first="'.esc_attr($map_color_first).'" data-map-color-second="'.esc_attr($map_color_second).'"  data-lat="'.esc_attr($latitude).'" data-lng="'.esc_attr($longitude).'" data-zoom="'.esc_attr($zoom_size).'"></div>';
  $output .=  '<div class="addresses-block">';
  $output .=  '<a data-lat="'.esc_attr($latitude).'" data-lng="'.esc_attr($longitude).'" data-string="'.esc_attr($string).'"></a>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_google_map', 'rs_google_map');
