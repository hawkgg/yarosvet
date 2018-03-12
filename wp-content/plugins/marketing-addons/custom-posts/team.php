<?php
/**
 * Team custom post type
 */
$labels = array(
  'name'               => _x( 'Team', 'Team','marketing-addons' ),
  'singular_name'      => _x( 'Team', 'Team','marketing-addons' ),
  'add_new'            => _x( 'Add New', 'Team','marketing-addons' ),
  'add_new_item'       => esc_html__( 'Add New Team Member','marketing-addons' ),
  'edit_item'          => esc_html__( 'Edit Team Memeber','marketing-addons' ),
  'new_item'           => esc_html__( 'New Team Member','marketing-addons' ),
  'all_items'          => esc_html__( 'All Team Memebers','marketing-addons' ),
  'view_item'          => esc_html__( 'View Team','marketing-addons' ),
  'search_items'       => esc_html__( 'Search Team Member','marketing-addons' ),
  'not_found'          => esc_html__( 'No Member found','marketing-addons' ),
  'not_found_in_trash' => esc_html__( 'No Team Member found in the Trash','marketing-addons' ),
  'parent_item_colon'  => '',
  'menu_name'          => esc_html__('Team', 'marketing-addons')
);
$args = array(
  'labels'        => $labels,
  'public'        => false,
  'show_ui'       => true,
  'menu_position' => 21,
  'supports'      => array( 'title', 'thumbnail', 'editor' ),
  'has_archive'   => true,
  'rewrite' => array(
    'slug' => 'cpt-team'
  )
);
register_post_type( 'team', $args );
