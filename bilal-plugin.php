<?php
/*
*	@package BilalPlugin 
*/ 
/*
Plugin Name: Bilal Plugin
Plugin URI: https://bilalafridi.com/plugins/
Description: This is my 2nd plugin
Version: 1.0.0
Author: Bilal Ahmad Afridi
Author URI: https://bilalafridi.com/
License: GPLv2 or later
Text Domain: bilal-plugin
*/

// if ( !defined( 'ABSPATH' ) ) {
// 	die('No direct access!');
// }


// if ( ! function_exists( 'add_action' ) ) {
// 	die( 'No direct access!' );
// }

defined( 'ABSPATH' ) or die( 'No direct assess!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once ( dirname( __FILE__ ) . '/vendor/autoload.php' );
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}



