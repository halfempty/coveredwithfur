<?php

/* Create the Slider Custom Post Type ------------------------------------------*/
function tj_create_post_type_slider() 
{
	$labels = array(
		'name' => __( 'Sliders','framework'),
		'singular_name' => __( 'Slider','framework' ),
		'add_new' => __('Add New','framework'),
		'add_new_item' => __('Add New Slider','framework'),
		'edit_item' => __('Edit Slider','framework'),
		'new_item' => __('New Slider','framework'),
		'view_item' => __('View Slider','framework'),
		'search_items' => __('Search Slider','framework'),
		'not_found' =>  __('No slider found','framework'),
		'not_found_in_trash' => __('No slider found in Trash','framework'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		//'menu_icon' => get_bloginfo('template_directory') . '/img/slider_icon.png',
		// Uncomment the following line to change the slug; 
		// You must also save your permalink structure to prevent 404 errors
		//'rewrite' => array( 'slug' => 'slider' ), 
		'supports' => array('title','editor','thumbnail','custom-fields')
	  ); 
	  
	  register_post_type(__( 'slider', 'framework' ),$args);
}

/* Enable Sorting of the Slider ------------------------------------------*/

function tj_create_slider_sort_page() {
    $tj_sort_page = add_submenu_page('edit.php?post_type=slider', 'Sort Sliders', __('Sort Sliders', 'framework'), 'edit_posts', basename(__FILE__), 'tj_slider_sort');
    add_action('admin_print_styles-' . $tj_sort_page, 'tj_print_sort_slider_styles');
    add_action('admin_print_scripts-' . $tj_sort_page, 'tj_print_sort_slider_scripts');
}

function tj_slider_sort() {
    $Sliders = new WP_Query('post_type=slider&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php _e('Sort Sliders', 'framework'); ?></h2>
        <p><?php _e('Click, drag and re-order. Slider item at the top will appear first.', 'framework'); ?></p>

        <ul id="slider_list">
            <?php while( $Sliders->have_posts() ) : $Sliders->the_post(); ?>
                <?php if( get_post_status() == 'publish' ) { ?>
                    <li id="<?php the_id(); ?>" class="menu-item">
                        <dl class="menu-item-bar">
                            <dt class="menu-item-handle">
                                <span class="menu-item-title"><strong><a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></span>
                            </dt>
                        </dl>
                        <ul class="menu-item-transport"></ul>
                    </li>
                <?php } ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
<?php }

function tj_save_slider_sorted_order() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $slider_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $slider_id));
        $counter++;
    }
    die(1);
}

function tj_print_sort_slider_scripts() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('tj_slider_sort', get_template_directory_uri() . '/framework/js/tj_slider_sort.js');
}

function tj_print_sort_slider_styles() {
	wp_register_style( 'slider-sort', get_template_directory_uri() . '/framework/css/gallery-sort.css', array(), '', 'all' );
    wp_enqueue_style('slider-sort');
}

/* Call our custom functions ---------------------------------------------*/
add_action( 'init', 'tj_create_post_type_slider' );
add_action('admin_menu', 'tj_create_slider_sort_page');
add_action('wp_ajax_slider_sort', 'tj_save_slider_sorted_order');