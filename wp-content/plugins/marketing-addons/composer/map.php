<?php
/*
* Visual Composre Map File
*/
function rs_get_current_post_type() {

  $type = false;

  if( isset( $_GET['post'] ) ) {
    $id = $_GET['post'];
    $post = get_post( $id );

    if( is_object( $post ) && $post->post_type == 'portfolio' ) {
      $type = true;
    }

  } elseif ( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'portfolio' ) {
    $type = true;
  }

  return $type;

}

include_once( RS_ROOT .'/composer/helpers.php' );
include_once( RS_ROOT .'/composer/params.php' );

if ( ! function_exists( 'is_plugin_active' ) ) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
}

$vc_column_width_list = array(
  '1 column - 1/12'     => '1/12',
  '2 columns - 1/6'     => '1/6',
  '3 columns - 1/4'     => '1/4',
  '4 columns - 1/3'     => '1/3',
  '5 columns - 5/12'    => '5/12',
  '6 columns - 1/2'     => '1/2',
  '7 columns - 7/12'    => '7/12',
  '8 columns - 2/3'     => '2/3',
  '9 columns - 3/4'     => '3/4',
  '10 columns - 5/6'    => '5/6',
  '11 columns - 11/12'  => '11/12',
  '12 columns - 1/1'    => '1/1'
);

$vc_map_extra_id = array(
  'type'        => 'textfield',
  'heading'     => 'Extra ID',
  'param_name'  => 'id',
  'group'       => 'Extras'
);

$vc_map_extra_class = array(
  'type'        => 'textfield',
  'heading'     => 'Extra Class',
  'param_name'  => 'class',
  'group'       => 'Extras'
);


// ==========================================================================================
// GOOGLE MAP
// ==========================================================================================
vc_map( array(
  'name'          => 'Google Map',
  'base'          => 'rs_google_map',
  'icon'          => 'fa fa-map-marker',
  'description'   => 'Add google map.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Latitude',
      'param_name'  => 'latitude',
      'admin_label' => true
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Longitude',
      'param_name'  => 'longitude',
      'admin_label' => true
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Street Name',
      'param_name'  => 'string',
      'admin_label' => true
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Zoom Size',
      'param_name'  => 'zoom_size',
      'admin_label' => true
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// TESTIMONIAL
// ==========================================================================================
vc_map( array(
  'name'          => 'Testimonial',
  'base'          => 'rs_testimonial',
  'icon'          => 'fa fa-comments',
  'description'   => 'Create a testimonial block.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1'   => 'type-1',
        'Style 2'   => 'type-2',
        'Style 3'   => 'type-3',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Category ID',
      'param_name'  => 'cats',
      'value'       => rs_element_values( 'categories', array('sort_order'  => 'ASC','taxonomy'    => 'testimonial-category','hide_empty'  => false,) ),
      'std'         => '',
      'placeholder' => 'Choose Category',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Limit',
      'param_name'  => 'limit',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// TEAM BLOCK
// ==========================================================================================
$member_name = rs_element_values('post', array('post_type' => 'team', 'posts_per_page' => -1));
vc_map( array(
  'name'          => 'Team member',
  'base'          => 'rs_team',
  'icon'          => 'fa fa-users',
  'description'   => 'Add team block.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1'   => 'style1',
        'Style 2'   => 'style2',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Member',
      'description' => 'Select member name to show.',
      'param_name'  => 'person_id',
      'std'         => '',
      'placeholder' => 'Choose Category',
      'value'       => $member_name,
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Limit',
      'param_name'  => 'limit',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Per Slide',
      'param_name'  => 'per_slide',
      'dependency'  => array( 'element' => 'style', 'value' => array('style2') ),
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// IMAGE BLOCK
// ==========================================================================================
vc_map( array(
  'name'          => 'Image Block',
  'base'          => 'rs_image_block',
  'icon'          => 'fa fa-image',
  'description'   => 'Add image.',
  'params'        => array(
    array(
      'type'       => 'dropdown',
      'heading'    => 'Align',
      'param_name' => 'align',
      'value'      => array(
        'Left'   => 'left-block',
        'Center' => 'center-block',
      ),
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => 'Shadow',
      'param_name' => 'shadow',
      'value'      => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'admin_label' => true,
      'param_name'  => 'image',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// IMAGE VIDEO BLOCK
// ==========================================================================================
vc_map( array(
  'name'          => 'Image Video Block',
  'base'          => 'rs_image_video_block',
  'icon'          => 'fa fa-image',
  'description'   => 'Add image and video.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Youtube Video URL',
      'admin_label' => true,
      'param_name'  => 'video_url',
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'admin_label' => true,
      'param_name'  => 'image',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );


if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {

  global $wpdb;

  $db_cf7froms  = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form'");
  $cf7_forms    = array();

  if ( $db_cf7froms ) {

    foreach ( $db_cf7froms as $cform ) {
      $cf7_forms[$cform->post_title] = $cform->ID;
    }

  } else {
    $cf7_forms['No contact forms found'] = 0;
  }

// ==========================================================================================
// Contact Form
// ==========================================================================================

  vc_map( array(
  'name'            => 'Contact Form',
  'base'            => 'rs_contact_form',
  'icon'            => 'fa fa-envelope ',
  'description'     => 'Contact Form 7',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Contact Form',
      'param_name'  => 'form_id',
      'value'       => $cf7_forms,
      'admin_label' => true,
      'description' => 'Choose previously created contact form from the drop down list.',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )

) );


}

// ==========================================================================================
// Blog News
// ==========================================================================================
vc_map( array(
  'name'            => 'Blog News',
  'base'            => 'rs_blog',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a latest news post.',
  'params'          => array(
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Select Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Select category',
      'value'       => rs_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'category',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'You can choose specific categories for blog, default is all categories.',
    ),
    array(
      'type'        => 'dropdown',
      'admin_label' => true,
      'heading'     => 'Order by',
      'param_name'  => 'orderby',
      'value'       => array(
        'ID'            => 'ID',
        'Author'        => 'author',
        'Post Title'    => 'title',
        'Date'          => 'date',
        'Last Modified' => 'modified',
        'Random Order'  => 'rand',
        'Comment Count' => 'comment_count',
        'Menu Order'    => 'menu_order',
      ),
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// Blog List News
// ==========================================================================================
vc_map( array(
  'name'            => 'Blog List News',
  'base'            => 'rs_blog_list',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a news list post.',
  'params'          => array(
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Select Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Select category',
      'value'       => rs_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'category',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'You can choose specific categories for blog, default is all categories.',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Per Page',
      'param_name'  => 'posts_per_page',
    ),
    array(
      'type'        => 'dropdown',
      'admin_label' => true,
      'heading'     => 'Order by',
      'param_name'  => 'orderby',
      'value'       => array(
        'ID'            => 'ID',
        'Author'        => 'author',
        'Post Title'    => 'title',
        'Date'          => 'date',
        'Last Modified' => 'modified',
        'Random Order'  => 'rand',
        'Comment Count' => 'comment_count',
        'Menu Order'    => 'menu_order',
      ),
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
) );

// ==========================================================================================
// SPECIAL TEXT
// ==========================================================================================
vc_map( array(
  'name'          => 'Special Text',
  'base'          => 'rs_special_text',
  'icon'          => 'fa fa-tint',
  'description'   => 'Create special text.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Font',
      'param_name'  => 'font',
      'admin_label' => true,
      'value'       => array_flip(rs_get_font_choices(true)),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Tag Name',
      'param_name'  => 'tag',
      'value'       => array(
        'H1'  => 'h1',
        'H2'  => 'h2',
        'H3'  => 'h3',
        'H4'  => 'h4',
        'H5'  => 'h5',
        'H6'  => 'h6',
        'div' => 'div',
      ),
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div',
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Align',
      'param_name'  => 'align',
      'value'       => array(
        'Select Align' => '',
        'Left'   => 'left',
        'Center' => 'center',
        'Right'  => 'right',
      ),
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Font Size',
      'param_name'  => 'font_size',
      'description' => 'Enter the size in pixel e.g 45px',
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Line Height',
      'param_name'  => 'line_height',
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Letter Spacing',
      'param_name'  => 'letter_spacing',
      'description' => 'Enter the size in pixel e.g 1px',
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Font Color',
      'param_name'  => 'font_color',
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Weight',
      'param_name'  => 'font_weight',
      'value'       => array(
        'Light'      => '300',
        'Normal'     => '400',
        'Bold'       => '600',
        'Bold'       => '700',
        'Extra Bold' => '800',
      ),
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Style',
      'param_name'  => 'font_style',
      'value'       => array(
        'Normal' => 'normal',
        'Italic' => 'italic',
      ),
      'group'       => 'Custom Font Properties'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Text Transform',
      'param_name'  => 'transform',
      'value'       => array(
        'Select Transform' => '',
        'Uppercase'        => 'uppercase',
        'Lowercase'        => 'lowercase',
      ),
      'group'       => 'Custom Font Properties'
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Top',
      'param_name'  => 'margin_top',
      'description' => 'Enter the size in pixel e.g 45px',
      'group'       => 'Custom Margin Properties'
    ),

    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Bottom',
      'param_name'  => 'margin_bottom',
      'description' => 'Enter the size in pixel e.g 45px',
      'group'       => 'Custom Margin Properties'
    ),
    array(
      'type' => 'css_editor',
      'heading' => esc_html__( 'CSS box', 'js_composer' ),
      'param_name' => 'css',
      'group' => esc_html__( 'Design Options', 'js_composer' )
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );


// ==========================================================================================
// Case Study ( Latest Works )
// ==========================================================================================
vc_map( array(
  'name'            => 'Case Study',
  'base'            => 'rs_case_study',
  'icon'            => 'fa fa-briefcase',
  'description'     => 'Create a case study',
  'params'          => array(
    array(
      'type'       => 'dropdown',
      'heading'    => 'Style',
      'param_name' => 'style',
      'value'      => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2',
        'Style 3' => 'style3',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Categories',
      'description' => 'Show service items only from these categories',
      'param_name'  => 'cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('service-category'),
      'admin_label' => true,
      'std'         => '',
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => 'Show Filter',
      'param_name' => 'filter',
      'value'      => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
    ),
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Filter categories',
      'param_name'  => 'filter_cats',
      'placeholder' => 'Categories',
      'value'       => rs_get_custom_term_values('service-category'),
      'admin_label' => true,
      'std'         => '',
      'dependency'  => array( 'element' => 'filter', 'value' => array('yes') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Limit',
      'param_name'  => 'limit',
      'admin_label' => true,
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Exclude posts',
      'description' => 'Post IDs you want to exclude, separated by commas eg. 120,123,1005',
      'param_name'  => 'exclude_posts',
      'admin_label' => true,
      'value'       => ''
    ),
    // Extras
    $vc_map_extra_class,
  )

) );

// ==========================================================================================
// ICON BOX // marketing
// ==========================================================================================
vc_map( array(
  'name'          => 'Icon Box',
  'base'          => 'rs_icon_box',
  'icon'          => 'fa fa-dot-circle-o',
  'description'   => 'Create a feature box.',
  'params'        => array(
    array(
      'type'       => 'dropdown',
      'heading'    => 'Style',
      'param_name' => 'style',
      'value'      => array(
        'Style 1' => 'type-1',
        'Style 1 without links' => 'type-6',
        'Style 2' => 'type-2',
        'Style 2 without links' => 'type-7',
        'Style 3' => 'type-3',
        'Style 3 without links' => 'type-8',
        'Style 4' => 'type-4',
        'Style 4 without links' => 'type-9',
        'Style 5' => 'type-5',
        'Style 5 without links' => 'type-10',
        'Style 6' => 'type-11',
      ),
    ),
    array(
      'type'        => 'vc_icon',
      'heading'     => 'Icon',
      'param_name'  => 'icon',
      'placeholder' => 'Select Icon',
      'icon_type'   => 'font_icon',
      'description' => 'Please select icon if you select accordion type to with icon.',
      'value'       => '',
    ),
    array(
      'type'       => 'dropdown',
      'heading'    => 'Color',
      'param_name' => 'color',
      'value'      => array(
        'Green' => 'color-1',
        'Blue'  => 'color-2',
      ),
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Icon',
      'param_name'  => 'img_icon',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heding',
      'param_name'  => 'heading',
      'holder'      => 'h3'
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Link',
      'param_name'  => 'icon_box_link',
      'dependency'  => array( 'element' => 'style', 'value' => array('type-1', 'type-2', 'type-3', 'type-4', 'type-5') ),
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// Call To Action
// ==========================================================================================
vc_map( array(
  'name'          => 'Call To Action',
  'base'          => 'rs_cta',
  'icon'          => 'fa fa-space-shuttle',
  'description'   => 'Create a cta box.',
  'params'        => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'param_name'  => 'image',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'h3',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// Text Block With Button
// ==========================================================================================
vc_map( array(
  'name'          => 'Text Block With Button',
  'base'          => 'rs_text_block_with_button',
  'icon'          => 'fa fa-space-shuttle',
  'description'   => 'Create a text block with button.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'h3',
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'holder'      => 'div',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Border Color',
      'param_name'  => 'button_border_color',
      'group'       => 'Custom Button Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Background Hover Color',
      'param_name'  => 'button_background_hover',
      'group'       => 'Custom Button Properties'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Text Color',
      'param_name'  => 'button_text_color',
      'group'       => 'Custom Button Properties'
    ),
    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

//if ( is_plugin_active( 'wysija-newsletters/index.php' ) ) {
  // ==========================================================================================
  // Newsletter
  // ==========================================================================================
  vc_map( array(
    'name'          => 'Newsletter',
    'base'          => 'rs_newsletter',
    'icon'          => 'fa fa-space-shuttle',
    'description'   => 'Create a subscribe box.',
    'params'        => array(
      array(
        'type'       => 'dropdown',
        'heading'    => 'Style',
        'param_name' => 'style',
        'value'      => array(
          'Style 1' => 'style1',
          'Style 2' => 'style2',
        ),
      ),
      array(
        'type'        => 'attach_image',
        'heading'     => 'Image',
        'param_name'  => 'image',
        'dependency'  => array( 'element' => 'style', 'value' => array('style1') ),
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Big Heading',
        'param_name'  => 'big_heading',
        'holder'      => 'h3',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Small Heading',
        'param_name'  => 'small_heading',
        'holder'      => 'h5',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Name Placeholder',
        'param_name'  => 'name_placeholder',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Email Placeholder',
        'param_name'  => 'email_placeholder',
      ),
      array(
        'type'        => 'textfield',
        'heading'     => 'Button Text',
        'param_name'  => 'button_placeholder',
      ),
      // Extras
      $vc_map_extra_id,
      $vc_map_extra_class,

    )
  ) );
//}


// ==========================================================================================
// Space
// ==========================================================================================
vc_map( array(
  'name'          => 'Space',
  'base'          => 'rs_space',
  'icon'          => 'fa fa fa-arrows-v',
  'description'   => 'Add space.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'lg_device',
      'group'       => 'Large Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'md_device',
      'group'       => 'Medium Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'sm_device',
      'group'       => 'Small Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'admin_label' => true,
      'param_name'  => 'xs_device',
      'group'       => 'Extra Small Device',
      'value'       => rs_get_space_array(),
      'description' => 'All values are in px'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Divider
// ==========================================================================================
vc_map( array(
  'name'          => 'Divider',
  'base'          => 'rs_divider',
  'icon'          => 'fa fa fa-arrows-v',
  'description'   => 'Add divider.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Top',
      'admin_label' => true,
      'param_name'  => 'margin_top',
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Margin Bottom',
      'admin_label' => true,
      'param_name'  => 'margin_bottom',
      'description' => 'All values are in px'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Border Color',
      'admin_label' => true,
      'param_name'  => 'border_color',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );


// ==========================================================================================
// BUTTONS
// ==========================================================================================
vc_map( array(
  'name'          => 'Buttons',
  'base'          => 'rs_button',
  'icon'          => 'fa fa-square',
  'description'   => 'Create a classy button.',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Align',
      'param_name'  => 'align',
      'value'       => array(
        'Left'   => 'text-left',
        'Center' => 'text-center',
        'Right'  => 'text-right',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1' => 'type-1',
        'Style 2' => 'type-2',
        'Style 3' => 'type-3',
        'Style 4' => 'type-4',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Color',
      'param_name'  => 'color',
      'value'       => array(
        'Green'  => 'color-2',
        'Orange' => 'color-4',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Button Size',
      'param_name'  => 'size',
      'admin_label' => true,
      'value'       => array(
        'Small'  => 'size-2',
        'Medium' => 'size-3',
        'Large'  => 'size-4',
      ),
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'admin_label' => true,
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// Blockquote
// ==========================================================================================
vc_map( array(
  'name'          => 'Blockquote',
  'base'          => 'rs_blockquote',
  'icon'          => 'fa fa-quote-left',
  'description'   => 'Add blockquote.',
  'params'        => array(
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'holder'      => 'div',
      'param_name'  => 'content',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Cite',
      'admin_label' => true,
      'param_name'  => 'cite',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Video banner
// ==========================================================================================
vc_map( array(
  'name'          => 'Video Banner',
  'base'          => 'rs_video_banner',
  'icon'          => 'fa fa-video-camera',
  'description'   => 'Add video banner.',
  'params'        => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Image',
      'admin_label' => true,
      'param_name'  => 'image',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Link',
      'admin_label' => true,
      'param_name'  => 'link',
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Section Title
// ==========================================================================================
vc_map( array(
  'name'          => 'Section Heading',
  'base'          => 'rs_section_heading',
  'icon'          => 'fa fa-text-width',
  'description'   => 'Add section heading.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'holder'      => 'h4',
      'param_name'  => 'small_heading',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Big Heading',
      'holder'      => 'h1',
      'param_name'  => 'big_heading',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// VC ACCORDION
// ==========================================================================================
vc_map( array(
  'name'            => 'FAQ',
  'base'            => 'vc_accordion',
  'is_container'    => true,
  'icon'            => 'fa fa-plus-circle',
  'description'     => 'Accordion',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Active tab',
      'param_name'  => 'active',
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

  'custom_markup'   => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>',
  'default_content' => '
    [vc_accordion_tab title="Section 1"][/vc_accordion_tab]
    [vc_accordion_tab title="Section 2"][/vc_accordion_tab]
  ',
  'js_view'         => 'VcAccordionView'
) );

// ==========================================================================================
// VC ACCORDION TAB
// ==========================================================================================
vc_map( array(
  'name'                      => 'FAQ Section',
  'base'                      => 'vc_accordion_tab',
  'allowed_container_element' => 'vc_row',
  'is_container'              => true,
  'content_element'           => false,
  'params'                    => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
    ),
  ),
  'js_view'         => 'VcAccordionTabView'
) );

// ==========================================================================================
// Pricing Table
// ==========================================================================================
vc_map( array(
  'name'        => 'Pricing Table',
  'base'        => 'rs_pricing_table',
  'icon'        => 'fa fa-dollar',
  'description' => 'Create a pricing table.',
  'params'  => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Plan',
      'param_name'  => 'plan',
      'value'       => '',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Currency',
      'param_name'  => 'currency',
      'value'       => '',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Price',
      'param_name'  => 'price',
      'value'       => '',
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Feature',
      'value'       => '',
      'param_name'  => 'feature',
      'description' => 'Add feature seperated with |'
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

) );


// ==========================================================================================
// Clients
// ==========================================================================================
vc_map( array(
  'name'            => 'Client',
  'base'            => 'rs_client',
  'icon'            => 'fa fa-paw',
  'description'     => 'Add client item.',
  'params'          => array(
    array(
      'type'        => 'attach_images',
      'heading'     => 'Image',
      'admin_label' => true,
      'param_name'  => 'image',
      'description' => 'Multiple images are supported.'
    ),

    // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )

) );

// ==========================================================================================
// Featured Tabs
// ==========================================================================================
vc_map( array(
  'name'                    => 'Featured Tabs',
  'base'                    => 'vc_tta_tabs',
  'icon'                    => 'fa fa-toggle-right',
  'is_container'            => true,
  'show_settings_on_create' => false,
  'as_parent'               => array('only' => 'vc_tta_section',),
  'description'             => 'Tabbed content',
  'params' => array(
    array(
      'type'       => 'textfield',
      'param_name' => 'active',
      'heading'    => 'Active',
    ),
    array(
      'type'       => 'dropdown',
      'param_name' => 'style',
      'heading'    => 'Style',
      'value'       => array(
        'Style 1' => 'style1',
        'Style 2' => 'style2',
      ),
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),
  'js_view' => 'VcBackendTtaTabsView',
  'custom_markup' => '
    <div class="vc_tta-container" data-vc-action="collapse">
      <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
        <div class="vc_tta-tabs-container">'
                         . '<ul class="vc_tta-tabs-list">'
                         . '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
                         . '</ul>
        </div>
        <div class="vc_tta-panels vc_clearfix {{container-class}}">
          {{ content }}
        </div>
      </div>
    </div>',
  'default_content' => '
  [vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'marketing-addons' ), 1 ) . '"][/vc_tta_section]
  [vc_tta_section title="' . sprintf( '%s %d', __( 'Tab', 'marketing-addons' ), 2 ) . '"][/vc_tta_section]
  ',
  'admin_enqueue_js' => array(
    vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
  ),
) );

// ==========================================================================================
// Featured Tabs Section
// ==========================================================================================
vc_map( array(
  'name'                      => 'Tab',
  'base'                      => 'vc_tta_section',
  'icon'                      => '',
  'allowed_container_element' => 'vc_row',
  'is_container'              => true,
  'show_settings_on_create'   => false,
  'as_child'                  => array('only' => 'vc_tta_tabs'),
  'params' => array(
    array(
      'type'        => 'textfield',
      'param_name'  => 'title',
      'heading'     => 'Title',
    ),
    array(
      'type'        => 'vc_icon',
      'heading'     => 'Icon',
      'param_name'  => 'icon',
      'placeholder' => 'Select Icon',
      'icon_type'   => 'font_icon',
      'description' => 'Please select icon if you select accordion type to with icon.',
      'value'       => '',
    ),
  ),
  'js_view' => 'VcBackendTtaSectionView',
  'custom_markup' => '
    <div class="vc_tta-panel-heading">
        <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left"><a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">{{ section_title }}</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
    </div>
    <div class="vc_tta-panel-body">
      {{ editor_controls }}
      <div class="{{ container-class }}">
      {{ content }}
      </div>
    </div>',
  'default_content' => '',
) );


// ==========================================================================================
// VC COLUMN TEXT
// ==========================================================================================
vc_map( array(
  'name'          => 'Text Block',
  'base'          => 'vc_column_text',
  'icon'          => 'fa fa-text-width',
  'description'   => 'A block of text with WYSIWYG editor',
  'params'        => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Text Size',
      'param_name'  => 'dp_text_size',
      'value'       => array(
        'Select Size' => '',
        'Small'       => 'size-4',
        'Medium'      => 'size-3',
        'Large'       => 'size-2'
      ),
    ),
    array(
      'holder'     => 'div',
      'type'       => 'textarea_html',
      'heading'    => 'Text',
      'param_name' => 'content',
      'value'      => '<p>I am text block. Click edit button to change this text.</p>',
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font',
      'param_name'  => 'font',
      'admin_label' => true,
      'value'       => array_flip(rs_get_font_choices(true)),
      'group'       => 'Font Properties'
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Weight',
      'param_name'  => 'font_weight',
      'value'       => array(
        'Light'      => '300',
        'Normal'     => '400',
        'Bold'       => '600',
        'Bold'       => '700',
        'Extra Bold' => '800',
      ),
      'group'       => 'Font Properties'
    ),

    array(
      'type'        => 'dropdown',
      'heading'     => 'Font Style',
      'param_name'  => 'font_style',
      'value'       => array(
        'Normal' => 'normal',
        'Italic' => 'italic',
      ),
      'group'       => 'Font Properties'
    ),

    //custom color
    array(
      'type'       => 'colorpicker',
      'heading'    => 'Text Color',
      'param_name' => 'text_color',
      'group'      => 'Custom Color'
    ),

    //size
    array(
      'type'       => 'textfield',
      'heading'    => 'Text Size',
      'param_name' => 'text_size',
      'description' => 'Add in pixel e.g 14px',
      'group'      => 'Font Properties'
    ),
    array(
      'type'       => 'textfield',
      'heading'    => 'Line Height',
      'param_name' => 'line_height',
      'description' => 'Add in pixel e.g 11px',
      'group'      => 'Font Properties'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Letter Spacing',
      'param_name'  => 'letter_spacing',
      'description' => 'Add in pixel e.g 1px',
      'group'       => 'Font Properties'
    ),

    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );

// ==========================================================================================
// Hero Slider
// ==========================================================================================
vc_map( array(
  'name'                    => 'Hero Slider',
  'base'                    => 'rs_hero_slider',
  'icon'                    => 'fa fa-bank',
  'as_parent'               => array('only' => 'rs_hero_slider_item'),
  'show_settings_on_create' => true,
  'js_view'                 => 'VcColumnView',
  'content_element'         => true,
  'description'             => 'Create a hero slider.',
  'params'  => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Style',
      'param_name'  => 'style',
      'value'       => array(
        'Style 1'   => 'style1',
        'Style 2'   => 'style2',
        'Style 3'   => 'style3',
        'Style 4'   => 'style4',
        'Style 5'   => 'style5',
        'Style 6'   => 'style6',
      ),
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Big Heading Color',
      'param_name'  => 'big_heading_color',
      'group'       => 'Custom Colors'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Small Heading Color',
      'param_name'  => 'small_heading_color',
      'group'       => 'Custom Colors'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Button Text color',
      'param_name'  => 'btn_text_color',
      'group'       => 'Custom Colors'
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Loop',
      'param_name'  => 'loop',
      'value'       => array(
        'No'  => '0',
        'Yes' => '1',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Height',
      'param_name'  => 'height',
      'value'       => array(
        '90vh'  => 'h-90vh',
        '400px'  => 'h-400px',
        '500px'  => 'h-500px',
        '600px'  => 'h-600px',
        'Custom' => 'custom',
      ),
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Pagination',
      'param_name'  => 'pagination',
      'value'       => array(
        'Yes' => 'yes',
        'No'  => 'no',
      ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Autoplay',
      'param_name'  => 'autoplay',
      'value'       => '',
      'description' => 'Default is 0'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Speed',
      'param_name'  => 'speed',
      'value'       => '',
      'description' => 'Default is 500'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  ),

) );

vc_map( array(
  'name'                    => 'Hero Slider Item',
  'base'                    => 'rs_hero_slider_item',
  'icon'                    => 'fa fa-bank',
  'description'             => 'Add promo item.',
  'as_child'                => array('only' => 'rs_hero_slider'),
  'params'  => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Background',
      'param_name'  => 'background',
      'admin_label' => true,
      'value'       => ''
    ),
    array(
      'type'         => 'attach_image',
      'heading'      => 'Object',
      'param_name'   => 'object',
      'admin_label'  => true,
      'value'        => '',
      'descritption' => 'This is NOT for style5'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'holder'      => 'h6',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'holder'      => 'h3',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Name Placeholder',
      'param_name'  => 'name_placeholder',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Email Placeholder',
      'param_name'  => 'email_placeholder',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'value'       => '',
    ),
    array(
      'type'         => 'vc_link',
      'heading'      => 'Button Link',
      'param_name'   => 'btn_link',
      'value'        => '',
      'descritption' => 'This is NOT for style2',
      'dependency'  => array( 'element' => 'btn_text', 'not_empty' => true )
    ),
  )

) );

// ==========================================================================================
// Count Down Timer
// ==========================================================================================
vc_map( array(
  'name'          => 'Count Down Timer',
  'base'          => 'rs_countdown_timer',
  'icon'          => 'fa fa-shopping-cart',
  'description'   => 'Add count down timer.',
  'params'        => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Year',
      'admin_label' => true,
      'param_name'  => 'year',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Month',
      'admin_label' => true,
      'param_name'  => 'month',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Day',
      'admin_label' => true,
      'param_name'  => 'day',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Hour',
      'admin_label' => true,
      'param_name'  => 'hour',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Minute',
      'admin_label' => true,
      'param_name'  => 'minute',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Second',
      'param_name'  => 'second',
      'admin_label' => true,
    ),
     // Extras
    $vc_map_extra_id,
    $vc_map_extra_class,

  )
) );

// ==========================================================================================
// Hero Video Banner
// ==========================================================================================
vc_map( array(
  'name'          => 'Hero Video Banner',
  'base'          => 'rs_hero_video_banner',
  'icon'          => 'fa fa fa-arrows-v',
  'description'   => 'Add hero video banner.',
  'params'        => array(
    array(
      'type'        => 'attach_image',
      'heading'     => 'Poster',
      'admin_label' => true,
      'param_name'  => 'poster_img',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Youtube URL',
      'admin_label' => true,
      'param_name'  => 'video_url',
      'description' => 'for e.g. http://youtu.be/I6jmZ5plZ3o',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Small Heading',
      'param_name'  => 'small_heading',
      'holder'      => 'h6',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'big_heading',
      'holder'      => 'h3',
      'value'       => ''
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button Text',
      'param_name'  => 'btn_text',
      'value'       => '',
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => 'Button Link',
      'param_name'  => 'btn_link',
      'value'       => '',
      'dependency'  => array( 'element' => 'btn_text', 'not_empty' => true )
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Big Heading Color',
      'param_name'  => 'big_heading_color',
      'group'       => 'Custom Colors'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Small Heading Color',
      'param_name'  => 'small_heading_color',
      'group'       => 'Custom Colors'
    ),
    array(
      'type'        => 'colorpicker',
      'heading'     => 'Button Text color',
      'param_name'  => 'btn_text_color',
      'group'       => 'Custom Colors'
    ),
    $vc_map_extra_id,
    $vc_map_extra_class,
  )
) );


require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tab.php' );
require_once vc_path_dir( 'SHORTCODES_DIR', 'vc-tabs.php' );
class WPBakeryShortCode_RS_Hero_Slider   extends WPBakeryShortCodesContainer {}
class WPBakeryShortCode_RS_Hero_Slider_Item  extends WPBakeryShortCode {}

class RS_WPBakeryShortCodesContainer extends WPBakeryShortCodesContainer {
  public function contentAdmin( $atts, $content = null ) {
      $width = $el_class = '';
      extract( shortcode_atts( $this->predefined_atts, $atts ) );
      $label_class = ( isset( $this->settings['label_class'] ) ) ? $this->settings['label_class'] : 'info';
      $output  = '';

      $column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
      $column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );
      for ( $i = 0; $i < count( $width ); $i ++ ) {
        $output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
        $output .= '<div class="rs-container-title"><span class="rs-label rs-label-'. $label_class .'">'. $this->settings['name'] .'</span></div>'; // ADDED THIS LINE
        $output .= $column_controls;
        $output .= '<div class="wpb_element_wrapper">';
        $output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
        $output .= do_shortcode( shortcode_unautop( $content ) );
        $output .= '</div>';
        if ( isset( $this->settings['params'] ) ) {
          $inner = '';
          foreach ( $this->settings['params'] as $param ) {
            $param_value = isset( $$param['param_name'] ) ? $$param['param_name'] : '';
            if ( is_array( $param_value ) ) {
              // Get first element from the array
              reset( $param_value );
              $first_key = key( $param_value );
              $param_value = $param_value[$first_key];
            }
            $inner .= $this->singleParamHtmlHolder( $param, $param_value );
          }
          $output .= $inner;
        }
        $output .= '</div>';
        $output .= $column_controls_bottom;
        $output .= '</div>';
      }
      return $output;
  }
}

