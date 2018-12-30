<?php
/**
 * Before Loop ( page.php )
 *
 * @package marketing
 */
$layout    = marketing_get_opt('main-layout');
$col_class = is_single() || is_home() || is_archive() || is_page_template('page-templates/blog-list.php' ) ? 'col-lg-10 offset-lg-1':'col-md-12';
if ($layout == 'left_sidebar'): ?>
  <div class="row">
    <?php get_sidebar(); ?>
    <div class="col-md-8">

<?php elseif ($layout == 'right_sidebar'): ?>
  <div class="row">
    <div class="col-md-8">
<?php else: ?>
  <div class="">
  	<div class="<?php echo marketing_sanitize_html_classes($col_class);?>">
<?php endif; ?>
