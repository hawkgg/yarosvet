<?php
// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

$test = isset( $_GET['variant-test'] ) ? esc_attr( $_GET['variant-test'] ) : 'main';

switch($test){
	case 'new':
		require_once('variant/new.php');
		break;
	case 'edit':
		require_once('variant/edit.php');
		break;
	case 'main':
	default:
		require_once('variant/variant.php');
		break;
}