<?php
/**
 * Template Name: Blog List
 *
 * @package marketing
*/
get_header();

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
  'post_status'    => 'publish'
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

?>

<div class="empty-space marg-lg-b100 marg-sm-b50 marg-xs-b30"></div>
<!-- <? var_dump($post_args) ?> -->
  <!-- <?php echo do_shortcode( '[searchandfilter fields="category" all_items_labels="Все" show_count="1" submit_label="Показать" hierarchical="1"]' ); ?> -->
<div class="container">
  <?php get_template_part('templates/global/page-before-content'); ?>
    <?php if($query -> have_posts()): while ($query -> have_posts()) : $query -> the_post(); ?>
    <div <?php post_class('tt-post-3'); ?>>
      <?php get_template_part('templates/blog/blog-list/content', get_post_format()); ?>
      <div class="tt-post-3-info">
        <h2><a class="tt-post-3-title c-h3" href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
        <div class="tt-post-3-label my-2">
          <p>
            <i class="fa fa-calendar mr-2"></i><span><?php the_time('F d, Y'); ?></span>
            <span><?php echo get_the_category_list( esc_html__( ', ', 'marketing' ) );?></span>
          </p>
        </div>
        <div class="simple-text size-3">
          <p><?php echo marketing_auto_post_excerpt(); ?></p>
        </div>
        <div class="text-right">
          <a class="c-btn type-4 read-more-link" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html__('Читать далее', 'marketing'); ?> </a>
        </div>
      </div>
    </div>
    <div class="empty-space marg-lg-b30"></div>
    <?php endwhile; wp_reset_postdata(); else:
      get_template_part('templates/content', 'none');
    endif; ?>
    <?php marketing_paging_nav($max_num_pages, 'default'); ?>
    <div class="empty-space marg-sm-b30"></div>
  <?php get_template_part('templates/global/page-after-content'); ?>
</div>
<div class="empty-space marg-lg-b150 marg-sm-b50 marg-xs-b30"></div>
<?php marketing_after_content_special_content(); ?>
<?php
get_footer();
