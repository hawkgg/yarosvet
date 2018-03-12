<?php
/**
 * Social sites
 */
$labels = array(
  'name'               => esc_html__( 'Social Sites', 'marketing-addons' ),
  'singular_name'      => esc_html__( 'Social Site', 'marketing-addons' ),
  'add_new'            => esc_html__( 'Add New','marketing-addons' ),
  'add_new_item'       => esc_html__( 'Add New Social Site','marketing-addons' ),
  'edit_item'          => esc_html__( 'Edit Social Site','marketing-addons' ),
  'new_item'           => esc_html__( 'New Social Site','marketing-addons' ),
  'all_items'          => esc_html__( 'All Social Sites','marketing-addons' ),
  'view_item'          => esc_html__( 'View Social Site','marketing-addons' ),
  'search_items'       => esc_html__( 'Search Social Sites','marketing-addons' ),
  'not_found'          => esc_html__( 'No Social Sites found','marketing-addons' ),
  'not_found_in_trash' => esc_html__( 'No Social Sites found in the Trash','marketing-addons' ),
  'parent_item_colon'  => '',
  'menu_name'          => esc_html__( 'Social Sites', 'marketing-addons' ),
);

$args = array(
  'labels'        => $labels,
  'public'        => false,
  'show_ui'       => true,
  'menu_position' => 21,
  'supports'      => array( 'title', 'page-attributes' ),
  'has_archive'   => false,
  'rewrite' => array(
    'slug' => 'cpt-social-site'
  )
);
register_post_type( 'social-site', $args );

/**
 * Social sie category
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
register_taxonomy( 'social-site-category', 'social-site', $args );

/**
 * Social sites - replace "enter title here" with "enter url here" when adding new site
 */
function rs_custom_post_social_sites_change_title( $title ){
  $screen = get_current_screen();

  if  ( 'social-site' == $screen->post_type ) {
    $title = esc_html__('http:// Enter URL here', 'marketing-addons');
  }
  return $title;
}
add_filter( 'enter_title_here', 'rs_custom_post_social_sites_change_title' );

/**
 * Social Site special columns head
 * @param type $defaults
 * @return type
 */
function rs_social_site_columns_head($defaults) {
    $defaults['social_site'] = esc_html__('Social Site', 'marketing-addons');
    $defaults['social_site_categories'] = esc_html__('Categories', 'marketing-addons');
    $defaults['menu_order'] = esc_html__('Order', 'marketing-addons');
    return $defaults;
}

/**
 * Social site special columns content
 * @param type $column_name
 * @param type $post_ID
 */
function rs_social_site_columns_content($column_name, $post_ID) {

  global $post;

  if ($column_name == 'social_site') {
    echo str_replace('fa-', '', get_post_meta( $post_ID, 'icon', true ));
  } else if ($column_name == 'menu_order') {
    $order = $post->menu_order;
    echo intval($order);
  } else if ($column_name == 'social_site_categories') {
    $categories = get_the_terms($post_ID,'social-site-category');
    if (is_array($categories)) {
      $categories_output = array();
      foreach($categories as $key => $category) {
        $edit_link = get_term_link($category,'social-site-category');
        $categories_output[$key] = '<a href="'.esc_url($edit_link).'">' . $category->name . '</a>';
      }
      echo implode(' | ',$categories_output);
    }
  }
}

add_filter( 'manage_edit-social-site_columns', 'rs_social_site_columns_head' ) ;
add_action('manage_social-site_posts_custom_column', 'rs_social_site_columns_content', 10, 2);
