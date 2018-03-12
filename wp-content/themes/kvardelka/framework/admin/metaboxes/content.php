<?php
/*
 * Content Section
*/

$sections[] = array(
  'title' => esc_html__('Content', 'marketing'),
  'desc' => esc_html__('Change the content section configuration.', 'marketing'),
  'icon' => 'el-icon-lines',
  'fields' => array(
    array(
      'id'        => 'page-margin',
      'type'      => 'select',
      'title'     => esc_html__('Content Margin', 'marketing'),
      'subtitle'  => esc_html__('Select desired margin for the content', 'marketing'),
      'options'   => array(
        'pt-100 pb-100' => esc_html__('Top & bottom margin', 'marketing'),
        'pt-100'        => esc_html__('Only top margin', 'marketing'),
        'pb-100'        => esc_html__('Only bottom margin', 'marketing'),
        'no-margin'     => esc_html__('No margin', 'marketing'),
      ),
      'default' => 'pt-100 pb-100',
    ),
    array(
      'id'       => 'page-show-special-content-after-content',
      'type'     => 'switch', 
      'title'    => esc_html__('Show Special Content After Page Content', 'marketing'),
      'subtitle' => esc_html__('If on, selected page content will be displayed after content.', 'marketing'),
      'default'  => 0,
    ),
    
    array(
      'id'       => 'page-after-special-content',
      'type'     => 'select',
      'title'    => esc_html__('Special Content Displayed After Content', 'marketing'),
      'subtitle' => esc_html__('Select special content item to be displayed after page content', 'marketing'),
      'options'  => marketing_get_special_content_array(),
      'default'  => '',
      'required' => array('page-show-special-content-after-content' ,'=', '1')
    ),
  ),
);
