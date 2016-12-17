<?php
/**
* Plugin Name: Easy Maintenance Mode
* Plugin URI: http://www.example.com
* Description: This simple plugin will allow you to create your maintenance page or coming soon page.
* Author: Balachandar Karuparthy
* Version: 1.0
* Author URI: http://www.example.com
* Text Domain: emaintenance
* Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class Maintenance_Mode {
	public function __construct() {
	require_once plugin_dir_path( __FILE__ ).'maintenance-mode-scripts.php';
	require_once plugin_dir_path( __FILE__ ).'maintenance-mode-admin.php';
	require_once plugin_dir_path( __FILE__ ).'maintenance-mode-shortcode.php';
	add_action( 'admin_enqueue_scripts',  array( $this , 'color_picker_assets' ) );
}

function color_picker_assets($hook_suffix) {
    // $hook_suffix to apply a check for admin page.
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('jquery.custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

}

new Maintenance_Mode;
?>