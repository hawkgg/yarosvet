<?php
/**
 * Special Content
 */
$labels = array(
    'name'               => esc_html__( 'Special Content', 'marketing-addons' ),
    'singular_name'      => esc_html__( 'Special Content', 'marketing-addons' ),
    'add_new'            => esc_html__( 'Add New','marketing-addons' ),
    'add_new_item'       => esc_html__( 'Add New Item','marketing-addons' ),
    'edit_item'          => esc_html__( 'Edit Item','marketing-addons' ),
    'new_item'           => esc_html__( 'New Item','marketing-addons' ),
    'all_items'          => esc_html__( 'All Items','marketing-addons' ),
    'view_item'          => esc_html__( 'View Item','marketing-addons' ),
    'search_items'       => esc_html__( 'Search Special Content Items','marketing-addons' ),
    'not_found'          => esc_html__( 'No Special Content items found','marketing-addons' ),
    'not_found_in_trash' => esc_html__( 'No Special Content items found in the Trash','marketing-addons' ),
    'parent_item_colon'  => '',
    'menu_name'          => esc_html__( 'Special Content', 'marketing-addons' ),
);

$args = array(
  'labels'        => $labels,
  'public'        => false,
  'show_ui'       => true,
  'menu_position' => 21,
  'supports'      => array( 'title', 'editor' ),
  'has_archive'   => false,
  'rewrite' => array(
    'slug' => 'cpt-special-content'
  )
);
register_post_type( 'special-content', $args );