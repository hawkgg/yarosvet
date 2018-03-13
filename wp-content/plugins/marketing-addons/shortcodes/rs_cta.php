<?php
/**
 *
 * RS Cta
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_cta( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'         => '',
    'class'      => '',
    'heading'    => '',
    'image'      => '',
    'btn_text'   => '',
    'btn_link'   => ''
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($btn_link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }
  
  $output = '';
  $image_src = rs_get_image_src($image);
  if(!empty($image_src)) {
    $output .=  '<div '.$id.' class="tt-banner background-block'.$class.'">';
    $output .=  '<div class="container">';
    $output .=  '<div class="empty-space marg-lg-b120 marg-sm-b50 marg-xs-b30"></div>';
    $output .=  '<div class="tt-banner-img">';
    $output .=  '<img class="img-responsive" src="'.esc_url($image_src).'" alt="">';
    $output .=  '</div>';                 
    $output .=  '<div class="row">';
    $output .=  '<div class="col-sm-7 offset-sm-5">';
    $output .=  '<h4 class="tt-banner-title c-h2"><small>'.esc_html($heading).'</small></h4>';
    $output .=  '<a class="c-btn type-1 size-3" title="'.esc_attr($btn_title).'" target="'.esc_attr($target).'" href="'.esc_url($href).'">'.esc_html($btn_text).'</a>';
    $output .=  '</div>';
    $output .=  '</div>';
    $output .=  '<div class="empty-space marg-lg-b120 marg-sm-b50 marg-xs-b30"></div>';
    $output .=  '</div>';
    $output .=  '</div>';
    
  }

  return $output;
}
add_shortcode('rs_cta', 'rs_cta');
