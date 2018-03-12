<?php
/**
 *
 * RS Image Block
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_image_video_block( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'image'     => '',
    'video_url' => ''
  ), $atts ) );

  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $output = '';
  $image_src = rs_get_image_src($image);
  if (!empty( $image_src ) ) {
    $output .=  '<div '.$id.' class="tt-video'.$class.'">';
    $output .=  '<a class="tt-video-img" href="#" data-video="'.esc_url($video_url).'?autoplay=1">';
    $output .=  '<img class="img-responsive" src="'.esc_url($image_src).'" height="293" width="517" alt="">';
    $output .=  '<span class="tt-video-icon"></span>';
    $output .=  '</a>';
    $output .=  '<div class="tt-video-popup">';
    $output .=  '<div class="tt-video-caption"></div>';
    $output .=  '<div class="tt-video-table">';
    $output .=  '<div class="tt-video-cell">';
    $output .=  '<div class="embed-responsive embed-responsive-16by9">';
    $output .=  '<iframe class="embed-responsive-item" src="about:blank"></iframe>';
    $output .=  '<div class="tt-video-close"></div>';
    $output .=  '</div>';
    $output .=  '</div>';
    $output .=  '</div>';
    $output .=  '</div>';
    $output .=  '</div>';
    
  }

  return $output;
}

add_shortcode('rs_image_video_block', 'rs_image_video_block');
