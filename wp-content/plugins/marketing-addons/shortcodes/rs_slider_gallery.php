<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_slider_gallery( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('swiper');
  wp_enqueue_style( 'swiper');
  extract( shortcode_atts( array(
	'id'    => '',
	'class' => '',
  'image' => '',
  'stretched' => '0',
  'zooming' => '0',
  'hover_effect' => '0',
  'arrows' => '0',
	'arrows_pos' => 'inside',
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $output = '';

  $image_array = explode(',', $image);
  if(is_array($image_array)) {
    $output .=  '<div class="swiper-main-wrap">';
    $output .=  '<div '.$id.' class="swiper-container'.$class.'" data-autoplay="5000" data-loop="1" data-speed="300" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="3" data-lg-slides="5" data-add-slides="5">';
    $output .=  '<div class="swiper-wrapper';
    if ($stretched == '1') { $output .= ' stretched'; }
    $output .= '">';
    foreach ($image_array as $single_image) {
      $full = wp_get_attachment_image_src( $single_image , 'photoswipe_full');
      $image_src  = rs_get_image_src($single_image);

      $output .=  '<div class="swiper-slide';
      if ($zooming == '1') { $output .= ' psgal'; }
      $output .=   '" data-val="0">';

      $output .=  '<figure class="msnry_item';
        if ($hover_effect == '1') { $output .= ' tt-partner'; }
      $output .= '">';

      if ($zooming == '1') { $output .= '<a href="'.esc_url($image_src).'" target="_blank" itemprop="contentUrl" data-size="'.$full[1].'x'.$full[2].'">'; }

      $output .=  '<img class="img-responsive" src="'.esc_url($image_src).'" itemprop="thumbnail" alt="">';

      if ($zooming == '1') { $output .= '</a>'; }

      $output .=  '</figure>';
      $output .=  '</div>';
    }                      
    $output .=  '</div>';
    if ($arrows == '1') {
      $output .=  '<div class="swiper-pagination type-1 ';
      if ($arrows_pos == 'outside') { $output .= 'arrows-outside'; }
      $output .= ' d-none"></div>';
        $output .=  '<div class="swiper-button-prev tt-arrow-left type-1 pos-1"><span class="lnr lnr-chevron-left"></span></div>';
        $output .=  '<div class="swiper-button-next tt-arrow-right type-1 pos-1"><span class="lnr lnr-chevron-right"></span></div>';
      $output .=  '</div>';
    }
    $output .=  '</div>';
  }

  return $output;
}

add_shortcode('rs_slider_gallery', 'rs_slider_gallery');
