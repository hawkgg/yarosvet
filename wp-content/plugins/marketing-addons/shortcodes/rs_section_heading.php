<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_section_heading( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'small_heading' => '',
    'big_heading'   => ''
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  $output  =  '<div '.$id.' class="tt-title'.$class.'">';
  $output .=  '<div class="tt-title-cat">'.esc_html($small_heading).'</div>';
  $output .=  '<h2 class="c-h2"><small>'.esc_html($big_heading).'</small></h2>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_section_heading', 'rs_section_heading');
