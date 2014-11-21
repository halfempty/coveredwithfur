<?php

// WP Menus
register_nav_menu('primary-menu', __('Primary Menu', 'framework'));


function cwf_enqueue_scripts() {

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

   	wp_enqueue_script('jquery');

	// Flexslider

	wp_register_style( 'flexslidercss', get_template_directory_uri() . '/css/flexslider.css', array(), '', 'all' );
	wp_enqueue_style( 'flexslidercss' );

	wp_register_script('flexsliderjs', get_template_directory_uri().'/js/jquery.flexslider-min.js', 'jquery', '2.1', TRUE);
   	wp_enqueue_script('flexsliderjs');

	// JS

	wp_register_script('cwfjs', get_template_directory_uri().'/js/cwf.js', 'jquery', '2.1', TRUE);
   	wp_enqueue_script('cwfjs');
	
	// CSS

	wp_register_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Raleway:400,500', array(), '2013-02-24' );
	wp_enqueue_style( 'googlefonts' );

	wp_register_style( 'themecss', get_stylesheet_uri(), array(), '2013-02-24' );
	wp_enqueue_style( 'themecss' );

	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array(), '', 'all' );
	wp_enqueue_style( 'responsive' );

}

add_action('wp_print_styles', 'cwf_enqueue_scripts');

?>
