<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_icon_box( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'            => '',
    'class'         => '',
    'img_icon'      => '',
    'style'         => 'type-1',
    'icon'          => '',
    'color'         => 'color-1',
    'icon_box_link' => '',
    'heading'       => '',
  ), $atts ) );

  $id            = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class         = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $img_icon_html = '';

  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($icon_box_link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  if(!empty($img_icon) && is_numeric($img_icon)) {
    $image_src = wp_get_attachment_image_src( $img_icon, 'full' );
    if(isset($image_src[0])) {
      $img_icon_html .=  '<img src="'.esc_url($image_src[0]).'" height="100" width="100" alt="">';
    }
  }
  $icon_html = ($style == 'type-4') ? $img_icon_html:'<span class="'.marketing_sanitize_html_classes($icon).'"></span>';

  $output  =  '<div '.$id.' class="tt-service '.$color.' '.$style.' clearfix'.$class.'">';
  $output .=  '<a class="tt-service-icon" href="'.esc_url($href).'" target="'.esc_attr($target).'">';
  $output .=  $icon_html;
  $output .=  '</a>';
  $output .=  '<div class="tt-service-info">';
  $output .=  '<a class="tt-service-title c-h4">'.esc_html($heading).'</a>';
  $output .=  '<div class="simple-text size-3">';
  $output .=  rs_set_wpautop($content);
  $output .=  '</div>';
  $output .=  '</div>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_icon_box', 'rs_icon_box');
