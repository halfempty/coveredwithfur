<!-- content-cpt-gallery-taxonomy.php -->

<div class="tj-gallery-wrapper clearfix">

	<div class="tj-gallery-content">

		<div class="tj-gallery clearfix">
		
			<?php
			
			$orderby = of_get_option('tj_galleries_orderby');
			$order = of_get_option('tj_galleries_order');
			//$gallery_count = of_get_option('tj_galleries_count');
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			if( empty($orderby) ) { $orderby = 'menu_order'; }
			if( empty($order) ) { $order = 'DESC'; }
			if( empty($gallery_count) ) { $gallery_count = get_option('posts_per_page'); }
			
			$args = array(
				'post_type' => 'gallery',
				'gallery-type' => $term->slug,
				'orderby' => $orderby,
				'order' => $order,
				'posts_per_page' => $gallery_count,
				'paged' => $paged
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
			
			<!-- No Galleries Added -->
				
			<?php endif; ?>
			
			<?php wp_reset_postdata(); ?>
			
		</div>
	
	</div>
	
</div>


