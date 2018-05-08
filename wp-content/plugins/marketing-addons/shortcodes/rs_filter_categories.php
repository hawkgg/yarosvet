<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_filter_categories() {

  $output .= '<div class="iso-nav">';
  $output .= '<ul>';

  foreach (get_categories() as $category) {
      $output .=  '<li data-filter=".' . $category->slug .'" >' . $category->name . '</li>';
  }

  $output .=  '</ul>';
  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_filter_categories', 'rs_filter_categories');
