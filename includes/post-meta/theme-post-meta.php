<?php

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'tj_';

$meta_box_caption = array(
	'id' => 'tj-meta-box-caption',
	'title' =>  __('Post Caption', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Your Caption','framework'),
				"desc" => __('Add the some intro text to prefix your post with.','framework'),
				"id" => $prefix."caption",
				"type" => "textarea",
				"std" => ''
			),
	)
	
);

$meta_box_audio = array(
	'id' => 'tj-meta-box-audio',
	'title' =>  __('Audio Embed', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('iFrame Code','framework'),
				"desc" => __('Paste your iFrame code from Soundcloud.','framework'),
				"id" => $prefix."audio",
				"type" => "textarea",
				"std" => ''
			),
	)
	
);

$meta_box_quote = array(
	'id' => 'tj-meta-box-quote',
	'title' =>  __('Quote Settings', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Quote','framework'),
				"desc" => __('Add the quote text here, use the title field to reference your quote.','framework'),
				"id" => $prefix."quote",
				"type" => "textarea",
				"std" => ''
			),
	)
	
);

$meta_box_link = array(
	'id' => 'tj-meta-box-link',
	'title' =>  __('Link Settings', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('URL','framework'),
				"desc" => __('Add the URL you want to link to.','framework'),
				"id" => $prefix."link_url",
				"type" => "text",
				"std" => ''
			),
	)
	
);

$meta_box_video = array(
	'id' => 'tj-meta-box-video',
	'title' =>  __('Video Settings', 'framework'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Embeded Code (Ex. YouTube/Vimeo)','framework'),
				"desc" => __('Add your video embeded code.','framework'),
				"id" => $prefix."video_embed",
				"type" => "textarea",
				"std" => ''
			)
	)
	
);

add_action('admin_menu', 'tj_add_box');

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function tj_add_box() {
	global $meta_box_caption, $meta_box_audio, $meta_box_quote, $meta_box_link, $meta_box_video;
 	
 	//add_meta_box($meta_box_caption['id'], $meta_box_caption['title'], 'tj_show_box_caption', $meta_box_caption['page'], $meta_box_caption['context'], $meta_box_caption['priority']);
 	
 	add_meta_box($meta_box_audio['id'], $meta_box_audio['title'], 'tj_show_box_audio', $meta_box_audio['page'], $meta_box_audio['context'], $meta_box_audio['priority']);
 	
	add_meta_box($meta_box_quote['id'], $meta_box_quote['title'], 'tj_show_box_quote', $meta_box_quote['page'], $meta_box_quote['context'], $meta_box_quote['priority']);
	add_meta_box($meta_box_link['id'], $meta_box_link['title'], 'tj_show_box_link', $meta_box_link['page'], $meta_box_link['context'], $meta_box_link['priority']);
	add_meta_box($meta_box_video['id'], $meta_box_video['title'], 'tj_show_box_video', $meta_box_video['page'], $meta_box_video['context'], $meta_box_video['priority']);
}


/*-----------------------------------------------------------------------------------*/
/*	Show populated fields in meta box
/*-----------------------------------------------------------------------------------*/

function tj_show_box_caption() {
	global $meta_box_caption, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_caption['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="3" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;

		}

	}
 
	echo '</table>';
}

function tj_show_box_audio() {
	global $meta_box_audio, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_audio['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="3" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;

		}

	}
 
	echo '</table>';
}

function tj_show_box_quote() {
	global $meta_box_quote, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_quote['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If textarea		
			case 'textarea':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;

		}

	}
 
	echo '</table>';
}

function tj_show_box_link() {
	global $meta_box_link, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_link['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;

		}

	}
 
	echo '</table>';
}

function tj_show_box_video() {
	global $meta_box_video, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			
			//If textarea		
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
			
			break;

		}

	}
 
	echo '</table>';
}

add_action('save_post', 'tj_save_data');

/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function tj_save_data($post_id) {
	global $meta_box_caption, $meta_box_audio, $meta_box_quote, $meta_box_link, $meta_box_video;
 
	// verify nonce
	if (!isset($_POST['tj_meta_box_nonce']) || !wp_verify_nonce($_POST['tj_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box_audio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
 
	foreach ($meta_box_quote['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($meta_box_link['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($meta_box_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
}