<?php
/*
 * Social site
*/

$sections[] = array(
  'icon' => 'el-icon-magic',
  'fields' => array(
    array(
      'id'        => 'team-position',
      'type'      => 'text',
      'title'     => esc_html__('Position', 'marketing'),
    ),
    array(
      'id'        => 'team-link',
      'type'      => 'text',
      'title'     => esc_html__('External Link', 'marketing'),
    ),
    array(
      'id'        => 'team-facebook',
      'type'      => 'text',
      'title'     => esc_html__('Facebook', 'marketing'),
      'default'		=> '#'
    ),
    array(
      'id'        => 'team-twitter',
      'type'      => 'text',
      'title'     => esc_html__('Twitter', 'marketing'),
      'default'		=> '#'
    ),
    array(
      'id'        => 'team-instagram',
      'type'      => 'text',
      'title'     => esc_html__('Instagram', 'marketing'),
      'default'		=> '#'
    ),
    array(
      'id'        => 'team-linkedin',
      'type'      => 'text',
      'title'     => esc_html__('Linkedin', 'marketing'),
      'default'		=> '#'
    ),
  )
);
