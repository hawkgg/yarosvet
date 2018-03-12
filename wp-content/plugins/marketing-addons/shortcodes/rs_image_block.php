<?php
/**
 *
 * RS Image Block
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_image_block( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'image'  => '',
    'align'  => 'left-block',
    'shadow' => 'yes'
  ), $atts ) );

  $id         = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class      = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $img_shadow = ($shadow == 'yes') ? ' img-shadow':'';

  $output = '';
  $image_src = rs_get_image_src($image);
  if (!empty( $image_src ) ) {
    $output .=  '<img '.$id.' class="img-responsive '.$align.$img_shadow.' '.$class.'" src="'.esc_url($image_src).'" alt="">';
  }

  return $output;
}

add_shortcode('rs_image_block', 'rs_image_block');
