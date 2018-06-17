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

    case 'type-1': ?>

    <div class="isotope-filter">

    <button type="button" data-filter="*" class="is-checked" >Все</li>

    <?php foreach (get_categories(['child_of' => $category->term_id]) as $category): ?>

      <button type="button" data-filter=".category-<?=$category->slug?>"><?=$category->name?></li>

    <?php endforeach; ?>

    </div>

  <?php
    # code...
    break;

  case 'type-2':?>

    <div class="isotope-filter">

    <select name="" class="isotope-select">

      <option data-filter="*">Все</option>

      <?php foreach (get_categories(['child_of' => $category->term_id]) as $category): ?>

        <option data-filter=".category-<?=$category->slug?>"><?=$category->name?></option>

      <?php endforeach; ?>

    </select>

    </div>

  <?php
    break;

  default:
    # code...
    break;
  }

  return $output;
}

add_shortcode('rs_filter_categories', 'rs_filter_categories');