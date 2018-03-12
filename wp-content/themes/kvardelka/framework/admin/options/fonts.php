<?php
/**
 * Customizer Section
 */

$this->sections[] = array(
  'title' => esc_html__('Fonts', 'marketing'),
  'desc' => esc_html__('Check child sections to style properly the correct area of the theme.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

  ), // #fields
);
/**
* Pagination Section
*/
$this->sections[] = array(
  'title' => esc_html__('Heading', 'marketing'),
  'desc' => esc_html__('Configure heading styles.', 'marketing'),
  'subsection' => true,
  'fields' => array(
    array(
      'id' => 'font-heading',
      'type' => 'typography',
      'title' => esc_html__('Heading', 'marketing'),
      'font-size'=> false,
      'line-height'=> false,
      'text-align' => false,
      'color' => false,
      'output' => array('h1,h2,h3,h4,h5,h6'),
    ),
  ),
);

$this->sections[] = array(
  'title' => esc_html__('Body', 'marketing'),
  'desc' => esc_html__('Configure body styles.', 'marketing'),
  'subsection' => true,
  'fields' => array(
    array(
      'id' => 'font-body',
      'type' => 'typography',
      'title' => esc_html__('Body', 'marketing'),
      'font-size'=> true,
      'line-height'=> true,
      'text-align' => false,
      'color' => false,
      'output' => array('body'),
    ),
  ),
);

