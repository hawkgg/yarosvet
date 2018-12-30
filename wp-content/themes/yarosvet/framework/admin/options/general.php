<?php
/*
 * General Section
*/
$this->sections[] = array(
  'title' => esc_html__('General', 'marketing'),
  'desc' => esc_html__('Configure general styles.', 'marketing'),
  'subsection' => true,
  'fields'  => array(
    array(
      'id' => 'general-loader-enable-switch',
      'type' => 'switch',
      'title' => esc_html__('Enable Loader', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
      'subtitle' => esc_html__('If on, this layout part will be displayed.', 'marketing'),
    ),
    array(
      'id'        => 'theme-skin',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Theme Skin', 'marketing'),
      'subtitle'  => esc_html__('Select theme skin color.', 'marketing'),
      'options'   => array(
        'theme-default' => esc_html__('Default', 'marketing'),
        'theme-orange'  => esc_html__('Orange', 'marketing'),
        'theme-accent'  => esc_html__('Accent', 'marketing'),
      ),
      'default'   => 'theme-default',
    ),
    array(
      'id'        => 'theme-skin-accent-first',
      'type'      => 'color',
      'title'     => esc_html__('Accent First Color', 'marketing'),
      'desc'     => esc_html__( 'This color is main color.', 'marketing' ),
      'default'   => '',
      'required'  => array('theme-skin', 'equals', array('theme-accent')),
    ),
    array(
      'id'        => 'theme-skin-accent-second',
      'type'      => 'color',
      'title'     => esc_html__('Accent Second Color', 'marketing'),
      'desc'     => esc_html__( 'This color is secondary color, used for button shadow, border, box shadow.', 'marketing' ),
      'default'   => '',
      'required'  => array('theme-skin', 'equals', array('theme-accent')),
    ),
    array(
      'id'        => 'main-layout',
      'type'      => 'select',
      'compiler'  => true,
      'title'     => esc_html__('Main Layout', 'marketing'),
      'subtitle'  => esc_html__('Select main content and sidebar alignment. Choose between 1 or 2 column layout.', 'marketing'),
      'options'   => array(
        'default'       => esc_html__('1 Column', 'marketing'),
        'left_sidebar'  => esc_html__('2 - Columns Left', 'marketing'),
        'right_sidebar' => esc_html__('2 - Columns Right', 'marketing'),
      ),
      'default'   => 'default',
    ),
    array(
      'id'        => 'sidebar',
      'type'      => 'select',
      'title'     => esc_html__('Sidebar', 'marketing'),
      'subtitle'  => esc_html__('Select custom sidebar', 'marketing'),
      'options'   => marketing_get_custom_sidebars_list(),
      'default'   => '',
      'required'  => array('main-layout', 'equals', array('left_sidebar', 'right_sidebar')),
    ),
    array(
      'id'       => 'custom-sidebars',
      'type'     => 'multi_text',
      'title'    => esc_html__( 'Custom Sidebars', 'marketing' ),
      'subtitle' => esc_html__( 'Custom sidebars can be assigned to any page or post.', 'marketing' ),
      'desc'     => esc_html__( 'You can add as many custom sidebars as you need.', 'marketing' )
    ),
  ),
);



