<?php
/**
 *
 * RS Cta
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_text_block_with_button( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'                      => '',
    'class'                   => '',
    'heading'                 => '',
    'btn_text'                => '',
    'btn_link'                => '',
    'button_border_color'     => '',
    'button_text_color'       => '',
    'button_background_hover' => ''
  ), $atts ) );

  $id           = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class        = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $customize    = ($button_background_hover || $button_text_color || $button_border_color) ? true:false;
  $output       = '';
  $uniqid_class = '';

  if (function_exists('vc_parse_multi_attribute')) {
    $parse_args = vc_parse_multi_attribute($btn_link);
    $href       = ( isset($parse_args['url']) ) ? $parse_args['url'] : '#';
    $btn_title  = ( isset($parse_args['title']) ) ? $parse_args['title'] : 'button';
    $target     = ( isset($parse_args['target']) ) ? trim($parse_args['target']) : '_self';
  }

  if( $customize ) {
    $uniqid       = time().'-'.mt_rand();
    $custom_style = '';

    $custom_style .=  '.custom-btn-properties-'.$uniqid.'{';
    $custom_style .=  ($button_text_color) ? 'color:'.$button_text_color.' !important;':'';
    $custom_style .=  ($button_border_color) ? 'border-color:'.$button_border_color.' !important;':'';
    $custom_style .= '}';

    if($button_background_hover) {
      $custom_style .=  '.custom-btn-properties-'.$uniqid.':after,
      .custom-btn-properties-'.$uniqid.':before {';
      $custom_style .=  ($button_background_hover) ? 'background:'.$button_background_hover.' !important;':'';
      $custom_style .= '}';      
    }

    marketing_add_inline_style( $custom_style );

    $uniqid_class = ' custom-btn-properties-'. $uniqid;
  } 



  $output  .= '<div '.$id.' class="tt-post-2-info'.$class.'">';
  if(!empty($heading)):
    $output .=  '<a class="tt-post-2-title c-h2"><small>'.esc_html($heading).'</small></a>';
  endif;
  $output .= '<div class="simple-text">';
  $output .= '<p>'.wp_kses_post($content).'</p>';
  $output .=  '</div>';
  $output .=  '<a class="c-btn type-2 size-2'.$uniqid_class.'" title="'.esc_attr($btn_title).'" target="'.esc_attr($target).'" href="'.esc_url($href).'"><span>'.esc_html($btn_text).'</span></a>';
  $output .=  '</div>';

  return $output;
}
add_shortcode('rs_text_block_with_button', 'rs_text_block_with_button');
