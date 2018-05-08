<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

return array(
    'name' => __( 'Isotope Filter Categories', 'js_composer' ),
    'base' => 'vc_filter_categories',
    'icon' => 'icon-wpb-images-stack',
    'category' => __( 'Content', 'js_composer' ),
    'description' => __( 'Добавить фильтрацию.', 'js_composer' ),
    'params' => array(
        '' => '',
    ),
);
