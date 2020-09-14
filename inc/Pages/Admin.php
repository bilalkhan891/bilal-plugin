<?php 

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
 * 
 */
class Admin extends BaseController
{
	public $settings;

	public $pages = array();
	public $subpages = array();

	function __construct()
	{
		$this->settings = new SettingsApi();
		$this->pages = [
			[
				'page_title' 	=> 'Bilal Plugin',
				'menu_title'	=> 'Bilal',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_plugin',
				'callback'		=> function() { echo "<h1>Bilal Plugin</h1>"; },
				'icon_url'		=> 'dashicons-store',
				'position'		=> 110
			],
		];
		$this->subpages = array(
			array(
				'parent_slug' 	=> 'bilal_plugin',
				'page_title' 	=> 'Custom Post Type',
				'menu_title'	=> 'CPT',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_cpt',
				'callback'		=> function() { echo "<h1>CPT Manager</h1>"; },  
			),
			array(
				'parent_slug' 	=> 'bilal_plugin',
				'page_title' 	=> 'Custom Texonomies',
				'menu_title'	=> 'Texonomies',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_texonomies',
				'callback'		=> function() { echo "<h1>Taxonomies Manager</h1>"; },  
			),
			array(
				'parent_slug' 	=> 'bilal_plugin',
				'page_title' 	=> 'Custom Widgets',
				'menu_title'	=> 'Widgets',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_widgets',
				'callback'		=> function() { echo "<h1>Widgets Manager</h1>"; },  
			),
		);			
	}

	/*
		Register Admin Page 
	 */
	public function register(){

			 

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();

		// add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
	}



	public function add_menu_pages(){
		add_menu_page( 'Bilal Plugin', 'Bilal', 'manage_options', 'bilal_plugin', array( $this, 'admin_index' ), 'dashicons-store', 101 ); 
	}

	public function admin_index(){
		require_once $this->plugin_path . '/templates/admin.php';
	}


}