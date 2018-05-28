<?php

/**
 *
 * RS Case Study
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_case_study($atts, $content = '', $id = '') {
  global $post;
  wp_enqueue_script('isotope');
  extract(shortcode_atts(array(
    'id'            => '',
    'class'         => '',
    'filter'        => 'yes',
    'filter_cats'   => '',
    'style'         => 'style1',
    'limit'         => 6,
    'cats'          => '',
    'exclude_posts' => '',
  ), $atts));

  $class = ( $class ) ? ' ' .$class : '';

  if (get_query_var('paged')) {
    $paged = get_query_var('paged');
  } elseif (get_query_var('page')) {
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }

  $args = array(
    'posts_per_page' => $limit,
    'meta_query'     => array(array('key' => '_thumbnail_id')),
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_type'      => 'service',
    'paged'          => $paged,
    'post_status'    => 'publish'
  );

  $args['tax_query'] = array(
    array(
      'taxonomy' => 'service-category',
      'field'    => 'id',
      'terms'    => explode(',', $cats),
    ),
  );

  if (!empty($exclude_posts)) {

    $exclude_posts_arr = explode(',',$exclude_posts);
    if (is_array($exclude_posts_arr) && count($exclude_posts_arr) > 0) {
      $args['post__not_in'] = array_map('intval',$exclude_posts_arr);
    }
  }

  ob_start();

  $the_query = new WP_Query($args);
  $max_num_pages = $the_query->max_num_pages;

  switch ($style) {
    case 'style1': ?>
      <div class="tt-filter type-1 style-2">
        <?php 
          $terms = get_terms('service-category', array('orderby' => 'name', 'include' => $filter_cats));
          if($filter == 'yes' && count($terms) > 0): 
        ?>
        <div class="tt-filter-select isotope-select">
          <div class="select-arrow"><i class="fa fa-angle-down"></i></div>
          <select>
            <option value="*" selected=""><?php echo esc_html__('All', 'marketing-addons'); ?></option>
            <?php foreach ($terms as $term): ?>
              <option value=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_attr($term->name); ?></option>
            <?php endforeach; ?>
          </select>                            
        </div>

        <ul class="isotope-nav isotope-filter">
          <li class="selected"><a href="#all" data-filter="*"><?php echo esc_html__('All', 'marketing-addons'); ?></a></li>
          <?php foreach ($terms as $term): ?>
            <li><a href="#<?php echo esc_attr($term->slug); ?>" data-filter=".<?php echo esc_attr($term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <div class="row marg5 isotope-content">               
          <div class="grid-sizer col-xs-12 col-sm-6 col-md-4"></div>

          <?php
            while( $the_query->have_posts() ) : $the_query->the_post();
              $terms = wp_get_post_terms(get_the_ID(), 'service-category');
              $term_slugs = array();
              if (count($terms) > 0):
                foreach ($terms as $term):
                  $term_slugs[] = $term->slug;
                endforeach;
              endif;
              $case_item_args = array(
                'style' => 'style1',
                'limit' => $limit,
              );
              rs_case_study_item($case_item_args, $term_slugs);
            endwhile;
            wp_reset_query();
            wp_reset_postdata();
          ?>
        </div>
      </div>
      <?php
      # code...
      break;

    case 'style2': 
      wp_enqueue_script('swiper');
      wp_enqueue_style('swiper');
    ?>
      <div class="tt-swiper-margin">
        <div class="swiper-container" data-autoplay="5000" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
          <div class="swiper-wrapper clearfix">  
            <?php
              $i = 0;
              while( $the_query->have_posts() ) : $the_query->the_post();
                $terms = wp_get_post_terms(get_the_ID(), 'service-category');
                $term_slugs = array();
                if (count($terms) > 0):
                  foreach ($terms as $term):
                    $term_slugs[] = $term->slug;
                  endforeach;
                endif;
                $case_item_args = array(
                  'style' => 'style2',
                  'count' => $i,
                );  
                rs_case_study_item($case_item_args,  $term_slugs);
                $i++;
              endwhile;
              wp_reset_query();
              wp_reset_postdata();
            ?>
          </div>
          <div class="pagination type-1 visible-xs-block"></div>
          <div class="tt-swiper-arrow-center">
            <div class="swiper-arrow-left tt-arrow-left type-2 pos-2 hidden-xs">
              <span class="lnr lnr-chevron-left"></span>
            </div>
            <div class="swiper-arrow-right tt-arrow-right type-2 pos-2 hidden-xs">
              <span class="lnr lnr-chevron-right"></span>
            </div>                        
          </div>
        </div>
      </div>
      <?php
      break;

    case 'style3': 
    ?>
      <div class="d-flex flex-wrap">  
        <?php
          $i = 0;
          while( $the_query->have_posts() ) : $the_query->the_post();
            $terms = wp_get_post_terms(get_the_ID(), 'service-category');
            $term_slugs = array();
            if (count($terms) > 0):
              foreach ($terms as $term):
                $term_slugs[] = $term->slug;
              endforeach;
            endif;
            $case_item_args = array(
              'style' => 'style3',
              'count' => $i,
            );  
            rs_case_study_item($case_item_args,  $term_slugs);
            $i++;
          endwhile;
          wp_reset_query();
          wp_reset_postdata();
        ?>
      </div>
      <?php
      break;
    
    default:
      # code...
      break;
  }

  $output = ob_get_clean();
  return $output;
}

add_shortcode('rs_case_study', 'rs_case_study');


if(!function_exists('rs_case_study_item')) {
  function rs_case_study_item($case_item_args, $term_slugs) {
    extract($case_item_args);
    global $post;
    $image_src  = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'marketing-medium' );

    switch ($style) {
      case 'style1': ?>
        <div class="isotope-item <?php echo implode(' ', $term_slugs); ?> col-xs-12 col-sm-6 col-md-4">
          <div class="tt-case">
            <?php if(has_post_thumbnail()): ?>
            <a class="tt-case-img custom-hover" href="<?php echo esc_url(get_the_permalink()); ?>">
              <img class="img-responsive" src="<?php echo esc_url($image_src[0]); ?>" height="230" width="392" alt="">
            </a>
            <?php endif; ?>
            <div class="tt-case-info">
                <a class="tt-case-title c-h5" href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
                <div class="simple-text size-3">
                  <p><?php echo marketing_auto_post_excerpt(); ?></p>
                </div>
            </div>
          </div>
          <div class="mb-lg-5"></div>   
        </div>
        <?php
        break;
      case 'style2': 
      $active_class = ($count == 0) ? ' active':'';
      ?>
        <div class="swiper-slide <?php echo sanitize_html_class($active_class); ?>" data-val="<?php echo esc_attr($count); ?>"> 
          <div class="tt-case">
            <?php if(has_post_thumbnail()): ?>
              <a class="tt-case-img custom-hover" href="<?php echo esc_url(get_the_permalink()); ?>">
                <img class="img-responsive" src="<?php echo esc_url($image_src[0]); ?>" height="230" width="392" alt="">
              </a>
            <?php endif; ?>
            <div class="tt-case-info">
              <a class="tt-case-title c-h5" href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
              <div class="simple-text size-3">
                <p><?php echo marketing_auto_post_excerpt(); ?></p>
              </div>
            </div>
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