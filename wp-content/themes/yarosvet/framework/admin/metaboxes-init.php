<?php

$redux_opt_name = REDUX_OPT_NAME;

function marketing_redux_add_metaboxes($metaboxes) {

  // Variable used to store the configuration array of metaboxes
  $metaboxes = array();

  $metaboxes[] = marketing_redux_get_page_template_blog_metaboxes();
  $metaboxes[] = marketing_redux_get_page_metaboxes();
  $metaboxes[] = marketing_redux_get_video_post_metaboxes();
  $metaboxes[] = marketing_redux_get_post_adv_metaboxes();
  $metaboxes[] = marketing_redux_get_social_metaboxes();
  // marketing
  $metaboxes[] = marketing_redux_get_testimonial_metaboxes();
  $metaboxes[] = marketing_redux_get_team_metaboxes();
  $metaboxes[] = marketing_redux_get_portfolio_post_metaboxes();

  return $metaboxes;
}
add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'marketing_redux_add_metaboxes');


/**
 * Get configuration array for blog template
 * @return type
 */
function marketing_redux_get_page_template_blog_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/page-template-blog.php';
  return array(
    'id' => 'marketing-template-blog-options',
    'title' => esc_html__('Blog Options', 'marketing'),
    'post_types' => array('page'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'page_template' => array(
      'page-templates/blog-list.php',
      'page-templates/blog-masonry.php',
    )
  );
}

/**
 * Get configuration array for contact template
 * @return type
 */
function marketing_redux_get_social_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/social-site.php';

  return array(
    'id' => 'marketing-template-social-options',
    'title' => esc_html__('Social Options', 'marketing'),
    'post_types' => array('social-site'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
  );
}


/**
 * Get configuration array for page metaboxes
 * @return type
 */
function marketing_redux_get_page_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/general.php';
  require get_template_directory() . '/framework/admin/metaboxes/header.php';
  require get_template_directory() . '/framework/admin/metaboxes/title-wrapper.php';
  require get_template_directory() . '/framework/admin/metaboxes/content.php';
  require get_template_directory() . '/framework/admin/metaboxes/fonts.php';
  require get_template_directory() . '/framework/admin/metaboxes/footer.php';
  require get_template_directory() . '/framework/admin/metaboxes/sidebar.php';

  return array(
    'id' => 'marketing-page-options',
    'title' => esc_html__('Options', 'marketing'),
    'post_types' => array('page'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}


/**
 * Get configuration array for video post metaboxes
 * @return type
 */
function marketing_redux_get_video_post_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/post-video.php';

  return array(
    'id' => 'marketing-video-post-options',
    'title' => esc_html__('Video Post Options', 'marketing'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections,
    'post_format' => array('video')
  );
}

/**
 * Get configuration array for page metaboxes
 * @return type
 */
function marketing_redux_get_post_adv_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/header.php';
  require get_template_directory() . '/framework/admin/metaboxes/title-wrapper.php';
  require get_template_directory() . '/framework/admin/metaboxes/content.php';
  require get_template_directory() . '/framework/admin/metaboxes/sidebar.php';
  require get_template_directory() . '/framework/admin/metaboxes/footer.php';

  return array(
    'id' => 'marketing-post-adv-options',
    'title' => esc_html__('Options', 'marketing'),
    'post_types' => array('post'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}

/**
 * Get configuration array for testimonial metaboxes
 * @return type
 */
function marketing_redux_get_testimonial_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/testimonial.php';

  return array(
    'id' => 'marketing-testimonial-options',
    'title' => esc_html__('Testimonial', 'marketing'),
    'post_types' => array('testimonial'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}

/**
 * Get configuration array for testimonial metaboxes
 * @return type
 */
function marketing_redux_get_team_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/team.php';

  return array(
    'id' => 'marketing-team-options',
    'title' => esc_html__('Team', 'marketing'),
    'post_types' => array('team'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}

/**
 * Get configuration array for portfolio single post
 * @return type
 */
function marketing_redux_get_portfolio_post_metaboxes() {

  // Variable used to store the configuration array of sections
  $sections = array();

  // Metabox used to overwrite theme options by page
  require get_template_directory() . '/framework/admin/metaboxes/title-wrapper.php';
  require get_template_directory() . '/framework/admin/metaboxes/content.php';
  require get_template_directory() . '/framework/admin/metaboxes/service-details.php';

  return array(
    'id' => 'marketing-service-options',
    'title' => esc_html__('Service Options', 'marketing'),
    'post_types' => array('service'),
    'position' => 'normal', // normal, advanced, side
    'priority' => 'high', // high, core, default, low
    'sections' => $sections
  );
}
