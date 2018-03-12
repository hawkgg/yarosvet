<?php
/*
 * Advanced
*/
$this->sections[] = array(
  'title' => esc_html__('Blog Single Posts', 'marketing'),
  'desc' => esc_html__('Blog single posts confugration.', 'marketing'),
  'fields' => array(
    array(
      'id' => 'single-post-social-share-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Social Share', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id' => 'single-post-comments-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Comments', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id' => 'single-post-author-box-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Author Box', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id' => 'random-number',
      'type' => 'info',
      'desc' => '<h2 style="color:#0073aa;">'.esc_html__('Blog Newsletter', 'marketing').'</h2>',
    ),
    array(
      'id' => 'single-post-subscribe-enable',
      'type'   => 'switch',
      'title' => esc_html__('Enable Newsletter', 'marketing'),
      'subtitle'=> esc_html__('If on, this layout part will be displayed.', 'marketing'),
      'options' => array(
        '1' => 'On',
        '0' => 'Off',
      ),
      'default' => '1',
    ),
    array(
      'id'       =>'single-post-newsletter-image',
      'type'     => 'media',
      'url'      => true,
      'title'    => esc_html__('Image', 'marketing'),
      'subtitle' => esc_html__('Upload image for newsletter subscriber.', 'marketing'),
    ),
    array(
      'id'        => 'single-post-newsletter-big-heading',
      'type'      => 'text',
      'title'     => esc_html__('Big Heading', 'marketing'),
      'subtitle'  => '',
      'default'   => '',
    ),

    array(
      'id'        => 'single-post-newsletter-small-heading',
      'type'      => 'text',
      'title'     => esc_html__('Small Heading', 'marketing'),
      'subtitle'  => '',
      'default'   => '',
    ),
    array(
      'id'        => 'single-post-newsletter-email-field',
      'type'      => 'text',
      'title'     => esc_html__('Email Placeholder', 'marketing'),
      'subtitle'  => '',
      'default'   => esc_html__('Your Email', 'marketing'),
    ),
    array(
      'id'        => 'single-post-newsletter-button-text',
      'type'      => 'text',
      'title'     => esc_html__('Button Text', 'marketing'),
      'subtitle'  => '',
      'default'   => esc_html__('Subscribe', 'marketing'),
    ),
  ), // #fields
);
