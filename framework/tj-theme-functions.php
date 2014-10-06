<?php

/*-----------------------------------------------------------------------------------*/
/* Output Custom CSS from theme options
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_head_css' ) ) {
    function tj_head_css() {
        
        $output = '';	

        /* Custom Background Color */
        $bg_color = of_get_option('bg_color');
        
        if ( !empty($bg_color) ) {
        	$output .= "body { background-color: " . $bg_color . "; }";
        }
        
        /* Custom Text Color - Body */
        $text_color = of_get_option('text_color');
        
        if ( !empty($text_color) ) {
        	$output .= "body,.tj-home-testimonials .entry-content p { color: " . $text_color . "; }";
        }
        
        /* Custom Secondary Text Color - Menu & Meta */
        $secondary_text_color = of_get_option('secondary_text_color');
        
        if ( !empty($secondary_text_color) ) {
        	$output .= ".meta, .meta a { color: " . $secondary_text_color . "; }";
        	$output .= "a.comment-reply-link { background: " . $secondary_text_color . "; }";
        }
        
        /* Menu Link Color */
        $menu_link_color = of_get_option('menu_link_color');
        
        if ( !empty($menu_link_color) ) {
        	$output .= "#header nav ul li a,#header nav ul li.sfHover ul a,#tj-mobile-menu ul li a { color: " . $menu_link_color . "; }";
        }
        
        /* Menu Link Hover Color */
        $menu_link_hover_color = of_get_option('menu_link_hover_color');
        
        if ( !empty($menu_link_hover_color) ) {
        	$output .= "#header nav ul li a:hover,#header nav ul li.sfHover ul li.current-menu-item a,#header nav ul li.current-menu-parent a,#header nav ul li.current-menu-item a,#header nav ul ul li a:hover,#header nav ul ul li.sfHover a,#header nav ul ul li.current-cat a,#header nav ul li.current_page_item a,#header nav ul li.current-menu-item a,#header nav ul li.sfHover ul a:hover,#tj-mobile-menu ul li a:hover { color: " . $menu_link_hover_color . "; }";
        }

        /* Custom Background Image */
        $bg_image = of_get_option('bg_image');
        /* Get Custom Background Position */
        $bg_position = of_get_option('bg_image_position');
        /* Custom Background Repeat */
        $bg_repeat = of_get_option('bg_image_repeat');
        
       	if ( !empty($bg_image) ) {

			if ( 'fullscreen' != $bg_position ) {
		        
		        if ( !empty($bg_image) ) {
		        	$output .= "body { background-image:url('" . $bg_image . "')!important; }.home-projects-wrapper,.home-projects-full-wrapper { background: transparent; }";
		        }
		        
		        if ( !empty($bg_position) ) {
		        	$output .= "body { background-position: " . $bg_position . "; }";
		        }
		        
		        if ( !empty($bg_repeat) ) {
		        	$output .= "body { background-repeat: " . $bg_repeat . "; }";
		        }
	        
			} elseif ( 'fullscreen' == $bg_position ) {
			$output .="body { background: url(" . $bg_image . ") no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; }";
			}
		
		}
		
		/* Custom Header Color */
		$header_bg_color = of_get_option('header_color');
		
		if ( !empty($header_bg_color) ) {
		
			/* If sicky header disabled, set opactity to 1 */
			$header_bg_opactity = of_get_option('header_position');
			
			if ( !empty($header_bg_color) && $header_bg_opactity === '1' ) {
			
				/* Convert Hex To RGBA */
				$tj_rgb = tj_convert_hex2rgba( $header_bg_color );
				$tj_rgba = tj_convert_hex2rgba( $header_bg_color, 1);
				$tj_rgb_sticky = tj_convert_hex2rgba( $header_bg_color );
				$tj_rgba_sticky = tj_convert_hex2rgba( $header_bg_color, 1);
			
			} else {
			
				/* Convert Hex To RGBA */
				$tj_rgb = tj_convert_hex2rgba( $header_bg_color );
				$tj_rgba = tj_convert_hex2rgba( $header_bg_color, 0.3);
				$tj_rgb_sticky = tj_convert_hex2rgba( $header_bg_color );
				$tj_rgba_sticky = tj_convert_hex2rgba( $header_bg_color, 0.6);
				
			}
		
			$output .= ".header-wrap { background: " . $tj_rgb . "; background: " . $tj_rgba . "; }";
			$output .= ".header-wrap.sticky { background: " . $tj_rgb_sticky . "; background: " . $tj_rgba_sticky . "; }";
			$output .= "#header nav ul ul { background: " . $tj_rgb . "; }";
			$output .= "#tj-mobile-menu { background: " . $tj_rgb . "; }";
			
		}
		
		/* Custom Footer Color */
		$footer_bg_color = of_get_option('footer_color');
		
		if ( !empty($footer_bg_color) ) {
			$output .= ".footer-wrap,.footer-inner { background: " . $footer_bg_color . "; }";
		}
		
		/* Custom Link Color */
		$link_color = of_get_option('link_color');
		
		if ( !empty($link_color) ) {
			$output .= ".format-quote .tj-quote-link a:hover,.entry-content a.more-link:hover,.entry-content a,.slides a,.tj-client-url a,.footer-widgets a,.logged-in-as a,#reply-title a,.tj-image-description a,.logo h1 a { color: " . $link_color . ";}";
			$output .= ".pagination-default-left a:hover,.pagination-default-right a:hover { background-color: " . $link_color . "; }";
		}
		
		/* Custom Link Hover Color */
		$link_hover_color = of_get_option('link_hover_color');
		
		if ( !empty($link_hover_color) ) {
			$output .= ".format-quote .tj-quote-link a,a.more-link,.entry-title a:hover,.entry-content a:hover,.tj-home-testimonials .entry-content a:hover,.slides a:hover,.tj-client-url a:hover,.footer-widgets a:hover,.meta a:hover,.logged-in-as a:hover,.comment_text p a:hover,#reply-title a:hover,.tj-image-description a:hover,.logo h1 a:hover,.footer-inner a:hover { color: " . $link_hover_color . "; }";
			
			$output .= ".page-template-template-home-php .tj-home-slider .tj-direction-nav a:hover,.pagination-default-left a:hover,.pagination-default-right a:hover,a.comment-reply-link:hover { background-color: " . $link_hover_color . "; }";
			
			$output .= ".contact input[type=\"submit\"]:hover,#respond input[type=\"submit\"]:hover,.pagination-links .current,.pagination-links a.page-numbers:hover,::selection { background: " . $link_hover_color . "; color: #fff; }";
			$output .= "a.tj-mobile-menu:hover,#sort-by .active,#sort-by ul li a:hover { background: " . $link_hover_color . "; color: #fff; }";
			
		}
		
		/* Custom Heading Color */
		$heading_color = of_get_option('heading_color');
		
		if ( !empty($heading_color) ) {
			$output .= "h1,h2,h3,h4,h5,h6,.entry-title a,.entry-title,.meta a,#sort-by ul li a,.tj-home-testimonials .entry-content a { color: " . $heading_color . "; }";
		}
		
		/* Custom outlines / seperators / lines colors */
		$line_color = of_get_option('line_color');
		
		if ( !empty($line_color) ) {
			$output .= "article.post,.commentlist article,#tj-mobile-menu ul li a { border-bottom: solid 1px " . $line_color . "; }";
			
			$output .= "#searchform input[type=\"text\"],.author-img .avatar,.contact input[type=\"text\"],.contact input[type=\"email\"],.contact input[type=\"url\"],.contact textarea,#respond input[type=\"text\"],#respond input[type=\"email\"],#respond input[type=\"url\"],#respond textarea{ border: solid 1px " . $line_color . "; }";
			
		}
		
		/* Custom button color */
		$pagination_color = of_get_option('pagination_color');
		
		if ( !empty($pagination_color) ) {
			$output .= "a.tj-mobile-menu,.page-template-template-home-php .tj-home-slider .tj-direction-nav a,.pagination-default-left a,.pagination-default-right a,.pagination-links a.page-numbers,#respond input[type=\"submit\"],.contact input[type=\"submit\"] { background-color: " . $pagination_color . "; color: #fff; }";
		}
		
		/* Custom Slider Settings */
		$slider_height = of_get_option('tj_home_slideshow_height');
		if ( !empty($slider_height) ) {
			$output .= ".page-template-template-home-php .tj-home-slider .slides li { height: " . $slider_height . "px; }";
			$output .= "@media only screen and (max-width: 750px) {
			.page-template-template-home-php .tj-home-slider .slides li { height: " . $slider_height / 2 . "px; }
			} @media screen and (min-width: 751px) and (max-width: 970px) {
			.page-template-template-home-php .tj-home-slider .slides li { height: " . $slider_height / 1.5 . "px; }
			}";	
		}
		
		/* Single Gallery Fullwidth Height Limit */
		$single_gallery_slider_height = of_get_option('tj_single_gallery_height');
		if ( !empty($single_gallery_slider_height) ) {
			$output .= ".single-gallery-hero { min-height: " . $single_gallery_slider_height . "px; }";
			$output .= "@media only screen and (max-width: 750px) {
			.single-gallery-hero { min-height: " . $single_gallery_slider_height / 2 . "px; }
			} @media screen and (min-width: 751px) and (max-width: 970px) {
			.single-gallery-hero { min-height: " . $single_gallery_slider_height / 1.5 . "px; }
			}";		
		}
						
		/* Useful statement: If on a single gallery, with no featured image */
		if ( is_single() && 'gallery' == get_post_type() ) { 
			
			global $post;
			$has_featured_image = has_post_thumbnail( $post->ID );
			
			if  ( !$has_featured_image ) { 
				//No Featured Image On Project
			}
		
		}
		
		/* Custom Slider Text Position */
		$tj_home_slideshow_position = of_get_option('tj_home_slideshow_position');
		
		if ( !empty($tj_home_slideshow_position) && ("default" !== $tj_home_slideshow_position) ) {
			$output .= ".page-template-template-home-php .tj-home-slider .entry-content { bottom: " . $tj_home_slideshow_position . "%; }";
			$output .= "@media only screen and (max-width: 750px) {
			.page-template-template-home-php .tj-home-slider .entry-content { bottom: " . $tj_home_slideshow_position / 1.2 . "%; }
			} @media screen and (min-width: 751px) and (max-width: 970px) {
			.page-template-template-home-php .tj-home-slider .entry-content { bottom: " . $tj_home_slideshow_position / 2 . "%; }
			}";	
		}
		
		/* Testimonial Background Color */
		$tj_testimonial_bgcolor = of_get_option('tj_testimonial_bgcolor');
		
		if ( !empty($tj_testimonial_bgcolor) ) {
			$output .= ".tj-home-testimonials-wrapper { background: " . $tj_testimonial_bgcolor . "; }";
		}
		
		/* Footer Credits Background Color */
		$footer_credits_color = of_get_option('footer_credits_color');
		
		if ( !empty($footer_credits_color) ) {
			$output .= ".footer-inner { background: " . $footer_credits_color . "; }";
		}
		
		/* Widget Title Color */
		$widget_title_color = of_get_option('widget_title_color');
		
		if ( !empty($widget_title_color) ) {
			$output .= ".widget-title { color: " . $widget_title_color . "; }";
		}
		
		/* Widget Text Color */
		$widget_text_color = of_get_option('widget_text_color');
		
		if ( !empty($widget_text_color) ) {
			$output .= ".widget,.footer-inner p { color: " . $widget_text_color . "; }";
		}
		
		/* Widget Link Color */
		$widget_link_color = of_get_option('widget_link_color');
		
		if ( !empty($widget_link_color) ) {
			$output .= ".widget a,.footer-inner a { color: " . $widget_link_color . "; }";
		}
		
		/* Widget Link Hover Color */
		$widget_link_hover_color = of_get_option('widget_link_hover_color');
		
		if ( !empty($widget_link_hover_color) ) {
			$output .= ".widget a:hover,.footer-inner a:hover { color: " . $widget_link_hover_color . "; }";
		}
		
		/* Single Gallery Details Background Color */
		$single_gallery_more_bg = of_get_option('tj_single_gallery_more_bg');
		
		if ( !empty($single_gallery_more_bg) ) {
			$output .= ".single-gallery-footer { background: " . $single_gallery_more_bg . "; }";
		}
		
		/* Disable Sticky Header */
		$header_position = of_get_option('header_position');
		
		if ( !empty($header_position) ) {
			$output .= ".header-wrap { position: relative; top: auto; }";
		}
		
		/* Output the above */
		if ($output <> '') {
			return stripslashes($output);
		}
		
    }

}

/*-----------------------------------------------------------------------------------*/
/*	Hex To RGB(a) Conversion - http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php 
/*-----------------------------------------------------------------------------------*/

function tj_convert_hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}

/*-----------------------------------------------------------------------------------*/
/* Combine Custom & Default CSS & Cache The Output
/*-----------------------------------------------------------------------------------*/

function tj_admin_css($content) {
	$tj_css = of_get_option('custom_css')."\n\n";
	$tj_css .= tj_head_css()."\n\n";    
    if( $tj_css != '' ){
    	$content .= '/* CSS Output From Theme Options */' . "\n\n";
        $content .= stripslashes($tj_css);
    }
    return $content;
    
}
add_filter( 'tj_add_admin_css', 'tj_admin_css' );

/*-----------------------------------------------------------------------------------*/
/* Build Custom CSS File
/*-----------------------------------------------------------------------------------*/
 
function tj_add_admin_css() {
    $output = '';
    if( apply_filters('tj_add_admin_css', $output) ) {
    	$permalink_structure = get_option('permalink_structure');
    	$url = home_url() .'/tj-admin-options.css?'. time();
    	if(!$permalink_structure) $url = home_url() .'/?page_id=tj-admin-options.css';
        echo '<link rel="stylesheet" href="'. $url .'" type="text/css" media="screen" />' . "\n";
    }
}
add_action( 'wp_head', 'tj_add_admin_css', 12 );

/*-----------------------------------------------------------------------------------*/
/* Link To Custom CSS File
/*-----------------------------------------------------------------------------------*/

function tj_create_admin_css() {
	$permalink_structure = get_option('permalink_structure');
	$show_css = false;

	if($permalink_structure){
		if( !isset($_SERVER['REQUEST_URI']) ){
		    $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);
		    if(isset($_SERVER['QUERY_STRING'])){ $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; }
		}
		$url = (isset($GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'])) ? $GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'] : $_SERVER["REQUEST_URI"];
		if(preg_replace('/\\?.*/', '', basename($url)) == 'tj-admin-options.css') $show_css = true;
	} else {
		if(isset($_GET['page_id']) && $_GET['page_id'] == 'tj-admin-options.css') $show_css = true;
	}

	if($show_css){
	    $output = '';
		header('Content-Type: text/css');
		echo apply_filters('tj_add_admin_css', $output);
		exit;
	}
}
add_action( 'init', 'tj_create_admin_css' );

/*-----------------------------------------------------------------------------------*/
/* Remove the_content <!-- More --> Anchor
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_remove_more_anchor' ) ) {
	function tj_remove_more_anchor($link) {
		$offset = strpos($link, '#more-');
		if ($offset) { $end = strpos($link, '"',$offset); }
		if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
		return $link;
	}
	add_filter('the_content_more_link', 'tj_remove_more_anchor');
}
    
/*-----------------------------------------------------------------------------------*/
/* Add iPad / iPhone Icon
/*-----------------------------------------------------------------------------------*/

function tj_custom_ico() {
	if ( of_get_option('iphone_ico_uploader') != '') {
	echo '<link rel="apple-touch-icon-precomposed" href="' . of_get_option('iphone_ico_uploader') . '" />'."\n";
	}
	else { ?>
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ?>/img/apple-touch-icon.png" />
	<?php }
}

add_action('wp_head', 'tj_custom_ico');

/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function tj_custom_favicon() {
	if ( of_get_option('favicon_uploader') != '') {
		echo '<link rel="shortcut icon" href="'. of_get_option('favicon_uploader') .'" />'."\n";
		echo '<link rel="icon" href="'. of_get_option('favicon_uploader') .'" type="image/x-ico" />';
	}
	else { ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.png" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.png" type="image/x-ico" />
	<?php }
}

add_action('wp_head', 'tj_custom_favicon');

/*-----------------------------------------------------------------------------------*/
/* Post Caption
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_post_caption' ) ) { 
	function tj_post_caption($postid) {
		$caption = get_post_meta($postid, 'tj_caption', true);
		if ( $caption ) {
			echo '<p class="tj-post-caption clearfix">'. esc_attr( $caption ) . '</p>'."\n";
			echo '<hr class="title-seperator">';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Slider Background
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_slider_background' ) ) { 
	function tj_slider_background( $postid ) {
		global $post;
		if ( has_post_thumbnail( $postid ) ) {
			$feature_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'featured-img-full-supersized' );
			$feature_image_url = $feature_image_url[0];
			
			echo $feature_image_url;
		} 
	}
}

/*-----------------------------------------------------------------------------------*/
/* Gallery Message
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery_message' ) ) {
	function tj_gallery_message() {
		wp_reset_query();
		$output = of_get_option('tj_gallery_message');
		if ( $output && is_page_template('template-home.php') ) {
			$content = apply_filters('the_content', $output);
			echo '<div class="tj_gallery_message">';
			echo $content;
			echo '</div>';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Testimonial Message
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_testimonial_message' ) ) {
	function tj_testimonial_message() {
		$output = of_get_option('tj_testimonial_message');
		if ( $output ) {
			$content = apply_filters('the_content', $output);
			echo '<div class="testimonial-intro clearfix">';
			echo $content;
			echo '</div>';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Gallery Backstretch 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery_background_init' ) ) { 
	function tj_gallery_background_init( $postid ) {
		global $post;
		$disable_featured_img = get_post_meta($postid, 'tj_gallery_disable_header', true);
		if ( $disable_featured_img === 'on' ) {
			return FALSE;
		} else {
			if ( has_post_thumbnail( $postid ) ) {
				$feature_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'featured-img-full-supersized' );
				$feature_image_url = $feature_image_url[0];
				tj_gallery_background( $feature_image_url );
				return TRUE;
			} else {
				return FALSE;
			}
		}
		

	}
}

if( !function_exists( 'tj_gallery_background' ) ) {
    function tj_gallery_background( $feature_image_url = NULL ) { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) { 
				$(".single-gallery-hero").backstretch("<?php echo $feature_image_url ?>"); 
			}); 
		</script>
<?php }
    
}

if ( !function_exists( 'tj_gallery_background_exists' ) ) { 
	function tj_gallery_background_exists( $postid ) {
		$class = '';
		$disable_featured_img = get_post_meta($postid, 'tj_gallery_disable_header', true);
		if ( $disable_featured_img == NULL || $disable_featured_img == '' || $disable_featured_img == 'off' ) {
			if ( has_post_thumbnail( $postid ) ) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		return;
	}
}

if ( !function_exists( 'tj_gallery_background_class' ) ) {
	function tj_gallery_background_class( $classes ) {
	 	global $post;
	 	$classes[] = '';
	 	
	 	if ( !(is_search() ) ) {
		 	if ( FALSE == tj_gallery_background_exists( $post->ID ) ) {
				$classes[] = 'tj-no-image';
			} elseif ( TRUE == tj_gallery_background_exists( $post->ID ) ) {
				$classes[] = 'tj-image-exists';
			} else {
				$classes[] = '';
			}
		}
		return $classes;
	}
}

add_filter('body_class', 'tj_gallery_background_class');

/*-----------------------------------------------------------------------------------*/
/* Gallery Type Content 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery_type' ) ) { 
	function tj_gallery_type( $postid ) {
		global $post;
		
		$gallery_type = get_post_meta($postid, 'tj_gallery_type', true);
		
	 	switch( $gallery_type ) {
	                        
	        case "Image":
	        tj_image( $post->ID, 'featured-img-full' );
	        break;
	
	        case "Slideshow":
	        tj_gallery( $post->ID, 'featured-img-full' );
	        break;
	
			case "Video":
			tj_video_embed_gallery( $post->ID );
			break;
	
	        default:
	        break;
	         
	    }
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* Gallery Client 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery_client' ) ) { 
	function tj_gallery_client( $postid ) {
		$tj_single_gallery_client_heading = of_get_option('tj_single_gallery_client_heading');
		
		if ( empty($tj_single_gallery_client_heading) ) {
			$tj_single_gallery_client_heading = __('Client','framework');
		}
		
		$tj_gallery_client = get_post_meta($postid, 'tj_gallery_client', true);
		$tj_gallery_client_url = get_post_meta($postid, 'tj_gallery_url', true);

		if ( $tj_gallery_client_url ) {
			echo '<h4 class="tj-gallery-meta-title meta">' . $tj_single_gallery_client_heading . '</h4>';
			echo '<p class="tj-client-url"><a href="' . $tj_gallery_client_url . '" target="_blank">'. $tj_gallery_client .'</a></p>';
		} elseif ( $tj_gallery_client ) { 
			echo '<h4 class="tj-gallery-meta-title meta">' . $tj_single_gallery_client_heading . '</h4>';
			echo '<p class="tj-client-name">' . $tj_gallery_client . '</p>';
		}
				
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Gallery Date 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery_client_date' ) ) { 
	function tj_gallery_client_date( $postid ) {		
		$tj_single_gallery_date_heading = of_get_option('tj_single_gallery_date_heading');
		
		if ( empty($tj_single_gallery_date_heading) ) {
			$tj_single_gallery_date_heading = __('Date','framework');
		}	
	
		$tj_gallery_date = get_post_meta($postid, 'tj_gallery_date', true);
		
		if ( $tj_gallery_date ) { 
			echo '<h4 class="tj-gallery-meta-title meta">'. $tj_single_gallery_date_heading .'</h4>';
			echo '<p class="tj-gallery-date">'. $tj_gallery_date .'</p>';
		}
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Output image
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_image' ) ) {
    function tj_image($postid, $imagesize) {
		global $post;
		
		// Get featured thumb ID, 
		$thumb_ID = get_post_thumbnail_id( $post->ID );
		
		// Exclude Or Include The Featured Image In Content
		if (of_get_option('tj_exclude_featured_image') == '1') {
		
			$args = array(
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'attachment',
				'post_parent' => $postid,
				'post_mime_type' => 'image',
				'post_status' => null,
				'numberposts' => -1,
				'exclude' => $thumb_ID
			);
			$attachments = get_posts($args);
		
		}else {
		
			$args = array(
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'attachment',
				'post_parent' => $postid,
				'post_mime_type' => 'image',
				'post_status' => null,
				'numberposts' => -1
			);
			$attachments = get_posts($args);
		
		}

		if( !empty($attachments) ) {
		    echo '<div class="tj-image">';
		    $i = 0;
		    foreach( $attachments as $attachment ) {
		        $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
		        $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
		        $caption = ( !empty($attachment->post_content) ) ? $attachment->post_excerpt : $attachment->post_excerpt;
		        $description = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_content;
		        echo "<div class='tj-image-meta clearfix'>";
		        echo "<img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />";
		        if ( $caption ) {
		       	 echo "<span class='tj-image-caption'>$caption</span>";
		        }
		        echo "</div>";
		        if ( $description ) {
		        	echo "<div class='tj-image-description'><p>$description</p></div>";
		        }
		        $i++;
		    }
		    echo '</div>';
		}
    }
}

/*-----------------------------------------------------------------------------------*/
/* Output gallery slideshow
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_gallery' ) ) {
    function tj_gallery($postid, $imagesize) { 
    global $post;
    ?>
		<script type="text/javascript" charset="utf-8">
			jQuery(window).load(function() {
				jQuery('#tj-gallery-nav-<?php echo $postid; ?>').flexslider({
				    animation: "slide",
				    animationLoop: false,
				    slideshow: false,
				    smoothHeight: true,
				    itemWidth: 213,
				    itemMargin: 20,
				    directionNav: false,
				    namespace: 'tj-',
				    manualControls: '#tj-gallery-nav-<?php echo $postid; ?> li',
				    asNavFor: '#tj-gallery-<?php echo $postid; ?>'
				  });
			   
				  jQuery('#tj-gallery-<?php echo $postid; ?>').flexslider({
				    animation: "slide",
				    slideshow: true,
				    controlNav: false,
				    animationLoop: true,
				    smoothHeight: true,
				    prevText: "Prev&#8250;",
				    nextText: "Next&#8249;", 
				    namespace: 'tj-',
				    sync: "#tj-gallery-nav-<?php echo $postid; ?>",
				    start: function(slider){
				              jQuery('.tj-gallery-slideshow').removeClass('tj-loading');
				    }
				  });
			});
		</script>
    <?php 
    	global $post;
    	// get featured thumb ID, 
    	$thumb_ID = get_post_thumbnail_id( $post->ID );
        
		// Exclude Or Include The Featured Image In Content
		if (of_get_option('tj_exclude_featured_image') == '1') {
		
			$args = array(
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'attachment',
				'post_parent' => $postid,
				'post_mime_type' => 'image',
				'post_status' => null,
				'numberposts' => -1,
				'exclude' => $thumb_ID
			);
			$attachments = get_posts($args);
		
		}else {
		
			$args = array(
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'attachment',
				'post_parent' => $postid,
				'post_mime_type' => 'image',
				'post_status' => null,
				'numberposts' => -1
			);
			$attachments = get_posts($args);
		
		}
        
        if( !empty($attachments) ) {
            echo '<div id="tj-gallery-' . $postid . '" class="tj-gallery-slideshow tj-loading">';
            	echo '<ul class="slides">';
	            $i = 0;
	            foreach( $attachments as $attachment ) {
	                $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
	                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
	                $caption = ( !empty($attachment->post_content) ) ? $attachment->post_excerpt : $attachment->post_excerpt;
	                echo "<li><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />";
	                if ( $caption ) {
	                	 echo "<span class='tj-slideshow-caption'>$caption</span>";
	                }
	                echo "</li>";
	                $i++;
	            }
            	echo '</ul>';
            echo '</div>';
            
			echo '<div id="tj-gallery-nav-' . $postid . '" class="tj-gallery-nav">';
				echo '<ul class="slides">';
			    $x = 0;
			    foreach( $attachments as $attachment ) {
			        $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
			        $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
			        echo "<li><img src='$src[0]' alt='$alt' /></li>";
			        $x++;
			    }
				echo '</ul>';
			echo '</div>';            
            
            
        }
    }
}

/*-----------------------------------------------------------------------------------*/
/* Output audio
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_audio_embed' ) ) {
    function tj_audio_embed( $postid ) {
    	global $post;
    	
    	$embed = '';
    	$embed = get_post_meta($post->ID, 'tj_audio', true);
    
	    if( !empty( $embed ) ) {
	    	echo '<div class="tj-audio">';
	        echo stripslashes(htmlspecialchars_decode( $embed ));
	        echo '</div>';
	    } else {
	    	echo '<!-- No Audio Embed Added -->';
	    }

    }
}

/*-----------------------------------------------------------------------------------*/
/* Output blog video
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_video_embed' ) ) {
    function tj_video_embed( $postid ) {
    	global $post;
    	
    	$embed = '';
    	$embed = get_post_meta($post->ID, 'tj_video_embed', true);
    
	    if( !empty( $embed ) ) {
	    	echo '<div class="tj-video">';
	        echo stripslashes(htmlspecialchars_decode( $embed ));
	        echo '</div>';
	    } 

    }
}

/*-----------------------------------------------------------------------------------*/
/* Output gallery video 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_video_embed_gallery' ) ) {
    function tj_video_embed_gallery( $postid ) {
    	global $post;
    	
    	$embed = '';
    	$embed = get_post_meta($post->ID, 'tj_gallery_embed_code', true);
    
	    if( !empty( $embed ) ) {
	    	echo '<div class="tj-video-gallery">';
	        echo stripslashes(htmlspecialchars_decode( $embed ));
	        echo '</div>';
	    } 

    }
}

/*-----------------------------------------------------------------------------------*/
/* Output quote 
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_quote' ) ) {
    function tj_quote( $postid ) {
    	global $post;
    	
    	$quote = '';
    	$source = '';
    	$quote = get_post_meta($post->ID, 'tj_quote', true);
    	$source = '<span class="meta tj-quote-link clearfix"><a href="' . get_permalink( $postid ) . '" rel="bookmark">&dash; ' . get_the_title() . '</a></span>';
    
	    if( !empty( $quote ) ) {
	    	if ( is_single() ) {
	        	echo '<h1 class="entry-title"><blockquote>'. esc_attr( $quote ).'</blockquote></h1>';
	        } else {
	        	echo '<h2 class="entry-title"><blockquote>'. esc_attr( $quote ).'</blockquote></h2>';
	        }
	        echo $source;
	    } 

    }
}

/*-----------------------------------------------------------------------------------*/
/* Output link
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_link' ) ) {
    function tj_link( $postid ) {
    	global $post;
    	$link = '';
    	$title = '';
    	
    	$link = get_post_meta($post->ID, 'tj_link_url', true);
    	$title = get_the_title();
    
	    if( !empty( $link ) ) {
	        if ( is_single() ) {
	        	echo '<h1 class="entry-title"><a href="'. esc_url( $link ) . '" target="_blank">'. $title . '</a></h1>'."\n";
	    	} else {
	    		echo '<h2 class="entry-title"><a href="'. esc_url( $link ) . '" target="_blank">'. $title . '</a></h2>'."\n";
	    	}
	    } 

    }
}

if ( !function_exists( 'tj_link_url' ) ) {
    function tj_link_url( $postid ) {
    	global $post;
    	$link = '';
    	$title = '';
    	
    	$link = get_post_meta($post->ID, 'tj_link_url', true);
    	$title = get_the_title();
    
	    if( !empty( $link ) ) {
			echo '<p><a href="'. esc_url( $link ) . '" class="more-link" target="_blank">' . __('Visit Website','framework') . '</a></p>'."\n";
	    } 
	    
    }
}

/*-----------------------------------------------------------------------------------*/
/* Output slideshow URL
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_slideshow_url' ) ) {
    function tj_slideshow_url( $postid ) {
    	global $post;
    	
    	$slider_url = '';
    	$slider_url = get_post_meta($post->ID, 'tj_slider_url', true);
    
		echo esc_url( $slider_url );

    }
}

/*-----------------------------------------------------------------------------------*/
/*	Add Browser Detection Body Class
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'tj_browser_body_class' ) ) {
    function tj_browser_body_class($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE){ 
			$classes[] = 'ie';
			if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)) $classes[] = 'ie'.$browser_version[1];
		} else $classes[] = 'unknown';
	
		if($is_iphone) $classes[] = 'iphone';
		return $classes;
    }
    
    add_filter('body_class','tj_browser_body_class');
}
	
/*-----------------------------------------------------------------------------------*/
/*	Comments
/*-----------------------------------------------------------------------------------*/
	
if ( ! function_exists( 'tj_html5comments' ) ) {
	function tj_html5comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		
		<article <?php comment_class('clearfix'); ?> id="<?php comment_ID(); ?>" >
				
			<?php echo get_avatar( $comment, 40 ); ?>
		
			<div class="entry_info"> 
				
				<p class="meta">
				
					<cite><?php printf( __( '%s', 'framework' ), sprintf( '%s', get_comment_author_link() ) ); ?></cite>
					
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s', 'framework' ), get_comment_date(),  get_comment_time() ); ?></a>
					- <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					
					<?php edit_comment_link( __( '(Edit)', 'framework' ), ' ' );
				?>
				</p>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<?php _e( '<p><em>Your comment is awaiting moderation.</em></p>', 'framework' ); ?>
				<?php endif; ?>
				
				<div class="comment_text">
				
					<?php comment_text(); ?>
				
				</div>
			
			</div>
		
		</article>
			
		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<article <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<p><?php _e( 'Pingback:', 'framework' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'framework'), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Close Comments
/*-----------------------------------------------------------------------------------*/

function tj_comment_close() {
	echo '';
}

/*-----------------------------------------------------------------------------------*/
/*	Comment Form
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tj_fields' ) ) {
	function tj_fields($fields) {
	
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		
		$fields =  array(
			'author' => '<p><label for="author">' . __( 'Name', 'framework' ) . ' ' . ( $req ? '*' : '' ) . '</label> ' .
			'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email'  => '<p><label for="email">' . __( 'Email', 'framework' ) . ' ' . ( $req ? '*' : '' ) . '</label> ' . 
			'<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url'    => '<p><label for="url">' . __( 'Website', 'framework' ) . '</label>' .
			'<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);
		
		return $fields;
	}
	add_filter('comment_form_default_fields','tj_fields');	
}

/*-----------------------------------------------------------------------------------*/
/*	Pagination
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tj_pagination' ) ) {
	function tj_pagination($type = '') {
		global $paged;
		if ($type == 'links') { ?>
		<div class="pagination-links clearfix">
			<?php
			global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
            	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            	'format' => '?paged=%#%',
            	'current' => max( 1, get_query_var('paged') ),
            	'total' => $wp_query->max_num_pages,
            	'prev_text' => __('<i class="icon-chevron-left"></i>', 'framework'),
            	'next_text' => __('<i class="icon-chevron-right"></i>', 'framework')
            ) );
            ?>
         </div>
         <?php }else { ?>
			<div class="pagination-default clearfix">
				<nav>
					<div class="pagination-default-right"><?php next_posts_link( '<i class="icon-chevron-right"></i>' ); ?></div>

					<div class="pagination-default-left"><?php previous_posts_link( '<i class="icon-chevron-left"></i>' ); ?></div>
				</nav>
			</div>
		<?php 
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Post Footer Meta - Categories/Tags
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tj_post_footer_meta' ) ) {
	function tj_post_footer_meta() {
		global $post;
		
		$show_author_avatar = of_get_option('show_post_author_avatar');
		$show_author = of_get_option('show_post_author');
		$show_date = of_get_option('show_post_date');
		$show_categories = of_get_option('show_post_categories');
		$show_tags = of_get_option('show_post_tags');
		
		$categories_list = get_the_category_list( __( ', ', 'framework' ) );
		$output = '';
		$the_date = the_date('', '<li class="meta post-date"><span>' . __('Posted:','framework') . '</span>', '</li>', FALSE);
		
		$author_img = get_avatar( get_the_author_meta('email') , 80 );
		if ( $author_img && $show_author_avatar == 1 ) {
			$output .= '<li class="meta author-img">' . $author_img . '</li>';
		}
	
		$post_author = get_the_author_meta('display_name');
		if ( $post_author && $show_author == 1 ) {
			$output .= '<li class="meta author-name"><span>' . __('Author:','framework') . '</span> ' . $post_author . '</li>';
		}
		
		if ( $the_date && $show_date == 1 ) { 
			$output .= $the_date;
		}
		
		if ( $categories_list && $show_categories == 1 ) {
			$output .= '<li class="meta post-categories-links"><span>' . __('Category:','framework') . '</span> ' . $categories_list . '</li>';
		}
		
		$tag_list = get_the_tag_list( '', __( ', ', 'framework' ) );
		if ( $tag_list && $show_tags == 1 ) {
			$output .= '<li class="meta post-tags-links"><span>' . __('Tagged:','framework') . '</span> ' . $tag_list . '</li>';
		}
		
		echo '<ul class="tj_post_footer_meta">';
			if ( $output ) {
				echo $output;
			}
		echo '</ul>';
	}
}

/*-----------------------------------------------------------------------------------*/
/* Custom Walker
/*-----------------------------------------------------------------------------------*/

class Gallery_Walker extends Walker_Category {
    function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {
            extract($args);

            $cat_name = esc_attr( $category->name );
            $cat_name = apply_filters( 'list_cats', $cat_name, $category );
            $link = '<a href="' . esc_attr( get_term_link($category) ) . '" ';
            $link .= 'data-filter="' . urldecode($category->slug) . '" ';
            if ( $use_desc_for_title == 0 || empty($category->description) )
                    $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s', 'framework' ), $cat_name) ) . '"';
            else
                    $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
            $link .= '>';
            $link .= $cat_name . '</a>';

            if ( !empty($feed_image) || !empty($feed) ) {
                    $link .= ' ';

                    if ( empty($feed_image) )
                            $link .= '(';

                    $link .= '<a href="' . get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) . '"';

                    if ( empty($feed) ) {
                            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s', 'framework' ), $cat_name ) . '"';
                    } else {
                            $title = ' title="' . $feed . '"';
                            $alt = ' alt="' . $feed . '"';
                            $name = $feed;
                            $link .= $title;
                    }

                    $link .= '>';

                    if ( empty($feed_image) )
                            $link .= $name;
                    else
                            $link .= "<img src='$feed_image'$alt$title" . ' />';

                    $link .= '</a>';

                    if ( empty($feed_image) )
                            $link .= ')';
            }

            if ( !empty($show_count) )
                    $link .= ' (' . intval($category->count) . ')';

            if ( !empty($show_date) )
                    $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);

            if ( 'list' == $args['style'] ) {
                    $output .= "\t<li";
                    $class = 'cat-item cat-item-' . $category->term_id;
                    if ( !empty($current_category) ) {
                            $_current_category = get_term( $current_category, $category->taxonomy );
                            if ( $category->term_id == $current_category )
                                    $class .=  ' current-cat';
                            elseif ( $category->term_id == $_current_category->parent )
                                    $class .=  ' current-cat-parent';
                    }
                    $output .=  ' class="' . $class . '"';
                    $output .= ">$link\n";
            } else {
                    $output .= "\t$link<br />\n";
            }
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Add Classes To First/Last Menu Items
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tj_menu_styling' ) ) {
	function tj_menu_styling( $menuItem ) {
	  $menuItem[1]->classes[] = 'first-menu-item';
	  $menuItem[count($menuItem)]->classes[] = 'last-menu-item';
	  return $menuItem;
	}
}
add_filter('wp_nav_menu_objects', 'tj_menu_styling');

add_filter( 'pre_get_posts', 'tgm_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of post types instead of the default 'post' post type.
 *
 * @param mixed $query The original query
 * @return $query The amended query
 */
function tgm_cpt_search( $query ) {
    if ( $query->is_search )
		$query->set( 'post_type', array( 'post', 'gallery') );
    return $query;
};

/*-----------------------------------------------------------------------------------*/
/*	Add class to body if fixed header option is disabled
/*-----------------------------------------------------------------------------------*/

function tj_fixed_header_status_bodyclass( $fixed_classes ) {
	$header_position = of_get_option('header_position');
	if ( $header_position && $header_position === '1' ) {
  		$fixed_classes[] = 'tj-fixed-header-disabled';
  	} else {
  		$fixed_classes[] = 'tj-fixed-header-enabled';
  	}
  	return $fixed_classes;
}
add_action( 'body_class', 'tj_fixed_header_status_bodyclass');

/*-----------------------------------------------------------------------------------*/
/*	Remove WP Version For Security
/*-----------------------------------------------------------------------------------*/

remove_action( 'wp_head', 'wp_generator' );

/*-----------------------------------------------------------------------------------*/
/*	Add Theme Version Meta
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tj_theme_version' ) ) {
	function tj_theme_version() {
	    if( function_exists( 'wp_get_theme' ) ) {
			$theme_details = wp_get_theme();
			$theme_name = $theme_details->Name;
			$theme_version = $theme_details->Version;
		}else {
			$theme_data = get_theme_data( get_stylesheet_directory() . '/style.css' );
			$theme_name = $theme_data['Name'];
			$theme_version = $theme_data['Version'];
		}
		
		echo '<meta name="generator" content="' . $theme_name . ' ' . $theme_version .' - ' . __('ThemeJug.com','framework') . '" />' . "\n";
		
	}
	add_action('wp_head', 'tj_theme_version', 1);
}