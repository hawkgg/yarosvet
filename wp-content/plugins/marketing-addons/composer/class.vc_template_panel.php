<?php
/* VC Template Extended */
class RS_VC_Templates {

  protected $rs_templates = false;

  public function init() {
    add_filter( 'vc_get_all_templates', array($this,'addTemplatesTab',) );
    add_filter( 'vc_templates_render_category', array($this,'renderTemplateBlock',), 10 );
    add_filter( 'vc_templates_render_template', array($this,'renderTemplateWindow',), 10, 2 );
  }

  public function renderTemplateBlock( $category ) {

    if ($category['category'] == 'rs_templates') {

      $category['output'] = '<div class="vc_col-md-2 rs-sorting-container">';
      $category['output'] .= $this->getTemplateCategories();
      $category['output'] .= '</div>';
      $category['output'] .= '<div class="vc_column vc_col-sm-12 rs-templates-container">
        <div class="vc_ui-template-list vc_templates-list-default_templates vc_ui-list-bar" data-vc-action="collapseAll">';
      if ( ! empty( $category['templates'] ) ) {
        foreach ( $category['templates'] as $template ) {
          $category['output'] .= $this->renderTemplateListItem( $template );
        }
      }
      $category['output'] .= '
      </div>
    </div>';

    }

    if ( $category['category'] == 'rs_video_tutorial') {

      $category['output'] = '<div class="vc_col-md-12 rs-video-container">';
      $category['output'] .= '<div class="vc_column vc_col-sm-12 vc_access-library-col">
        <h3 class="vc_ui-panel-title">Watch Tutorials</h3>
        <p class="vc_description">Access our Video Tutorials hosted at youtbue.com</p>
        <a href="https://www.youtube.com/playlist?list=PL3POU1uhim4wMlw_9OEREr6trcofwjAp_" target="_blank" class="vc_general vc_ui-button vc_ui-button-size-sm vc_ui-button-shape-rounded vc_ui-button-action vc_ui-access-video-btn">
          Access Tutorials    </a>
      </div>';
      $category['output'] .= '</div>';

    }

    return $category;
  }

  public function addTemplatesTab( $data ) {
    $newCategory = array(
      'category'        => 'rs_templates',
      'category_name'   => esc_html__( 'Marketing Pro', 'marketing-addons' ),
      'category_weight' => 1,
      'templates'       => $this->getAllTemplates(),
    );
    $data[] = $newCategory;

    $videoCategory = array(
      'category'        => 'rs_video_tutorial',
      'category_name'   => esc_html__( 'Video Tutorials', 'marketing-addons' ),
      'category_weight' => 10,
      'templates'       => $this->getAllTemplates(),
    );
    $data[] = $videoCategory;
    return $data;
  }

    protected function getTemplateCategories() {

    $output = '';

    $categories = array(
      'all'           => esc_html__( 'All', 'marketing-addons' ),
      'banner'        => esc_html__( 'Banners', 'marketing-addons' ),
      'blog'          => esc_html__( 'Blog', 'marketing-addons'),
      'case'          => esc_html__( 'Case Study', 'marketing-addons' ),
      'cta'           => esc_html__( 'Call To Action', 'marketing-addons' ),
      'client'        => esc_html__( 'Clients', 'marketing-addons' ),
      'faq'           => esc_html__( 'FAQ', 'marketing-addons' ),
      'featured-tabs' => esc_html__( 'Featured Tabs', 'marketing-addons' ),
      'icon-box'      => esc_html__( 'Icon Boxes', 'marketing-addons' ),
      'map'           => esc_html__( 'Maps', 'marketing-addons' ),
      'misc'          => esc_html__( 'Misc', 'marketing-addons' ),
      'pricing'       => esc_html__( 'Pricing', 'marketing-addons' ),
      'slider'        => esc_html__( 'Slider', 'marketing-addons' ),
      'team'          => esc_html__( 'Team', 'marketing-addons' ),
      'testimonial'   => esc_html__( 'Testimonials', 'marketing-addons' ),
    );

    $output .= '<div class="sortable_templates">';
    $output .= '<ul>';
    $count = 0;
    foreach( $categories as $key => $value ) {
      $count++;
      $active = ( $count == 1 ) ? 'class="active"' : '';
      $output .= '<li ' . $active . ' data-sort="' . $key . '">' . $value . '</li>';
    }
    $output .= '</ul>';
    $output .= '</div>';

    return $output;

  }

  public function renderTemplateWindow( $template_name, $template_data ) {

    if ($template_data['type'] == 'rs_templates') {
      return $this->renderTemplateWindowRSTemplates( $template_name, $template_data );
    }
    return $template_name;
  }

  public function renderTemplateWindowRSTemplates( $template_name, $template_data ) {
    ob_start();
    $template_id            = esc_attr( $template_data['unique_id'] );
    $template_id_hash       = md5( $template_id ); 
    $template_name          = esc_html( $template_name );
    $preview_template_title = esc_attr( 'Preview template', 'marketing-addons' );
    $add_template_title     = esc_attr( 'Add template', 'marketing-addons' );

    echo <<<HTML
    <button type="button" class="vc_ui-list-bar-item-trigger" title="$add_template_title"
      data-template-handler=""
      data-vc-ui-element="template-title">$template_name</button>
    <div class="vc_ui-list-bar-item-actions">
      <button type="button" class="vc_general vc_ui-control-button" title="$add_template_title"
          data-template-handler="">
        <i class="vc-composer-icon vc-c-icon-add"></i>
      </button>
    </div>
HTML;

    return ob_get_clean();
  }

  public function renderUITemplate() {
    vc_include_template( 'editors/popups/vc_ui-panel-templates.tpl.php', array('box' => $this,) );
    return '';
  }

  public function renderBackendTemplate() {

    $template_type = vc_post_param( 'template_type' );
    $template_id   = vc_post_param( 'template_unique_id' );

    if ( ! isset( $template_id, $template_type ) || '' === $template_id || '' === $template_type ):
      die( 'Error: RS_VC_Templates::renderBackendTemplate:1' );
    endif;
    WPBMap::addAllMappedShortcodes();
    $this->getBackendDefaultTemplate();
    die();
  }

  public function loadDefaultTemplatesLimit( $templates ) {
    $start_index = 0;
    $total_templates_to_show = apply_filters( 'vc_load_default_templates_limit_total', 6 );
    return array_slice( $templates, $start_index, $total_templates_to_show );
  }

  public function getUserTemplates() {
    return apply_filters( 'vc_get_user_templates', get_option( $this->option_name ) );
  }

  public function getAllTemplates() {

    $data = array();
    $rs_templates = rs_vc_templates();
    $category_templates = array();
    foreach ( $rs_templates as $template_id => $template_data ) {
      $category_templates[] = array(
        'unique_id'    => $template_id,
        'name'         => $template_data['name'],
        'type'         => 'rs_templates',
        'image'        => isset( $template_data['image_path'] ) ? $template_data['image_path'] : false,
        'custom_class' => isset( $template_data['custom_class'] ) ? $template_data['custom_class'] : false,
        'sort_name'    => isset( $template_data['sort_name'] ) ? $template_data['sort_name'] : false,
      );
      if ( ! empty( $category_templates ) ) {
        $data = $category_templates;
      }
    }

    return $data;
  }

  public function loadDefaultTemplates() {

    if ( ! is_array( $this->rs_templates ) ) {
      $this->rs_templates = $this->allTemplates();
    }

    return $this->rs_templates;
  }

  public function getDefaultTemplates() {
    return $this->loadDefaultTemplates();
  }

  public function getDefaultTemplate( $template_index ) {

    $this->loadDefaultTemplates();
    if ( ! is_numeric( $template_index ) || ! is_array( $this->rs_templates ) || ! isset( $this->rs_templates[ $template_index ] ) ) {
      return false;
    }

    return $this->rs_templates[ $template_index ];
  }

  public function addDefaultTemplates( $data ) {
    if ( is_array( $data ) && ! empty( $data ) && isset( $data['name'], $data['content'] ) ) {
      if ( ! is_array( $this->rs_templates ) ) {
        $this->rs_templates = array();
      }
      $this->rs_templates[] = $data;

      return true;
    }

    return false;
  }

  public function getBackendDefaultTemplate( $return = false ) {

    $template_index = (int) vc_request_param( 'template_unique_id' );
    $data = $this->getDefaultTemplate( $template_index );

    if ( ! $data ) {
      die( 'Error: Vc_Templates_Panel_Editor::getBackendDefaultTemplate:1' );
    }
    if ( $return ) {
      return trim( $data['content'] );
    } else {
      echo trim( $data['content'] );
      die();
    }
  }

  public function sortTemplatesByCategories( array $data ) {
    $buffer = $data;
    uasort( $buffer, array(
      &$this,
      'cmpCategory',
    ) );

    return $buffer;
  }

  public function sortTemplatesByNameWeight( array $data ) {
    $buffer = $data;
    uasort( $buffer, array(
      &$this,
      'cmpNameWeight',
    ) );

    return $buffer;
  }

  public function getAllCategoriesNames( array $categories ) {
    $categories_names = array();

    foreach ( $categories as $category ) {
      if ( isset( $category['category'] ) ) {
        $categories_names[ $category['category'] ] = isset( $category['category_name'] ) ? $category['category_name'] : $category['category'];
      }
    }

    return $categories_names;
  }

  public function getAllTemplatesSorted() {
    $data = $this->getAllTemplates();
    $data = $this->sortTemplatesByCategories( $data );
    foreach ( $data as $key => $category ) {
      $data[ $key ]['templates'] = $this->sortTemplatesByNameWeight( $category['templates'] );
    }

    return $data;
  }

  protected function cmpCategory( $a, $b ) {
    $a_k = isset( $a['category'] ) ? $a['category'] : '*';
    $b_k = isset( $b['category'] ) ? $b['category'] : '*';
    $a_category_weight = isset( $a['category_weight'] ) ? $a['category_weight'] : 0;
    $b_category_weight = isset( $b['category_weight'] ) ? $b['category_weight'] : 0;

    return $a_category_weight == $b_category_weight ? strcmp( $a_k, $b_k ) : $a_category_weight - $b_category_weight;
  }

  protected function cmpNameWeight( $a, $b ) {
    $a_k = isset( $a['name'] ) ? $a['name'] : '*';
    $b_k = isset( $b['name'] ) ? $b['name'] : '*';
    $a_weight = isset( $a['weight'] ) ? $a['weight'] : 0;
    $b_weight = isset( $b['weight'] ) ? $b['weight'] : 0;

    return $a_weight == $b_weight ? strcmp( $a_k, $b_k ) : $a_weight - $b_weight;
  }

  public function frontendDoTemplatesShortcodes( $content ) {
    return do_shortcode( $content );
  }

  public function addFrontendTemplatesShortcodesCustomCss() {
    $output = $shortcodes_custom_css = '';
    $shortcodes_custom_css = visual_composer()->parseShortcodesCustomCss( vc_frontend_editor()->getTemplateContent() );
    if ( ! empty( $shortcodes_custom_css ) ) {
      $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
      $output .= '<style type="text/css" data-type="vc_shortcodes-custom-css">';
      $output .= $shortcodes_custom_css;
      $output .= '</style>';
    }
    echo $output;
  }

  public function renderTemplateListItem( $template ) {
    $name = isset( $template['name'] ) ? esc_html( $template['name'] ) : esc_html( __( 'No title', 'marketing-addons' ) );
    $template_id         = esc_attr( $template['unique_id'] );
    $template_id_hash    = md5( $template_id );
    $template_name       = esc_html( $name );
    $template_name_lower = esc_attr( vc_slugify( $template_name ) );
    $template_type       = esc_attr( isset( $template['type'] ) ? $template['type'] : 'custom' );
    $custom_class        = esc_attr( isset( $template['custom_class'] ) ? $template['custom_class'] : '' );
    $template_image      = esc_attr( isset( $template['image'] ) ? $template['image'] : '' );
    $template_sort_name  = esc_attr( isset( $template['sort_name'] ) ? $template['sort_name'] : '' );

    $output = <<<HTML
          <div class="vc_ui-template vc_templates-template-type-default_templates $custom_class"
            data-template_id="$template_id"
            data-template_id_hash="$template_id_hash"
            data-category="$template_type"
            data-template_unique_id="$template_id"
            data-template_name="$template_name_lower"
            data-template_type="default_templates"
            data-vc-content=".vc_ui-template-content">
            <div class="vc_ui-list-bar-item">
HTML;
    $output .= '<div class="rs-template-preview"><img src="' . esc_url( $template_image ) . '" alt="' . esc_attr( $name ) . '" width="300" height="200" /></div>';
    $output .= apply_filters( 'vc_templates_render_template', $name, $template );
    $output .= <<<HTML
            </div>
            <div class="vc_ui-template-content" data-js-content>
            </div>
          </div>
HTML;

    return $output;
  }

  public function getOptionName() {
    return $this->option_name;
  }
}
