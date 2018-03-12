<?php
/*
 * Custom Code
*/

$this->sections[] = array(
  'title' => esc_html__('Custom CSS', 'marketing'),
  'desc' => esc_html__('Easily add custom CSS to your website.', 'marketing'),
  'icon' => 'el-icon-wrench',
  'fields' => array(

    array(
        'id'       => 'css_editor',
        'type'     => 'ace_editor',
        'title'    => esc_html__('CSS Code', 'marketing'),
        'subtitle' => esc_html__('Insert your custom CSS code right here. It will be displayed globally in the website.', 'marketing'),
        'mode'     => 'css',
        'theme'    => 'monokai',
        'desc'     => '',
        'default'  => ""
    )
  ),
);
