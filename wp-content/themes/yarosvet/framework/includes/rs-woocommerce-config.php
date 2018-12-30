<?php
/**
 * Woocommerce Config
 *
 * @package marketing
 * @since 1.0
 */

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function marketing_cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) {
  $product = get_product( $cart_item['product_id'] );
  return $product->get_image( 'maverick-shop-cart-thumb' );
}
add_filter( 'woocommerce_cart_item_thumbnail', 'marketing_cart_item_thumbnail', 10, 3 );

// define the woocommerce_cart_item_price callback
function marketing_woocommerce_cart_item_price( $wc, $cart_item, $cart_item_key ) {
  return '<p>'.wp_kses_post($wc).'</p>';
};
add_filter( 'woocommerce_cart_item_price', 'marketing_woocommerce_cart_item_price', 10, 3 );

function marketing_loop_post_per_page($cols) {
  $posts_per_page = marketing_get_opt('shop-post-per-page');
  $limit          = (!empty($posts_per_page)) ? $posts_per_page:8;
  return $limit;
}
add_filter( 'loop_shop_per_page', 'marketing_loop_post_per_page', 20 );

function marketing_woocommerce_cart_item_subtotal( $wc, $cart_item, $cart_item_key ) {
  // make filter magic happen here...
  return '<p>'.wp_kses_post($wc).'</p>';
};
add_filter( 'woocommerce_cart_item_subtotal', 'marketing_woocommerce_cart_item_subtotal', 10, 3 );

// add the filter

if ( ! function_exists( 'marketing_woocommerce_enabled' ) ) {
  function marketing_woocommerce_enabled() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
  }
}

add_filter( 'get_product_search_form' , 'marketing_woo_custom_product_searchform' );
function marketing_woo_custom_product_searchform( $form ) {
  
  $form = '<div class="tt-s-search"><form role="search" class="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
    <div>
      <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_html__( 'Search Products..', 'marketing' ) . '" />

      <div class="tt-s-search-submit">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input type="submit" id="searchsubmit" class="search-field" value="" />
      <input type="hidden" name="post_type" value="product" />

      </div>

    </div>
  </form></div>';
  
  return $form;
  
}

function marketing_woocommerce_template_loop_product_thumbnail() { ?>

  <div class="overlay">
    <div class="overlay-inner">
      <?php woocommerce_template_loop_add_to_cart(); ?>                      
    </div><!-- /overlay-inner -->
  </div>
  <?php
}

add_action('woocommerce_before_shop_loop_item_title', 'marketing_woocommerce_template_loop_product_thumbnail');

/**
 * Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
 * @param array $fragments
 * @return type
 */
function marketing_woocommerce_header_add_to_cart_fragment( $fragments ) {

  global $woocommerce;
  $url = $woocommerce->cart->get_cart_url();

  ob_start();

?>

<div class="cart">
  <a href="<?php echo WC()->cart->get_cart_url(); ?>"><?php echo esc_html__('Cart', 'marketing'); ?> <span>(<i><?php echo WC()->cart->cart_contents_count; ?></i>)</span></a>
  <div class="cart-items-container">
      <?php if ( sizeof( WC()->cart->get_cart() ) == 0 ): ?>
        <div class="Link-Cart cart-empty">
          <h5><?php esc_html_e('Cart is empty', 'marketing'); ?></h5>
        </div>
      <?php else: ?>

      <?php
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ):
          $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
          $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
          $thumbnail  = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

          if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ):
      ?>
      <div class="cart-item">
        <figure>
          <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
          </a>
        </figure>
        <div class="item-info">
            <ul class="categories">
              <li><?php echo $_product->get_categories( ' ', '', '' ); ?></li>
            </ul>
            <h6>
              <?php
              if ( ! $_product->is_visible() )
                echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
              else
                echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="title"> %sx %s</a>', esc_url($_product->get_permalink()), $cart_item['quantity'], $_product->get_title() ), $cart_item, $cart_item_key );
              ?>
            </h6>
            <p class="price"><ins><?php echo esc_html__('$', 'marketing'); ?><?php echo get_post_meta( $cart_item['product_id'], '_regular_price', true); ?></ins></p>
            <p><?php echo esc_html__('Qty:', 'marketing'); ?> <?php echo $cart_item['quantity']; ?></p>
        </div><!-- /item-info -->
      </div><!-- /cart-item -->
      <?php
        endif; //if
        endforeach; //foreach
      ?>
      <div class="cart-footer">
        <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="checkout-button"><?php echo esc_html__('Checkout', 'marketing'); ?></a>
      </div><!-- /cart-footer -->
      <?php endif; ?>
  </div><!-- /cart-items-container -->
</div><!-- /container -->

  <?php
  $fragments['div.shopping-cart-block-w'] = ob_get_clean();

  return $fragments;
}

//add_filter( 'woocommerce_add_to_cart_fragments', 'marketing_woocommerce_header_add_to_cart_fragment' );
