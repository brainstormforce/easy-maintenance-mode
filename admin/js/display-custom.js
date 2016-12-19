/*
* Checking condition if 'mm_social_media_facebook' has a value.
*/

//If it doesn't have a value then add class facebook-stack

if (<?php get_options( 'mm_social_media_facebook' )?> == '' ) {
	$(".fa-stack").addClass("facebook-stack");
}
// else remove class facebook-stack
else {
	$(".fa-stack").removeClass("facebook-stack");
}

if (<?php get_options( 'mm_social_media_twitter' )?> == '' ) {
	$(".fa-stack").addClass("twitter-stack");
}
else {
	$(".fa-stack").removeClass("twitter-stack");
}

if (<?php get_options( 'mm_social_media_googleplus' )?> == '' ) {
	$(".fa-stack").addClass("googleplus-stack");
}
else {
	$(".fa-stack").removeClass("googleplus-stack");
}

if (<?php get_options( 'mm_social_media_linkedin' )?> == '' ) {
	$(".fa-stack").addClass("linkedin-stack");
}
else {
	$(".fa-stack").removeClass("linkedin-stack");
}

if (<?php get_options( 'mm_social_media_youtube' )?> == '' ) {
	$(".fa-stack").addClass("youtube-stack");
}
else {
	$(".fa-stack").removeClass("youtube-stack");
}

