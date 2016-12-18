<?php
/**
 * Maintenance mode template.
 *
 * @package   Easy Maintenance Mode
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
		body {
			background: url(<?php echo esc_html( get_option( 'maintenance_mode_image' ) ) ?> ) ;
		}
		.title-style-handler {
			color: <?php echo esc_html( get_option( 'maintenance_mode_title_color' ) ) ?>;
			font-size: <?php echo esc_html( get_option( 'maintenance_mode_title_size' ) ) ?>px;
			margin: 20px
		}
		.desc-style-handler {;
			color: <?php echo esc_html( get_option( 'maintenance_mode_desc_color' ) ) ?>;
			font-size: <?php echo esc_html( get_option( 'maintenance_mode_desc_size' ) ) ?>px;
			margin-bottom: 0;
		}
		.countdown-output {
			color: <?php echo esc_html( get_option( 'maintenance_mode_countdown_color' ) ) ?>;
		}
		#container {
			opacity: <?php echo esc_html( get_option( 'maintenance_mode_container_opacity' ) ) ?>;
			background-size: cover;
		}
		#daysBox, #hoursBox, #minsBox, #secsBox {
			font-size: <?php echo esc_html( get_option( 'maintenance_mode_countdown_size' ) ) ?>px;
			font-family: tahoma;
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
	    hours = ("0" + hours).slice(-2);
	    minutes = ("0" + minutes).slice(-2);
  	    if( days > 99 && days < 999 ) {
  	    	days = ("0" + days).slice(-3);
  	    }
  	    else if( days > 999 ) {
  	    	days = ("0" + days).slice(-4);
  	    }
  	    else {
  	    	days = ("0" + days).slice(-2);

  	    }


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
		<img id="site-maintenance-logo" src="<?php echo esc_html( get_option( 'maintenance_mode_image_logo' ) ); ?>" width="30%" height="10%"></img>
	</header>
	<h3 class="title-style-handler"><?php echo esc_html( get_option( 'maintenance_mode_title' ) ); ?></h3>
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
	<div class="social-icons-container">
		<a href="<?php echo esc_url( get_option('mm_social_media_facebook') ) ?>" target="_blank">
			<span class="fa-stack fa-2x facebook-stack" style="color: #3b5998">
			  <i class="fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<a href="<?php echo esc_url( get_option('mm_social_media_twitter') ) ?>" target="_blank">
			<span class="fa-stack fa-2x twitter-stack" style="color: #1DA1F2;">
			  <i class="fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<a href="<?php echo esc_url( get_option('mm_social_media_youtube') ) ?>" target="_blank">
			<span class="fa-stack fa-2x youtube-stack" style="color: #D82423;">
			  <i class="fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<a href="<?php echo esc_url( get_option('mm_social_media_linkedin') ) ?>" target="_blank">
			<span class="fa-stack fa-2x linkedin-stack" style="color: #007BB6;">
			  <i class="fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
			</span>
		</a>
		<a href="<?php echo esc_url( get_option('mm_social_media_googleplus') ) ?>" target="_blank">
			<span class="fa-stack fa-2x googleplus-stack" style="color: #DC4A38;">
			  <i class="fa fa-circle fa-stack-2x"></i>
			  <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
			</span>
		</a>
	</div>
	<?php 
		$facebook = esc_url( get_option('mm_social_media_facebook') );
		$twitter = esc_url( get_option('mm_social_media_twitter') );
		$youtube = esc_url( get_option('mm_social_media_youtube') );
		$linkedin = esc_url( get_option('mm_social_media_linkedin') );
		$googleplus = esc_url( get_option('mm_social_media_googleplus') );
		$logo = esc_html( get_option( 'maintenance_mode_image_logo' ) );
		
		if( $logo = '' ){
			?>
			<style>
			#site-maintenance-logo {
				display: none;
			}
			</style>
			<?php
		}
		if( $facebook == '' ){
			?>
			<style>
				.facebook-stack {
					display: none
				}
			</style>
			<?php
		}
		if ( $googleplus == '' ){
			?>
			<style>
				.googleplus-stack {
					display: none
				}
			</style>
			<?php

		}
		if ( $twitter == '' ){
			?>
			<style>
				.twitter-stack {
					display: none
				}
			</style>
			<?php

		}
		if ( $linkedin == '' ){
			?>
			<style>
				.linkedin-stack {
					display: none
				}
			</style>
			<?php

		}
		if ( $youtube == '' ){
			?>
			<style>
				.youtube-stack {
					display: none
				}
			</style>
			<?php

		}

?>
</div>

</body>
</html>
