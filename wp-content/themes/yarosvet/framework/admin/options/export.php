<?php
$this->sections[] = array(
  'title' => esc_html__('Import/Export', 'marketing'),
  'desc' => esc_html__('Import/Export Options', 'marketing'),
  'icon' => 'el-icon-arrow-down',
  'fields' => array(

    array(
      'id'            => 'opt-import-export',
      'type'          => 'import_export',
      'title'         => esc_html__('Import Export', 'marketing'),
      'subtitle'      => esc_html__('Save and restore your Redux options', 'marketing'),
      'full_width'    => false,
    ),
  ),
);
