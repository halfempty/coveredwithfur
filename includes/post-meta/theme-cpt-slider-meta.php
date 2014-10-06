<?php

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'tj_';
 
$meta_box_sider = array(
	'id' => 'tj-meta-box-sider',
	'title' =>  __('Slide Settings', 'framework'),
	'page' => 'slider',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
		   'name' => __('External Link', 'framework'),
		   'desc' => __('Link the slide to a URL - http://', 'framework'),
		   'id' => $prefix . 'slider_url',
		   'type' => 'text',
		   'std' => ''
		)
	)
);

add_action('admin_menu', 'tj_add_box_sider');

/*-----------------------------------------------------------------------------------*/
/*	Add metabox to edit page
/*-----------------------------------------------------------------------------------*/
 
function tj_add_box_sider() {
	global $meta_box_sider;
	
	add_meta_box($meta_box_sider['id'], $meta_box_sider['title'], 'tj_show_box_sider', $meta_box_sider['page'], $meta_box_sider['context'], $meta_box_sider['priority']);
	
}

/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function tj_show_box_sider() {
	global $meta_box_sider, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="tj_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_sider['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
 
			//If Button	
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select id="' . $field['id'] . '" name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
			
            case 'color':

                echo '<tr>',
    			'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
    			'<td>';

                echo '<div id="' . $field['id'] . '_picker" class="colorSelector"><div></div></div>';
    			echo '<input style="width:75px; margin-left: 5px;" class="tj-color" name="'. $field['id'] .'" id="'. $field['id'] .'" type="text" value="'. $meta .'" />';
?>   			
    			<script type="text/javascript" language="javascript">
            		jQuery(document).ready(function(){
            			//Color Picker
    				    jQuery('#<?php echo $field['id']; ?>_picker').children('div').css('backgroundColor', '<?php echo $meta; ?>');    
            			jQuery('#<?php echo $field['id']; ?>_picker').ColorPicker({
            				color: '<?php echo $meta; ?>',
            				onShow: function (colpkr) {
            					jQuery(colpkr).fadeIn(500);
            					return false;
            				},
            				onHide: function (colpkr) {
            					jQuery(colpkr).fadeOut(500);
            					return false;
            				},
            				onChange: function (hsb, hex, rgb) {
            					//jQuery(this).css('border','1px solid red');
            					jQuery('#<?php echo $field['id']; ?>_picker').children('div').css('backgroundColor', '#' + hex);
            					jQuery('#<?php echo $field['id']; ?>_picker').next('input').attr('value','#' + hex);
        					}
    				    });
                    });
        		</script>
<?php       break;             
			
		}

	}
 
	echo '</table>';
}

add_action('save_post', 'tj_save_data_sider');

/*-----------------------------------------------------------------------------------*/
/*	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function tj_save_data_sider($post_id) {
	global $meta_box_sider;
	
	if ( !isset( $_POST[ 'tj_meta_box_nonce' ] ) || !wp_verify_nonce($_POST['tj_meta_box_nonce'], basename(__FILE__))) {
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
 
	foreach ($meta_box_sider['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}	
}