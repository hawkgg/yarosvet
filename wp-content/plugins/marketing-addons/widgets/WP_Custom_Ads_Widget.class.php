<?php
/**
 * Contact Form widget
 *
 * @package marketing
 */

class marketing_WP_Custom_Ads_Widget extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_ads_entries', 'description' => __( "Add Custom ads", 'marketing-addons' ) );
        parent::__construct('custom-ads', __( '- Marketing: Custom Ads', 'marketing-addons' ), $widget_ops);

        $this-> alt_option_name = 'widget_ads_entries';

        add_action( 'save_post',    array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance)
    {
        global $post;

        $cache = wp_cache_get('widget_ads_entries', 'widget');

        if ( !is_array($cache) )
        {
            $cache = array();
        }
        if ( ! isset( $args['widget_id'] ) )
        {
          $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) )
        {
          echo $cache[ $args['widget_id'] ];
          return;
        }

        ob_start();
        extract($args);
        echo $before_widget;

        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

        if ($title):
            echo $before_title.esc_html($title).$after_title;
        endif; ?>
        <?php if(isset($instance['url'])): ?>
        <div class="tt-s-advert">
          <img class="img-responsive" src="<?php echo esc_url($instance['url']); ?>" height="400" width="317" alt="">
        </div>
        <?php endif; ?> 

        <?php echo $after_widget;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_ads_entries', $cache, 'widget');
    }

    function update( $new_instance, $old_instance )
    {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['url'] = $new_instance['url'];
      $this->flush_widget_cache();

      $alloptions = wp_cache_get( 'alloptions', 'options' );
      if ( isset($alloptions['widget_ads_entries']) )
      {
          delete_option('widget_ads_entries');
      }
      return $instance;
    }

    function flush_widget_cache()
    {
      wp_cache_delete('widget_ads_entries', 'widget');
    }

    function form( $instance )
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $url   = isset($instance['url']) ? $instance['url'] : '';
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title:', 'marketing-addons' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'url' )); ?>"><?php esc_html_e('Image URL:','marketing-addons'); ?> <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'url' )); ?>" type="text" value="<?php echo esc_attr($url); ?>" /></label></p>
        <?php
    }
}
