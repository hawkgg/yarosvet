<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_client( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('swiper');
  wp_enqueue_style( 'swiper');
  extract( shortcode_atts( array(
	'id'    => '',
	'class' => '',
	'image' => '',
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $output = '';

  $image_array = explode(',', $image);
  if(is_array($image_array)) {
    $output .=  '<div '.$id.' class="swiper-container'.$class.'" data-autoplay="5000" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="3" data-lg-slides="4" data-add-slides="5">';
    $output .=  '<div class="swiper-wrapper clearfix">';
    foreach ($image_array as $single_image) {
      $image_src  = rs_get_image_src($single_image);
      $output .=  '<div class="swiper-slide active" data-val="0">';
      $output .=  '<div class="tt-partner">';
      $output .=  '<img class="img-responsive" src="'.esc_url($image_src).'" alt="">';
      $output .=  '</div>';
      $output .=  '</div>';
    }                      
    $output .=  '</div>';
    $output .=  '<div class="pagination type-1 visible-xs-block"></div>';
    $output .=  '</div>';
  }

  return $output;
}

add_shortcode('rs_client', 'rs_client');
