<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_link_box( $atts, $desc = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'style'         => 'type-1',
    'img'           => '',
    'heading'       => '',
    'desc'          => '',
    'link'          => '',
  ), $atts ) );

  $id            = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class         = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  $image_src = wp_get_attachment_image_src( $img, 'full' )[0];

  $output  =  '<div '.$id.' class="tt-case '.$style.' clearfix'.$class.'">';

  if ($style == 'type-1') {
    $output .=  '<a class="tt-case-img hover-custom" href="'.esc_url($href).'" target="'.esc_attr($target).'">';
    $output .=  '<img class="img-responsive" src="'.esc_url($image_src).'">';
    $output .=  '</a>';
  }
  $output .=  '<div class="tt-case-info text-center">';
  if ($style == 'type-1') {
    $output .=  '<a class="tt-case-title c-h5" href="'.esc_url($href).'" target="'.esc_attr($target).'">'.esc_html($heading).'</a>';
  }
  $output .=  '<div class="simple-text size-3">';
  $output .=  rs_set_wpautop($desc);
  $output .=  '</div>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_link_box', 'rs_link_box');
