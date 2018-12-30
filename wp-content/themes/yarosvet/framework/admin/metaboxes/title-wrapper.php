<?php
/*
 * Title Wrapper Section
*/
$sections[] = array(
  'title' => esc_html__('Title Wrapper', 'marketing'),
  'desc' => esc_html__('Change the title wrapper section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id'       => 'title-wrapper-enable-local',
      'type'     => 'button_set',
      'title'    => esc_html__('Enable Title Wrapper', 'marketing'),
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        ''  => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
    ),
    array(
      'id'               =>'title-wrapper-background-local',
      'type'             => 'background',
      'background-color' => false,
      'title'            => esc_html__('Background', 'marketing'),
      'subtitle'         => esc_html__('Title wrapper background, color and other options.', 'marketing'),
      'output' => array(
        'background' => '.tt-topheading.background-block'
      )
    ),
    array(
      'id' => 'title-wrapper-breadcrumbs-enable-local',
      'type'   => 'button_set',
      'title' => esc_html__('Enable Breadcrumbs', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        ''  => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
    ),

  ), // #fields
);
