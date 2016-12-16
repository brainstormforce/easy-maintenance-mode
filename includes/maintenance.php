<?php
/**
 * Maintenance mode template.
 *
 * @package   Countdown
 * @since   1.0
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo plugins_url( 'admin/css/maintenance.css', dirname( __FILE__ ) ); ?>">

	<title>Down for Maintenance | <?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
	<style type="text/css">
		.title-style-handler {
			color: <?php echo esc_html( get_option( 'maintenance_mode_title_color' ) ) ?>;
			font-size: <?php echo esc_html( get_option( 'maintenance_mode_title_size' ) ) ?>px;
		}
		.desc-style-handler {;
			color: <?php echo esc_html( get_option( 'maintenance_mode_desc_color' ) ) ?>;
			font-size: <?php echo esc_html( get_option( 'maintenance_mode_desc_size' ) ) ?>px;

		}
		.countdown-output {
			color: <?php echo esc_html( get_option( 'maintenance_mode_countdown_color' ) ) ?>;
			font-size: <?php echo esc_html( get_option( 'maintenance_mode_countdown_size' ) ) ?>px;
		}
		#container {
			opacity: <?php echo esc_html( get_option( 'maintenance_mode_container_opacity' ) ) ?>;
		}

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	jQuery(document).ready(function(){
	    function tick() {
	    var to = "<?php echo get_option( 'maintenance_mode_date' ) ?>";
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
</head>

<body>


<div id="container">
	<header>
		<h1><u><?php echo esc_html( get_bloginfo( 'name' ) ); ?></u></h1>
		<h3 class="title-style-handler"><?php echo esc_html( get_option( 'maintenance_mode_title' ) ); ?></h3>
	</header>

	<main>
		<p class="desc-style-handler"><?php echo esc_html( get_option('maintenance_mode_desc') ); ?></p>
	</main>
	<br />
	<div class="countdown-output">
			<span id="daysBox"></span>
		<span class="countdown-label" id="daysBox-label"></span>
			<span id="hoursBox"></span>
		<span class="countdown-label" id="hoursBox-label"></span>
			<span id="minsBox"></span>
		<span class="countdown-label" id="minsBox-label"></span>
			<span id="secsBox"></span>
		<span class="countdown-label" id="secsBox-label"></span>
	</div>
	<br />
	<br />
	<a href="<?php echo esc_url( get_option('mm_social_media_facebook') ) ?>" target="_blank"">
		<i class="fa fa-facebook-official" aria-hidden="true"></i>
	</a>
	<a href="<?php echo esc_url( get_option('mm_social_media_twitter') ) ?>" target="_blank"">
		<i class="fa fa-twitter" aria-hidden="true"></i>
	</a>
	<a href="<?php echo esc_url( get_option('mm_social_media_youtube') ) ?>" target="_blank"">
		<i class="fa fa-youtube-play" aria-hidden="true"></i>
	</a>
	<a href="<?php echo esc_url( get_option('mm_social_media_linkedin') ) ?>" target="_blank"">
		<i class="fa fa-linkedin" aria-hidden="true"></i>
	</a>
	<a href="<?php echo esc_url( get_option('mm_social_media_googleplus') ) ?>" target="_blank"">
		<i class="fa fa-google-plus" aria-hidden="true"></i>
	</a>
</div>

</body>
</html>
