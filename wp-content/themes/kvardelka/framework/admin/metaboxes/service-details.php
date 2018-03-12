<?php
/*
 * Portfolio details
*/

$sections[] = array(
  'icon' => 'el-icon-align-justify',
  'title' => esc_html__('Project details', 'marketing'),
  'fields' => array(
    array(
      'id'=>'service-featured-img',
      'type' => 'media',
      'url' => true,
      'title' => esc_html__('Featured Image', 'marketing'),
      'subtitle' => esc_html__('Upload the image that will be displayed in the service single page.', 'marketing'),
    ),
    array(
      'id'       => 'service-date-enable',
      'type'     => 'switch',
      'title'    => esc_html__('Enable Date', 'marketing'),
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'       => 'service-client-enable',
      'type'     => 'switch',
      'title'    => esc_html__('Enable Client', 'marketing'),
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'        => 'service-client',
      'type'      => 'text',
      'title'     => esc_html__('Client', 'marketing'),
      'subtitle'  => esc_html__('Your client name.', 'marketing'),
      'default'   => '',
    ),
  ), // #fields
);
