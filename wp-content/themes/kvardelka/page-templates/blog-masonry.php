<?php
/**
 * Template Name: Blog Masonry
 *
 * @package marketing
*/
get_header();
wp_enqueue_script('isotope');

if (get_query_var('paged')) {
  $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
  $paged = get_query_var('page');
} else {
  $paged = 1;
}
$post_per_page = marketing_get_post_opt('blog-posts-per-page');
if (!$post_per_page) {
  $post_per_page = get_option('posts_per_page');
}

$post_args = array(
  'posts_per_page' => $post_per_page,
  'orderby'        => 'date',
  'paged'          => $paged,
  'order'          => 'DESC',
  'post_type'      => 'post',
  'post_status'    => 'publish',
);

$categories = marketing_get_post_opt('blog-category');
if (is_array($categories)) {
  $post_args['category__in'] =  $categories;
}

$query = new WP_Query( $post_args );
if(is_page()) {
  $max_num_pages = $query -> max_num_pages;
} else {
  global $wp_query;
  $query = $wp_query;
  $max_num_pages = false;
}

$layout    = marketing_get_opt('main-layout');
$col_class = (!class_exists('ReduxFramework') || $layout == 'default') ? ' col-md-4':'';

?>

<div class="empty-space marg-lg-b100 marg-sm-b50 marg-xs-b30"></div>
<div class="container">
  <?php get_template_part('templates/global/page-before-content'); ?>

    <div class="isotope isotope-content">
      <div class="grid-sizer col-xs-12 col-sm-6 <?php echo sanitize_html_class($col_class); ?>"></div>

        <?php if($query -> have_posts()): while ($query -> have_posts()) : $query -> the_post(); ?>
        <div <?php post_class('isotope-item col-xs-12 col-sm-6'.$col_class); ?>>
          <div class="tt-post-3">
            <?php get_template_part('templates/blog/blog-masonry/content', get_post_format()); ?>
            <div class="tt-post-3-info">
              <h2><a class="tt-post-3-title c-h5" href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
              <a class="tt-post-3-favourite" href="<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-star" aria-hidden="true"></i></a>
              <div class="tt-post-3-label">
                <span><?php echo esc_html__('by', 'marketing'); ?> <a href="#"><?php echo get_the_author(); ?></a></span>
                <span><?php the_time('F d, Y'); ?></span>
                <span><?php echo get_the_category_list( esc_html__( ', ', 'marketing' ) );?></span>
              </div>
              <div class="simple-text size-3">
                <p><?php echo marketing_auto_post_excerpt(); ?></p>
              </div>
              <a class="c-btn type-4" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html__('Read More', 'marketing'); ?></a>
            </div>
          </div>                        
          <div class="empty-spaca marg-lg-b30"></div>   
        </div>
        <?php endwhile; wp_reset_postdata(); else:
        get_template_part('templates/content', 'none');
        endif; ?>

      </div>
      <div class="empty-space marg-lg-b50 marg-sm-b30"></div>
    <!-- tt-custom-pagination -->
    <?php marketing_paging_nav($max_num_pages, 'default'); ?>
    <div class="empty-space marg-sm-b30"></div>                                                             
  <?php get_template_part('templates/global/page-after-content'); ?>
</div>
<div class="empty-space marg-lg-b150 marg-sm-b50 marg-xs-b30"></div> 
<?php marketing_after_content_special_content(); ?>
<?php
get_footer();
