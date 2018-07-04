<?php
/**
 *
 * RS filter categories
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_filter_categories($atts) {
  extract(shortcode_atts(array(
    'id'            => '',
    'class'         => '',
    'style'         => 'type-1',
  ), $atts));

  $class = ( $class ) ? ' ' .$class : '';

  $category = get_category_by_slug( $atts['slug'] );

  switch ($style) {

    case 'type-1':

      $output = '<div class="isotope-filter">';

      $output .= '<button type="button" data-filter="*" class="is-checked" >Все</li>';

      foreach (get_categories(['child_of' => $category->term_id]) as $category) {
        $output .= '<button type="button" data-filter=".category-'.$category->slug.'">'.$category->name.'</li>';
      }

      $output .= '</div>';

    break;

    case 'type-2':

      $output .= '<div class="isotope-filter">';

      $output .= '<select name="" class="isotope-select form-control">';

        $output .= '<option disabled selected>Выберите категорию</option>';
        $output .= '<option data-filter="*">Все</option>';

        foreach (get_categories(['child_of' => $category->term_id]) as $category) {
          $output .= '<option data-filter=".category-'.$category->slug.'">'.$category->name.'</option>';
        }

      $output .= '</select>';

      $output .= '</div>';

    break;

  default:
    # code...
    break;
  }

  return $output;
}

add_shortcode('rs_filter_categories', 'rs_filter_categories');