<?php
/**
 *
 * RS Accordions
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_accordion( $atts, $content = '', $id = '' ) {

  global $rs_accordion_tabs;
  $rs_accordion_tabs = array();

  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'active' => 1,

  ), $atts ) );

  do_shortcode( wp_kses_data($content ));

  if( empty( $rs_accordion_tabs ) ) { return; }

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  $output =  '<ul '.$id.' class="accordions'.$class.'">';
  foreach ( $rs_accordion_tabs as $key => $tab ) {
    $output .=  '<li class="accordion">';
    $output .=  '<div class="accordion-header">';
    $output .=  '<div class="accordion-icon"></div>';
    $output .=  '<h6>'.esc_html($tab['atts']['title']).'</h6>';
    $output .=  '</div>';
    $output .=  '<div class="accordion-content">';
    $output .=  do_shortcode((wp_kses_data($tab['content'])) );
    $output .=  '</div>';
    $output .=  '</li>';

  }
  $output .=  '</ul>';
  

  $output = '<div class="tt-accordion">';
  foreach ( $rs_accordion_tabs as $key => $tab ) {
    $active_nav = ( ( $key + 1 ) == $active ) ? ' active ' : '';
    $output .=  '<div class="tt-accordion-panel">';
    $output .=  '<div class="tt-accordion-title'.$active_nav.'">'.esc_html($tab['atts']['title']).'<div class="tt-accordion-icon"></div>';
    $output .=  '</div>';
    $output .=  '<div class="tt-accordion-body'.$active_nav.'">';
    $output .=  '<div class="simple-text size-3">';
    $output .=  do_shortcode((wp_kses_data($tab['content'])) );             
    $output .=  '</div>';
    $output .=  '</div>';
    $output .=  '</div>';
    
  }
  $output .=  '</div>';

  return $output;
}

add_shortcode('vc_accordion', 'rs_accordion');


/**
 *
 * RS Accordion
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_accordion_tab( $atts, $content = '', $id = '' ) {
  global $rs_accordion_tabs;
  $rs_accordion_tabs[]  = array( 'atts' => $atts, 'content' => $content );
  return;
}

add_shortcode('vc_accordion_tab', 'rs_accordion_tab');
