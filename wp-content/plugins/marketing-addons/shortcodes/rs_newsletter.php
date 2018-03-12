<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_newsletter( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'                 => '',
    'class'              => '',
    'image_id'           => '',
    'style'              => 'style1',
    'image'              => '',
    'big_heading'        => '',
    'name_placeholder'   => 'Your Name',
    'email_placeholder'  => 'Your Email',
    'button_placeholder' => 'Get Free Tools',
    'small_heading'      => '',
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  $output = '';
  switch ($style) {
    case 'style1':
      $output .=  '<div '.$id.' class="tt-banner subscribe-form-style1 type-2 background-block'.$class.'">';
      $output .=  '<div class="container">';
      $output .=  '<div class="empty-space marg-lg-b70 marg-sm-b50 marg-xs-b30"></div>';
      $image_src  = rs_get_image_src($image);
      if(!empty($image_src)):
        $output .=  '<div class="tt-banner-img">';
        $output .=  '<img class="img-responsive" src="'.esc_url($image_src).'" alt="">';
        $output .=  '</div>';
      endif;
      $output .=  '<div class="row">';
      $output .=  '<div class="col-sm-7 col-sm-offset-5">';
      $output .=  '<h4 class="tt-banner-title c-h2"><small>'.esc_html($big_heading).'</small></h4>';
      $output .=  '<div class="simple-text size-7">';
      $output .=  '<p>'.esc_html($small_heading).'</p>';
      $output .=  '</div>';
      if(function_exists('newsletter_form')):
        $output .=  '<div class="tt-banner-2-form">';
        $output .=  '<form method="post" action="'.home_url('/').'?na=s" onsubmit="return newsletter_check(this)">';
        $output .=  '<div class="row">';
        $output .=  '<div class="col-sm-6">';
        $output .=  '<input class="c-input type-2 size-3 radius-4" type="text" required="" name="nn" placeholder="'.esc_html($name_placeholder).'">';
        $output .=  '</div>';
        $output .=  '<div class="col-sm-6">';
        $output .=  '<input class="c-input type-2 size-3 radius-4" type="email" required="" name="ne" placeholder="'.esc_html($email_placeholder).'">';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '<input class="newsletter-submit c-btn type-1 size-3 full" type="submit" value="'.esc_html($button_placeholder).'">';
        $output .=  '</form>';
        $output .=  '</div>';
      endif;
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '<div class="empty-space marg-lg-b80 marg-sm-b50 marg-xs-b30"></div>';
      $output .=  '</div>';
      $output .=  '</div>';
      break;
    
    case 'style2':
    default:
      $output .=  '<div '.$id.' class="tt-banner subscribe-form-style1 style2 type-3 background-block'.$class.'">';
      $output .=  '<div class="container">';
      $output .=  '<div class="empty-space marg-lg-b70 marg-sm-b50 marg-xs-b30"></div>';
      $output .=  '<div class="row">';
      $output .=  '<div class="col-sm-8 col-sm-offset-2">';
      $output .=  '<h4 class="tt-banner-title c-h2"><small>'.esc_html($big_heading).'</small></h4>';
      $output .=  '<div class="simple-text size-7">';
      $output .=  '<p>'.esc_html($small_heading).'</p>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';

      $output .=  '<div class="row">';
      $output .=  '<div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">';
      if(function_exists('newsletter_form')):
        $output .=  '<div class="tt-banner-3-form">';
        $output .=  '<form method="post" action="'.home_url('/').'?na=s" onsubmit="return newsletter_check(this)">';
        $output .=  '<div class="row">';
        $output .=  '<div class="col-sm-7">';
        $output .=  '<input class="c-input type-2 size-3 radius-4" type="email" required="" name="ne" placeholder="'.esc_html($email_placeholder).'">';
        $output .=  '</div>';
        $output .=  '<div class="col-sm-5">';
        $output .=  '<input class="newsletter-submit c-btn type-1 full" type="submit" value="'.esc_html($button_placeholder).'">';
        $output .=  '</div>';
        $output .=  '</div>';
        $output .=  '</form>';
        $output .=  '</div>';
      endif;
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '<div class="empty-space marg-lg-b80 marg-sm-b50 marg-xs-b30"></div>';
      $output .=  '</div>';
      $output .=  '</div>';
      break;
  }



  return $output;

}

add_shortcode('rs_newsletter', 'rs_newsletter');
