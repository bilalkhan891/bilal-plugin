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

// use Inc\Base\Activate;
// use Inc\Base\Deactivate;

/*
	This code will run during plugin Activation
 */
function activate_bilal_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_bilal_plugin' );


/*
	This code will run during plugin Deactivation 
 */
function deactivate_bilal_plugin() {
	Inc\Base\Deactivate::deactivate();
} 
register_deactivation_hook( __FILE__, 'deactivate_bilal_plugin' );



if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}



