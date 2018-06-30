<?php
/**
 *
 * RS Hero Slider
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_hero_slider( $atts, $content = '', $id = '' ) {
  wp_enqueue_script('swiper');
  wp_enqueue_style('swiper');
  global $rs_hero_slider;
  $rs_hero_slider = array();

  extract( shortcode_atts( array(
    'id'                  => '',
    'class'               => '',
    'style'               => 'style1',
    'big_heading_color'   => '',
    'height'              => '90vh',
    'autoplay'            => '0',
    'speed'               => '500',
    'loop'                => '0',
    'small_heading_color' => '',
    'pagination'          => 'yes',
    'btn_text_color'      => ''
  ), $atts ) );

  do_shortcode( $content );

  if( empty( $rs_hero_slider ) ) { return; }

  $output              = '';
  $id                  = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class               = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $big_heading_color   = ($big_heading_color) ? ' style="color:'.esc_attr($big_heading_color).';"':'';
  $small_heading_color = ($small_heading_color) ? ' style="color:'.esc_attr($small_heading_color).';"':'';
  $btn_text_color      = ($btn_text_color) ? ' style="color:'.esc_attr($btn_text_color).';"':'';
  $pagination_class    = ($pagination == 'no') ? ' d-none':''; // d-sm-none для включения на мобилках
  $height              = ($height == '90vh') ? ' h-90vh ': ' '.$height.' ';

  switch ($style) {
    case 'style1':

      $output  = '<div '.$id.' class="swiper-container '.$height.sanitize_html_class( $class).'" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view-for-all="1" data-add-slides="2">';
      $output .= '<div class="swiper-wrapper clearfix">';
      foreach ($rs_hero_slider as $key => $slide) {
        $output .= $slide;
      }
      $output .= '</div>';
      $output .=  '<div class="swiper-pagination type-1 pos-1 '.$pagination_class.'"></div>';
      $output .=  '<div class="swiper-button-prev tt-arrow-left type-1 pos-1"><span class="lnr lnr-chevron-left"></span></div>';
      $output .=  '<div class="swiper-button-next tt-arrow-right type-1 pos-1"><span class="lnr lnr-chevron-right"></span></div>';
      $output .=  '</div>';
      # code...
      break;
  }


  return $output;

}
add_shortcode('rs_hero_slider', 'rs_hero_slider');

/**
 *
 * RS Hero Slider
 * @version 1.0.0
 * @since 1.0.0
 *
 */
function rs_hero_slider_item( $atts, $content = '', $id = '' ) {
  global $rs_hero_slider;

  extract( shortcode_atts( array(
    'id'                  => '',
    'class'               => '',
    'background'          => '3',
    'object'              => '',
    'small_heading'       => '',
    'heading'             => '',
    'name_placeholder'    => '',
    'email_placeholder'   => '',
    'btn_text'            => '',
    'btn_link'            => '',
    'style'               => 'style1',
  ), $atts ) );

  switch ($style) {

    case 'style1':
      $image_id      = (isset($background)) ? $background:'';
      $object_id     = (isset($object)) ? $object:'';
      $small_heading = (isset($small_heading)) ? $small_heading:'';
      $btn_text      = (isset($btn_text)) ? $btn_text:'';
      $btn_link      = (isset($btn_link)) ? $btn_link:'';
      $big_heading   = (isset($heading)) ? $heading:'';
      if (function_exists('vc_parse_multi_attribute')) {
        $parse_args = vc_parse_multi_attribute($btn_link);
        $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
        $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
        $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
      }
      $active_class = ($key === 0) ? 'active':'';
      $image_url  = rs_get_image_src($image_id);
      $object_url = rs_get_image_src($object_id);
      if(!empty($image_url) && !empty($object_url)) {
        $slide .=  '<div class="swiper-slide '.sanitize_html_class($active_class).'" data-val="'.esc_html($key).'">';
        $slide .=  '<div class="tt-mslide background-block" style="background-image:url('.esc_url($image_url).');">';
        $slide .=  '<div class="container">';
        $slide .=  '<div class="tt-mslide-inner">';
        $slide .=  '<h1 class="c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
        $slide .=  '<div class="simple-text size-2">';
        $slide .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
        $slide .=  '</div>';
        $slide .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
        $slide .=  '<div class="empty-space marg-lg-b70 marg-md-b50"></div>';
        $slide .=  '<div class="empty-space marg-lg-b200 marg-xs-b160"></div>';
        $slide .=  '<div class="empty-space marg-lg-b170 marg-md-b100 marg-sm-b50 marg-xs-b0"></div>';
        $slide .=  '<div class="tt-mslide-img">';
        $slide .=  '<img class="img-responsive" src="'.esc_url($object_url).'" height="370" width="820" alt="">';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
      }
    break;

    case 'style2':
      $active_class      = ($key === 0) ? ' active':'';
      $object_id         = (isset($object)) ? $object:'';
      $small_heading     = (isset($small_heading)) ? $small_heading:'';
      $big_heading       = (isset($heading)) ? $heading:'';
      $form_id           = (isset($form_id)) ? $form_id:'';
      $email_placeholder = (isset($email_placehodler)) ? $email_placehodler:'Your Email';
      $name_placehodler  = (isset($name_placehodler)) ? $name_placehodler:'Your Name';
      $btn_text          = (isset($btn_text)) ? $btn_text:'Gimmie Pro Tips';

      $slide .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
      $slide .=  '<div class="tt-mslide-2">';
      $slide .=  '<div class="container">';
      $slide .=  '<div class="tt-mslide-2-table">';
      $slide .=  '<div class="tt-mslide-2-cell">';
      $object_url = rs_get_image_src($object_id);
      if(!empty($object_url)) {
        $output .=  '<img class="tt-mslide-2-img img-responsive" src="'.esc_url($object_url).'" height="996" width="640" alt="">';
      }
      $slide .=  '<div class="row">';
      $slide .=  '<div class="col-sm-6 offset-sm-6">';
      $slide .=  '<p class="tt-mslide-2-title c-h2"'.$big_heading_color.'>'.esc_html($big_heading).'</p>';
      $slide .=  '<div class="simple-text size-4">';
      $slide .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
      $slide .=  '</div>';
      $slide .=  '</div>';
      $slide .=  '</div>';

      if(function_exists('newsletter_form')):
        $slide .=  '<div class="row">';
        $slide .=  '<div class="col-sm-6 offset-sm-6 col-md-4 offset-md-6">';
        $slide .=  '<form method="post" action="'.home_url('/').'?na=s" onsubmit="return newsletter_check(this)">';
        $slide .=  '<div class="c-input-3-wrapper">';
        $slide .=  '<input class="c-input type-3" type="text" name="nn" required="" placeholder="'.esc_html($name_placehodler).'">';
        $slide .=  '<div class="c-input-3-icon"><span class="lnr lnr-user"></span></div>';
        $slide .=  '</div>';
        $slide .=  '<div class="c-input-3-wrapper">';
        $slide .=  '<input class="c-input type-3" type="email" name="ne" required="" placeholder="'.esc_html($email_placeholder).'">';
        $slide .=  '<div class="c-input-3-icon"><span class="lnr lnr-envelope"></span></div>';
        $slide .=  '</div>';
        $slide .=  '<input class="newsletter-submit c-btn type-1 size-4 full" type="submit" value="'.esc_html($btn_text).'">';
        $slide .=  '</form>';
        $slide .=  '</div>';
        $slide .=  '</div>';
      endif;

      $slide .=  '<div class="tt-mslide-2-arrow">';
      $slide .=  '<span class="lnr lnr-chevron-down"></span>';
      $slide .=  '</div>';                                    

      $slide .=  '</div>';
      $slide .=  '</div>';
      $slide .=  '</div>';
      $slide .=  '</div>';
      $slide .=  '</div>';
    break;

    case 'style3':
      $image_id      = (isset($background)) ? $background:'';
      $object_id     = (isset($object)) ? $object:'';
      $small_heading = (isset($small_heading)) ? $small_heading:'';
      $btn_text      = (isset($btn_text)) ? $btn_text:'';
      $btn_link      = (isset($btn_link)) ? $btn_link:'';
      $big_heading   = (isset($heading)) ? $heading:'';

      if (function_exists('vc_parse_multi_attribute')) {
        $parse_args = vc_parse_multi_attribute($btn_link);
        $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
        $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
        $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
      }
      $active_class = ($key === 0) ? ' swiper-slide-active':'';
      $image_url  = rs_get_image_src($image_id);
      $object_url = rs_get_image_src($object_id);
      if(!empty($image_url) && !empty($object_url)) {

        $slide .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_html($key).'">';
        $slide .=  '<div class="tt-mslide background-block" style="background-image:url('.esc_url($image_url).');">';
        $slide .=  '<div class="container">';
        $slide .=  '<div class="tt-mslide-inner">';
        $slide .=  '<h1 class="c-h1 color-2 white"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
        $slide .=  '<div class="simple-text size-2 color-4">';
        $slide .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
        $slide .=  '</div>';
        $slide .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
        $slide .=  '<div class="empty-space marg-lg-b70 marg-md-b50 marg-xs-b30"></div>';

        $slide .=  '<div class="empty-space marg-lg-b200 marg-xs-b160"></div>';
        $slide .=  '<div class="empty-space marg-lg-b200 marg-md-b150 marg-sm-b100 marg-xs-b0"></div>';
        $slide .=  '<div class="empty-space marg-lg-b55 marg-md-b0"></div>';
        $slide .=  '<div class="tt-mslide-img type-2">';
        $slide .=  '<img class="img-responsive" src="'.esc_url($object_url).'" height="454" width="845" alt="">';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
      }
    break;

    case 'style4':
      $image_id      = (isset($background)) ? $background:'';
      $object_id     = (isset($object)) ? $object:'';
      $small_heading = (isset($small_heading)) ? $small_heading:'';
      $btn_text      = (isset($btn_text)) ? $btn_text:'';
      $btn_link      = (isset($btn_link)) ? $btn_link:'';
      $big_heading   = (isset($heading)) ? $heading:'';

      if (function_exists('vc_parse_multi_attribute')) {
        $parse_args = vc_parse_multi_attribute($btn_link);
        $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
        $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
        $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
      }

      $active_class = ($key === 0) ? ' active':'';
      $image_url  = rs_get_image_src($image_id);
      $object_url = rs_get_image_src($object_id);
      if(!empty($image_url) && !empty($object_url)) {

        $slide .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
        $slide .=  '<div class="tt-mslide-3 background-block" style="background-image:url('.esc_url($image_url).');">';
        $slide .=  '<div class="container">';
        $slide .=  '<div class="tt-mslide-3-table">';
        $slide .=  '<div class="tt-mslide-3-cell">';
        $slide .=  '<img  class="tt-mslide-3-img img-responsive" src="'.esc_url($object_url).'" height="576" width="491" alt="" >';
        $slide .=  '<div class="row">';
        $slide .=  '<div class="col-sm-6">';
        $slide .=  '<div class="row">';
        $slide .=  '<div class="col-sm-8">';
        $slide .=  '<h1 class="c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '<div class="simple-text size-6">';
        $slide .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
        $slide .=  '</div>';
        $slide .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
      }
    break;

    case 'style5':
      $image_id      = (isset($background)) ? $background:'';
      $small_heading = (isset($small_heading)) ? $small_heading:'';
      $btn_text      = (isset($btn_text)) ? $btn_text:'';
      $btn_link      = (isset($btn_link)) ? $btn_link:'';
      $big_heading   = (isset($heading)) ? $heading:'';

      if (function_exists('vc_parse_multi_attribute')) {
        $parse_args = vc_parse_multi_attribute($btn_link);
        $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
        $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
        $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
      }

      $active_class = ($key === 0) ? ' active':'';
      $image_url  = rs_get_image_src($image_id);
      if(!empty($image_url)) {
        $slide .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
        $slide .=  '<div class="tt-mslide-3 background-block" style="background-image:url('.esc_url($image_url).');">';
        $slide .=  '<div class="container">';
        $slide .=  '<div class="tt-mslide-3-table text-center">';
        $slide .=  '<div class="tt-mslide-3-cell">';
        
        $slide .=  '<div class="row">';
        $slide .=  '<div class="col-sm-12">';
        $slide .=  '<h1 class="c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
        $slide .=  '<div class="simple-text size-6">';
        $slide .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
        $slide .=  '</div>';
        $slide .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
        $slide .=  '</div>';
      }
    break;

    case 'style6':
      default:
        $image_id      = (isset($background)) ? $background:'';
        $active_class = ($key === 0) ? ' active':'';
        $image_url  = rs_get_image_src($image_id);
        if(!empty($image_url)) {
          $slide .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
          $slide .=  '<div class="tt-mslide-3 background-block" style="background-image:url('.esc_url($image_url).');">';
          $slide .=  '<div class="container">';
          $slide .=  '<div class="tt-mslide-3-table text-center">';
          $slide .=  '</div>';
          $slide .=  '</div>';
          $slide .=  '</div>';
          $slide .=  '</div>';
        }
    break;  
  }
  $rs_hero_slider[]  = $slide;
  return;
}
add_shortcode('rs_hero_slider_item', 'rs_hero_slider_item');
