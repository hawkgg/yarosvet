<?php
/**
 * Video Post Format
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php 
  $video_url = marketing_get_post_opt('post-video-url');
  if(has_post_thumbnail() && !empty($video_url)): 
?>
<div class="tt-video">
  <a class="tt-post-3-img tt-icon-video tt-video-img custom-hover" href="#" data-video="<?php echo esc_url($video_url); ?>?autoplay=1">
    <?php the_post_thumbnail('marketing-medium', array('class' => 'img-responsive')); ?>
  </a>
  <div class="tt-video-popup">
    <div class="tt-video-caption"></div>
    <div class="tt-video-table">
      <div class="tt-video-cell">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="about:blank"></iframe>
          <div class="tt-video-close"></div>
        </div>
      </div>                                       
    </div>
  </div>
</div>
<?php endif; ?>


