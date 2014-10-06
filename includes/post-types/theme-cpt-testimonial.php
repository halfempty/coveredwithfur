<?php

/* Create the Testimonial Custom Post Type ------------------------------------------*/
function tj_create_post_type_testimonials() 
{
	$labels = array(
		'name' => __( 'Testimonials','framework'),
		'singular_name' => __( 'Testimonials','framework' ),
		'add_new' => __('Add New','framework'),
		'add_new_item' => __('Add New Testimonials','framework'),
		'edit_item' => __('Edit Testimonials','framework'),
		'new_item' => __('New Testimonials','framework'),
		'view_item' => __('View Testimonials','framework'),
		'search_items' => __('Search Testimonials','framework'),
		'not_found' =>  __('No testimonials found','framework'),
		'not_found_in_trash' => __('No testimonials found in Trash','framework'), 
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
		//'menu_icon' => get_bloginfo('template_directory') . '/img/testimonials_icon.png',
		// Uncomment the following line to change the slug; 
		// You must also save your permalink structure to prevent 404 errors
		//'rewrite' => array( 'slug' => 'testimonials' ), 
		'supports' => array('title','editor','custom-fields','thumbnail')
	  ); 
	  
	  register_post_type(__( 'testimonials', 'framework' ),$args);
}

/* Enable Sorting of the Testimonials ------------------------------------------*/
/*
function tj_create_testimonials_sort_page() {
    $tj_sort_page = add_submenu_page('edit.php?post_type=testimonials', 'Sort Testimonials', __('Sort Testimonials', 'framework'), 'edit_posts', basename(__FILE__), 'tj_testimonials_sort');
    add_action('admin_print_styles-' . $tj_sort_page, 'tj_print_sort_styles');
    add_action('admin_print_scripts-' . $tj_sort_page, 'tj_print_sort_scripts');
}

function tj_testimonials_sort() {
    $Testimonials = new WP_Query('post_type=testimonials&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php _e('Sort Testimonials', 'framework'); ?></h2>
        <p><?php _e('Click, drag and re-order. Testimonials item at the top will appear first.', 'framework'); ?></p>

        <ul id="testimonials_list">
            <?php while( $Testimonials->have_posts() ) : $Testimonials->the_post(); ?>
                <?php if( get_post_status() == 'publish' ) { ?>
                	<?php $tags = get_the_term_list( get_the_ID(), 'testimonials-type', '', ', ', '' ); ?>
                    <li id="<?php the_id(); ?>" class="menu-item">
                        <dl class="menu-item-bar">
                            <dt class="menu-item-handle">
                                <span class="menu-item-title"><strong><a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></span>
                                <?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                	<span class="menu-item-thumbnail"><a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array (32,32) ); ?></a></span>
                                <?php } ?>
                               <?php 
                               if ( $tags ) { 
                               		echo '<span  class="menu-item-tags">'. $tags . '</span>'; 
                               } else {
                               _e('No Testimonials Tags','framework');
                               }
                               ?>
                               <span class="menu-item-date"><small><?php the_time(get_option('date_format')); ?></small></span>
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
*/

/*

function tj_save_testimonials_sorted_order() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $testimonials_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $testimonials_id));
        $counter++;
    }
    die(1);
}

function tj_print_sort_scripts() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('tj_testimonials_sort', get_template_directory_uri() . '/framework/js/tj_testimonials_sort.js');
}

function tj_print_sort_styles() {
	wp_register_style( 'testimonials-sort', get_template_directory_uri() . '/framework/css/testimonials-sort.css', array(), '', 'all' );
    wp_enqueue_style('testimonials-sort');
}
*/

/* Add Custom Columns ------------------------------------------------------*/
function tj_testimonials_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Testimonials Item Title' , 'framework')
            //"type" => __( 'Testimonials Item Tags', 'framework' )
        );  
  
        return $columns;  
}  
/*  
function tj_testimonials_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type', 'framework' ):  
                echo get_the_term_list($post->ID, __( 'testimonials-type', 'framework' ), '', ', ','');  
                break;
        }  
} 
*/
/* Call our custom functions ---------------------------------------------*/
add_action( 'init', 'tj_create_post_type_testimonials' );

//add_action('admin_menu', 'tj_create_testimonials_sort_page');
//add_action('wp_ajax_testimonials_sort', 'tj_save_testimonials_sorted_order');

add_filter("manage_edit-testimonials_columns", "tj_testimonials_edit_columns");  
//add_action("manage_posts_custom_column",  "tj_testimonials_custom_columns");