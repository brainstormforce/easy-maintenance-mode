<?php
/**
*
* @package Countdown
* @since 1.0
*
*/

class Scripts {
	public function __construct() {
		add_action( 'init', array( $this, 'wpdocs_countdown_scripts') );
	}
	function wpdocs_countdown_scripts() {
		wp_enqueue_script( 'jquery-ui-script', plugin_dir_url( __FILE__ ).'/../admin/js/script.js', array( 'jquery', 'jquery-ui-datepicker') );
		wp_enqueue_script( 'jquery-range-script', plugin_dir_url( __FILE__ ).'admin/js/range-script.js', array( 'jquery') );
		wp_enqueue_style( 'jquery-countdown-style', plugin_dir_url( __FILE__ ).'admin/css/style.css' );
		wp_enqueue_style( 'jquery-ui-css', 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
		wp_enqueue_style( 'dashicons' );
	/*	
		$countdown_title = get_option( 'genesis_countdown_title' );
		$countdown_date = get_option( 'genesis_countdown_expiry_date' );
		wp_localize_script( 'jquery_countdown_script', 'countdown_short_name', array(
			'title' => $countdown_title,
			'date'  => $countdown_date 
			));
	*/
	}
}
new Scripts
?>