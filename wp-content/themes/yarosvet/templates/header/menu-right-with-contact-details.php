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
        <?php marketing_logo('logo', get_template_directory_uri().'/img/logo.svg'); ?>
        <button class="cmn-toggle-switch"><span></span></button>
      </div>
    </div>
    <div class="toggle-block">
      <div class="toggle-block-container d-flex align-items-center justify-content-center flex-column flex-lg-row">
        <nav class="main-nav clearfix">
          <?php marketing_main_menu(); ?>
        </nav>
        <div class="row col-sm-8 col-lg-auto row nav-more contact-details-module d-flex align-items-center p-0">
          <div class="col-sm-6 col-lg-auto tt-address-info detail-module">
            <i class="fa fa-phone"></i><span class="phone-link"><?php echo marketing_get_opt('header-contact-details-phone-text'); ?></span><br />
            <!-- <i class="fa fa-envelope-o"></i><span><?php echo marketing_get_opt('header-contact-details-email-text'); ?></span> -->
          </div>
        <?php
          $header_btn_link = marketing_get_opt('header-btn-link');
          $header_btn_text = marketing_get_opt('header-btn-text');
          if(!empty($header_btn_text) && !empty($header_btn_text) && class_exists('ReduxFramework')):
        ?>
          <div class="col-sm-6 col-lg-auto nav-more p-0">
            <a class="c-btn type-5 call-order-link" href=""><span><?php echo esc_html(marketing_get_opt('header-btn-text')); ?></span></a>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="menu-overlay"></div>
<?php marketing_header_height(marketing_get_opt('header-height-switch')); ?>