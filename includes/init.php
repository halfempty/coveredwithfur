<?php

/*-----------------------------------------------------------------------------------*/
/*	Load Theme Specific Functions
/*-----------------------------------------------------------------------------------*/

require_once (tj_FILEPATH . '/framework/tj-theme-functions.php');

/*-----------------------------------------------------------------------------------*/
/*	Load Theme Options
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', tj_DIRECTORY_URI . '/includes/admin-options/' );
	require_once dirname( __FILE__ ) . '/admin-options/options-framework.php';
}

/*-----------------------------------------------------------------------------------*/
/*	Load Custom Post Type - Slider
/*-----------------------------------------------------------------------------------*/

require_once(tj_DIRECTORY_INCLUDES .'post-types/theme-cpt-slider.php');

/*-----------------------------------------------------------------------------------*/
/*	Load Custom Post Type - Gallery
/*-----------------------------------------------------------------------------------*/

require_once(tj_DIRECTORY_INCLUDES .'post-types/theme-cpt-gallery.php');

/*-----------------------------------------------------------------------------------*/
/*	Load Custom Post Type - Testimonial
/*-----------------------------------------------------------------------------------*/

require_once(tj_DIRECTORY_INCLUDES .'post-types/theme-cpt-testimonial.php');

/*-----------------------------------------------------------------------------------*/
/*	Load Custom Post Type Meta & Standard Posts Meta
/*-----------------------------------------------------------------------------------*/

require_once(tj_DIRECTORY_INCLUDES .'post-meta/theme-post-meta.php');
require_once(tj_DIRECTORY_INCLUDES .'post-meta/theme-cpt-slider-meta.php');
require_once(tj_DIRECTORY_INCLUDES .'post-meta/theme-cpt-gallery-meta.php');
require_once(tj_DIRECTORY_INCLUDES .'post-meta/theme-cpt-testimonial-meta.php');

/*-----------------------------------------------------------------------------------*/
/*	Load Theme Widgets
/*-----------------------------------------------------------------------------------*/

require_once(tj_DIRECTORY_INCLUDES .'widgets/widget-flickr.php');
require_once(tj_DIRECTORY_INCLUDES .'widgets/widget-video.php');