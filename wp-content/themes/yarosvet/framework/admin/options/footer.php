<?php
/*
 * Footer Section
*/
$this->sections[] = array(
  'title' => esc_html__('Footer', 'marketing'),
  'desc' => esc_html__('Change the footer section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'footer-enable-switch',
      'type' => 'switch',
      'title' => esc_html__('Enable Footer', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
    ),
    array(
      'id'        => 'footer-sidebar-1',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 1', 'marketing'),
      'subtitle'  => esc_html__('Select custom sidebar', 'marketing'),
      'options'   => marketing_get_custom_sidebars_list(),
      'default'   => '',
    ),
    array(
      'id'        => 'footer-sidebar-2',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 2', 'marketing'),
      'subtitle'  => esc_html__('Select custom sidebar', 'marketing'),
      'options'   => marketing_get_custom_sidebars_list(),
      'default'   => '',
    ),
    array(
      'id'        => 'footer-sidebar-3',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 3', 'marketing'),
      'subtitle'  => esc_html__('Select custom sidebar', 'marketing'),
      'options'   => marketing_get_custom_sidebars_list(),
      'default'   => '',
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 style="color:#0073aa;font-weight:700;">'.esc_html__('Copyright Configuration', 'marketing').'</h2>'
    ),
    array(
      'id'    =>'footer-copyright-text',
      'type'  => 'text',
      'title' => esc_html__('Copyright Text', 'marketing'),
    ),
  ), // #fields
);

