<?php
/**
 * Page Template Blog
 */

$sections[] = array(
  'icon' => 'el-icon-screen',
  'fields' => array(
    array(
      'id'=>'testimonial-author',
      'type' => 'text',
      'title' => esc_html__('Author Name', 'marketing'),
    ),
    array(
      'id'=>'testimonial-position',
      'type' => 'text',
      'title' => esc_html__('Position', 'marketing'),
    ),
  )
);
