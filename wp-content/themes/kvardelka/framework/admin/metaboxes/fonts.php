<?php



/*
 * Fonts Section
*/
$sections[] = array(
  'title' => esc_html__('Fonts', 'marketing'),
  'desc' => esc_html__('Change the font configuration.', 'marketing'),
  'icon' => 'el-icon-cog',
  'fields' => array(

    array(
      'id' => 'font-heading-local',
      'type' => 'typography',
      'title' => esc_html__('Heading', 'marketing'),
      'font-size'=> false,
      'line-height'=> false,
      'text-align' => false,
      'color' => false,
      'output' => array('h1,h2,h3,h4,h5,h6'),
    ),
    array(
      'id' => 'font-body-local',
      'type' => 'typography',
      'title' => esc_html__('Body', 'marketing'),
      'font-size'=> true,
      'line-height'=> true,
      'text-align' => false,
      'color' => false,
      'output' => array('body'),
    ),
  ), // #fields
);



