<?php
/**
 * Page Template Service
 */
$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'        => 'service-posts-per-page',
      'type'      => 'text',
      'title'     => esc_html__('Posts per page', 'marketing'),
      'subtitle'  => esc_html__('The number of items to show.', 'marketing'),
      'default'   => '',
    ),
    array(
      'id'       => 'service-enable-filter',
      'type'     => 'button_set',
      'title'    => esc_html__('Enable Filter', 'marketing'),
      'subtitle' => esc_html__('If on filter will be enabled.', 'marketing'),
      'options'  => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'        => 'service-category',
      'type'      => 'select',
      'title'     => esc_html__('Categories', 'marketing'),
      'subtitle'  => esc_html__('Select desired categories', 'marketing'),
      'options'   => marketing_element_values_page( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'service-category',
        'hide_empty'  => false,
      ) ),
      'multi'     => true,
      'default' => '',
    ),
    array(
      'id'        => 'service-exclude-posts',
      'type'      => 'text',
      'title'     => esc_html__('Excluded blog items', 'marketing'),
      'subtitle'  => esc_html__('Post IDs you want to exclude, separated by commas eg. 120,123,1005', 'marketing'),
      'default'   => '',
    ),
  )
);
