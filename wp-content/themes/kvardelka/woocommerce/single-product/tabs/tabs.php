<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

  
<div class="tt-tab-wrapper type-1 woocommerce-tabs">
  <div class="tt-tab-nav-wrapper">

    <div class="tt-nav-tab mbottom50">
    <?php
    $i = 0;
    foreach( $tabs as $key => $tab) {
      $icon       = ( isset($tab['atts']['icon'])) ? $tab['atts']['icon']:'lnr lnr-chart-bars';
      $active_nav = ( $i === 0 ) ? ' active' : '';
    ?>
      <div class="tt-nav-tab-item <?php echo esc_attr($active_nav); ?>">
      <span class="tt-analitics-text"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
      </div>
    <?php $i++;
    } ?>

    </div>
  </div>

    <div class="tt-tabs-content clearfix mbottom50">
      <?php
      $i = 0;
      foreach( $tabs as $key => $tab) {
        $active_nav = ( $i === 0 ) ? ' active' : '';
      ?>
        <div class="tt-tab-info <?php echo esc_attr($active_nav); ?>">
          <?php call_user_func( $tab['callback'], $key, $tab ); ?>
        </div>
      <?php $i++;
      } ?>

    </div>
</div>          

<?php endif; ?>

