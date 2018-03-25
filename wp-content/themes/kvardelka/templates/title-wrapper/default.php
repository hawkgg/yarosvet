<?php
/**
 * Title Wrapper
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php if(marketing_get_opt('title-wrapper-enable') || !class_exists('ReduxFramework')): ?>
<div id="breadcrumbs-div">
  <div class="container">
    <?php marketing_breadcrumbs(); ?>
  </div>
</div>
<?php endif; ?>
