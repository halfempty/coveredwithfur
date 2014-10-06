<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'hipster' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'framework'),
		'two' => __('Two', 'framework'),
		'three' => __('Three', 'framework'),
		'four' => __('Four', 'framework'),
		'five' => __('Five', 'framework')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'framework'),
		'two' => __('Pancake', 'framework'),
		'three' => __('Omelette', 'framework'),
		'four' => __('Crepe', 'framework'),
		'five' => __('Waffle', 'framework')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	/*-----------------------------------------------------------------------------------*/
	/* Front Page - Options
	/*-----------------------------------------------------------------------------------*/
		
	$options[] = array( 'name' => __('Front Page', 'framework'),
						'type' => 'heading');
						
	$options[] = array( 'name' => __('Homepage - Enable Slideshow', 'framework'),
						'desc' => __('Turn on/off home template slideshow.', 'framework'),
						'id' => 'tj_home_slideshow',
						'std' => __('1', 'framework'),
						'type' => 'checkbox');
						
	$options[] = array( 'name' => __('Homepage - Slideshow Auto Play', 'framework'),
						'desc' => __('Enable auto slide rotation.', 'framework'),
						'id' => 'tj_home_slideshow_rotate',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');
						
	$options[] = array( 'name' => __('Homepage - Slideshow Speed', 'framework'),
						'desc' => __('Set the speed of the home template slides. (Milliseconds)', 'framework'),
						'id' => 'tj_home_slideshow_speed',
						'std' => '600',
						'type' => 'text');
						
	$options[] = array( 'name' => __('Homepage - Slideshow Height Limit', 'framework'),
						'desc' => __('Set the maximum height of the slides. (Pixels)', 'framework'),
						'id' => 'tj_home_slideshow_height',
						'std' => '800',
						'type' => 'text');
						
	$options[] = array( 'name' => __('Homepage - Slideshow Text Position', 'framework'),
						'desc' => __('Alter the verticle postition of the slider text. (Relative from image base.)', 'framework'),
						'id' => 'tj_home_slideshow_position',
						'std' => 'Default',
						'type' => 'select',
							'options' => array(
								'default' => 'Default',
								'5' => '5%',
								'10' => '10%',
								'15' => '15%',
								'20' => '20%',
								'25' => '25%',
								'30' => '30%',
								'35' => '35%',
								'40' => '40%',
								'45' => '45%',
								'50' => '50%',
								'55' => '55%',
								'60' => '60%',
								'65' => '65%',
								'70' => '70%',
								'75' => '75%',
								'80' => '80%',
								'85' => '85%',
								'90' => '90%',
								'95' => '95%',
								'100' => '100%'
							)
						);
						
	$options[] = array( 'name' => __('Homepage - Enable Gallery', 'framework'),
						'desc' => __('Turn on/off home template gallery. ', 'framework'),
						'id' => 'tj_home_gallery',
						'std' => __('1', 'framework'),
						'type' => 'checkbox');
						
	$wp_editor_settings = array( 'wpautop' => true, // Default
								 'textarea_rows' => 5,
								 'tinymce' => array( 'plugins' => 'wordpress' ));
										 
						
	$options[] = array( 'name' => __('Homepage - Gallery - Limit', 'framework'),
						'desc' => __('Set how many gallery items to display.', 'framework'),
						'id' => 'tj_galleries_count',
						'std' => '8',
						'type' => 'text');			

	$options[] = array( 'name' => __('Homepage - Gallery - Message', 'framework'),
						'desc' => __( 'The message to prefix your homepage gallery images.', 'framework'),
						'id' => 'tj_gallery_message',
							'std' => '',
						'type' => 'editor',
						'settings' => $wp_editor_settings );
						
	$options[] = array( 'name' => __('Homepage - Testimonial - Message', 'framework'),
						'desc' => __( 'The message to prefix your homepage testimonials.', 'framework'),
						'id' => 'tj_testimonial_message',
						'std' => '',
						'type' => 'editor',
						'settings' => $wp_editor_settings );
						
						
	$options[] = array( 'name' => __('Homepage - Enable Testimonials', 'framework'),
						'desc' => __('Turn on/off home template testimonials. ', 'framework'),
						'id' => 'tj_home_testimonials',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');
						
	$options[] = array( 'name' => __('Enable Footer Widgets', 'framework'),
						'desc' => __('Add or remove the footer widget area to the homepage.', 'framework'),
						'id' => 'tj_homepage_widgets',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');				
						
	/*-----------------------------------------------------------------------------------*/
	/* Style Options - Options
	/*-----------------------------------------------------------------------------------*/
																	
	$options[] = array( 'name' => __('Styling', 'framework'),
						'type' => 'heading');
						
	$options[] = array( 'name' => __('Enable Plain Text Logo', 'framework'),
						'desc' => __('Use a text based logo, rather then an image, un-tick if you upload your own.', 'framework'),
						'id' => 'plain_logo',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');							
				
	$options[] = array( 'name' => __('Upload Your Custom Logo', 'framework'),
						'desc' => __('Upload your logo.', 'framework'),
						'id' => 'custom_logo',
						'type' => 'upload');
						
	$options[] = array( 'name' => __('Upload Your Favicon', 'framework'),
						'desc' => __('Upload your favicon.', 'framework'),
						'id' => 'favicon_uploader',
						'type' => 'upload');
						
	$options[] = array( 'name' => __('Upload A iPhone/iPad Icon', 'framework'),
						'desc' => __('This will display a nice icon on your device if you "save to homescreen" on your iPhone/iPad (Size: 243x240 pixels).', 'framework'),
						'id' => 'iphone_ico_uploader',
						'type' => 'upload');
						
	$options[] = array( 'name' => __('Upload A Custom Login Logo', 'framework'),
						'desc' => __('Upload an admin panel login logo. Size: 80x80 pixels.', 'framework'),
						'id' => 'custom_login_logo',
						'type' => 'upload');					
						
	$options[] = array( 'name' => __('Header Background Color', 'framework'),
						'desc' => __('Change the background color of the header area.', 'framework'),
						'id' => 'header_color',
						'std' => '#ffffff',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Disable Fixed Header', 'framework'),
						'desc' => __('This will remove the sticky header bar.', 'framework'),
						'id' => 'header_position',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');
						
	$options[] = array( 'name' => __('Footer Background Color', 'framework'),
						'desc' => __('Change the background color of the footer area.', 'framework'),
						'id' => 'footer_color',
						'std' => '#2E2D2D',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Footer Site CopyRight Background Color', 'framework'),
						'desc' => __('Change the background color of the footer credit area.', 'framework'),
						'id' => 'footer_credits_color',
						'std' => '#2E2D2D',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Link Color', 'framework'),
						'desc' => __('Change the color of your hyperlinks.', 'framework'),
						'id' => 'link_color',
						'std' => '#474747',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Link "Hover" Color', 'framework'),
						'desc' => __('Change the color of your hyperlinks when the user hovers over.', 'framework'),
						'id' => 'link_hover_color',
						'std' => '#41b48a', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Heading Color', 'framework'),
						'desc' => __('Change the color of headings.', 'framework'),
						'id' => 'heading_color',
						'std' => '#474747', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Body Text Color', 'framework'),
						'desc' => __('Change the color of site text.', 'framework'),
						'id' => 'text_color',
						'std' => '#5e5e5e', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Secondary Body Text Color', 'framework'),
						'desc' => __('Used for meta data.', 'framework'),
						'id' => 'secondary_text_color',
						'std' => '#474747', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Menu Link Color', 'framework'),
						'desc' => __('Menu color', 'framework'),
						'id' => 'menu_link_color',
						'std' => '#000000',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Menu Link "Hover" Color', 'framework'),
						'desc' => __('Menu color - hover', 'framework'),
						'id' => 'menu_link_hover_color',
						'std' => '#41b48a', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Background Color', 'framework'),
						'desc' => __('Change the background color of your website.', 'framework'),
						'id' => 'bg_color',
						'std' => '#ffffff', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Line Accent Color', 'framework'),
						'desc' => __('Change the color of outlines and seperators.', 'framework'),
						'id' => 'line_color',
						'std' => '#dddddd',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Button Color', 'framework'),
						'desc' => __('Change the background color of generic buttons.', 'framework'),
						'id' => 'pagination_color',
						'std' => '#2e2d2d', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Homepage Testimonial Background Color', 'framework'),
						'desc' => __('Change the background color of the homepage testimonial block.', 'framework'),
						'id' => 'tj_testimonial_bgcolor',
						'std' => '#ffffff', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Widget Title Color', 'framework'),
						'desc' => __('Change the color of the widget headings.', 'framework'),
						'id' => 'widget_title_color',
						'std' => '#858585', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Widget Text Color', 'framework'),
						'desc' => __('Change the text color of the widgets.', 'framework'),
						'id' => 'widget_text_color',
						'std' => '#858585', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Widget Link Color', 'framework'),
						'desc' => __('Change the color of the links in widgets.', 'framework'),
						'id' => 'widget_link_color',
						'std' => '#c2c2c2', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Widget Link Hover Color', 'framework'),
						'desc' => __('Change the hover color of the links in widgets.', 'framework'),
						'id' => 'widget_link_hover_color',
						'std' => '#41b48a', 
						'type' => 'color');
						
	$options[] = array( 'name' => __('Upload A Background Image', 'framework'),
						'desc' => __('Upload a background image to your website.', 'framework'),
						'id' => 'bg_image',
						'type' => 'upload');
						
	$options[] = array( 'name' => __('Background Image Repeat', 'framework'),
						'desc' => __('', 'framework'),
						'id' => 'bg_image_repeat',
						'type' => 'select',
							'options' => array(
								'' => '',
								'no-repeat' => 'No Repeat',
								'repeat' => 'Repeat',
								'repeat-x' => 'Repeat Horizontally',
								'repeat-y' => 'Repeat Vertically'
							)
						);
						
	$options[] = array( 'name' => __('Background Image Position', 'framework'),
						'desc' => __('', 'framework'),
						'id' => 'bg_image_position',
						'type' => 'select',
							'options' => array(
								'' => '',
								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Centered',
								'fullscreen' => 'Fullscreen'
							)
						);				
						
	$options[] = array( 'name' => __('Custom CSS', 'framework'),
						'desc' => __('Add your custom CSS to the theme.', 'framework'),
						'id' => 'custom_css',
						'std' => '',
						'type' => 'textarea');
						
	$options[] = array( 'name' => __('Toggle Responsive Design', 'framework'),
						'desc' => '',
						'id' => 'theme_responsive',
						'std' => '1',
						'type' => 'select',
							'options' => array(
								'on' => 'On',
								'off' => 'Off'
							)
						);					
					
	/*-----------------------------------------------------------------------------------*/
	/* General - Options
	/*-----------------------------------------------------------------------------------*/
																		
	$options[] = array( 'name' => __('General', 'framework'),
						'type' => 'heading');
							
	$options[] = array( 'name' => __('Your Email Address', 'framework'),
						'desc' => __('Used in the contact form', 'framework'),
						'id' => 'custom_email',
						'std' => '',
						'type' => 'text');
						
	$options[] = array( 'name' => __('Footer Text (Center)', 'framework'),
						'desc' => __('Overwrite the ThemeJug.com credit.', 'framework'),
						'id' => 'footer_left',
						'std' => '',
						'type' => 'textarea'); 
						
	/*-----------------------------------------------------------------------------------*/
	/* Blog - Options
	/*-----------------------------------------------------------------------------------*/
																		
	$options[] = array( 'name' => __('Blog', 'framework'),
						'type' => 'heading');
							
	$options[] = array( 'name' => __('Feedburner URL', 'framework'),
						'desc' => __('Your RSS feed.', 'framework'),
						'id' => 'custom_rss',
						'std' => '',
						'type' => 'text');
						
	$options[] = array( 'name' => __('Show Post Author Avatar', 'framework'),
						'desc' => __('Enable post author avatar to be displayed. Add yours at Gravatar.com', 'framework'),
						'id' => 'show_post_author_avatar',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');
						
	$options[] = array( 'name' => __('Show Post Author', 'framework'),
						'desc' => __('Enable post author name to be displayed.', 'framework'),
						'id' => 'show_post_author',
						'std' => __('1', 'framework'),
						'type' => 'checkbox');	
						
	$options[] = array( 'name' => __('Show Post Date', 'framework'),
						'desc' => __('Enable post date to be displayed.', 'framework'),
						'id' => 'show_post_date',
						'std' => __('1', 'framework'),
						'type' => 'checkbox');					
						
	$options[] = array( 'name' => __('Show Post Categories', 'framework'),
						'desc' => __('Enable post categories to be displayed.', 'framework'),
						'id' => 'show_post_categories',
						'std' => __('1', 'framework'),
						'type' => 'checkbox');
						
	$options[] = array( 'name' => __('Show Post Tags', 'framework'),
						'desc' => __('Enable post tags to be displayed.', 'framework'),
						'id' => 'show_post_tags',
						'std' => __('0', 'framework'),
						'type' => 'checkbox');
						


	/*-----------------------------------------------------------------------------------*/
	/* Gallery - Options
	/*-----------------------------------------------------------------------------------*/
																		
	$options[] = array( 'name' => __('Gallery Settings', 'framework'),
						'type' => 'heading');
						
	$options[] = array( 'name' => __('General Gallery - Order By', 'framework'),
						'desc' => __('Select an order for your homepage gallery items.', 'framework'),
						'id' => 'tj_galleries_orderby',
						'std' => 'menu_order',
						'type' => 'select',
							'options' => array(
								'name' => 'Name',
								'date' => 'Date',
								'rand' => 'Random',
								'menu_order' => 'Menu Order',
							)
						);
						
	$options[] = array( 'name' => __('General Gallery - Order', 'framework'),
						'desc' => __('Order the above, by either descending or ascending. ', 'framework'),
						'id' => 'tj_galleries_order',
						'std' => 'DESC',
						'type' => 'select',
							'options' => array(
								'ASC' => 'Ascending - Low To High',
								'DESC' => 'Descending - High To Low'
							)
						);
						
	$options[] = array( 'name' => __('Gallery Single  - Fullwidth Height Limit', 'framework'),
						'desc' => __('Set the maximum height of the fullwidth image. (Pixels)', 'framework'),
						'id' => 'tj_single_gallery_height',
						'std' => '600',
						'type' => 'text');
						
	$options[] = array( 'name' => __('Single Gallery - Client Heading', 'framework'),
						'desc' => __('Change the text above the client name and link.', 'framework'),
						'id' => 'tj_single_gallery_client_heading',
						'std' => 'Client',
						'type' => 'text');	
						
	$options[] = array( 'name' => __('Single Gallery - Client Date', 'framework'),
						'desc' => __('Change the text above the date.', 'framework'),
						'id' => 'tj_single_gallery_date_heading',
						'std' => 'Date',
						'type' => 'text');	
						
	$options[] = array( 'name' => __('Single Gallery - Enable "More" Galleries', 'framework'),
						'desc' => __('Turn on/off the single gallery additional gallery items.', 'framework'),
						'id' => 'tj_single_gallery_more',
						'std' => __('1', 'framework'),
						'type' => 'checkbox');
	
	$options[] = array( 'name' => __('Single Gallery - "More" Galleries - Order By', 'framework'),
						'desc' => __('Change the order of single gallery "More" items', 'framework'),
						'id' => 'tj_single_gallery_orderby',
						'std' => 'menu_order',
						'type' => 'select',
							'options' => array(
								'name' => 'Name',
								'date' => 'Date',
								'rand' => 'Random',
								'menu_order' => 'Menu Order',
							)
						);
						
	$options[] = array( 'name' => __('Single Gallery Details - Background Color', 'framework'),
						'desc' => __('Change the background color of Client/Date area.', 'framework'),
						'id' => 'tj_single_gallery_more_bg',
						'std' => '#f8f8f8',
						'type' => 'color');
						
	$options[] = array( 'name' => __('Single Gallery - "More" Galleries - Order', 'framework'),
						'desc' => __('Order the above, by either descending or ascending. ', 'framework'),
						'id' => 'tj_single_gallery_order',
						'std' => 'DESC',
						'type' => 'select',
							'options' => array(
								'ASC' => 'Ascending - Low To High',
								'DESC' => 'Descending - High To Low'
							)
						);
						
	$options[] = array( 'name' => __('Single Gallery - "More" Galleries - Limit', 'framework'),
						'desc' => __('Set how many extra gallery items to display.', 'framework'),
						'id' => 'tj_single_gallery_count',
						'std' => '4',
						'type' => 'text');	
						
	$options[] = array( 'name' => __('Gallery Template - Limit', 'framework'),
						'desc' => __('Set how many gallery items to display.', 'framework'),
						'id' => 'tj_template_gallery_count',
						'std' => '12',
						'type' => 'text');
	
	$options[] = array( 'name' => __('Single Gallery - Exclude Featured Image', 'framework'),
						'desc' => __('Exclude the featured image from gallery images and sliders.', 'framework'),
						'id' => 'tj_exclude_featured_image',
						'std' => '0',
						'type' => 'checkbox');			
						
	return $options;
}