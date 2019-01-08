<?php
/**
 *
 * Chart
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function rs_countdown_timer( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'     => '',
    'class'  => '',
    'year'   => '',
    'month'  => '',
    'day'    => '',
    'hour'   => '',
    'minute' => '',
    'second' => ''

  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  $data_count_date = '';

  if($year && $month && $day && $hour && $minute && $second) {
    $data_count_date = ' data-countdate="'.esc_attr($year).'-'.esc_attr($month).'-'.esc_attr($day).'T'.esc_attr($hour).':'.esc_attr($minute).':'.esc_attr($second).'"';
  }


  $output  =  '<div '.$id.' class="text-center tt-coming-soon-counter'.$class.'"'.$data_count_date.'>';
  $output .=  '<div>';
  $output .=  '<div class="tt-counter-item">';
  $output .=  '<span class="c-h2 tt-c-days"></span>';
  $output .=  '<div class="tt-divider unique light"></div>';
  $output .=  '<span class="label">'.esc_html__('Days', 'marketing-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<div class="tt-counter-item">';
  $output .=  '<span class="c-h2 tt-c-hours"></span>';
  $output .=  '<div class="tt-divider unique light"></div>';
  $output .=  '<span class="label">'.esc_html__('Hours', 'marketing-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<div class="tt-counter-item">';
  $output .=  '<span class="c-h2 tt-c-minutes"></span>';
  $output .=  '<div class="tt-divider unique light"></div>';
  $output .=  '<span class="label">'.esc_html__('Minutes', 'marketing-addons').'</span>';
  $output .=  '</div>';
  $output .=  '<div class="tt-counter-item">';
  $output .=  '<span class="c-h2 tt-c-seconds"></span>';
  $output .=  '<div class="tt-divider unique light"></div>';
  $output .=  '<span class="label">'.esc_html__('Seconds', 'marketing-addons').'</span>';
  $output .=  '</div>';
  $output .=  '</div>';
  $output .=  '</div>';
  return $output;

}
add_shortcode( 'rs_countdown_timer', 'rs_countdown_timer' );
