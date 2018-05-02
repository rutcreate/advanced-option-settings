<?php
/*
Plugin Name: Advanced Option Settings
Plugin URI: https://www.opendream.co.th
Description: Helper function for create basic and advanced option fields in admin.
Version: 1.0
Author: Nirut Khemasakchai
Author URI: https://www.opendream.co.th
Author Email: nirut@opendream.co.th
Text Domain: advanced-option-fields
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

define( 'ADVOS_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADVOS_URL', plugin_dir_url( __FILE__ ) );

require_once ADVOS_PATH . '/includes/fields.php';
require_once ADVOS_PATH . '/includes/admin.php';
