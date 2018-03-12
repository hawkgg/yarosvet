<?php

/**
 *
 * RS Pricing Table
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_pricing_table($atts, $content = '', $id = '') {

  extract(shortcode_atts(array(
    'id'       => '',
    'class'    => '',
    'plan'     => '',
    'feature'  => '',
    'price'    => '',
    'currency' => '$'
  ), $atts));

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' ' . marketing_sanitize_html_classes($class) : '';
  
  $output  =  '<div '.$id.' class="tt-pricing'.$class.'">';
  $output .=  '<h4 class="tt-pricing-title">'.esc_html($plan).'</h4>';
  $output .=  '<div class="tt-pricing-count">';
  $output .=  '<span class="tt-pricing-top">'.esc_html($currency).'</span>'.esc_html($price).'<span>'.esc_html__('mo', 'marketing-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<ul class="tt-pricing-list">';
  $ex_feature = explode('|', $feature);
  foreach ($ex_feature as $key => $value) {
    $output .=  '<li class="active">'.esc_html($value).'</li>';
  }
  $output .=  '</ul>';
  $output .=  '</div>';


  return $output;
}

add_shortcode('rs_pricing_table', 'rs_pricing_table');



