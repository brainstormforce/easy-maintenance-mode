<?php
/**
* Plugin Name: Easy Maintenance Mode
* Plugin URI: http://www.example.com
* Description: This simple plugin will allow you to create a comming soon or a maintenance page
* Author: Balachandar Karuparthy
* Version: 1.0
* Author URI: http://www.example.com
* Text Domain: mmplugin
* Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class Maintenance_Mode {
	public function __construct() {
	require_once plugin_dir_path( __FILE__ ).'gn-countdown-scripts.php';
	require_once plugin_dir_path( __FILE__ ).'gn-countdown-admin.php';
	require_once plugin_dir_path( __FILE__ ).'gn-countdown-shortcode.php';
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