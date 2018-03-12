<?php
/**
 *
 * VC Row
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_row( $atts, $content = '', $key = '' ) {
  $defaults = array(
    'id'             => '',
    'class'          => '',
    'padding_top'    => '',
    'padding_bottom' => '',
    'margin_top'     => '',
    'margin_bottom'  => '',
    'bg_position'    => '',
    'bg_attachment'  => '',
    'fluid'          => 'no',
    'attributes'     => '',
    'css'            => '',
  );

  extract( shortcode_atts( $defaults, $atts ) );

  $id                 = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class              = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $padding_top        = ( $padding_top ) ? ' '.marketing_sanitize_html_classes($padding_top) : '';
  $padding_bottom     = ( $padding_bottom ) ? ' '.marketing_sanitize_html_classes($padding_bottom) : '';
  $margin_top         = ( $margin_top ) ? ' '.marketing_sanitize_html_classes($margin_top) : '';
  $margin_bottom      = ( $margin_bottom ) ? ' '.marketing_sanitize_html_classes($margin_bottom) : '';
  $bg_attachment      = ( $bg_attachment ) ? ' background-attachment:'.esc_attr($bg_attachment).';':'';
  $bg_position        = ( $bg_position ) ? ' background-position:'.esc_attr($bg_position).';':'';


  $is_fluid      = ( $fluid == 'stretch_row_only' || $fluid == 'stretch_row_content') ? ' fullwidth':'';
  $attributes    = ( $attributes ) ? ' '.marketing_sanitize_html_classes(str_replace(',',' ',$attributes)) : '';
  $bg_attr_style = ( $bg_position || $bg_attachment ) ? ' style="'.$bg_position.$bg_attachment.'"':'';

  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), '', $atts );
  $css_class = ( $css_class ) ? ' '.marketing_sanitize_html_classes($css_class):'';

  $output  =  '<section '.$id.' class="section '.$fluid.$is_fluid.$class.$padding_top.$padding_bottom.$margin_top.$margin_bottom.$attributes.''.$css_class.'"'.$bg_attr_style.'>';
  $output .=  ( $fluid == 'stretch_row_only' ) ? '<div class="container">':'';
  $output .=  '<div class="row">';
  $output .=  do_shortcode(wp_kses_post($content));
  $output .=  ( $fluid == 'stretch_row_only' ) ? '</div>':'';
  $output .=  '</div>';
  $output .=  '</section>';

  return $output;
}
add_shortcode( 'vc_row', 'rs_row' );
add_shortcode( 'vc_row_inner', 'rs_row' );
add_shortcode( 'vc_section', 'rs_row' );
