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
/*	Load Custom Post Type Meta & Standard Posts Meta
/*-----------------------------------------------------------------------------------*/

require_once(tj_DIRECTORY_INCLUDES .'post-meta/theme-post-meta.php');

?>
