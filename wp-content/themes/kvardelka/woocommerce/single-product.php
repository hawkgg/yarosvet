<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

get_header( 'shop' );

?>

<section class="main-content">
  <div class="empty-space  marg-lg-b100 marg-sm-b50 marg-xs-b30"></div>
  <div class="container">
    <div class="row">

      <?php //cs_page_sidebar( 'left', $cs_page_layout ); ?>

      <div class="col-md-12">
        <div class="page-content">
          <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
          ?>

            <?php while ( have_posts() ) : the_post(); ?>

              <?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endwhile; // end of the loop. ?>

          <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
          ?>

        </div><!-- /page-content -->
      </div><!-- /colmd -->

      <?php //cs_page_sidebar( 'right', $cs_page_layout ); ?>

    </div>
  </div>
</section>
<div class="empty-space  marg-lg-b80 marg-sm-b50 marg-xs-b30"></div>
<?php get_footer( 'shop' ); ?>