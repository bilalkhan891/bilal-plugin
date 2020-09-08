<?php 

namespace Inc\Pages;

/**
 * 
 */
class Admin
{
	
	function __construct()
	{
		
	}

	public function register(){
		add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
	}

	public function add_menu_pages(){
		add_menu_page( 'Bilal Plugin', 'Bilal', 'manage_options', 'bilal_plugin', array( $this, 'admin_index' ), 'dashicons-store', 101 ); 
	}

	public function admin_index(){
		require_once PLUGIN_PATH . '/templates/admin.php';
	}


}