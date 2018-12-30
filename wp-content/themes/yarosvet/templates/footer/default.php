<?php
/**
 * Part of footer file ( default style )
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php if(marketing_get_opt('footer-enable-switch')): ?>
<!-- FOOTER -->
<footer class="tt-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <?php if (is_active_sidebar( marketing_get_custom_sidebar('footer-1', 'footer-sidebar-1') )): ?>
          <?php dynamic_sidebar( marketing_get_custom_sidebar('footer-1', 'footer-sidebar-1') ); ?>
        <?php endif; ?>
        <div class="empty-space marg-xs-b30"></div>
      </div>
      <div class="col-sm-6 col-md-5 offset-md-1">
        <?php if (is_active_sidebar( marketing_get_custom_sidebar('footer-2', 'footer-sidebar-2') )): ?>
          <?php dynamic_sidebar( marketing_get_custom_sidebar('footer-2', 'footer-sidebar-2') ); ?>
        <?php endif; ?>
        <div class="empty-space marg-sm-b30"></div>
      </div>
      <div class="col-xs-12 col-md-3">
        <?php if (is_active_sidebar( marketing_get_custom_sidebar('footer-3', 'footer-sidebar-3') )): ?>
          <?php dynamic_sidebar( marketing_get_custom_sidebar('footer-3', 'footer-sidebar-3') ); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="empty-space marg-lg-b80 marg-sm-b50 marg-xs-b30"></div>
  </div>
  <div class="tt-footer-copy">
    <div class="container">
      <div class="simple-text size-5 color-4">
        <p><?php echo wp_kses_data(marketing_get_opt('footer-copyright-text')); ?></p>
      </div>
    </div>
  </div>
</footer>
<?php endif; ?>

<?php
  wp_enqueue_script('otherservices');
?>