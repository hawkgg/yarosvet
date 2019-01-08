<?php
/**
 *
 * RS Video Banner
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_hero_video_banner( $atts, $content = '', $id = '' ) {
  extract( shortcode_atts( array(
    'id'                  => '',
    'class'               => '',
    'small_heading'       => '',
    'big_heading'         => '',
    'video_url'           => '',
    'poster_img'          => '',
    'btn_link'            => '',
    'btn_text'            => '',
    'big_heading_color'   => '',
    'small_heading_color' => '',
    'btn_text_color'      => ''
  ), $atts ) );

  $id                  = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class               = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $big_heading_color   = ($big_heading_color) ? ' style="color:'.esc_attr($big_heading_color).';"':'';
  $small_heading_color = ($small_heading_color) ? ' style="color:'.esc_attr($small_heading_color).';"':'';
  $btn_text_color      = ($btn_text_color) ? ' style="color:'.esc_attr($btn_text_color).';"':'';

  $poster = '';
  if(!empty($poster_img) && is_numeric($poster_img)) {
    $image_url  = wp_get_attachment_image_src( $poster_img, 'full' );
    if(isset($image_url[0])) {
      $poster = ' style="background-image:url('.esc_url($image_url[0]).');"';
    }
  }
  $output  = '';
  if(!empty($video_url)):
    wp_enqueue_script('ytplayer');
    $output .=  '<div id="home" class="hero-video-section tt-swiper-shadow'.$class.'"'.$poster.'>';

      if (function_exists('vc_parse_multi_attribute')) {
        $parse_args = vc_parse_multi_attribute($btn_link);
        $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
        $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
        $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
      }

    
      $output .=  '<div class="tt-full-height container">';
      $output .= '<div id="bgndVideo" class="player" data-property="{videoURL:\''.$video_url.'\',containment:\'#home\',autoPlay:true, showControls:true, showYTLogo: false, mute:true, startAt:0, opacity:1}">';
      $output .= '</div>';
      $output .=  '<div class="bg-wrap tt-mslide-3">';
      $output .=  '<div class="tt-mslide-3-table text-center">';
      $output .=  '<div class="tt-mslide-3-cell">';
      $output .=  '<div class="row">';
      $output .=  '<div class="col-sm-12">';
      $output .=  '<h1 class="c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
      $output .=  '<div class="simple-text size-6">';
      $output .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
      $output .=  '</div>';
      $output .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
        
      


    $output .=  '</div>';
    $output .=  '</div>';
  endif;

  return $output;
}

add_shortcode('rs_hero_video_banner', 'rs_hero_video_banner');
