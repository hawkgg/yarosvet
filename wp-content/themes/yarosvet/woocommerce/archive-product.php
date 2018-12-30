<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

?>

<?php do_action( 'woocommerce_before_main_content' ); ?>

<section class="main-content">
  <div class="empty-space  marg-lg-b100 marg-sm-b50 marg-xs-b30"></div>
  <div class="container">
    <?php get_template_part('templates/global/woocommerce-page-before-content'); ?>
      <div class="page-content">
        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>

          <?php do_action( 'woocommerce_before_shop_loop' ); ?>

          <?php woocommerce_product_loop_start(); ?>

            <?php woocommerce_product_subcategories(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

              <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php endwhile; // end of the loop. ?>

          <?php woocommerce_product_loop_end(); ?>

          <?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

          <?php wc_get_template( 'loop/no-products-found.php' ); ?>

        <?php endif; ?>
        
      </div>
    <?php get_template_part('templates/global/woocommerce-page-after-content'); ?>
  </div>
</section>

<div class="empty-space  marg-lg-b100 marg-sm-b50 marg-xs-b30"></div>

<?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer( 'shop' ); ?>