<?php
/**
 * Header Template file
 *
 * @package marketing
 * @since 1.0
 */
?>

<!-- HEADER -->
<header class="tt-header">
  <div class="container">
    <div class="top-inner clearfix">
      <div class="top-inner-container">
        <?php marketing_logo('logo', get_template_directory_uri().'/img/logo.png'); ?>
        <button class="cmn-toggle-switch"><span></span></button>
      </div>
    </div>
    <div class="toggle-block">
      <div class="toggle-block-container">
        <nav class="main-nav clearfix">
          <?php marketing_main_menu(); ?>
        </nav>
        <div class="nav-more contact-details-module">
          <div class="tt-address-info detail-module">
            <i class="fa fa-phone"></i><span><?php echo marketing_get_opt('header-contact-details-phone-text'); ?></span>
          </div>
          <div class="tt-address-info detail-module">
            <i class="fa fa-envelope-o"></i><span><?php echo marketing_get_opt('header-contact-details-email-text'); ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<?php marketing_header_height(marketing_get_opt('header-height-switch')); ?>