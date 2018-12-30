<?php
/*
 * Footer Section
*/
$this->sections[] = array(
  'title' => esc_html__('Auto Updater', 'marketing'),
  'desc' => esc_html__('Change the auto update section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(
    array(
      'id'    =>'envato_username',
      'type'  => 'text',
      'title' => esc_html__('Envato Username', 'marketing'),
    ),
    array(
      'id'    =>'envato_apikey',
      'type'  => 'text',
      'title' => esc_html__('Envato API Key', 'marketing'),
    ),
  ), // #fields
);

