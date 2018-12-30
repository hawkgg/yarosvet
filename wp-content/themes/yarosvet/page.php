<?php
/**
 * Page ( part of layout )
 *
 * @package marketing
 * @since 1.0
 */
get_header();

?>

<div id="content-wrapper" class="content <?php echo marketing_get_post_opt('page-margin'); ?>">
  <?php get_template_part('templates/content/content-page'); ?>
  <?php marketing_after_content_special_content(); ?>
</div>

<?php
get_footer();
