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
    'style'         => 'links',
    'is_hashing'    => '0',
    'id_cat'        => '0',
    'class_target'  => 'isotope',
  ), $atts));

  $class = ( $class ) ? ' ' . $class : '';

  $categories = get_categories(['child_of' => $id_cat]);


  switch ($style) {

    case 'links':

      $output = '<div class="isotope-filter '.$class.'" id="'.$id.'" data-target=".'.$class_target.'" data-is-hashing="'.$is_hashing.'">';

      $output .= '<button type="button" data-filter="*" class="is-checked" >Все</li>';

      foreach ($categories as $category) {
        $output .= '<button type="button" data-filter=".category-'.$category->slug.'">'.$category->name.'</li>';
      }

      $output .= '</div>';

    break;

    case 'select':

      $output .= '<div class="isotope-filter '.$class.'" id="'.$id.'" data-target=".'.$class_target.'" data-is-hashing="'.$is_hashing.'">';

      $output .= '<select name="" class="isotope-select form-control">';

        $output .= '<option disabled selected>Выберите категорию</option>';
        $output .= '<option data-filter="*">Все</option>';

        foreach ($categories as $category) {
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