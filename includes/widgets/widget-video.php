<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Video Display
	Plugin URI: http://www.themejug.com
	Description:  Display A Video
	Version: 1.0
	Author: TJ
	Author URI: http://www.themejug.com
 
-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'tj_video_widgets' );

// Register widget
function tj_video_widgets() {
	register_widget( 'TJ_video_widget' );
}

// Widget class
class tj_video_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function TJ_video_widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'tj_video_widget',
		'description' => __('A widget that displays your YouTube or Vimeo Video.', 'framework')
	);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 350,
		'id_base' => 'tj_video_widget'
	);

	/* Create the widget. */
	$this->WP_Widget( 'tj_video_widget', __('ThemeJug - Video Widget', 'framework'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	// Our variables from the widget settings
	$title = apply_filters('widget_title', $instance['title'] );
	$embed = $instance['embed'];

	// Before widget (defined by theme functions file)
	echo $before_widget;

	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;

	// Display video widget
	?>
		<!-- BEGIN .video_widget -->
		<div class="video_widget">
			<?php echo $embed ?>
		<!-- END .video_widget -->
		</div>
	<?php

	// After widget (defined by theme functions file)
	echo $after_widget;
}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	// Stripslashes for html inputs
	$instance['embed'] = stripslashes( $new_instance['embed']);
	
	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(
		'title' => 'Video',
		'embed' => stripslashes( '<iframe width="360" height="203" src="http://www.youtube.com/embed/dSKXmVE32uk" frameborder="0" allowfullscreen></iframe>'),
		'desc' => 'Video',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'framework') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	<!-- Embed Code: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'embed' ); ?>"><?php _e('Embed Code:', 'framework') ?></label>
		<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'embed' ); ?>" name="<?php echo $this->get_field_name( 'embed' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['embed'] ), ENT_QUOTES)); ?></textarea>
	</p>
		
	<?php
	}
}
?>