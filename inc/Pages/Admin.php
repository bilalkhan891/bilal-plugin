<?php 

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
/**
 * 
 */
class Admin extends BaseController
{
	public $settings;

	public $pages = array();
	public $subpages = array();
 	
 	public $callbacks;
	/*
		Register Admin Page 
	 */
	public function register(){

		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();

		$this->setPages();
		$this->setSubPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();
			 

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();

		// add_action( 'admin_menu', array( $this, 'add_menu_pages' ) );
	}



	public function add_menu_pages(){
		add_menu_page( 'Bilal Plugin', 'Bilal', 'manage_options', 'bilal_plugin', array( $this, 'admin_index' ), 'dashicons-store', 101 ); 
	}

	public function admin_index(){
		require_once $this->plugin_path . '/templates/admin.php';
	}

	public function setPages(){
		$this->pages = [
			[
				'page_title' 	=> 'Bilal Plugin',
				'menu_title'	=> 'Bilal',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_plugin',
				'callback'		=> array( $this->callbacks, 'adminDashboard' ),
				'icon_url'		=> 'dashicons-store',
				'position'		=> 110
			],
		];
	}
	public function setSubPages(){ 
		$this->subpages = array(
			array(
				'parent_slug' 	=> 'bilal_plugin',
				'page_title' 	=> 'Custom Post Type',
				'menu_title'	=> 'CPT',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_cpt',
				'callback'		=> array( $this->callbacks, 'adminCPT' ),
			),
			array(
				'parent_slug' 	=> 'bilal_plugin',
				'page_title' 	=> 'Custom Texonomies',
				'menu_title'	=> 'Texonomies',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_texonomies',
				'callback'		=> array( $this->callbacks, 'adminTexonomies' ),
			),
			array(
				'parent_slug' 	=> 'bilal_plugin',
				'page_title' 	=> 'Custom Widgets',
				'menu_title'	=> 'Widgets',
				'capability'	=> 'manage_options',
				'menu_slug'		=> 'bilal_widgets',
				'callback'		=> array( $this->callbacks, 'adminWidgets' ), 
			),
		);	
	}

	public function setSettings(){

		$args = array(
			array(
				'option_group' 	=> 'bilal_options_group',
				'option_name'	=> 'text_example',
				'callback'		=> array( $this->callbacks, 'bilalOptionsGroup' )
			),
		);

		$this->settings->setSettings( $args );

	}
	public function setSections(){

		$args = array(
			array(
				'id' 	=> 'bilal_admin_index',
				'title'	=> 'Settings',
				'callback'		=> array( $this->callbacks, 'blialAdminSection' ),
				'page' => 'bilal_plugin'
			),
		);

		$this->settings->setSections( $args );

	}
	public function setFields(){

		$args = array(
			array(
				'id' 	=> 'text_example',
				'title'	=> 'Text Example',
				'callback'		=> array( $this->callbacks, 'bilalTextExample' ),
				'page' => 'bilal_plugin',
				'section' => 'bilal_admin_index',
				'args' => array ( 
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
		);

		$this->settings->setFields( $args );

	}


}