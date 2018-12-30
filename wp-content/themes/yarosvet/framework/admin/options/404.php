<?php
/*
 * Title Wrapper Section
*/

$this->sections[] = array(
  'title' => esc_html__('404 Page', 'marketing'),
  'desc' => esc_html__('Change the title wrapper section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(
    array(
      'id'=>'page404-content',
      'type' => 'textarea',
      'title' => esc_html__('Content', 'marketing'),
      'subtitle' => esc_html__('Content for 404 page.', 'marketing'),
    ),
  ), // #fields
);
