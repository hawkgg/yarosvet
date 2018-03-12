<?php
/**
 *
 * VC COLUMN and VC COLUMN INNER
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function rs_column( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'width'           => '1/1',
    'offset'          => '',
    'align'           => '',
    'is_padding'      => 'yes',
    'class_type'      => 'md',
    'css'             => '',
    'animation'       => '',
    'animation_delay' => '',

  ), $atts ) );

  $id              = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class           = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $align           = ( $align ) ? ' align-'.$align:'';
  $offset          = ( $offset ) ? ' '. str_replace( 'vc_', '', $offset ) : '';
  $is_padding      = ( $is_padding == 'no' ) ? ' no-padding':' have-padding';
  $animation       = ( $animation ) ? ' wow '. $animation : '';
  $animation_delay = ( $animation_delay ) ? ' data-wow-delay="'.esc_attr($animation_delay).'s"':'';
  $css_class       = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), '', $atts );
  $css_class       = ( $css_class ) ? ' '.marketing_sanitize_html_classes($css_class):'';


  return '<div'. $id .' class="wpb_column col-'.sanitize_html_class($class_type).'-'. rs_get_bootstrap_col( $width ) . marketing_sanitize_html_classes($offset . $class .$align. $animation. $is_padding. $css_class).'"'.$animation_delay.'>'.do_shortcode( wp_kses_post($content)).'</div>';
}
add_shortcode( 'vc_column', 'rs_column' );
add_shortcode( 'vc_column_inner', 'rs_column' );
