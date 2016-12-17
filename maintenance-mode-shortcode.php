<?php
/**
*
* @package Easy Maintenance Mode
* @since 1.0
*
*/

class Shortcode {

	public function __construct() {
		add_shortcode( 'mm-countdown', array( $this, 'maintenance_mode_shortcode') );

	}

	function maintenance_mode_shortcode( $atts, $content = null ) {

		$countdown_title = get_option( 'maintenance_mode_title' );
		$countdown_date = get_option( 'maintenance_mode_date' );
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
	   	var title = "<?php echo $atts['title'] ?>";
	    var to = "<?php echo $atts['date'] ?>";
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

	    seconds = ("0" + seconds).slice(-2);
	    days = ("0" + days).slice(-2);
	    hours = ("0" + hours).slice(-2);
	    minutes = ("0" + minutes).slice(-2);

	    document.getElementById("countdown-title").textContent = title;
	    document.getElementById("daysBox").textContent = days;
	    document.getElementById("hoursBox").textContent = hours;
	    document.getElementById("minsBox").textContent = minutes;
	    document.getElementById("secsBox").textContent = seconds;
	    document.getElementById("daysBox-label").textContent = "Days";
	    document.getElementById("hoursBox-label").textContent = "Hours";
	    document.getElementById("minsBox-label").textContent = "Minutes";
	    document.getElementById("secsBox-label").textContent = "Seconds";
               
	}
    setInterval(tick, 1000);    
 	});
 	</script>
	<form>

		<div class="countdown-output">
		<h3 id="countdown-title"></h3>
			<span id="daysBox"></span>
		<span class="countdown-label" id="daysBox-label"></span>
			<span id="hoursBox"></span>
		<span class="countdown-label" id="hoursBox-label"></span>
			<span id="minsBox"></span>
		<span class="countdown-label" id="minsBox-label"></span>
			<span id="secsBox"></span>
		<span class="countdown-label" id="secsBox-label"></span>
	</div>	
		<br>
	</form>
<?php
	}
}
new Shortcode
?>