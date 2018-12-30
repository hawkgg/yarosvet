<?php
/**
 * Customizer Section
 */

$this->sections[] = array(
  'title' => esc_html__('Customizer', 'marketing'),
  'desc' => esc_html__('Check child sections to style properly the correct area of the theme.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

  ), // #fields
);

/**
* Content Section
*/
$this->sections[] = array(
  'title' => esc_html__('Menu', 'marketing'),
  'desc' => esc_html__('Configure menu styles.', 'marketing'),
  'subsection' => true,
  'fields' => array(
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 style="color:#0073aa;">'.esc_html__('Main Header Settings', 'marketing').'</h2>'
    ),
    array(
      'id'        => 'customizer-main-menu-item-color',
      'type'      => 'color',
      'title'     => esc_html__('Main Menu Item Color', 'marketing'),
      'default'   => '',
      'output'    => array('color' => '.tt-header .main-nav > ul > li > a')
    ),
    array(
      'id'        => 'customizer-main-menu-item-hover-color',
      'type'      => 'color',
      'title'     => esc_html__('Main Menu Item Hover Color', 'marketing'),
      'default'   => '',
      'output'    => array('color' => '.tt-header .main-nav > ul > li > a:hover')
    ),
    array(
      'id'        => 'customizer-sub-menu-item-color',
      'type'      => 'color',
      'title'     => esc_html__('Sub Menu Item Color', 'marketing'),
      'default'   => '',
      'output'    => array('color' => '.tt-header .main-nav > ul > li > ul > li > a')
    ),
    array(
      'id'        => 'customizer-sub-menu-item-hover-color',
      'type'      => 'color',
      'title'     => esc_html__('Sub Menu Item Hover Color', 'marketing'),
      'default'   => '',
      'output'    => array('color' => '.tt-header .main-nav > ul > li > ul > li > a:hover')
    ),
    array(
      'id'        => 'customizer-sub-menu-item-hover-background-color',
      'type'      => 'color',
      'title'     => esc_html__('Sub Menu Item Hover Background Color', 'marketing'),
      'default'   => '',
      'output'    => array('background-color' => '.tt-header .main-nav > ul > li > ul > li > a:hover')
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 style="color:#0073aa;">'.esc_html__('Header Settings', 'marketing').'</h2>'
    ),
    array(
      'id'        => 'customizer-header-bg-color',
      'type'      => 'color',
      'title'     => esc_html__('Header Background Color', 'marketing'),
      'default'   => '',
      'output'    => array('background-color' => '.tt-header')
    ),
  ),
);

/**
* Category Section
*/
$this->sections[] = array(
  'title' => esc_html__('Global', 'marketing'),
  'desc' => esc_html__('Configure global element styles.', 'marketing'),
  'subsection' => true,
  'fields' => array(
    array(
      'id'        => 'customizer-global-link-color',
      'type'      => 'color',
      'title'     => esc_html__('Heading Color', 'marketing'),
      'default'   => '',
      'output'    => array('color' => 'h1, h2,h3,h4,h5,h6,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.c-h2,.c-h1,.c-h3,.c-h4,.c-h5,.c-h6')
    ),
    array(
      'id'        => 'customizer-global-content-color',
      'type'      => 'color',
      'title'     => esc_html__('Content Color', 'marketing'),
      'default'   => '',
      'output'    => array('color' => 'p, .simple-text p')
    ),
  ),
);
