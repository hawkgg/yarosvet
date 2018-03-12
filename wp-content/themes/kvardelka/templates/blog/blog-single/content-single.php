<?php
/**
 * Single template file
 *
 * @package marketing
 * @since 1.0
 */
?>

<article <?php post_class(); ?>>
    <div class="tt-blog-cat"><?php echo get_the_category_list( esc_html__( ', ', 'marketing' ) );?></div>
    <h1 class="tt-blog-title c-h2"><?php the_title(); ?></h1>
    <div class="tt-blog-label">
      <span><?php echo esc_html__('by', 'marketing'); ?> <a href="#"><?php echo get_the_author(); ?></a></span>
      <span><?php the_time('F d, Y'); ?></span>
    </div>
    <div class="empty-space marg-lg-b30"></div>
    <div class="tt-devider"></div>
    <div class="empty-space marg-lg-b30"></div>
  <?php get_template_part('templates/blog/blog-single/parts/single', 'media'); ?>
  <div class="empty-space marg-lg-b45 marg-sm-b30"></div>

  <div class="simple-text">
    <?php the_content(); ?>
  </div>
  <?php
    wp_link_pages( array(
      'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'marketing' ),
      'after'       => '</div>',
      'link_before' => '<span>',
      'link_after'  => '</span>',
    ) );
  ?>
  <div class="empty-space marg-lg-b55 marg-sm-b30"></div>

  <div class="tt-blog-tag">
    <?php echo get_the_tag_list('<span><i class="fa fa-tags"></i>Tags: ',', ','</span>'); ?>
  </div>

  <div class="empty-space marg-lg-b55 marg-sm-b30"></div>
  <div class="tt-devider"></div>
  <div class="empty-space marg-lg-b30"></div>

  <?php 
    if(marketing_get_opt('single-post-social-share-enable')):
      marketing_social_share('style1'); 
    endif; 
  ?>
</article>
