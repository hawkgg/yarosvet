<?php
/**
 *
 * Testimonial
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_testimonial( $atts, $content = '', $id = '' ) {
  global $post;
  wp_enqueue_script('swiper');
  wp_enqueue_style('swiper');
  extract( shortcode_atts( array(
    'id'    => '',
    'class' => '',
    'cats'  => 0,
    'style' => 'type-1',
    'limit' => '1',
  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. $class : '';

  switch ($style) {
    case 'type-1':
      $data_autoplay        = ' data-autoplay="0"';
      $data_loop            = ' data-loop="1"';
      $data_slides_per_view = ' data-slides-per-view="1"';
      $data_xs_slides       = '';
      $data_sm_slides       = '';
      $data_md_slides       = '';
      $data_lg_slides       = '';
      $data_add_slides      = ' data-add-slides="2"';
      break;

    case 'type-2':
    default:
      $data_autoplay        = ' data-autoplay="5000"';
      $data_loop            = ' data-loop="0"';
      $data_slides_per_view = ' data-slides-per-view="responsive"';
      $data_xs_slides       = ' data-xs-slides="1"';
      $data_sm_slides       = ' data-sm-slides="2"';
      $data_md_slides       = ' data-md-slides="3"';
      $data_lg_slides       = ' data-lg-slides="3"';
      $data_add_slides      = ' data-add-slides="3"';
      break;
  }

  $args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => $limit,
  );

  if( $cats ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'testimonial-category',
        'field'    => 'ids',
        'terms'    => explode( ',', $cats )
      )
    );
  }

  $the_query = new WP_Query( $args );

  ob_start(); 

  echo '<div class="testimonial-swiper-slider swiper-container" '.$data_autoplay.$data_loop.$data_slides_per_view.$data_xs_slides.$data_sm_slides.$data_md_slides.$data_lg_slides.$data_add_slides.' data-speed="500" data-center="0">';
  echo '<div class="swiper-wrapper clearfix">';
    $i = 0;
    while( $the_query->have_posts()) : $the_query->the_post();
      $item_args = array(
        'style'       => $style,
        'count'       => $i,
        'author_name' => marketing_get_post_opt('testimonial-author'),
        'position'    => marketing_get_post_opt('testimonial-position'),
      );
      rs_testimonial_item($item_args);
      $i++;
    endwhile;
    wp_reset_query();
  echo '</div>';
  echo '<div class="pagination type-1 visible-xs-block"></div>';
  echo '<div class="tt-swiper-arrow-center">';
  echo '<div class="swiper-arrow-left tt-arrow-left type-2 pos-2 hidden-xs"><span class="lnr lnr-chevron-left"></span></div>';
  echo '<div class="swiper-arrow-right tt-arrow-right type-2 pos-2 hidden-xs"><span class="lnr lnr-chevron-right"></span></div>';
  echo '</div>';
  echo '</div>';

  $output = ob_get_clean();

  return $output;
}
add_shortcode( 'rs_testimonial', 'rs_testimonial');


if(!function_exists('rs_testimonial_item')) {
  function rs_testimonial_item($item_args) {
    extract($item_args); 
    $active_class = ($count == 0) ? ' active':''; 
  ?>
    <div class="swiper-slide <?php echo sanitize_html_class($active_class); ?>" data-val="<?php echo esc_attr($count); ?>">
      <div class="tt-testimonial <?php echo sanitize_html_class($style); ?> clearfix">
        <div class="tt-testimonial-icon">
          <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="tt-testimonial-info">
          <div class="simple-text">
            <?php the_content(); ?>
          </div>
          <div class="tt-testimonial-label">
            - <a class="tt-testimonial-name" href="#"><?php echo esc_html($author_name); ?></a>, <a href="#"><?php echo esc_html($position); ?></a>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
}
