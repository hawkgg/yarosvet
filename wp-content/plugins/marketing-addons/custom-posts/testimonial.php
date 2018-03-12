<?php
/**
 * Testimonial custom posty type
 */
$labels = array(
  'name'               => esc_html__( 'Testimonials', 'marketing-addons' ),
  'singular_name'      => esc_html__( 'Testimonial', 'marketing-addons' ),
  'add_new'            => esc_html__( 'Add New', 'marketing-addons' ),
  'add_new_item'       => esc_html__( 'Add New Testimonials', 'marketing-addons' ),
  'edit_item'          => esc_html__( 'Edit Testimonials', 'marketing-addons' ),
  'new_item'           => esc_html__( 'New Testimonials', 'marketing-addons' ),
  'all_items'          => esc_html__( 'All Testimonials', 'marketing-addons' ),
  'view_item'          => esc_html__( 'View Testimonials', 'marketing-addons' ),
  'search_items'       => esc_html__( 'Search Testimonials', 'marketing-addons' ),
  'not_found'          => esc_html__( 'No Testimonials found', 'marketing-addons' ),
  'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash', 'marketing-addons' ),
  'parent_item_colon'  => '',
  'menu_name'          => esc_html__( 'Testimonials', 'marketing-addons' )
);

 $args = array(
  'labels'        => $labels,
  'public'        => false,
  'show_ui'       => true,
  'menu_position' => 30,
  'supports'      => array( 'title', 'thumbnail', 'editor' ),
  'has_archive'   => true,
   'rewrite' => array(
    'slug' => 'cpt-testimonial'
  )
);

register_post_type ( 'testimonial', $args);

/**
 * Testimonial category
 */

$labels = array(
  'name'              => _x( 'Categories', 'taxonomy general name', 'marketing-addons' ),
  'singular_name'     => _x( 'Category', 'taxonomy singular name', 'marketing-addons' ),
  'search_items'      => esc_html__( 'Search categories', 'marketing-addons' ),
  'all_items'         => esc_html__( 'All Categories', 'marketing-addons' ),
  'parent_item'       => esc_html__( 'Parent Category', 'marketing-addons' ),
  'parent_item_colon' => esc_html__( 'Parent Category:', 'marketing-addons' ),
  'edit_item'         => esc_html__( 'Edit Category', 'marketing-addons' ),
  'update_item'       => esc_html__( 'Update Category', 'marketing-addons' ),
  'add_new_item'      => esc_html__( 'Add New Category', 'marketing-addons' ),
  'new_item_name'     => esc_html__( 'New Category Name', 'marketing-addons' ),
  'menu_name'         => esc_html__( 'Categories' ),
);
$args = array(
  'labels' => $labels,
  'hierarchical' => true,
);
register_taxonomy( 'testimonial-category', 'testimonial', $args );
