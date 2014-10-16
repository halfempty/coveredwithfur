<!-- content-cpt-testimonials.php -->

<script type="text/javascript" charset="utf-8">
	jQuery(window).load(function() {
		jQuery('.tj-home-testimonials-slider').flexslider({
			//animation: "slide",
			controlNav: false,
			animationLoop: true,
			slideshow: true,
			smoothHeight: true,
			namespace: 'tj-testimonial-',
			prevText: "&#8250;",
			nextText: "&#8249;",
			animationSpeed: 600,
			slideshowSpeed: 2500,
			start: function(){
				jQuery( '.tj-home-testimonials-slider' ).removeClass( "tj-loading" )
			},  
		});
	});
</script>

<div class="tj-home-testimonials-wrapper clearfix">

	<div class="tj-home-testimonials clearfix">
	
		<?php tj_testimonial_message(); ?>
			
		<div class="tj-home-testimonials-slider tj-loading" id="tj-home-testimonials-slider">
		
			<ul id="" class="slides">
			
				<?php
				$args = array(
					'post_type' => 'testimonials',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'posts_per_page' => -1
				);
				query_posts( $args );
				
				if (have_posts()) : $i = 0; while( have_posts() ) : the_post(); 
				
				$tj_client_url = get_post_meta($post->ID, 'tj_client_url', true);
				?>
					
					<li id="post-<?php the_ID(); ?>" <?php post_class('') ?>>

						<div class="entry-content">
						
							<?php the_content(); ?>
							
						</div>
						
						<?php 
						if( !empty($tj_client_url) ) { 
							
							echo '<div class="testimonial-client"><h3 class="client-link"><a href="' . esc_url( $tj_client_url ) . '">&dash; ' . get_the_title( $post->ID ) . '</a></h3></div>'; 
							
						} else {
							echo '<div class="testimonial-client"><h3 class="client-link">&dash; ' . get_the_title( $post->ID ) . '</h3></div>'; 
						}
						?>

					</li>	
				
				<?php $i++; ?>
						
				<?php endwhile; ?>
					
				<?php else : ?>
				
					<li>
					
						<div class="entry-content">
						
							<?php if ( current_user_can( 'publish_posts' ) ) {
									
								global $current_user;
							    get_currentuserinfo();
							    echo 'Welcome <strong>' . $current_user->display_name . ',</strong> you need to create your <a class="tj-admin-notification" href="wp-admin/edit.php?post_type=testimonials"><strong>first testimonial item</strong></a>, you can also disable the testimonial slider in the theme options panel.'; ?>		
							
							<?php } ?>
					
							<!-- No Testimonial Added -->
							
						</div>
				
					</li>
									
				<?php endif; ?>
				
				<?php wp_reset_postdata(); ?>
			
			</ul>
		
		</div>

	</div>

</div>


