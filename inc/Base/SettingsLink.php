<?php 

/*
* @  package BilalPlugin 
*/

namespace Inc\Base;

class SettingsLink 
{

	protected $plugin;

	public function __construct(){
		$this->plugin = PLUGIN;
	}

	function register() {
		add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
	}

	public function settings_link( $links ){

		$settings_link = '<a href="admin.php?page=bilal_plugin">Settings</a>';
		$author = '<a href="https://bilalafridi.com/" target="_blank">Author</a>';

		array_push($links, $settings_link);
		array_push($links, $author);
		return $links;

	}
}