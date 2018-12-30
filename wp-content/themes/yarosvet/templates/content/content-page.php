<?php
/**
 * Content Page
 *
 * @package marketing
 * @since 1.0
 */
get_template_part('templates/global/page-before-content');
while ( have_posts() ) : the_post();

  the_content();

  wp_link_pages( array(
    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'marketing' ),
    'after'  => '</div>',
  ) );

  // If comments are open or we have at least one comment, load up the comment template
  if (marketing_get_opt('page-comment-enable') && comments_open() || get_comments_number() ) :
    comments_template();
  endif;
endwhile;
get_template_part('templates/global/page-after-content');


