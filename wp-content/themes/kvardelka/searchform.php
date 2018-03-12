<?php
/**
 *
 * Search form.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
?>

<div class="tt-s-search">
  <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search">
    <input type="text" required="" placeholder="<?php echo esc_html__('Search articles', 'marketing'); ?>">
    <div class="tt-s-search-submit">
      <i class="fa fa-search" aria-hidden="true"></i>
      <input class="search-field" type="search" id="s" name="s" value="">
      <input type="submit" value="">
    </div>
  </form>
</div>