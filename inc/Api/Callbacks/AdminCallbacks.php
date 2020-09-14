<?php 
/*
* @package BilalPlugin
*/

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController {

	public function adminDashboard(){
		return require_once( "$this->plugin_path/templates/admin.php" );
	}
	public function adminCPT(){
		return require_once( "$this->plugin_path/templates/cpt.php" );
	}
	public function adminTexonomies(){
		return require_once( "$this->plugin_path/templates/texonomies.php" );
	}
	public function adminWidgets(){
		return require_once( "$this->plugin_path/templates/widgets.php" );
	}

	public function bilalOptionsGroup( $input ){

		return $input;
	}
	public function blialAdminSection(){
		
		echo "Check this Section";
	}
	public function bilalTextExample(){
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Enter Some Text">';
	}
	public function bilalFirstName(){
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Enter First Name">';
	}

}