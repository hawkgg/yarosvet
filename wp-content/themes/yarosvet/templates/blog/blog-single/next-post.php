<?php
/**
 * Blog next post navigation
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php
  $nextPost = get_next_post();
  if($nextPost):
    $args = array(
      'posts_per_page' => 1,
      'include'        => $nextPost->ID
    );
    $nextPost = get_posts($args);
    foreach ($nextPost as $post):
      setup_postdata($post);
        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
?>

<div class="top-baner smal-size">
 <div class="block-bg top-image">
  <div class="bg-wrap">
    <?php if(isset($img_src[0]) && !empty($img_src)): ?>
     <div class="bg" style="background-image:url(<?php echo esc_url($img_src[0]); ?>)"></div>
    <?php endif; ?>
     <div class="white-mobile-layer"></div>
  </div>
  <div class="title-style-1 vertical-align">
    <div class="sub-title">
    <h5 class="h5"><?php echo get_the_category_list( esc_html__( ', ', 'marketing' ) );?></h5>
    </div>
    <h2 class="h1"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h2>
  </div>
 </div>
</div>
<?php
wp_reset_postdata(); endforeach; endif;
