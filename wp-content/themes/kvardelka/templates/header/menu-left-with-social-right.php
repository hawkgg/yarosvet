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
    <div class="toggle-block float-none">
      <div class="toggle-block-container">
        <nav class="main-nav clearfix">
          <?php marketing_main_menu(); ?>
        </nav>
          <div class="nav-more social-module float-right">
            <ul class="tt-social clearfix header-social-icons">
              <?php marketing_social_links('%s', marketing_get_opt('header-social-icons-category')); ?>
            </ul>
          </div>
      </div>
    </div>
  </div>
</header>
<?php marketing_header_height(marketing_get_opt('header-height-switch')); ?>