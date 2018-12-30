<?php
/*
 * Header Section
*/
$sections[] = array(
  'title' => esc_html__('Header', 'marketing'),
  'desc' => esc_html__('Change the header section configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'header-enable-switch-local',
      'type' => 'button_set',
      'title' => esc_html__('Enable Header', 'marketing'),
      'options' => array(
        '1' => 'On',
        '' => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
    ),
    array(
      'id' => 'header-height-switch-local',
      'type' => 'button_set',
      'title' => esc_html__('Header Height', 'marketing'),
      'options' => array(
        '1' => 'On',
        '' => 'Default',
        '0' => 'Off',
      ),
      'default' => '',
      'subtitle' => esc_html__('If on, space will create below header.', 'marketing'),
    ),
    array(
      'id'       => 'header-template-local',
      'type'     => 'select',
      'title'    => esc_html__('Template', 'marketing'),
      'subtitle' => esc_html__('Choose template for navigation header.', 'marketing'),
      'options'  => array(
        'default'                         => esc_html__('Default','marketing'),
        'transparent'                     => esc_html__('Transparent','marketing'),
        'menu-left-with-social-right'     => esc_html__('Menu Left With Social Right','marketing'),
        'menu-right-with-contact-details' => esc_html__('Menu Right With Contact Details','marketing'),
        'menu-right-with-social'          => esc_html__('Menu Right With Social','marketing'),
        'centered-logo-bottom-menu'       => esc_html__('Centered Logo Menu Bottom','marketing'),
      ),
      'default' => '',
      'validate' => '',
    ),
    array(
      'id'       =>'header-btn-text-local',
      'type'     => 'text',
      'title'    => esc_html__('Button Text', 'marketing'),
      'required' => array('header-template-local', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-link-local',
      'type'     => 'text',
      'title'    => esc_html__('Button Link', 'marketing'),
      'required' => array('header-template-local', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-border-color-local',
      'type'     => 'color',
      'title'    => esc_html__('Border Color', 'marketing'),
      'required' => array('header-template-local', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-text-color-local',
      'type'     => 'color',
      'title'    => esc_html__('Text Color', 'marketing'),
      'required' => array('header-template-local', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-hover-bg-color-local',
      'type'     => 'color',
      'title'    => esc_html__('Background Color on Hover', 'marketing'),
      'required' => array('header-template-local', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-hover-text-color-local',
      'type'     => 'color',
      'title'    => esc_html__('Text Color on Hover', 'marketing'),
      'required' => array('header-template-local', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       => 'header-social-icons-category-local',
      'type'     => 'select',
      'title'    => esc_html__('Social Icons Category', 'marketing'),
      'subtitle' => esc_html__('Select desired category', 'marketing'),
      'options'  => marketing_get_terms_assoc('social-site-category'),
      'default'  => '',
      'required'  => array('header-template-local', 'equals', array('menu-left-with-social-right', 'menu-right-with-social')),
    ),
    array(
      'id'       =>'header-contact-details-phone-text-local',
      'type'     => 'text',
      'title'    => esc_html__('Phone Number', 'marketing'),
      'required' => array('header-template-local', 'equals', array('menu-right-with-contact-details')),
    ),
    array(
      'id'       =>'header-contact-details-email-text-local',
      'type'     => 'text',
      'title'    => esc_html__('Email Address', 'marketing'),
      'required' => array('header-template-local', 'equals', array('menu-right-with-contact-details')),
    ),
    array(
      'id'        => 'header-template-color',
      'type'      => 'color',
      'title'     => esc_html__('Header Background Color', 'marketing'),
      'default'   => '',
      'output'    => array('background-color' => '.tt-header')
    ),
    array(
      'id'        => 'header-template-sticky-color',
      'type'      => 'color',
      'title'     => esc_html__('Header Sticky Background Color', 'marketing'),
      'default'   => '',
      'output'    => array('background-color' => '.tt-header.style-2.stick')
    ),
    array(
      'id'=>'header-primary-menu-local',
      'type' => 'select',
      'title' => esc_html__('Primary Menu', 'marketing'),
      'subtitle' => esc_html__('Select a menu to overwrite the header menu location.', 'marketing'),
      'data' => 'menus',
      'default' => '',
    ),

    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => esc_html__('Logo Module Configuration.', 'marketing')
    ),

    array(
      'id'=>'logo-local',
      'type' => 'media',
      'url' => true,
      'title' => esc_html__('Logo', 'marketing'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'marketing'),
    ),
  ), // #fields
);
