<?php
/**
 * Blog Default
 *
 * @package marketing
 * @since 1.0
 */
?>

<div id="content-wrapper">
  <div class="container">
      <div class="empty-space marg-lg-b50 marg-sm-b30"></div>
      <?php get_template_part('templates/global/page-before-content'); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('templates/blog/blog-single/content', 'single'); ?>
        <?php endwhile; ?>
        <div class="empty-space marg-lg-b30"></div>

        <!-- TT-SUBSCRIBE -->
        <?php
          $newsletter_big_heading   = marketing_get_opt('single-post-newsletter-big-heading');
          $newsletter_small_heading = marketing_get_opt('single-post-newsletter-small-heading');
          $newsletter_image         = marketing_get_opt('single-post-newsletter-image');
          $newsletter_email_field   = marketing_get_opt('single-post-newsletter-email-field');
          $newsletter_button_text   = marketing_get_opt('single-post-newsletter-button-text');
          if(function_exists('newsletter_form') && marketing_get_opt('single-post-subscribe-enable')): ?>
          <div class="tt-devider"></div>
          <div class="empty-space marg-lg-b50 marg-sm-b30"></div>

        <div class="tt-subscribe">
          <?php if(isset($newsletter_image['url']) && !empty($newsletter_image['url'])): ?>
            <div class="tt-subscribe-img">
              <img src="<?php echo esc_url($newsletter_image['url']); ?>" alt="">
            </div>
          <?php endif; ?>
          <?php if(!empty($newsletter_big_heading)): ?>
            <h4 class="tt-subscribe-title"><?php echo esc_html($newsletter_big_heading); ?></h4>
          <?php endif; ?>
          <?php if(!empty($newsletter_small_heading)): ?>
            <div class="simple-text size-3">
              <p><?php echo esc_html($newsletter_small_heading); ?></p>
            </div>
          <?php endif; ?>

          <div class="tt-banner-3-form">
            <form method="post" action="'.home_url('/').'?na=s" onsubmit="return newsletter_check(this)">
                <div class="row">
                  <div class="col-sm-7">
                    <input class="c-input type-4" type="email" required="" name="ne" placeholder="<?php echo esc_html($newsletter_email_field); ?>">
                    <div class="c-input-4-icon"><span class="lnr lnr-envelope"></span></div>
                  </div>
                  <div class="col-sm-5">
                    <div class="c-btn type-3 size-2 border-2 full">
                    <input class="newsletter-submit" type="submit" value="<?php echo esc_html($newsletter_button_text); ?>">
                  </div>
                  </div>
                </div>
            </form>
          </div>

        </div>
        <?php endif; ?>

        <div class="empty-space marg-lg-b50 marg-sm-b30"></div>

        <!-- TT-AUTHOR -->
        <?php
          global $post;
          $curauth = get_userdata($post->post_author);
        ?>
        <?php if(!empty($curauth->description) && marketing_get_opt('single-post-author-box-enable')): ?>
        <div class="tt-author clearfix">
          <a class="tt-author-img" href="#">
            <?php echo get_avatar( get_the_author_meta('ID'), 90 ); ?>
          </a>
          <div class="tt-author-info">
              <a class="tt-author-name" href="#"><?php the_author(); ?></a>
              <div class="simple-text size-3">
                <p><?php echo get_the_author_meta('description'); ?></p>
              </div>
          </div>
        </div>
        <div class="empty-space marg-lg-b50 marg-sm-b30"></div>
        <?php endif; ?>


        <?php marketing_related_post(); ?>

        <?php
          // if ( marketing_get_opt('single-post-comments-enable') && comments_open() || get_comments_number() ) :
          //   comments_template();
          // endif;
        ?>
      <?php get_template_part('templates/global/page-after-content'); ?>
    <div class="empty-space marg-lg-b50 marg-sm-b50 marg-xs-b30"></div>
  </div>


  <!-- TT-BANNER -->
  <?php marketing_after_content_special_content(); ?>
</div>

