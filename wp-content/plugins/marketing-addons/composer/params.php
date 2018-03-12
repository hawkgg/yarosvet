<?php
/**
  * WPBakery Visual Composer Extra Params
  *
  * @package VPBakeryVisualComposer
  *
 */
function vc_efa_chosen($settings, $value) {


  $css_option = vc_get_dropdown_option( $settings, $value );
  $value = explode( ',', $value );

  $output  = '<select name="'. $settings['param_name'] .'" data-placeholder="'. $settings['placeholder'] .'" multiple="multiple" class="wpb_vc_param_value wpb_chosen chosen wpb-input wpb-efa-select '. $settings['param_name'] .' '. $settings['type'] .' '. $css_option .'" data-option="'. $css_option .'">';

  foreach ( $settings['value'] as $values => $option ) {
    $selected = ( in_array( $option, $value ) ) ? ' selected="selected"' : '';
    $output .= '<option value="'. $option .'"'. $selected .'>'.htmlspecialchars( $values ).'</option>';
  }

  $output .= '</select>' . "\n";

  return $output;
}

vc_add_shortcode_param('vc_efa_chosen', 'vc_efa_chosen');


function vc_icon($settings, $value) {

  $css_option = vc_get_dropdown_option( $settings, $value );

  $icon_type  = (isset($settings['icon_type'])) ? $settings['icon_type']:'fontawesome';
  $values = ($icon_type == 'font_icon') ? rs_font_icons():rs_fontawesome_icons();
  $value = explode( ',', $value );


  $output  = '<select name="'. $settings['param_name'] .'" data-placeholder="'. $settings['placeholder'] .'" class="wpb_vc_param_value wpb_chosen chosen icon-select wpb-input wpb-rs-select '.$settings['icon_type'].' '. $settings['param_name'] .' '. $settings['type'] .' '. $css_option .'" data-option="'. $css_option .'" data-icon-type="'.$icon_type.'">';

  foreach ( $values as $key => $val ) {
    $selected = ( in_array( $val, $value ) ) ? ' selected="selected"' : '';
    $output .= '<option data-icon="'. $val .'" value="'. $val .'"'. $selected .'>'.htmlspecialchars( $key ).'</option>';
  }

  $output .= '</select>' . "\n";

  return $output;
}

vc_add_shortcode_param('vc_icon', 'vc_icon');
