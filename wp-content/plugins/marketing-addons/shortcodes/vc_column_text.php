<?php
/**
 *
 * VC Column Text
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function vc_column_text( $atts, $content = '', $id = '' ){

  extract( shortcode_atts( array(
    'id'             => '',
    'class'          => '',
    'align'          => '',
    'dp_text_size'   => '',
    'text_size'      => '',
    'text_color'     => '',
    'line_height'    => '',
    'letter_spacing' => '',
    'font'           => 'default',
    'font_weight'    => '300',
    'font_style'     => 'normal',
  ), $atts ) );

  $id              = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class           = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $align           = ( $align ) ? ' align-'.$align:'';

  $customize      = ($font != 'default' || $font_style != 'normal' || $font_weight != '300' ) ? true:false;
  $text_size      = ( $text_size )? 'font-size:'.$text_size.';':'';
  $text_color     = ( $text_color )? 'color:'.$text_color.';':'';
  $line_height    = ( $line_height )? 'line-height:'.$line_height.';':'';
  $letter_spacing = ( $letter_spacing )? 'letter-spacing:'.$letter_spacing.';':'';
  $el_style       = ( $text_size || $text_color ) ? 'style="'.esc_attr($text_color.$text_size.$line_height.$letter_spacing).'"':'';

  $output =  $uniqid_class = '';
  if(strpos($font, 'google') !== false) {
    $font_weight_type = ($font_style == 'italic' && $font_weight ) ? $font_weight.$font_style:$font_weight;
    $ifont_name  = str_replace('google_web_font_', '', $font);
    $font_name  = str_replace(' ', '+', $ifont_name);
    $output .=  "<link href='http://fonts.googleapis.com/css?family=".esc_attr($font_name).":".esc_attr($font_weight_type).", 400, 300, 600' rel='stylesheet' type='text/css'>";
  } else {
    $ifont_name = $font;
  }

  if( $customize ) {

    $uniqid       = time().'-'.mt_rand();
    $custom_style = '';

    $custom_style .=  '.custom-font-text-'.$uniqid.'{';
    $custom_style .=  ($font) ? 'font-family:'.$ifont_name.', san-serif;':'';
    $custom_style .=  ($font_weight) ? 'font-weight:'.$font_weight.';':'';
    $custom_style .=  ($font_style) ? 'font-style:'.$font_style.';':'';
    $custom_style .= '}';

    marketing_add_inline_style( $custom_style );

    $uniqid_class = ' custom-font-text-'. $uniqid;

  }

  $output .= '<div class="text-block'.$class.$uniqid_class.' '.sanitize_html_class($align).'" '.$id.''.$el_style.'><div class="simple-text '.sanitize_html_class($dp_text_size).'">'.rs_set_wpautop($content).'</div></div>';
  return $output;
}
add_shortcode( 'vc_column_text', 'vc_column_text');

