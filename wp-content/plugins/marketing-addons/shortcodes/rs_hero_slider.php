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
  $pagination_class    = ($pagination == 'no') ? ' hidden-lg':'';

  switch ($style) {
    case 'style1':

      $output  = '<div '.$id.' class="swiper-container '.sanitize_html_class( $class).'" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1" data-add-slides="2">';
      $output .= '<div class="swiper-wrapper clearfix">';
      foreach ($rs_hero_slider as $key => $slide) {
        $image_id      = (isset($slide['atts']['background'])) ? $slide['atts']['background']:'';
        $object_id     = (isset($slide['atts']['object'])) ? $slide['atts']['object']:'';
        $small_heading = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $btn_text      = (isset($slide['atts']['btn_text'])) ? $slide['atts']['btn_text']:'';
        $btn_link      = (isset($slide['atts']['btn_link'])) ? $slide['atts']['btn_link']:'';
        $big_heading   = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';

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
          $output .=  '<div class="swiper-slide '.sanitize_html_class($active_class).'" data-val="'.esc_html($key).'">';
          $output .=  '<div class="tt-mslide background-block" style="background-image:url('.esc_url($image_url).');">';
          $output .=  '<div class="container">';
          $output .=  '<div class="tt-mslide-inner">';
          $output .=  '<h1 class="c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
          $output .=  '<div class="simple-text size-2">';
          $output .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
          $output .=  '</div>';
          $output .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
          $output .=  '<div class="empty-space marg-lg-b70 marg-md-b50"></div>';
          $output .=  '<div class="empty-space marg-lg-b200 marg-xs-b160"></div>';
          $output .=  '<div class="empty-space marg-lg-b170 marg-md-b100 marg-sm-b50 marg-xs-b0"></div>';
          $output .=  '<div class="tt-mslide-img">';
          $output .=  '<img class="img-responsive" src="'.esc_url($object_url).'" height="370" width="820" alt="">';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '</div>';
        }
      }
      $output .= '</div>';
      $output .=  '<div class="pagination type-1 pos-1 visible-xs-block"></div>';
      $output .=  '<div class="swiper-arrow-left tt-arrow-left type-1 pos-1 hidden-xs'.$pagination_class.'"><span class="lnr lnr-chevron-left"></span></div>';
      $output .=  '<div class="swiper-arrow-right tt-arrow-right type-1 pos-1 hidden-xs'.$pagination_class.'"><span class="lnr lnr-chevron-right"></span></div>';
      $output .=  '</div>';
      # code...
      break;

    case 'style2':
      $output  =  '<div '.$id.' class="swiper-container tt-swiper-shadow'.$class.'" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1" data-add-slides="2">';
      $output .=  '<div class="swiper-wrapper clearfix">';
      foreach ($rs_hero_slider as $key => $slide) {
        $active_class      = ($key === 0) ? ' active':'';
        $object_id         = (isset($slide['atts']['object'])) ? $slide['atts']['object']:'';
        $small_heading     = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $big_heading       = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';
        $form_id           = (isset($slide['atts']['form_id'])) ? $slide['atts']['form_id']:'';
        $email_placeholder = (isset($slide['atts']['email_placehodler'])) ? $slide['atts']['email_placehodler']:'Your Email';
        $name_placehodler  = (isset($slide['atts']['name_placehodler'])) ? $slide['atts']['name_placehodler']:'Your Name';
        $btn_text          = (isset($slide['atts']['btn_text'])) ? $slide['atts']['btn_text']:'Gimmie Pro Tips';

        $output .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
        $output .=  '<div class="tt-mslide-2">';
        $output .=  '<div class="container">';
        $output .=  '<div class="tt-mslide-2-table">';
        $output .=  '<div class="tt-mslide-2-cell">';
        $object_url = rs_get_image_src($object_id);
        if(!empty($object_url)) {
          $output .=  '<img class="tt-mslide-2-img img-responsive" src="'.esc_url($object_url).'" height="996" width="640" alt="">';
        }
        $output .=  '<div class="row">';
        $output .=  '<div class="col-sm-6 col-sm-offset-6">';
        $output .=  '<h1 class="tt-mslide-2-title c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
        $output .=  '<div class="simple-text size-4">';
        $output .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';

        if(function_exists('newsletter_form')):
          $output .=  '<div class="row">';
          $output .=  '<div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-6">';
          $output .=  '<form method="post" action="'.home_url('/').'?na=s" onsubmit="return newsletter_check(this)">';
          $output .=  '<div class="c-input-3-wrapper">';
          $output .=  '<input class="c-input type-3" type="text" name="nn" required="" placeholder="'.esc_html($name_placehodler).'">';
          $output .=  '<div class="c-input-3-icon"><span class="lnr lnr-user"></span></div>';
          $output .=  '</div>';
          $output .=  '<div class="c-input-3-wrapper">';
          $output .=  '<input class="c-input type-3" type="email" name="ne" required="" placeholder="'.esc_html($email_placeholder).'">';
          $output .=  '<div class="c-input-3-icon"><span class="lnr lnr-envelope"></span></div>';
          $output .=  '</div>';
          $output .=  '<input class="newsletter-submit c-btn type-1 size-4 full" type="submit" value="'.esc_html($btn_text).'">';
          $output .=  '</form>';
          $output .=  '</div>';
          $output .=  '</div>';
        endif;

        $output .=  '<div class="tt-mslide-2-arrow">';
        $output .=  '<span class="lnr lnr-chevron-down"></span>';
        $output .=  '</div>';                                    

        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</div>';

      }

      $output .=  '</div>';
      $output .=  '<div class="pagination type-1 pos-1 visible-xs-block"></div>';
      $output .=  '<div class="swiper-arrow-left tt-arrow-left type-1 '.$pagination_class.' pos-1 hidden-xs"><span class="lnr lnr-chevron-left"></span></div>';
      $output .=  '<div class="swiper-arrow-right tt-arrow-right type-1 '.$pagination_class.' pos-1 hidden-xs"><span class="lnr lnr-chevron-right"></span></div>';                   
      $output .=  '</div>';

      break;

    case 'style3':
      $output  = '<div '.$id.' class="swiper-container '.$class.'" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1" data-add-slides="2">';
      $output .= '<div class="swiper-wrapper clearfix">';
      foreach ($rs_hero_slider as $key => $slide) {
        $image_id      = (isset($slide['atts']['background'])) ? $slide['atts']['background']:'';
        $object_id     = (isset($slide['atts']['object'])) ? $slide['atts']['object']:'';
        $small_heading = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $btn_text      = (isset($slide['atts']['btn_text'])) ? $slide['atts']['btn_text']:'';
        $btn_link      = (isset($slide['atts']['btn_link'])) ? $slide['atts']['btn_link']:'';
        $big_heading   = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';

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

          $output .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_html($key).'">';
          $output .=  '<div class="tt-mslide background-block" style="background-image:url('.esc_url($image_url).');">';
          $output .=  '<div class="container">';
          $output .=  '<div class="tt-mslide-inner">';
          $output .=  '<h1 class="c-h1 color-2 white"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
          $output .=  '<div class="simple-text size-2 color-4">';
          $output .=  '<p'.$small_heading_color.'>'.esc_html($small_heading).'</p>';
          $output .=  '</div>';
          $output .=  '<a class="c-btn type-1" href="'.esc_html($href).'" target="'.esc_html($target).'"'.$btn_text_color.'>'.esc_html($btn_text).'</a>';
          $output .=  '<div class="empty-space marg-lg-b70 marg-md-b50 marg-xs-b30"></div>';

          $output .=  '<div class="empty-space marg-lg-b200 marg-xs-b160"></div>';
          $output .=  '<div class="empty-space marg-lg-b200 marg-md-b150 marg-sm-b100 marg-xs-b0"></div>';
          $output .=  '<div class="empty-space marg-lg-b55 marg-md-b0"></div>';
          $output .=  '<div class="tt-mslide-img type-2">';
          $output .=  '<img class="img-responsive" src="'.esc_url($object_url).'" height="454" width="845" alt="">';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '</div>';
          $output .=  '</div>';
        }
      }
      $output .= '</div>';
      $output .=  '<div class="pagination type-1 pos-1 visible-xs-block"></div>';
      $output .=  '<div class="swiper-arrow-left tt-arrow-left type-1 '.$pagination_class.' pos-1 hidden-xs"><span class="lnr lnr-chevron-left"></span></div>';
      $output .=  '<div class="swiper-arrow-right tt-arrow-right type-1 '.$pagination_class.' pos-1 hidden-xs"><span class="lnr lnr-chevron-right"></span></div>';
      $output .=  '</div>';
      break;

    case 'style4':
    default:
      $output .=  '<div '.$id.' class="swiper-container tt-swiper-shadow'.$class.'" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1" data-add-slides="2">';
      $output .=  '<div class="swiper-wrapper clearfix">';

      foreach ($rs_hero_slider as $key => $slide) {
        $image_id      = (isset($slide['atts']['background'])) ? $slide['atts']['background']:'';
        $object_id     = (isset($slide['atts']['object'])) ? $slide['atts']['object']:'';
        $small_heading = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $btn_text      = (isset($slide['atts']['btn_text'])) ? $slide['atts']['btn_text']:'';
        $btn_link      = (isset($slide['atts']['btn_link'])) ? $slide['atts']['btn_link']:'';
        $big_heading   = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';

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

          $output .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
          $output .=  '<div class="tt-mslide-3 background-block" style="background-image:url('.esc_url($image_url).');">';
          $output .=  '<div class="container">';
          $output .=  '<div class="tt-mslide-3-table">';
          $output .=  '<div class="tt-mslide-3-cell">';
          $output .=  '<img  class="tt-mslide-3-img img-responsive" src="'.esc_url($object_url).'" height="576" width="491" alt="" >';
          $output .=  '<div class="row">';
          $output .=  '<div class="col-sm-6">';
          $output .=  '<div class="row">';
          $output .=  '<div class="col-sm-8">';
          $output .=  '<h1 class="c-h1"'.$big_heading_color.'>'.esc_html($big_heading).'</h1>';
          $output .=  '</div>';
          $output .=  '</div>';
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
        }
      }

      $output .=  '</div>';
      $output .=  '<div class="pagination type-1 pos-1 visible-xs-block"></div>';
      $output .=  '<div class="swiper-arrow-left tt-arrow-left type-1 pos-1 '.$pagination_class.' hidden-xs"><span class="lnr lnr-chevron-left"></span></div>';
      $output .=  '<div class="swiper-arrow-right tt-arrow-right type-1 pos-1 '.$pagination_class.' hidden-xs"><span class="lnr lnr-chevron-right"></span></div>';                   
      $output .=  '</div>';
      break;

      case 'style5':
      $output .=  '<div '.$id.' class="swiper-container tt-swiper-shadow'.$class.'" data-autoplay="'.esc_attr($autoplay).'" data-loop="'.esc_attr($loop).'" data-speed="'.esc_attr($speed).'" data-center="0" data-slides-per-view="1" data-add-slides="2">';
      $output .=  '<div class="swiper-wrapper clearfix">';

      foreach ($rs_hero_slider as $key => $slide) {
        $image_id      = (isset($slide['atts']['background'])) ? $slide['atts']['background']:'';
        $small_heading = (isset($slide['atts']['small_heading'])) ? $slide['atts']['small_heading']:'';
        $btn_text      = (isset($slide['atts']['btn_text'])) ? $slide['atts']['btn_text']:'';
        $btn_link      = (isset($slide['atts']['btn_link'])) ? $slide['atts']['btn_link']:'';
        $big_heading   = (isset($slide['atts']['heading'])) ? $slide['atts']['heading']:'';

        if (function_exists('vc_parse_multi_attribute')) {
          $parse_args = vc_parse_multi_attribute($btn_link);
          $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
          $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
          $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
        }

        $active_class = ($key === 0) ? ' active':'';
        $image_url  = rs_get_image_src($image_id);
        if(!empty($image_url)) {
          $output .=  '<div class="swiper-slide'.$active_class.'" data-val="'.esc_attr($key).'">';
          $output .=  '<div class="tt-mslide-3 background-block" style="background-image:url('.esc_url($image_url).');">';
          $output .=  '<div class="container">';
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
        }
      }

      $output .=  '</div>';
      $output .=  '<div class="pagination type-1 pos-1 visible-xs-block"></div>';
      $output .=  '<div class="swiper-arrow-left tt-arrow-left type-1 pos-1 '.$pagination_class.' hidden-xs"><span class="lnr lnr-chevron-left"></span></div>';
      $output .=  '<div class="swiper-arrow-right tt-arrow-right type-1 pos-1 '.$pagination_class.' hidden-xs"><span class="lnr lnr-chevron-right"></span></div>';                   
      $output .=  '</div>';
      
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
  $rs_hero_slider[]  = array( 'atts' => $atts, 'content' => $content );
  return;
}
add_shortcode('rs_hero_slider_item', 'rs_hero_slider_item');
