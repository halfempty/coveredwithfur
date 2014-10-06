<?php

/*-----------------------------------------------------------------------------------
	Add Post Tags
-----------------------------------------------------------------------------------*/

/* Create the Gallery Custom Post Type ------------------------------------------*/
function tj_create_post_type_gallery() 
{
	$labels = array(
		'name' => __( 'Galleries','framework'),
		'singular_name' => __( 'Gallery','framework' ),
		'add_new' => __('Add New','framework'),
		'add_new_item' => __('Add New Gallery','framework'),
		'edit_item' => __('Edit Gallery','framework'),
		'new_item' => __('New Gallery','framework'),
		'view_item' => __('View Gallery','framework'),
		'search_items' => __('Search Gallery','framework'),
		'not_found' =>  __('No gallery found','framework'),
		'not_found_in_trash' => __('No gallery found in Trash','framework'), 
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
		//'menu_icon' => get_bloginfo('template_directory') . '/img/gallery_icon.png',
		// Uncomment the following line to change the slug; 
		// You must also save your permalink structure to prevent 404 errors
		//'rewrite' => array( 'slug' => 'gallery' ), 
		'supports' => array('title','editor','thumbnail','custom-fields','page-attributes','excerpt', 'comments', 'revisions')
	  ); 
	  
	  register_post_type(__( 'gallery', 'framework' ),$args);
}

function tj_build_taxonomies(){
/* Create the Gallery Type Taxonomy --------------------------------------------*/
    $labels = array(
        'name' => __( 'Gallery Tags', 'framework' ),
        'singular_name' => __( 'Gallery Type', 'framework' ),
        'search_items' =>  __( 'Search Gallery Tags', 'framework' ),
        'popular_items' => __( 'Popular Gallery Tags', 'framework' ),
        'all_items' => __( 'All Gallery Tags', 'framework' ),
        'parent_item' => __( 'Parent Gallery Type', 'framework' ),
        'parent_item_colon' => __( 'Parent Gallery Type:', 'framework' ),
        'edit_item' => __( 'Edit Gallery Type', 'framework' ), 
        'update_item' => __( 'Update Gallery Type', 'framework' ),
        'add_new_item' => __( 'Add New Gallery Type', 'framework' ),
        'new_item_name' => __( 'New Gallery Type Name', 'framework' ),
        'separate_items_with_commas' => __( 'Separate gallery types with commas', 'framework' ),
        'add_or_remove_items' => __( 'Add or remove gallery types', 'framework' ),
        'choose_from_most_used' => __( 'Choose from the most used gallery types', 'framework' ),
        'menu_name' => __( 'Gallery Tags', 'framework' )
    );
    
	register_taxonomy(
	    'gallery-type', 
	    array( __( 'gallery', 'framework' )), 
	    array(
	        'hierarchical' => true, 
	        'labels' => $labels,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'gallery-type', 'hierarchical' => true)
	    )
	);
	
}

/* Enable Sorting of the Gallery ------------------------------------------*/
function tj_create_gallery_sort_page() {
    $tj_sort_page = add_submenu_page('edit.php?post_type=gallery', 'Sort Galleries', __('Sort Galleries', 'framework'), 'edit_posts', basename(__FILE__), 'tj_gallery_sort');
    add_action('admin_print_styles-' . $tj_sort_page, 'tj_print_sort_styles');
    add_action('admin_print_scripts-' . $tj_sort_page, 'tj_print_sort_scripts');
}

function tj_gallery_sort() {
    $galleries = new WP_Query('post_type=gallery&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php _e('Sort Galleries', 'framework'); ?></h2>
        <p><?php _e('Click, drag and re-order. Gallery item at the top will appear first.', 'framework'); ?></p>

        <ul id="gallery_list">
            <?php while( $galleries->have_posts() ) : $galleries->the_post(); ?>
                <?php if( get_post_status() == 'publish' ) { ?>
                	<?php $tags = get_the_term_list( get_the_ID(), 'gallery-type', '', ', ', '' ); ?>
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
                               _e('No Gallery Tags','framework');
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

function tj_save_gallery_sorted_order() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $gallery_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $gallery_id));
        $counter++;
    }
    die(1);
}

function tj_print_sort_scripts() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('tj_gallery_sort', get_template_directory_uri() . '/framework/js/tj_gallery_sort.js');
}

function tj_print_sort_styles() {
	wp_register_style( 'gallery-sort', get_template_directory_uri() . '/framework/css/gallery-sort.css', array(), '', 'all' );
    wp_enqueue_style('gallery-sort');
}

/* Add Custom Columns ------------------------------------------------------*/
function tj_gallery_edit_columns($columns){  

        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Gallery Item Title' , 'framework'),
            "type" => __( 'Gallery Item Tags', 'framework' )
        );  
  
        return $columns;  
}  
  
function tj_gallery_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case __( 'type', 'framework' ):  
                echo get_the_term_list($post->ID, __( 'gallery-type', 'framework' ), '', ', ','');  
                break;
        }  
} 

/* Call our custom functions ---------------------------------------------*/
add_action( 'init', 'tj_create_post_type_gallery' );
add_action( 'init', 'tj_build_taxonomies', 0 );

add_action('admin_menu', 'tj_create_gallery_sort_page');
add_action('wp_ajax_gallery_sort', 'tj_save_gallery_sorted_order');

add_filter("manage_edit-gallery_columns", "tj_gallery_edit_columns");  
add_action("manage_posts_custom_column",  "tj_gallery_custom_columns");