<?php
/*
 * Header Section
*/
$sections[] = array(
  'title' => esc_html__('General', 'marketing'),
  'desc' => esc_html__('Change the general section of theme configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id'        => 'theme-skin-local',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Theme Skin', 'marketing'),
      'subtitle'  => esc_html__('Select theme skin color.', 'marketing'),
      'options'   => array(
        'theme-default' => esc_html__('Default', 'marketing'),
        'theme-orange'  => esc_html__('Orange', 'marketing'),
        'theme-accent'  => esc_html__('Accent', 'marketing'),
      ),
      'default'   => '',
    ),
    array(
      'id'        => 'theme-skin-accent-first-local',
      'type'      => 'color',
      'title'     => esc_html__('Accent First Color', 'marketing'),
      'desc'     => esc_html__( 'This color is main color.', 'marketing' ),
      'default'   => '',
      'required'  => array('theme-skin-local', 'equals', array('theme-accent')),
    ),
    array(
      'id'        => 'theme-skin-accent-second-local',
      'type'      => 'color',
      'title'     => esc_html__('Accent Second Color', 'marketing'),
      'desc'     => esc_html__( 'This color is secondary color, used for button shadow, border, box shadow.', 'marketing' ),
      'default'   => '',
      'required'  => array('theme-skin-local', 'equals', array('theme-accent')),
    ),
  ), // #fields
);
