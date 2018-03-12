<?php
/**
 *
 * RS Tabs
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_featured_tabs( $atts, $content = '', $id = '' ) {

  global $rs_featured_tabs;
  $rs_featured_tabs = array();

  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => 'style1',
    'active'       => 1,
    'accent_color' => '',
    'color'        => '',
    'align'        => ''
  ), $atts ) );

  do_shortcode( $content );

  if( empty( $rs_featured_tabs ) ) { return; }

  $output = '';
  $id     = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class  = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';
  $output = '';

  switch ($style) {
    case 'style1':
      $output .=  '<div '.$id.' class="tt-tab-wrapper type-1'.$class.'">';
      $output .=  '<div class="tt-tab-nav-wrapper">';

      $output .=  '<div class="tt-tab-select">';
      $output .=  '<div class="select-arrow"><i class="fa fa-angle-down"></i></div>';
      $output .=  '<select>';
      
      foreach( $rs_featured_tabs as $key => $tab) {
        $active_nav = ( ( $key + 1 ) == $active ) ? ' selected="" ' : '';
        $title      = esc_html($tab['atts']['title']);
        $output .=  '<option'.$active_nav.'>'.esc_html($title).'</option>';
      }

      $output .=  '</select>';
      $output .=  '</div>';

      $output .=  '<div class="tt-nav-tab mbottom50">';
      foreach( $rs_featured_tabs as $key => $tab) {
        $icon       = ( isset($tab['atts']['icon'])) ? $tab['atts']['icon']:'lnr lnr-chart-bars';
        $title      = esc_html($tab['atts']['title']);
        $active_nav = ( ( $key + 1 ) == $active ) ? ' active ' : '';
        $output     .=  '<div class="tt-nav-tab-item'.$active_nav.'">';
        $output     .=  '<span class="'.marketing_sanitize_html_classes($icon).'"></span>';
        $output     .=  '<span class="tt-analitics-text">'.esc_html($title).'</span>';
        $output     .=  '</div>';
      }

      $output .=  '</div>';
      $output .=  '</div>';

      $output .=  '<div class="tt-tabs-content clearfix mbottom50">';

      foreach( $rs_featured_tabs as $key => $tab) {
        $active_nav = ( ( $key + 1 ) == $active ) ? ' active ' : '';
        $output .=  '<div class="tt-tab-info'.$active_nav.'">';
        $output .= do_shortcode(wp_kses_post($tab['content']));
        $output .=  '</div>';
      }

      $output .=  '</div>';
      $output .=  '</div>';             
      # code...
      break;
      
    case 'style2':
    default:
      $output .=  '<div '.$id.' class="tt-tab-wrapper type-2'.$class.'">';
      $output .=  '<div class="row">';
      $output .=  '<div class="col-md-4">';
      $output .=  '<div class="tt-tab-nav-wrapper">';
      $output .=  '<div class="tt-tab-select">';
      $output .=  '<div class="select-arrow"><i class="fa fa-angle-down"></i></div>';
      $output .=  '<select>';

      foreach( $rs_featured_tabs as $key => $tab) {
        $active_nav = ( ( $key + 1 ) == $active ) ? ' selected="" ' : '';
        $title      = esc_html($tab['atts']['title']);
        $output .=  '<option'.$active_nav.'>'.esc_html($title).'</option>';
      }
                                      
      $output .=  '</select>';                            
      $output .=  '</div>';
      $output .=  '<div class="tt-nav-tab mbottom50">';

      foreach( $rs_featured_tabs as $key => $tab) {
        $title      = esc_html($tab['atts']['title']);
        $active_nav = ( ( $key + 1 ) == $active ) ? ' active ' : '';
        $output .=  '<div class="tt-nav-tab-item'.$active_nav.'">'.esc_html($title).'</div>';
      }

      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';

      $output .=  '<div class="col-md-8">';
      $output .=  '<div class="tt-tabs-content clearfix mbottom50">';

      foreach( $rs_featured_tabs as $key => $tab) {
        $active_nav = ( ( $key + 1 ) == $active ) ? ' active ' : '';
        $output .=  '<div class="tt-tab-info'.$active_nav.'">';
        $output .= do_shortcode(wp_kses_post($tab['content']));                                                        
        $output .=  '</div>';
      }


      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      $output .=  '</div>';
      break;
  }
  return $output;

}
add_shortcode('vc_tta_tabs', 'rs_featured_tabs');

/**
 *
 * RS Tab
 * @version 1.0.0
 * @since 1.0.0
 *
 */
function rs_featured_tab( $atts, $content = '', $id = '' ) {
  global $rs_featured_tabs;
  $rs_featured_tabs[]  = array( 'atts' => $atts, 'content' => $content );
  return;
}
add_shortcode('vc_tta_section', 'rs_featured_tab');
