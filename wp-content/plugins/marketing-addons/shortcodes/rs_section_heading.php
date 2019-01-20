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
    'which_header'  => 'own',
    'tag'           => 'h1',
    'text_align'    => 'left',
    'text'          => ''
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  $output .=  '<'.$tag.$id.' class="text-'.$text_align.$class.'">';
  if ($which_header == 'own') {
    $output .= esc_html($text);
  } else {
    $output .= get_the_title();
  }
  $output .=  '</'.$tag.'>';

  return $output;
}

add_shortcode('rs_section_heading', 'rs_section_heading');
