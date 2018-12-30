<?php
/*
 * Header Section
*/
$this->sections[] = array(
  'title' => esc_html__('Header', 'marketing'),
  'desc' => esc_html__('Change the header section configuration.', 'marketing'),
  'fields' => array(
    array(
      'id'    => 'header-enable-switch',
      'type'  => 'switch',
      'title' => esc_html__('Enable Header', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default'  => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
    ),
    array(
      'id'    => 'header-height-switch',
      'type'  => 'switch',
      'title' => esc_html__('Header Height', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default'  => '1',
      'subtitle' => esc_html__('If on, space will create below header.', 'marketing'),
    ),
    array(
      'id'       => 'header-template',
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
      'default'  => 'default',
      'validate' => 'not_empty',
    ),
    array(
      'id'       =>'header-primary-menu',
      'type'     => 'select',
      'title'    => esc_html__('Primary Menu', 'marketing'),
      'subtitle' => esc_html__('Select a menu to overwrite the header menu location.', 'marketing'),
      'data'     => 'menus',
      'default'  => '',
    ),
    array(
      'id'       => 'header-social-icons-category',
      'type'     => 'select',
      'title'    => esc_html__('Social Icons Category', 'marketing'),
      'subtitle' => esc_html__('Select desired category', 'marketing'),
      'options'  => marketing_get_terms_assoc('social-site-category'),
      'default'  => '',
      'required'  => array('header-template', 'equals', array('menu-left-with-social-right', 'menu-right-with-social')),
    ),
    array(
      'id'       =>'header-contact-details-phone-text',
      'type'     => 'text',
      'title'    => esc_html__('Phone Number', 'marketing'),
      'default'  => esc_html__('+123-745-12', 'marketing'),
      'required' => array('header-template', 'equals', array('menu-right-with-contact-details')),
    ),
    array(
      'id'       =>'header-contact-details-email-text',
      'type'     => 'text',
      'title'    => esc_html__('Email Address', 'marketing'),
      'default'  => esc_html__('hello@marketingpro.com', 'marketing'),
      'required' => array('header-template', 'equals', array('menu-right-with-contact-details')),
    ),
    array(
      'id'   => 'random-number',
      'type' => 'info',
      'desc' => '<h3 style="color:#008bce;">Header Button Configuration.</h3>',
    ),
    array(
      'id'       =>'header-btn-text',
      'type'     => 'text',
      'title'    => esc_html__('Button Text', 'marketing'),
      'default'  => esc_html__('Get Access', 'marketing'),
      'required' => array('header-template', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-link',
      'type'     => 'text',
      'title'    => esc_html__('Button Link', 'marketing'),
      'default'  => esc_html__('#', 'marketing'),
      'required' => array('header-template', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-border-color',
      'type'     => 'color',
      'title'    => esc_html__('Border Color', 'marketing'),
      'required' => array('header-template', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-text-color',
      'type'     => 'color',
      'title'    => esc_html__('Text Color', 'marketing'),
      'required' => array('header-template', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-hover-bg-color',
      'type'     => 'color',
      'title'    => esc_html__('Background Color on Hover', 'marketing'),
      'required' => array('header-template', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'       =>'header-btn-hover-text-color',
      'type'     => 'color',
      'title'    => esc_html__('Text Color on Hover', 'marketing'),
      'required' => array('header-template', 'equals', array('default', 'transparent')),
    ),
    array(
      'id'   => 'random-number',
      'type' => 'info',
      'desc' => '<h3 style="color:#008bce;">Logo Module Configuration.</h3>',
    ),
    array(
      'id'       =>'logo',
      'type'     => 'media',
      'url'      => true,
      'title'    => esc_html__('Logo', 'marketing'),
      'subtitle' => esc_html__('Upload the logo that will be displayed in the header.', 'marketing'),
    ),
    array(
      'id'      => 'header-logo-width',
      'type'    => 'text',
      'title'   => esc_html__('Logo Width', 'marketing'),
      'default' => '',
      'desc'    => esc_html__('Optional : Enter the logo width in pixel for e.g 150px.', 'marketing')
    ),
    array(
      'id'      => 'header-logo-height',
      'type'    => 'text',
      'title'   => esc_html__('Logo Height', 'marketing'),
      'default' => '',
      'desc'    => esc_html__('Optional : Enter the logo width in pixel for e.g 150px.', 'marketing')
    ),
  ), 
);
