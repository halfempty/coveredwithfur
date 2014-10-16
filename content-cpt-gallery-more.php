<!-- content-cpt-gallery-more.php -->

<div class="tj-gallery-wrapper clearfix">

	<div class="tj-gallery-content">
	
		<div class="tj-gallery clearfix">
		
			<?php
			
			$orderby = of_get_option('tj_single_gallery_orderby');
			$order = of_get_option('tj_single_gallery_order');
			$gallery_count = of_get_option('tj_single_gallery_count');
			
			if( empty($orderby) ) { $orderby = 'menu_order'; }
			if( empty($order) ) { $order = 'DESC'; }
			if( empty($gallery_count) ) { $gallery_count = '4'; }
			
			$args = array(
				'post_type' => 'gallery',
				'orderby' => $orderby,
				'order' => $order,
				'posts_per_page' => $gallery_count,
				'post__not_in' => array( $post->ID )
			);
			query_posts( $args );
			
			if (have_posts()) : $i = 0; while( have_posts() ) : the_post(); 
			
			$terms =  get_the_terms( $post->ID, 'gallery-type' );
			$term_list = '';
			if( is_array($terms) ) {
				foreach( $terms as $term ) {
		
				$term_list .= urldecode($term->slug);
		
				$term_list .= ' ';
				
				}
		
			}
			
			$mediaType = get_post_meta($post->ID, 'tj_gallery_type', true);
			?>
				
			<article id="post-<?php the_ID(); ?>" <?php if($i%4==3) { post_class("$mediaType $term_list last"); } else { post_class("$mediaType $term_list"); } ?>>
							
				<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
				
					<div class="gallery-hero">
					
						<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('project-img'); ?></a>
					
					</div>
				
				<?php } ?>
				
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h3>
				
			</article>	
			
			<?php $i++; ?>
					
			<?php endwhile; ?>
				
			<?php else : ?>
			
			<!-- No Related Projects -->
				
			<?php endif; ?>
			
			<?php wp_reset_postdata(); ?>
			
		</div>
	
	</div>
	
</div>
