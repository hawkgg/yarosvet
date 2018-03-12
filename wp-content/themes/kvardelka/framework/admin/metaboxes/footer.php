<?php
/*
 * Footer Section
*/
$sections[] = array(
  'title' => esc_html__('Footer', 'marketing'),
  'desc' => esc_html__('Change the footer section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'footer-enable-switch-local',
      'type' => 'button_set',
      'title' => esc_html__('Enable Footer', 'marketing'),
      'options' => array(
        '1' => 'On',
        '' => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
    ),
    array(
      'id'        => 'footer-sidebar-1-local',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 1', 'marketing'),
      'subtitle'  => esc_html__('Select custom sidebar', 'marketing'),
      'options'   => marketing_get_custom_sidebars_list(),
      'default'   => '',
    ),
    array(
      'id'        => 'footer-sidebar-2-local',
      'type'      => 'select',
      'title'     => esc_html__('Footer Sidebar 2', 'marketing'),
      'subtitle'  => esc_html__('Select custom sidebar', 'marketing'),
      'options'   => marketing_get_custom_sidebars_list(),
      'default'   => '',
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 style="color:#0073aa;font-weight:700;">'.esc_html__('Footer Logo Module & Social Module', 'marketing').'</h2>'
    ),
    array(
      'id'       =>'footer-logo-local',
      'type'     => 'media',
      'url'      => true,
      'title'    => esc_html__('Logo', 'marketing'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the footer.', 'marketing'),
    ),
    array(
      'id'=>'footer-enable-social-icons-local',
      'type' => 'button_set',
      'title' => esc_html__('Show social icons', 'marketing'),
      'subtitle'=> esc_html__('If on, social icons will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '' => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
    ),
    array(
      'id'       => 'footer-social-icons-category-local',
      'type'     => 'select',
      'title'    => esc_html__('Social Icons Category', 'marketing'),
      'subtitle' => esc_html__('Select desired category', 'marketing'),
      'options'  => marketing_get_terms_assoc('social-site-category'),
      'default'  => '',
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 style="color:#0073aa;font-weight:700;">'.esc_html__('Copyright Configuration', 'marketing').'</h2>'
    ),
    array(
      'id'    =>'footer-copyright-text-local',
      'type'  => 'text',
      'title' => esc_html__('Copyright Text', 'marketing'),
    ),
  ), // #fields
);

























