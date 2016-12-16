<?php
/**
*
* @package Countdown
* @since 1.0
*
*/

class Shortcode {

	public function __construct() {
		add_shortcode( 'gn-countdown', array( $this, 'gncd_countdown_shortcode') );

	}

	function gncd_countdown_shortcode( $atts, $content = null ) {

		$countdown_title = get_option( 'genesis_countdown_title' );
		$countdown_date = get_option( 'genesis_countdown_expiry_date' );
		$atts = shortcode_atts(
			array(
				'title' => $countdown_title,
				'date'  => $countdown_date
				), $atts
			);
	?>
	<script>
	jQuery(document).ready(function(){
		function tick() {
		var title = '<?php echo $atts['title']?>';
		var to = '<?php echo $atts['date']?>';
		var xmas = new Date(to);
		var now = new Date();
		var timeDiff = xmas.getTime() - now.getTime();

		var seconds = Math.floor(timeDiff / 1000);
		var minutes = Math.floor(seconds / 60);
		var hours = Math.floor(minutes / 60);
		var days = Math.floor(hours / 24);
		hours %= 24;
		minutes %= 60;
		seconds %= 60;

		document.getElementById("countdowntitle").textContent = title;    
		document.getElementById("daysBox").textContent = days;
 		document.getElementById("hoursBox").textContent = hours;
 		document.getElementById("minsBox").textContent = minutes;
 		document.getElementById("secsBox").textContent = seconds;
	}
	setInterval(tick, 1000);	
	});
	</script>
	<form>

		<div class="countdown-output">
			<h3 id="countdowntitle"></h3>
			<div id="coutdowntimer">
				<span id="daysBox"></span>
				<span> Days : </span>
				<span id="hoursBox"></span>
				<span> Hours : </span>
				<span id="minsBox"></span>
				<span> Minutes : </span>
				<span id="secsBox"></span>
				<span> Seconds </span>
			</div>
		</div>	
		<br>
	</form>
<?php
	}
}
new Shortcode
?>