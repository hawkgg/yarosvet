<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_button( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
  'id'       => '',
  'class'    => '',
  'style'    => 'type-1',
  'size'     => 'size-2',
  'align'    => 'text-left',
  'color'    => 'color-1',
  'btn_text' => '',
  'btn_link' => ''
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($btn_link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $title      = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  return '<div class="'.$align.'"><a '.$id.' class="c-btn '.$style.' '.$size.' '.$color.$class.'" target="'.esc_attr($target).'" title="'.esc_attr($title).'" href="'.esc_html($href).'"><span>'.esc_html($btn_text).'</span></a></div>';
}

add_shortcode('rs_button', 'rs_button');
