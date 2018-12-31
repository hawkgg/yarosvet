<?php
/**
 * Blog Meta
 *
 * @package marketing
 * @since 1.0
 */
?>
<?php if(has_post_thumbnail()): ?>
    <a class="tt-post-img zoom-hover" href="<?php echo esc_url(get_the_permalink()); ?>">
      <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>
    </a>
<?php endif; ?>
