<?php 
 

/*
* @package BilalPlugin
*/

namespace Inc;

final class Init 
{	
	/*
	* Store all the classes inside an array
	* @return arry Full list of classes 
	*/
	public static function get_services() {
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLink::class,
		];
	}

	/*
	* Loop through the classes, initialize them,
	* and call the register() method if it exists
	* @return
	*/
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			} 
		}
	}

	/*
	* Initialize the class
	* @param 	class $class 	class from the servers array
	* @return 	class instance  new instance of the class
	*/
	private static function instantiate( $class ) {

		$service = new $class();

		return $service;

	}


}

// defined( 'ABSPATH' ) or die( 'No direct assess!' );

// // if ( ! function_exists( 'add_action' ) ) {
// // 	die( 'No direct access!' );
// // }

// if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
// 	require_once ( dirname( __FILE__ ) . '/vendor/autoload.php' );
// }

// use Inc\Activate;
// use Inc\Deactivate;
// use Inc\Admin\AdminPages;

// if ( !class_exists( 'BilalPlugin' ) ) {
// 	die;
// }
	 
// class BilalPlugin
// {

// 	public $plugin;

// 	function __construct(){
// 		$this->plugin = plugin_basename( __FILE__ );
// 	}

// 	public function register(){
// 		add_action( 'admin_enqueue_scripts', array( 'BilalPlugin', 'enqueue') );
// 		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

// 		add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
// 	}

// 	public function settings_link( $links ){
// 		$settings_link = '<a href="admin.php?page=bilal_plugin">Settings</a>';
// 		array_push( $links, $settings_link );

// 		return $links;
// 	}

// 	public function add_admin_pages(){
// 		add_menu_page( 'Bilal Plugin', 'Bilal', 'manage_options', 'bilal_plugin', array( $this, 'admin_index' ), 'dashicons-store', 101 );
// 	}

// 	public function admin_index(){
// 		require_once plugin_dir_path( __FILE__ ) . './templates/admin.php';
// 	}

// 	static function create_post_type(){
// 		add_action( 'init', array( 'BilalPlugin', 'custom_post_type' ) );
// 	}


// 	function custom_post_type(){
// 		register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
// 	}

// 	function activate() {
// 		// require_once plugin_dir_path( __FILE__ ) . './inc/bilal-plugin-activate.php';
// 		Activate::activate();
// 	}

// 	function deactivate(){
// 		Deactivate::deactivate();
// 	}

// 	public function enqueue(){

// 		// enqueue all our scripts 
// 		wp_enqueue_style( 'mypluginstyle', plugins_url( './assets/bilalPluginStyle.css', __FILE__ ), false, 'all' );
// 		wp_enqueue_script( 'mypluginscript', plugins_url( './assets/bilalplugin.js', __FILE__ ), false, 'all' );
// 	}

// }

// if ( class_exists( 'BilalPlugin' ) ) {

// 	$bilalPlugin = new BilalPlugin(  );
// 	$bilalPlugin->register();
// 	// BilalPlugin::register();
	
// }

// // ativation

// register_activation_hook( __FILE__, array( $bilalPlugin, 'activate' ) );

// // deactivation
// require_once plugin_dir_path( __FILE__ ) . './inc/Deactivate.php';
// register_activation_hook( __FILE__, array( '', 'deactivate' ) );

// // unistall
// // register_uninstall_hook( __FILE__, array( $bilalPlugin, 'uninstall' ) );

