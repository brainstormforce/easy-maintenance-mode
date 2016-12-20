<?php
/**
*
* @package Easy Maintenance Mode
* @since 1.0
*
*/

// Create class Scripts

class Scripts {

// Create a public constructor function

	public function __construct() {
		add_action( 'init', array( $this, 'maintenance_mode_scripts') );

	}

/*
Function Name: maintenance_mode_scripts
Function Description: This function enqueues all the required scripts and styles
*/

	function maintenance_mode_scripts() {
		wp_enqueue_script( 'jquery-ui-script', plugin_dir_url( __FILE__ ).'../admin/js/script.js', array( 'jquery', 'jquery-ui-datepicker') );
		wp_enqueue_script( 'jquery-media-script', plugin_dir_url( __FILE__ ).'../admin/js/image-upload.js', array( 'jquery' ) );
		wp_enqueue_script( 'jquery-range-script', plugin_dir_url( __FILE__ ).'../admin/js/range-script.js', array( 'jquery') );
		wp_enqueue_style( 'jquery-countdown-style', plugin_dir_url( __FILE__ ).'../admin/css/style.css' );
		wp_enqueue_style( 'jquery-ui-css', 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
		wp_enqueue_style( 'dashicons' );
        wp_enqueue_media();
	}
}

// Create object of class Script

new Scripts
?>