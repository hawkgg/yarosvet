<?php
/**
 * Single Meida File
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php
  global $post;
  $post_format = get_post_format();
  switch ($post_format) {
    case 'audio':
      # code...
      break;
    case 'video':
    $video_url = marketing_get_post_opt('post-video-url');
    if(has_post_thumbnail() && !empty($video_url)): ?>
      <div class="tt-video">
        <a class="tt-post-3-img tt-video-img tt-icon-video custom-hover" href="#" data-video="<?php echo esc_url($video_url); ?>?autoplay=1">
          <?php the_post_thumbnail('marketing-big'); ?>
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
    <?php
      endif;
      break;
    case 'gallery':
      wp_enqueue_style( 'owl');
      $gallery = marketing_get_post_opt('post-gallery');
      if (is_array($gallery)): ?>
        <div class="carousel">
          <?php foreach ($gallery as $item): ?>
            <figure>
              <?php if (isset($item['attachment_id'])):
                echo wp_get_attachment_image( $item['attachment_id'], 'marketing-big', array('alt' => esc_attr($item['title'])) );
              endif; ?>
            </figure>
          <?php endforeach; ?>
      </div>
      <?php else: ?>
      <a href="<?php echo get_the_permalink(); ?>">
        <figure>
          <?php if(has_post_thumbnail()) { the_post_thumbnail('marketing-big'); } ?>
        </figure>
      </a>
      <?php
      endif;
      break;
    default: ?>
      <?php the_post_thumbnail('marketing-big'); ?>
    <?php
      break;
  }

