<?php
/**
 * Before Loop ( page.php )
 *
 * @package marketing
 */
$layout    = marketing_get_opt('main-layout');
if ($layout == 'left_sidebar'): ?>
  <div class="row">
    <?php get_sidebar(); ?>
    <div class="col-md-8">

<?php elseif ($layout == 'right_sidebar'): ?>
  <div class="row">
    <div class="col-md-8">
<?php else: ?>
  <div class="row">
  	<div class="col-md-12">
<?php endif; ?>
