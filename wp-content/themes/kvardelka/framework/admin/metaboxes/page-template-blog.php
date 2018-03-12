<?php
/**
 * Page Template Blog
 */
$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'        => 'blog-posts-per-page',
      'type'      => 'text',
      'title'     => esc_html__('Posts per page', 'marketing'),
      'subtitle'  => esc_html__('The number of items to show.', 'marketing'),
      'default'   => '',
    ),
    array(
      'id'       => 'blog-enable-pagination',
      'type'     => 'switch',
      'title'    => esc_html__('Enable pagination', 'marketing'),
      'subtitle' => esc_html__('If on pagination will be enabled.', 'marketing'),
      'options'  => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'        => 'blog-category',
      'type'      => 'select',
      'title'     => esc_html__('Categories', 'marketing'),
      'subtitle'  => esc_html__('Select desired categories', 'marketing'),
      'options'   => marketing_element_values_page( 'categories', array(
        'sort_order'  => 'ASC',
        'hide_empty'  => false,
      ) ),
      'multi'     => true,
      'default' => '',
    ),
    array(
      'id'        => 'blog-exclude-posts',
      'type'      => 'text',
      'title'     => esc_html__('Excluded blog items', 'marketing'),
      'subtitle'  => esc_html__('Post IDs you want to exclude, separated by commas eg. 120,123,1005', 'marketing'),
      'default'   => '',
    ),
  )
);
