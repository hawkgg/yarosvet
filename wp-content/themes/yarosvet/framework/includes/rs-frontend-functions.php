<?php
/**
 * Frontend Theme Functions.
 *
 * @package marketing
 * @subpackage Template
 */
 /**
 * Theme Loader
 * @param string $logo_field
 * @param string $default_url
 * @param string $class
 */
if(!function_exists('marketing_loader')) {
  function marketing_loader($loader_field = '', $default_url = '') {
    $loader_on_ff = marketing_get_opt('general-loader-enable-switch');
    if(!$loader_on_ff) { return ; }
  ?>
    <div id="loader-wrapper">
      <div id="loader"><span class="loader-inner"></span></div>
      <div id="loading-text"><?php echo esc_html__('LOADING', 'marketing'); ?></div>
    </div>
  <?php
  }
}

 /**
 * Theme logo
 * @param string $logo_field
 * @param string $default_url
 * @param string $class
 */
 if( !function_exists('marketing_logo')) {
  function marketing_logo($logo_field = '', $default_url = '', $class = '') {

    if (empty($logo_field)) {
      $logo_field = 'logo';
    }

    $logo = '';

    if( marketing_get_opt( $logo_field ) != null ) {
      $logo_array = marketing_get_opt( $logo_field );
    }

    if( (!isset( $logo_array['url'] ) || empty($logo_array['url'])) && empty($default_url)) {
      return;
    }

    if(empty($class)) {
      $class = ' logo';
    }

    if( !isset( $logo_array['url'] ) || empty($logo_array['url']) ) {
      $logo_url = $default_url;
    } else {
      $logo_url = $logo_array['url'];
    }

    ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo marketing_sanitize_html_classes($class); ?>"><img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>"></a>
    <?php
  }
}

/**
 *
 * Main Menu
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( !function_exists('marketing_main_menu')) {
  function marketing_main_menu($class = '') {
    if ( function_exists('wp_nav_menu') && has_nav_menu( 'primary-menu' ) ) {
      $menu = '';
      if(is_singular()) {
        $menu = marketing_get_opt('header-primary-menu');
      }
      wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'container'      => false,
        'menu_id'        => 'nav',
        'menu'           => $menu,
        'menu_class'     => $class,
        'walker'         => new marketing_menu_widget_walker_nav_menu()
      ));
    } else {
      echo '<a target="_blank" href="'. admin_url('nav-menus.php') .'" class="nav-list cell-view no-menu">'. esc_html__( 'You can edit your menu content on the Menus screen in the Appearance section.', 'marketing' ) .'</a>';
    }
  }
}

/**
 *
 * Pagination
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'marketing_paging_nav' ) ) {
  function marketing_paging_nav( $max_num_pages = false, $blog_style = 'default' ) {

    if(!marketing_get_post_opt('blog-enable-pagination')) { return; }

    if (get_query_var('paged')) {
      $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
      $paged = get_query_var('page');
    } else {
      $paged = 1;
    }

    if ($max_num_pages === false) {
      global $wp_query;
      $max_num_pages = $wp_query -> max_num_pages;
    }

    $big = 999999999; // need an unlikely integer

    $links = paginate_links( array(
      'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format'    => '?paged=%#%',
      'current'   => $paged,
      'total'     => $max_num_pages,
      'prev_next' => true,
      'prev_text' => esc_html__('&lt; Предыдущая', 'marketing'),
      'next_text' => esc_html__('Следующая &gt;', 'marketing'),
      'end_size'  => 1,
      'mid_size'  => 2,
      'type'      => 'plain',
    ) );


    if (!empty($links)): ?>
      <div class="tt-custom-pagination">
        <?php echo wp_kses_post($links); ?>
      </div>
    <?php endif;

  }
}

/**
 * Show breadcrumbs
 *
 * @since marketing 1.0
 */
if(!function_exists('marketing_breadcrumbs')) {
  function marketing_breadcrumbs($class = '') {
    $breadcrumbs_enable = marketing_get_opt('title-wrapper-breadcrumbs-enable');
    if(!$breadcrumbs_enable) { return; }
    $before      = '<li class="breadcrumb-item">';
    $after       = '</li>';
    $before_last = '<li>';
    $after_last  = '</li>';
    $separator   = '';
  ?>
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <?php
        $output = '';
        if (function_exists('is_woocoomerce') && is_woocommerce() || function_exists('is_shop') && is_shop()) {
          $args = array(
            'delimiter'   => '&nbsp;/&nbsp;',
            'wrap_before' => '',
            'wrap_after'  => '',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => esc_html_x( 'Главная', 'breadcrumb', 'marketing' )
          );

          woocommerce_breadcrumb($args);

        } else if (!is_home()) {

          $output .= $before.'<a href="';
          $output .= esc_url(home_url('/'));
          $output .= '">';
          $output .= esc_html__('Главная', 'marketing');
          $output .= '</a>'.$after. $separator .'';

          if (is_single()) {

            $cats = get_the_category();

            if( isset($cats[0]) ) :
              $output .= $before.'<a href="'. esc_url(get_category_link( $cats[0]->term_id )) .'">'. $cats[0]->cat_name.'</a>' . $after . $separator;
            endif;

            if (is_single()) {
              $output .= $before.$before_last;
              $output .= get_the_title();
              $output .= $after_last.$after;
            }
          } elseif( is_category() ) {

            $cats = get_the_category();

            if( isset($cats[0]) ) :
              $output .= $before.$before_last.single_cat_title('', false).$after_last.$after;
            endif;

          } elseif (is_page()) {
            global $post;

            if($post->post_parent){
              $anc = array_reverse(get_post_ancestors( $post->ID ));
              $title = get_the_title();
              foreach ( $anc as $ancestor ) {
                $output_ancestor .= $before.'<a href="'.esc_url(get_permalink($ancestor)).'" title="'.esc_attr(get_the_title($ancestor)).'"  rel="v:url" property="v:title">'.get_the_title($ancestor).'</a>'.$after.' ' . $separator;
              }
              $output .= $output_ancestor;
              $output .= $before.$before_last.$title.$after_last.$after;
            } else {
              $output .= $before.$before_last.get_the_title().$after_last.$after;
            }
          }
          elseif (is_tag()) {
            $output .= $before.$before_last.single_cat_title('', false).$after_last.$after;

          } elseif (is_day()) {
            $output .= $before.$before_last. esc_html__('Archive for', 'marketing').' ';
            $output .= get_the_time('F jS, Y');
            $output .= $after_last.$after;

          } elseif (is_month()) {
            $output .= $before.$before_last.esc_html__('Archive for', 'marketing').' ';
            $output .= get_the_time('F, Y');
            $output .= $after_last.$after;

          } elseif (is_year()) {
            $output .= $before.$before_last. esc_html__('Archive for', 'marketing').' ';
            $output .=get_the_time('Y');
            $output .= $after_last.$after;

          } elseif (is_author()) {
            $output .= $before.$before_last. esc_html__('Author Archive', 'marketing');
            $output .= $after_last.$after;

          } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            $output .= $before.$before_last.esc_html__('Blog Archives', 'marketing').$after_last.$after;

          } elseif (is_search()) {
            $output .= $before.$before_last. esc_html__('Search Results', 'marketing').$after_last.$after;

          } elseif (is_404()) {
            $output .= $before.$before_last. esc_html__('Страница не найдена', 'marketing').$after_last.$after;

          }

        } elseif (is_home()) {
          $output .= $before.$before_last. esc_html__('Главная', 'marketing') .$after_last.$after;
        }

        echo wp_kses_post($output);
        ?>
      </ol>
    </nav>
    <!-- End Breadcrumbs -->
  <?php }

}

/**
 *
 * Get the Page Title
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( !function_exists('marketing_get_the_title')) {
  function marketing_get_the_title() {

    $title = '';

    //woocoomerce page
    if (function_exists('is_woocoomerce') && is_woocommerce() || function_exists('is_shop') && is_shop()):
      if (apply_filters( 'woocommerce_show_page_title', true )):
        $title = woocommerce_page_title(false);
      endif;
    // Default Latest Posts page
    elseif( is_home() && !is_singular('page') ) :
      $title = esc_html__('Blog','marketing');

    // Singular
    elseif( is_singular() ) :
      $title = get_the_title();

    // Search
    elseif( is_search() ) :
      global $wp_query;
      $total_results = $wp_query->found_posts;
      $prefix = '';

      if( $total_results == 1 ){
        $prefix = esc_html__('1 search result for', 'marketing');
      }
      else if( $total_results > 1 ) {
        $prefix = $total_results . ' ' . esc_html__('search results for', 'marketing');
      }
      else {
        $prefix = esc_html__('Search results for', 'marketing');
      }
      //$title = $prefix . ': ' . get_search_query();
      $title = get_search_query();

    // Category and other Taxonomies
    elseif ( is_category() ) :
      $title = single_cat_title('', false);

    elseif ( is_tag() ) :
      $title = single_tag_title('', false);

    elseif ( is_author() ) :
      $title = wp_kses(sprintf( __( 'Author: %s', 'marketing' ), '<span class="vcard">' . get_the_author() . '</span>' ));

    elseif ( is_day() ) :
      $title = wp_kses(sprintf( __( 'Day: %s', 'marketing' ), '<span>' . get_the_date() . '</span>' ));

    elseif ( is_month() ) :
      $title = wp_kses(sprintf( __( 'Month: %s', 'marketing' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'marketing' ) ) . '</span>' ));

    elseif ( is_year() ) :
      $title = wp_kses(sprintf( __( 'Year: %s', 'marketing' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'marketing' ) ) . '</span>' ));

    elseif( is_tax() ) :
      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      $title = $term->name;

    elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
      $title = esc_html__( 'Asides', 'marketing' );

    elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
      $title = esc_html__( 'Galleries', 'marketing');

    elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
      $title = esc_html__( 'Images', 'marketing');

    elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
      $title = esc_html__( 'Videos', 'marketing' );

    elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
      $title = esc_html__( 'Quotes', 'marketing' );

    elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
      $title = esc_html__( 'Links', 'marketing' );

    elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
      $title = esc_html__( 'Statuses', 'marketing' );

    elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
      $title = esc_html__( 'Audios', 'marketing' );

    elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
      $title = esc_html__( 'Chats', 'marketing' );

    elseif( is_404() ) :
      $title = esc_html__( '404', 'marketing' );

    else :
      $title = esc_html__( 'Archives', 'marketing' );
    endif;

    return $title;
  }
}

/**
 *
 * Social Share
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if(!function_exists('marketing_social_share')) {
  function marketing_social_share($style) {
    switch ($style) {
      case 'style1':
      default:
      global $post;
      $pinterest_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'marketing-big' );
      ?>
        <div class="tt-share clearfix">
          <div class="d-flex justify-content-md-between justify-content-lg-end flex-column flex-lg-row">
            <div class="tt-share-left mr-4"><?php echo esc_html__('Поделиться в социальных сетях:', 'marketing'); ?></div>
            <ul class="tt-share-right">
              <li><a class="tt-share-link" href="https://vk.com/share.php?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
              <li><a class="tt-share-link" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a class="tt-share-link color-2" href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a class="tt-share-link color-3" href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a class="tt-share-link color-4" href="https://pinterest.com/pin/create/button/?url=&amp;media=<?php echo esc_url($pinterest_image[0]); ?>&amp;description=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          </div>
        <?php
        break;

      case 'style2': ?>
      <?php
        break;
    }
  }
}


if ( ! function_exists( 'marketing_comment' ) ) :
/**
 * Comments and pingbacks. Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since marketing 1.0
 */
function marketing_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
      ?>
      <li <?php comment_class('comment'); ?> id="li-comment-<?php comment_ID(); ?>">
        <div class="media-body"><?php _e( 'Pingback:', 'marketing' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Редактировать', 'marketing' ), ' ' ); ?></div>
      </li>
      <?php
    break;

    default :
      $class = array('comment_wrap');
      if ($depth > 1) {
        $class[] = 'chaild';
      }
      ?>
      <!-- Comment Item -->
      <li <?php comment_class('comment-list media'); ?> id="comment-<?php comment_ID(); ?>">

        <div class="comment-body tt-comment-container clearfix">
          <a class="tt-comment-avatar custom-hover round size-2" href="#">
            <?php echo get_avatar( $comment, 40 ); ?>
          </a>

          <div class="tt-comment-info">

            <div class="tt-comment-top">
              <div class="tt-comment-name">
                <?php comment_author_link();?>
              </div>
              <span class="tt-comment-date"><time><?php echo comment_date(get_option('date_format')) ?> at <?php echo comment_date(get_option('time_format')) ?></time></span>
            </div>

            <div class="simple-text size-3">
              <?php if ( $comment->comment_approved == '0' ) : ?>
                <em><?php _e( 'Ваш комментарий на модерации.', 'marketing' ); ?></em>
              <?php endif; ?>
              <?php comment_text(); ?>
            </div>
            <?php
              $reply = get_comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => 2 ) ) );
              if (!empty($reply)): ?>
                <?php echo wp_kses_post($reply); ?>
              <?php endif;
              edit_comment_link( __( 'Редактировать', 'marketing' ), '', '' );
            ?>
          </div>
        </div>
      <?php
      break;
  endswitch;
}

endif; // ends check for marketing_comment()

if (!function_exists('marketing_close_comment')):
/**
 * Close comment
 *
 * @since marketing 1.0
 */
function marketing_close_comment() { ?>
  </li>
  <!-- End Comment Item -->
<?php }

endif; // ends check for marketing_close_comment()


/**
 *
 * Related Post
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if(!function_exists('marketing_related_post')) {
  function marketing_related_post() {
    global $post;
    $tags = wp_get_post_tags($post->ID);

    if(!empty($tags) && is_array($tags)):
      $simlar_tag = $tags[0]->term_id;
    ?>

    <h4 class="c-h4"><?php echo esc_html__('Похожие статьи', 'marketing'); ?></h4>
    <div class="empty-space marg-lg-b15"></div>

    <!-- TT-Related ARTICLE -->
    <div class="row">
      <?php
        $args = array(
          'tag__in'             => array($simlar_tag),
          'post__not_in'        => array($post->ID),
          'posts_per_page'      => 4,
          'meta_query'          => array(array('key' => '_thumbnail_id', 'compare' => 'EXISTS')),
          'ignore_sticky_posts' => 1,
        );
        $re_query = new WP_Query($args);
        while ($re_query->have_posts()) : $re_query->the_post();
      ?>
      <div <?php post_class('col-sm-3'); ?>>
        <div class="tt-article">
          <a class="tt-article-img custom-hover" href="<?php echo esc_url(get_the_permalink()); ?>">
            <?php the_post_thumbnail('marketing-small-alt'); ?>
          </a>
          <a class="tt-article-title c-h6" href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
          <div class="simple-text size-5"><?php echo get_the_author(); ?></div>
        </div>
        <div class="empty-space marg-xs-b30"></div>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
    </div>
  <?php
    endif;
  }
}

/**
 * Get Social Icons links
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('marketing_social_links')) {
  function marketing_social_links($pattern = '%s', $category = '') {
    $args = array(
      'posts_per_page' => -1,
      'offset'          => 0,
      'orderby'         => 'menu_order',
      'order'           => 'ASC',
      'post_type'       => 'social-site',
      'post_status'     => 'publish'
    );

    if (!empty($category)) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'social-site-category',
          'field'    => 'id',
          'terms'    => $category,
        ),
      );
    }

    $custom_query = new WP_Query( $args );
    if ( $custom_query->have_posts() ):

      $found_posts = $custom_query->found_posts;
      while ( $custom_query -> have_posts() ) :
        $custom_query -> the_post();
        echo sprintf($pattern, '<li><a href="'.esc_url(get_the_title()).'"><i class="fa '.esc_attr(marketing_get_post_opt('icon')).'"></i></a></li>');
      endwhile; // end of the loop.
    endif;
    wp_reset_postdata();
  }
}

/**
 * Get Social Icons links
 *
 * @param type $terms
 * @return boolean
 */
if(!function_exists('marketing_accent_css')) {
  function marketing_accent_css() {
    $accent_color_first  = marketing_get_opt('theme-skin-accent-first');
    $accent_color_second = marketing_get_opt('theme-skin-accent-second');
    $header_color_bg     = marketing_get_opt('customizer-header-bg-color');
    $header_logo_width   = marketing_get_opt('header-logo-width');
    $header_logo_height  = marketing_get_opt('header-logo-height');
    $output = '';
    if(marketing_get_opt('theme-skin') == 'theme-accent' || !empty($accent_color_first) || !empty($accent_color_second)):
      $output .=
     'body.theme-accent .c-btn.type-2:before,
      body.theme-accent .c-btn.type-2:after,
      body.theme-accent .c-btn.type-3,
      body.theme-accent .tt-arrow-left.type-1:hover,
      body.theme-accent .tt-arrow-right.type-1:hover,
      body.theme-accent .tt-tab-wrapper.type-1 .tt-nav-tab-item.active:after,
      body.theme-accent .custom-hover:before,
      body.theme-accent .tt-arrow-left.type-2:hover,
      body.theme-accent .tt-arrow-right.type-2:hover,
      body.theme-accent #loader span,
      body.theme-accent .tt-video-img:hover .tt-video-icon,
      body.theme-accent .tt-video-close:hover:before,
      body.theme-accent .tt-video-close:hover:after,
      body.theme-accent .tt-tab-wrapper.type-2 .tt-nav-tab-item:before,
      body.theme-accent .tt-service-icon:hover,
      body.theme-accent .simple-text blockquote:before,
      body.theme-accent .tt-topheading:before,
      body.theme-accent .tt-custom-pagination a:hover,
      body.theme-accent .tt-custom-pagination .active span,
      body.theme-accent .c-btn.type-2.color-2,
      body.theme-accent .widget_wysija_cont .wysija-submit, .form-submit, body.theme-accent #loader span,
      .woocommerce .onsale, .woocommerce-page .onsale,
      .ajax_add_to_cart.c-btn.type-2,
      .product_type_variable.add_to_cart_button.c-btn.type-2, .tt-custom-pagination .current,
      .price_slider_amount button[type="submit"],
      .widget_price_filter .ui-slider .ui-slider-handle,
      .widget_shopping_cart .buttons .checkout,
      .woocommerce-form-login input[type="submit"],
      .woocommerce .shop_table .button[name="apply_coupon"],
      .woocommerce-page .shop_table .button[name="apply_coupon"],
      .single_add_to_cart_button {
        background-color: '.esc_attr($accent_color_first).' !important; // main color
      }

      /* hover background hover woo buttons */
      .ajax_add_to_cart.c-btn.type-2:hover,
      .product_type_variable.add_to_cart_button.c-btn.type-2:hover,
      .widget_shopping_cart .buttons .checkout:hover,
      .price_slider_amount button[type="submit"]:hover,
      .woocommerce .wc-proceed-to-checkout .button:hover,
      .woocommerce .shop_table .button:hover,
      .woocommerce .single_add_to_cart_button.button:hover,
      .woocommerce-page .wc-proceed-to-checkout .button:hover,
      .woocommerce-page .shop_table .button:hover,
      .woocommerce-page .single_add_to_cart_button.button:hover {
        background:'.marketing_hex2rgba($accent_color_first, 0.80).' !important;
      }

      @media (max-width: 991px) {
       body.theme-accent .tt-header.style-2 .top-inner,
       body.theme-accent .tt-header.style-2 .toggle-block {
            background-color: '.esc_attr($accent_color_first).'; // main color
        }
      }

      body.theme-accent .tt-tab-wrapper.type-1 .tt-nav-tab-item:hover .lnr,
      body.theme-accent .tt-tab-wrapper.type-1 .tt-nav-tab-item.active .lnr,
      body.theme-accent .tt-service-icon span,
      body.theme-accent .tt-service-title:hover,
      body.theme-accent .tt-case-title:hover,
      body.theme-accent .tt-testimonial-label a:hover,
      body.theme-accent .tt-post-title:hover,
      body.theme-accent .c-btn.type-4,
      body.theme-accent .simple-text li:before,
      body.theme-accent .tt-mslide-2-title,
      body.theme-accent .tt-post-2-title:hover,
      body.theme-accent .tt-blog-cat,
      body.theme-accent .tt-blog-cat a,
      body.theme-accent .tt-s-search-submit .fa,
      body.theme-accent .tt-s-banner-title,
      body.theme-accent .c-btn.type-3:hover,
      body.theme-accent .simple-text a,
      body.theme-accent .simple-text blockquote,
      body.theme-accent .tt-s-post-title,
      body.theme-accent .tt-subscribe-title,
      body.theme-accent .tt-author-name:hover,
      body.theme-accent .tt-article-title:hover,
      body.theme-accent .tt-comment-name:hover,
      body.theme-accent .tt-comment-reply,
      body.theme-accent .tt-post-3-title:hover,
      body.theme-accent .tt-post-3-label a:hover,
      body.theme-accent .tt-post-3-favourite:hover,
      body.theme-accent .c-btn.type-2.color-2:hover,
      body.theme-accent .tt-team-title:hover,
      body.theme-accent .tt-team-social a:hover,
      body.theme-accent .tt-pricing-list li.active:before,
      body.theme-accent .tt-header .contact-details-module .detail-module i,
      body.theme-accent .c-btn.type-4:hover, .form-submit:hover, .simple-text blockquote p {
        color: '.esc_attr($accent_color_first).';
      }

      body.theme-accent .c-input.type-1:focus,
      body.theme-accent .c-input.type-3:focus,
      body.theme-accent .c-area.type-1:focus,
      body.theme-accent .swiper-pagination.type-1 .swiper-pagination-bullet,
      body.theme-accent #loader,
      body.theme-accent .tt-s-banner,
      body.theme-accent .c-input.type-4:focus,
      body.theme-accent .c-btn.type-3,
      body.theme-accent .c-area.type-2:focus,
      body.theme-accent .c-input.type-2:focus,
      body.theme-accent .tt-s-search input[type="text"]:focus,
      body.theme-accent .tt-custom-pagination a:hover,
      body.theme-accent .tt-custom-pagination .active span,
      body.theme-accent .widget_wysija_cont .wysija-submit,
      body.theme-accent .wysija-input:focus, .form-submit, .sticky,
      .widget_price_filter .ui-slider .ui-slider-handle {
        border-color: '.esc_attr($accent_color_first).';
      }

      body.theme-accent .tt-s-search-submit:hover .fa,
      body.theme-accent .simple-text a:hover,
      body.theme-accent .tt-s-post-title:hover,
      body.theme-accent .tt-comment-reply:hover {
        color: '.esc_attr($accent_color_second).';
      }

      body.theme-accent .c-btn.type-1,
      body.theme-accent .subscribe-form-style1 .wysija-submit,
      body.theme-accent .hero-slider-newsletter .wysija-submit {
        background: '.esc_attr($accent_color_first).';
        border-color: '.esc_attr($accent_color_second).';
        -webkit-box-shadow: 0px 4px 0px 0px '.esc_attr($accent_color_second).';
        -moz-box-shadow: 0px 4px 0px 0px '.esc_attr($accent_color_second).';
        box-shadow: 0px 4px 0px 0px '.esc_attr($accent_color_second).';
      }

      body.theme-accent .c-btn.type-1:active,
      body.theme-accent .subscribe-form-style1 .wysija-submit:active,
      body.theme-ornage .hero-slider-newsletter .wysija-submit:active {
        -webkit-box-shadow: 0px 1px 0px 0px '.esc_attr($accent_color_second).';
        -moz-box-shadow: 0px 1px 0px 0px '.esc_attr($accent_color_second).';
        box-shadow: 0px 1px 0px 0px '.esc_attr($accent_color_second).';
      }

      body.theme-accent .c-btn.type-2,
      .tt-custom-pagination .current {
        border-color: '.esc_attr($accent_color_first).';
      }

      body.theme-accent .swiper-pagination.type-1 .swiper-pagination-bullet-active {
        background: '.esc_attr($accent_color_first).';
        border-color: '.esc_attr($accent_color_first).';
      }

      body.theme-accent .tt-service-icon:hover span,
      body.theme-accent .c-btn.type-2:hover,
      body.theme-accent .c-btn.type-2.color-2 {
        color: #fff;
      }

      body.theme-accent .c-btn.type-2.color-2:before,
      body.theme-accent .c-btn.type-2.color-2:after {
        background: #fff;
      }

      @media (min-width:992px) {
        body.theme-accent .tt-header .main-nav > ul > li > ul > li > a:hover,
        body.theme-accent .tt-header .main-nav > ul > li > ul > li > ul > li > a:hover {
          background: '.esc_attr($accent_color_first).';
        }
      }

      @media (max-width:991px) {
        .tt-header .main-nav > ul > li > ul > li > a:hover {
          color: '.esc_attr($accent_color_first).';
        }
      }';
    endif;

    if(!empty($header_color_bg)):
      $output .=
      '@media (max-width:991px) {
        .tt-header .top-inner {
          background: '.esc_attr($header_color_bg).';
        }
      }';
    endif;

    $header_btn_border_color     = marketing_get_opt('header-btn-border-color');
    $header_btn_text_color       = marketing_get_opt('header-btn-text-color');
    $header_btn_text_hover_color = marketing_get_opt('header-btn-hover-text-color');
    $header_btn_bg_hover_color   = marketing_get_opt('header-btn-hover-bg-color');
    if(!empty($header_btn_text_color) || !empty($header_btn_border_color)):
      $output .= '.nav-more .c-btn.type-2 {';
      $output .= ($header_btn_border_color) ? 'border-color:'.esc_attr($header_btn_border_color).';':'';
      $output .= ($header_btn_text_color) ? 'color:'.esc_attr($header_btn_text_color).';':'';
      $output .= '}';
    endif;

    if(!empty($header_btn_text_hover_color)):
      $output .= '.nav-more .c-btn.type-2:hover {';
      $output .= ($header_btn_text_hover_color) ? 'color:'.esc_attr($header_btn_text_hover_color).';':'';
      $output .= '}';
    endif;

    if(!empty($header_btn_bg_hover_color)):
      $output .= '.nav-more .c-btn.type-2:before,.nav-more .c-btn.type-2:after {';
      $output .= ($header_btn_bg_hover_color) ? 'background:'.esc_attr($header_btn_bg_hover_color).';':'';
      $output .= '}';
    endif;


    if(!empty($header_logo_width) || !empty($header_logo_height)):
      $output .= '.tt-header .logo {';
      $output .= (!empty($header_logo_width))  ? 'width:'.esc_attr($header_logo_width).';':'';
      $output .= (!empty($header_logo_height)) ? 'height:'.esc_attr($header_logo_height).';':'';
      $output .= '}';
    endif;




    return $output;
  }
}

/**
 * Inline CSS code
 *
 * @param type $terms
 * @return boolean
 */
// if(!function_exists('marketing_inline_css')) {
//   global $marketing_force_content;
//   function marketing_inline_css(){
//   global $marketing_force_content;

//     $content = do_shortcode( get_page( get_the_ID() )->post_content );
//     $oArgs = ThemeArguments::getInstance('inline_style');
//     $inline_styles = $oArgs -> get('inline_styles');
//     if (is_array($inline_styles) && count($inline_styles) > 0) {
//       $marketing_force_content = $content;
//       return marketing_css_compress( htmlspecialchars_decode( wp_kses_data( join( '', $inline_styles ) ) ) );
//     }
//     $oArgs -> reset();

//   }
// }

