<?php
/**
 * Services Single Page
 *
 * @package marketing
 * @since 1.0
 *
 */
get_header();
global $post;
$client_name = marketing_get_post_opt('service-client');
$terms       = wp_get_post_terms(get_the_ID(), 'service-category');
$term_name   = array();
if (count($terms) > 0):
  foreach ($terms as $term):
    $term_name[] = $term->name;
  endforeach;
endif;
?>

<div class="tt-header-margin"></div>
<div id="content-wrapper">

  <?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
      <div class="empty-space marg-lg-b50 marg-sm-b30"></div>
      <?php 
        $featured_img_url = marketing_get_post_opt('service-featured-img');
        if(isset($featured_img_url['url']) && !empty($featured_img_url['url']) ):
      ?>
        <img class="img-responsive" src="<?php echo esc_url($featured_img_url['url']); ?>" height="400" width="1246" alt="">
      <?php endif; ?>
      <div class="empty-space marg-lg-b45"></div>

      <!-- TT-BLOG-TOP -->
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
          <div class="tt-blog-top">
            <div class="tt-blog-cat"><?php echo implode(' ', $term_name); ?></div>
            <h2 class="tt-blog-title c-h2"><?php the_title(); ?></h2>
          </div>
        </div>
      </div>
      <div class="empty-space marg-lg-b25"></div>

      <div class="row">
        <div class="col-lg-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
          <div class="simple-text style-2">
            <?php if(marketing_get_post_opt('service-date-enable')): ?>
            <h4><?php esc_html_e('Date:','marketing'); ?></h4>
            <p><?php the_time('F. d, y'); ?></p>
            <?php endif; ?>

            <?php if(!empty($client_name) && marketing_get_post_opt('service-client-enable')): ?>
            <h4><?php esc_html_e('Client', 'marketing'); ?></h4>
              <p><?php echo esc_html($client_name); ?></p>
            <?php endif; ?>

            <?php if(has_excerpt()): ?>
              <h4><?php esc_html_e('Summary', 'marketing'); ?></h4>
              <p><?php echo marketing_auto_post_excerpt(); ?></p>
            <?php endif; ?>

          </div>
          <div class="empty-space marg-lg-b45 marg-sm-b30"></div>
        </div>
      </div>
      <?php the_content(); ?>
      <div class="empty-space marg-lg-b170 marg-sm-b50 marg-xs-b30"></div> 
    </div>
  <?php endwhile; ?>
  <?php marketing_after_content_special_content(); ?>
</div>
<?php
get_footer();

