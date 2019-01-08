<?php
/**
 * Contact Details widget
 *
 * @package marketing-addons
 */

class marketing_WP_Contact_Details_Widget extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array('classname' => 'widget_contact_details', 'description' => esc_html__( 'Diplay Contact Details', 'marketing-addons' ) );
    parent::__construct('contact-details', esc_html__( '- Marketing: Contact Details', 'marketing-addons' ), $widget_ops);

    $this-> alt_option_name = 'widget_contact_details';

    add_action( 'save_post', array(&$this, 'flush_widget_cache') );
    add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
    add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
  }

  function widget($args, $instance)
  {
    global $post;

    $cache = wp_cache_get('widget_contact_details', 'widget');

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

    <?php if(isset($instance['phone_no']) || isset($instance['email']) || isset($instance['location'])): ?>

    <?php if(isset($instance['location']) && !empty($instance['location'])): ?>
    <div class="tt-address d-flex">
      <div class="tt-address-icon d-flex align-items-center justify-content-center"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
      <div class="tt-address-info">
        <a href="https://yandex.ru/maps/213/moscow?text=<?php echo wp_kses_post($instance['location']); ?>" target="_blank"><?php echo wp_kses_post($instance['location']); ?></a>
        
      </div>
    </div>
    <div class="empty-space marg-lg-b15"></div>
    <?php endif; ?>

    <?php if(isset($instance['email']) && !empty($instance['email'])): ?>
    <div class="tt-address d-flex">
      <div class="tt-address-icon d-flex align-items-center justify-content-center"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
      <div class="tt-address-info">
        <a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
      </div>
    </div>
    <div class="empty-space marg-lg-b15"></div>
    <?php endif; ?>

    <?php if(isset($instance['phone_no']) && !empty($instance['phone_no'])): ?>
    <div class="tt-address d-flex">
      <div class="tt-address-icon d-flex align-items-center justify-content-center"><i class="fa fa-phone" aria-hidden="true"></i></div>
      <div class="tt-address-info">
        <a href="tel:<?php echo $instance['phone_no']; ?>"><?php echo $instance['phone_no']; ?></a>
      </div>
    </div>
    <div class="empty-space marg-lg-b40 marg-xs-b30"></div>
    <?php endif; ?>


    <?php endif; ?>

    <?php echo $after_widget;
    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_contact_details', $cache, 'widget');
  }

  function update( $new_instance, $old_instance )
  {
    $instance             = $old_instance;
    $instance['title']    = strip_tags($new_instance['title']);
    $instance['phone_no'] = strip_tags($new_instance['phone_no']);
    $instance['email']    = wp_kses_post($new_instance['email']);
    $instance['location'] = wp_kses_post($new_instance['location']);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get( 'alloptions', 'options' );
    if ( isset($alloptions['widget_contact_details']) )
    {
      delete_option('widget_contact_details');
    }
    return $instance;
  }

  function flush_widget_cache()
  {
    wp_cache_delete('widget_contact_details', 'widget');
  }

  function form( $instance ) {
    $title    = isset($instance['title']) ? $instance['title'] : '';
    $phone_no = isset($instance['phone_no']) ? $instance['phone_no'] : '';
    $email    = isset($instance['email']) ? $instance['email'] : '';
    $location     = isset($instance['location']) ? $instance['location'] : '';

    ?>
    <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'marketing-addons' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id('location')); ?>"><?php esc_html_e( 'Address', 'marketing-addons' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('location')); ?>" name="<?php echo esc_attr($this->get_field_name('location')); ?>" type="text" value="<?php echo esc_attr($location); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e( 'Email', 'marketing-addons' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e( 'Phone Number', 'marketing-addons' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" /></p>

    <?php
  }
}
