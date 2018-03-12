<?php
/**
 * Title Wrapper
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php if(marketing_get_opt('title-wrapper-enable') || !class_exists('ReduxFramework')): ?>
<div class="tt-topheading background-block">
  <div class="container">
    <h1 class="tt-topheading-title c-h3"><?php echo marketing_get_the_title(); ?></h1>
    <?php marketing_breadcrumbs(); ?>
  </div>
</div>
<?php endif; ?>
