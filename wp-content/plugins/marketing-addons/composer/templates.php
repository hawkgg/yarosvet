<?php

/**
 *
 * VC Custom Templates
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_vc_templates(){
  return $templates;
}

/**
 *
 * Remove All VC Templates
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_reset_default_templates( $data ) {
  return array();
}
add_filter( 'vc_load_default_templates', 'rs_reset_default_templates' );

/**
 *
 * Load Templates
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_add_default_templates() {
  $templates = rs_vc_templates();
  return array_map( 'vc_add_default_templates', $templates );
}

rs_add_default_templates();