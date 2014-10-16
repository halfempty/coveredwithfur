<!-- content-cpt-slider.php -->

<?php 
$slideshow_speed = of_get_option('tj_home_slideshow_speed');
if( empty($slideshow_speed) ) { $slideshow_speed = '600'; }

$slideshow_auto = of_get_option('tj_home_slideshow_rotate');
if ( $slideshow_auto == 0)  { 
	$slideshow_auto = 'false'; 
} else {
	$slideshow_auto = 'true'; 
}
?>
<script type="text/javascript" charset="utf-8">
	jQuery(window).load(function() {
		jQuery('.tj-home-slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: true,
			slideshow: <?php echo $slideshow_auto; ?>,
			smoothHeight: true,
			namespace: 'tj-',
			prevText: "<span class='ico'>&#59237;</span>",
			nextText: "<span class='ico'>&#59238;</span>",
			animationSpeed: <?php echo $slideshow_speed; ?>,
			start: function(){
				jQuery( '.tj-home-slider' ).removeClass( "tj-loading" )
			},  
		});
	});
</script>

<div class="tj-home-slider tj-loading" id="tj-home-slider">

	<ul class="slides">
		<?php
		$args = array(
			'post_type' => 'slider',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => -1
		);
		query_posts( $args );
		
		if (have_posts()) : $i = 0; while( have_posts() ) : the_post(); 
		$slider_url = get_post_meta($post->ID, 'tj_slider_url', true);
		?>
		
		<?php if ( !empty($slider_url) ) : ?>
					
			<li id="post-<?php the_ID(); ?>" <?php post_class('') ?>>
			
				<div class="tj-home-slider-img-wrapper">
			
					<a class="tj-slider-link clearfix" title="<?php the_title(); ?>" href="<?php tj_slideshow_url( $post->ID ); ?>">
					
						<div class="tj-home-slider-bg" style="background-image: url(<?php tj_slider_background( $post->ID ); ?>); background-position: 50% 50%; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>
				
					</a>
					
					<div class="entry-content">
					
						<?php the_content(); ?>
						
					</div>
				
				</div>
				
			</li>
			
		<?php else : ?>	
		
		<li id="post-<?php the_ID(); ?>" <?php post_class('') ?> style="background-image: url(<?php tj_slider_background( $post->ID ); ?>); background-position: 50% 50%; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
		
			<div class="entry-content">
						
				<?php the_content(); ?>
				
			</div>
						
		</li>
		
		<?php endif; ?>
		
		<?php $i++; ?>
				
		<?php endwhile; ?>
			
		<?php else : ?>
		
			<li>
			
				<div class="entry-content">
				
					<?php if ( current_user_can( 'publish_posts' ) ) {
							
						global $current_user;
					    get_currentuserinfo();
					    echo 'Welcome <strong>' . $current_user->display_name . ',</strong> you need to create your <a class="tj-admin-notification" href="wp-admin/edit.php?post_type=slider"><strong>first slideshow item</strong></a>, you can also disable the homepage slider in the theme options panel.'; ?>		
					
					<?php } ?>
			
					<!-- No Slider Added -->
					
				</div>
		
			</li>
			
		<?php endif; ?>
		
		<?php wp_reset_postdata(); ?>
	
	</ul>

</div>


