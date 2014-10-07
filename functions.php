<?php

if ( ! isset( $content_width ) ) $content_width = 1120;

if ( !function_exists( 'themejug_theme_setup' ) ) {
	function themejug_theme_setup(){
	    
	    // Theme Translations
	    load_theme_textdomain('framework', TEMPLATEPATH . '/languages');
	    $locale = get_locale();
	    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
	    if ( is_readable( $locale_file ) )
	    	require_once( $locale_file );
	    	
	    // Feed Links
	    add_theme_support( 'automatic-feed-links' );
	    
	    // WP Menus
	    register_nav_menu('primary-menu', __('Primary Menu', 'framework'));
	    
	    // Post Formats
		add_theme_support( 'post-formats', array(
			'audio', 'gallery', 'image', 'link', 'quote', 'video'
		) );
	    
	    // WP Thumbnails
	    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'gallery', 'slider' )  );
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

	wp_register_style( 'shortcodescss', get_template_directory_uri() . '/css/shortcodes.css', array(), '3.0.2', 'all' );
	wp_enqueue_style( 'shortcodescss');


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
   	
   	if ( is_page_template( 'template-contact.php' ) ) {
		wp_register_script('validation', 'http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js', 'jquery');
   	    wp_enqueue_script('validation');
   	}
   	
   	if( is_page_template( 'template-gallery-filtered.php' ) ) {
       	wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '1.5.03', TRUE);
   	    wp_enqueue_script('isotope');
   	}

	/* Flexslider */
   	
	wp_enqueue_style( 'flexslider' );
	wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '', 'all' );

   	wp_enqueue_script('flexslider');
	wp_register_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', 'jquery', '2.1', TRUE);

}

add_action('wp_print_styles', 'cwf_enqueue_scripts');


function cwf_dequeue_plugin_scripts() { 

	// JS
	// wp_dequeue_script('tribe-events-pro');

	// CSS
	wp_dequeue_style( 'ig_shortcodes_fontawesome' );
	wp_dequeue_style( 'ig_shortcodes_fontello' );
	wp_dequeue_style( 'ig_shortcodes' );
	wp_dequeue_style( 'tj-sc-fontawesome' );
	wp_dequeue_style( 'tj-sc-fontawesomeie7' );

}
add_action('wp_print_styles', 'cwf_dequeue_plugin_scripts');



/*-----------------------------------------------------------------------------------*/
/*	Post Format: Gallery Image Size
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery_atts' ) ) {
	function tj_gallery_atts( $atts ) {
		if ( has_post_format( 'gallery' ) && ! is_single() )
			$atts['size'] = wp_is_mobile() ? 'thumbnail' : 'large';
	
		return $atts;
	}
}
add_filter( 'shortcode_atts_gallery', 'tj_gallery_atts' );

/*-----------------------------------------------------------------------------------*/
/*	Post Format: Video Size
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_media_content_width' ) ) {
	function tj_media_content_width() {
		if ( has_post_format( 'video' ) || has_post_format( 'audio' ) || is_attachment() ) {
			global $content_width;
			$content_width = 1120;
		}
	}
}
add_action( 'template_redirect', 'tj_media_content_width' );

/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/

function tj_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'framework' ),
		'id'            => 'sidebar-1',
		'description'   => __( '', 'framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right', 'framework' ),
		'id'            => 'sidebar-2',
		'description'   => __( '', 'framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'framework' ),
		'id'            => 'sidebar-3',
		'description'   => __( '', 'framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'tj_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/*	Change Default Excerpt Length
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'tj_excerpt_length' ) ) {
    function tj_excerpt_length( $length ) {
   		return 35; 
    }
}
add_filter('excerpt_length', 'tj_excerpt_length', 999);

/*-----------------------------------------------------------------------------------*/
/* Validate For Contact Form 
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'tj_contact_validate' ) ) {
    function tj_contact_validate() {
    	if (is_page_template('template-contact.php') ) { ?>
    		<script type="text/javascript">
    			jQuery(document).ready(function(){
    				jQuery("#contact").validate();
    			});
    		</script>
    	<?php }
    }
}
add_action('wp_head', 'tj_contact_validate');

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