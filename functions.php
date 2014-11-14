<?php

if ( ! isset( $content_width ) ) $content_width = 1120;

if ( !function_exists( 'themejug_theme_setup' ) ) {
	function themejug_theme_setup(){

	    // Feed Links
	    add_theme_support( 'automatic-feed-links' );
	    
	    // WP Menus
	    register_nav_menu('primary-menu', __('Primary Menu', 'framework'));

	    // WP Thumbnails
//	    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'gallery', 'slider' )  );
	    set_post_thumbnail_size( 1120, 350, true ); // Thumbnails
	    add_image_size( 'featured-img', 1120, 690, true); // Featured image - cropped
	    add_image_size( 'featured-img-full', 1120, '', false); // Featured image - fullwidth
	    add_image_size( 'featured-img-full-supersized', '', '', false); // Featured image - unlimited
	    add_image_size( 'slider', 3000, '', false); // Slider - fullwidth
	    add_image_size( 'project-img', 220, 220, true); // Featured image - cropped
	    add_image_size( 'featured-img-full-crop', 1120, 430, true); // Featured image - cropped
	    
	    // This theme uses its own gallery styles.
	    add_filter( 'use_default_gallery_style', '__return_false' );
	    
	}
}
add_action('after_setup_theme', 'themejug_theme_setup');


function cwf_enqueue_scripts() {

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	/* CSS */

	wp_register_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Raleway:400,500', array(), '2013-02-24' );
	wp_enqueue_style( 'googlefonts' );

	wp_register_style( 'themecss', get_stylesheet_uri(), array(), '2013-02-24' );
	wp_enqueue_style( 'themecss' );

	wp_register_style( 'fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.0.2', 'all' );
	wp_enqueue_style( 'fontAwesome');

	wp_register_style( 'response', get_template_directory_uri() . '/css/responsive.css', array(), '', 'all' );
	wp_enqueue_style( 'response' );

	/* JS */

   	wp_enqueue_script('jquery');

	wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js', 'jquery', '', TRUE);
   	wp_enqueue_script('superfish');

	wp_register_script('tj_custom', get_template_directory_uri() . '/js/jquery.custom.js', array('jquery', 'superfish'), '1.0', TRUE);
   	wp_enqueue_script('tj_custom');

	wp_register_script('backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js', 'jquery', '2.0.3', TRUE);
   	wp_enqueue_script('backstretch');

	wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0', TRUE);
   	wp_enqueue_script('fitvids');

	wp_register_script('jquery-ui', get_template_directory_uri() . '/js/jquery.ui.custom.min.js', 'jquery', '1.10.3', TRUE);
   	wp_enqueue_script('jquery-ui');

	/* Flexslider */
	wp_register_style( 'flexslidercss', get_template_directory_uri() . '/css/flexslider.css', array(), '', 'all' );
	wp_enqueue_style( 'flexslidercss' );

	wp_register_script('flexsliderjs', get_template_directory_uri().'/js/jquery.flexslider-min.js', 'jquery', '2.1', TRUE);
   	wp_enqueue_script('flexsliderjs');

	// CWF
	wp_register_script('cwfjs', get_template_directory_uri().'/js/cwf.js', 'jquery', '2.1', TRUE);
   	wp_enqueue_script('cwfjs');

}

add_action('wp_print_styles', 'cwf_enqueue_scripts');



/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'tj_admin_js' ) ) {
    function tj_admin_js($hook) {
    	if ($hook == 'post.php' || $hook == 'post-new.php') {
    		wp_register_script('tj-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', 'jquery');
    		wp_enqueue_script('tj-admin');
    	}
    }
}
add_action('admin_enqueue_scripts','tj_admin_js',10,1);


/*-----------------------------------------------------------------------------------*/
/*	Define Template Paths
/*-----------------------------------------------------------------------------------*/

define('tj_FILEPATH', TEMPLATEPATH);
define('tj_DIRECTORY_URI', get_template_directory_uri());
define('tj_DIRECTORY', get_template_directory());
define('tj_DIRECTORY_INCLUDES', tj_DIRECTORY. '/includes/');

/*-----------------------------------------------------------------------------------*/
/*	Load Theme Components
/*-----------------------------------------------------------------------------------*/
require_once(tj_DIRECTORY .'/includes/init.php');