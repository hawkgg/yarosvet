<?php
/*
 * Title Wrapper Section
*/

$this->sections[] = array(
  'title' => esc_html__('Title Wrapper', 'marketing'),
  'desc' => esc_html__('Change the title wrapper section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'title-wrapper-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Title Wrapper', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'               =>'title-wrapper-background',
      'type'             => 'background',
      'background-color' => false,
      'title'            => esc_html__('Background', 'marketing'),
      'subtitle'         => esc_html__('Title wrapper background, color and other options.', 'marketing'),
      'output' => array(
        'background' => '.tt-topheading.background-block'
      )
    ),
    array(
      'id' => 'title-wrapper-breadcrumbs-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Breadcrumbs', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
  ), // #fields
);
