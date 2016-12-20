<?php
/**
* Plugin Name: Easy Maintenance Mode
* Plugin URI: http://www.example.com
* Description: This simple plugin will allow you to create your maintenance page or a coming soon page.
* Author: Balachandar Karuparthy
* Version: 1.0
* Author URI: http://www.example.com
* Text Domain: easy-maintenance-mode
* Domain Path: /languages
*/


// If this file is called directly, abort. 
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

// Create Class Maintenance_Mode

class Maintenance_Mode {

// Create a constructor function

	public function __construct() {
	require_once plugin_dir_path( __FILE__ ).'includes/maintenance-mode-scripts.php';
	require_once plugin_dir_path( __FILE__ ).'includes/maintenance-mode-admin.php';
	add_action( 'admin_enqueue_scripts',  array( $this , 'color_picker_assets' ) );
	}

/*
Function Name: color_picker_assets
Function Description: Enqueue wordpress color picker style and a custom js script
function parameters: array hook_suffix
*/

	function color_picker_assets($hook_suffix) {
	    wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'my-script-handle', plugins_url('jquery.custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}

}

// Create object of class

new Maintenance_Mode;
?>