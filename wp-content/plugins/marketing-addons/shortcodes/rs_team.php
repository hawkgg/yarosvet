<?php
/**
 *
 * RS Team
 * @since 1.0.0
 * @version 1.0.0
 *
 *
 */
function rs_team( $atts, $content = '', $id = '' ) {

  global $post;

  extract( shortcode_atts( array(
    'id'        => '',
    'class'     => '',
    'style'     => 'style1',
    'person_id' => '',
    'limit'     => 1,

  ), $atts ) );

  $id    = ( $id ) ? ' id="'. esc_attr($id) .'"' : '';
  $class = ( $class ) ? ' '. marketing_sanitize_html_classes($class) : '';

  $args = array(
    'post_type'      => 'team',
    'posts_per_page' => $limit,
    'post__in'       => explode(',', $person_id),
  );

  $query   = new WP_Query( $args );

  ob_start();

  while( $query->have_posts() ) : $query->the_post();
    $position  = marketing_get_post_opt('team-position');
    $facebook  = marketing_get_post_opt('team-facebook');
    $twitter   = marketing_get_post_opt('team-twitter');
    $instagram = marketing_get_post_opt('team-instagram');
    $linkedin  = marketing_get_post_opt('team-linkedin');
    $link      = marketing_get_post_opt('team-link');
    $item_args = array(
      'style'     => $style,
      'position'  => $position,
      'facebook'  => $facebook,
      'twitter'   => $twitter,
      'instagram' => $instagram,
      'linkedin'  => $linkedin,
      'link'      => $link,
    );
    rs_team_item( $item_args );
  endwhile;
  wp_reset_postdata();
  $output = ob_get_clean();
  return $output;

}
add_shortcode('rs_team', 'rs_team');


/**
 * Part of team shortcode
 * @param type $type
 * @return type
 */
if( !function_exists('rs_team_item')) {
  function rs_team_item( $item_args ) {
    extract($item_args);

    switch ($style) {
      case 'style1': ?>
        <div class="tt-team text-center">
          <?php if(has_post_thumbnail()): ?>
          <a class="tt-team-img custom-hover" href="<?php echo esc_url($link); ?>" target="_blank">
            <?php the_post_thumbnail('marketing-medium-alt'); ?>
          </a>
          <?php endif; ?>
          <a class="tt-team-title c-h5" href="<?php echo esc_url($link); ?>" target="_blank"><?php the_title(); ?></a>
          <div class="tt-team-cat"><?php echo esc_html($position); ?></div>
          <div class="simple-text size-3">
            <p><?php echo marketing_auto_post_excerpt(15); ?></p>
          </div>
          <ul class="tt-team-social">
            <li><a href="<?php echo esc_url($facebook); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo esc_url($instagram); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="<?php echo esc_url($linkedin); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          </ul>
        </div>
        <?php # code...
        break;
      case 'style2': ?>
        <div class="tt-team type-2">
        <?php if(has_post_thumbnail()): ?>
          <div class="tt-team-imgcell">
            <a class="tt-team-img custom-hover" href="<?php echo esc_url($link); ?>" target="_blank">
              <?php the_post_thumbnail('marketing-medium-alt', array('class' => 'img-responsive')); ?>
            </a>                            
          </div>
          <?php endif; ?>
          <div class="tt-team-infocell">
            <a class="tt-team-title c-h5" href="<?php echo esc_url($link); ?>" target="_blank"><?php the_title(); ?></a>
            <div class="tt-team-cat"><?php echo esc_html($position); ?></div>
            <div class="simple-text size-3">
              <?php the_content(); ?>
            </div>
            <ul class="tt-team-social">
              <li><a href="<?php echo esc_url($facebook); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="<?php echo esc_url($instagram); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="<?php echo esc_url($linkedin); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>                            
          </div>
        </div>
        <?php
        break;

      default:
        # code...
        break;
    }
  }
}
