<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package marketing
 */
$layout = marketing_get_opt('main-layout');
switch ($layout):
  case 'left_sidebar': ?>
    <!-- Sidebar -->
    <div class="col-md-4">
      <div class="sidebar left-sidebar">
        <?php if (is_active_sidebar( marketing_get_custom_sidebar('main') )): ?>
          <?php dynamic_sidebar( marketing_get_custom_sidebar('main') ); ?>
        <?php endif; ?>
      </div>
    </div>
    <!-- End Sidebar -->
    <?php break;

  case 'right_sidebar': ?>
    <!-- Sidebar -->
    <div class="col-md-4">
      <div class="sidebar pleft75">
        <?php if (is_active_sidebar( marketing_get_custom_sidebar('main') )): ?>
          <?php dynamic_sidebar( marketing_get_custom_sidebar('main') ); ?>
        <?php endif; ?>
      </div>
    </div>
    <!-- End Sidebar -->
    <?php break;
endswitch;
?>
