<?php
/**
 * Latest posts widget
 *
 * @package marketing
 */

class marketing_WP_Newsletter_Widget extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'widget_newsletter_entries', 'description' => __( "Add newsletter", 'marketing-addons' ) );
        parent::__construct('subscribe-widget', __( '- Marketing: Newsletter', 'marketing-addons' ), $widget_ops);

        $this-> alt_option_name = 'widget_newsletter_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance)
    {
        global $post;

        $cache = wp_cache_get('widget_newsletter_entries', 'widget');

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
        if(function_exists('newsletter_form')):
        ?>

        <div class="tt-s-banner">
            <?php if(isset($instance['img_url']) && !empty($instance['img_url'])): ?>
              <img class="img-responsive" src="<?php echo esc_url($instance['img_url']); ?>" alt="">
            <?php endif; ?>
          <?php if($title): ?>
            <h5 class="tt-s-banner-title"><?php echo esc_html($title); ?></h5>
          <?php endif; ?>
          <div class="simple-text text-center size-3">
            <p><?php echo esc_html($instance['content']); ?></p>
          </div>
          <form method="post" action="<?php echo esc_url(home_url('/')); ?>?na=s" onsubmit="return newsletter_check(this)">
            <div class="c-input-4-wrapper">
                <input class="c-input type-4" type="email" name="ne" required="" placeholder="<?php echo esc_attr($instance['email_placeholder']); ?>">
                <div class="c-input-4-icon"><span class="lnr lnr-envelope"></span></div>
            </div>
            <div class="c-btn type-3 size-2 border-2 full">
               <input type="submit" class="newsletter-submit" value="<?php echo esc_attr($instance['btn_text']); ?>"> 
            </div>                                
        </form>
        </div>
        <?php endif; ?>
        <?php echo $after_widget;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_newsletter_entries', $cache, 'widget');
    }

    function update( $new_instance, $old_instance )
    {
        $instance                      = $old_instance;
        $instance['title']             = strip_tags($new_instance['title']);
        $instance['img_url']           = strip_tags($new_instance['img_url']);
        $instance['email_placeholder'] = strip_tags($new_instance['email_placeholder']);
        $instance['btn_text']          = strip_tags($new_instance['btn_text']);
        $instance['content']           = $new_instance['content'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_newsletter_entries']) )
        {
            delete_option('widget_newsletter_entries');
        }
        return $instance;
    }

    function flush_widget_cache()
    {
        wp_cache_delete('widget_newsletter_entries', 'widget');
    }

    function form( $instance )
    {
        $title             = isset($instance['title']) ? $instance['title'] : '';
        $img_url           = isset($instance['img_url']) ? $instance['img_url'] : '';
        $email_placeholder = isset($instance['email_placeholder']) ? $instance['email_placeholder'] : 'Your Email';
        $btn_text          = isset($instance['btn_text']) ? $instance['btn_text'] : 'Gimmie Ebook';
        $content           = isset($instance['content']) ? $instance['content'] : '';
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e( 'Title:', 'marketing-addons' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <p><label for="<?php echo esc_attr($this->get_field_id('img_url')); ?>"><?php _e( 'Imgae URL:', 'marketing-addons' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_url')); ?>" name="<?php echo esc_attr($this->get_field_name('img_url')); ?>" type="text" value="<?php echo esc_attr($img_url); ?>" /></p>
        <p><label for="<?php echo esc_attr($this->get_field_id('email_placeholder')); ?>"><?php _e( 'Email Placeholder:', 'marketing-addons' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_placeholder')); ?>" name="<?php echo esc_attr($this->get_field_name('email_placeholder')); ?>" type="text" value="<?php echo esc_attr($email_placeholder); ?>" /></p>
        <p><label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php _e( 'Button Text:', 'marketing-addons' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" type="text" value="<?php echo esc_attr($btn_text); ?>" /></p>
        <p><label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php _e( 'Subscribe Content:', "marketing-addons" ); ?></label>
        <textarea class="widefat" rows="7" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_textarea($content); ?></textarea></p>
       
        <?php
    }
}
