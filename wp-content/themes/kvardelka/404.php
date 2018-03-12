<?php
/**
 * 404
 *
 * @package marketing
 * @since 1.0
 */

get_header(); ?>

<section class="v-align">
  <div class="empty-space  marg-lg-b95 marg-sm-b50"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="tt-page-404-content text-center">
          <h1 class="c-h1"><?php echo esc_html__('404', 'marketing'); ?></h1>
          <p><?php echo wp_kses_post(marketing_get_opt('page404-content')); ?></p>
          <a class="c-btn type-2 size-2 color-1" target="_self" title="button" href="<?php echo esc_url(home_url('/')); ?>"><span><?php echo esc_html__('Back to Home', 'marketing'); ?></span></a>
        </div><!-- /page-404-content -->
      </div><!-- /col-md-12 -->
    </div><!-- /row -->
  </div><!-- /container -->
  <div class="empty-space  marg-lg-b95 marg-sm-b50"></div>
</section>

<?php
get_footer();
