<?php
/**
 * Header file
 *
 * @package marketing
 * @since 1.0
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

  <?php //marketing_loader(); ?>
  <?php marketing_header_template(marketing_get_opt('header-template')); ?>
  <?php get_template_part('templates/title-wrapper/default'); ?>