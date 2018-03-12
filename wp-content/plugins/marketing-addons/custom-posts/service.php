<?php
/**
 * Service custom posty type
 */
$labels = array(
  'name'               => _x( 'Service', 'Items','marketing-addons' ),
  'singular_name'      => _x( 'Service', 'Item','marketing-addons' ),
  'add_new'            => _x( 'Add New', 'Item','marketing-addons' ),
  'add_new_item'       => esc_html__( 'Add New Item','marketing-addons' ),
  'edit_item'          => esc_html__( 'Edit Item','marketing-addons' ),
  'new_item'           => esc_html__( 'New Item','marketing-addons' ),
  'all_items'          => esc_html__( 'All Items','marketing-addons' ),
  'view_item'          => esc_html__( 'View Item','marketing-addons' ),
  'search_items'       => esc_html__( 'Search Items','marketing-addons' ),
  'not_found'          => esc_html__( 'No Items found','marketing-addons' ),
  'not_found_in_trash' => esc_html__( 'No Items found in the Trash','marketing-addons' ),
  'parent_item_colon'  => '',
  'menu_name'          => esc_html__('Services', 'marketing-addons')
);
$args = array(
  'labels'        => $labels,
  'description'   => esc_html__('Holds our products and product specific data', 'marketing-addons'),
  'public'        => true,
  'menu_position' => 21,
  'supports'      => array( 'title', 'thumbnail','editor', 'excerpt' ),
  'has_archive'   => true,

);
register_post_type( 'service', $args );

/**
 * Service category
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
register_taxonomy( 'service-category', 'service', $args );
