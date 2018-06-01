<?php
/**
 *
 * RS Space
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_filter_categories($atts) {

  $category = get_category_by_slug( $atts['slug'] );
  $args = array(
    // 'type'                     => 'post',
    'child_of'                 => $category->term_id,
    // 'orderby'                  => 'name',
    // 'order'                    => 'ASC',
    // 'hide_empty'               => FALSE,
    // 'hierarchical'             => 1,
    // 'taxonomy'                 => 'category',
  );


  $output .= '<div class="isotope-filter">';

  $output .=  '<button type="button" data-filter="*" class="is-checked" >Все</li>';

  foreach (get_categories($args) as $category) {
      $output .=  '<button type="button" data-filter=".category-' . $category->slug .'" >' . $category->name . '</li>';
  }

  $output .=  '</div>';

  return $output;
}

add_shortcode('rs_filter_categories', 'rs_filter_categories');
