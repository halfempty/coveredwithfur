<?php get_header(); ?>

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
			<?php 
			$format = get_post_format();
			if( false === $format ) { $format = 'standard'; }
			get_template_part( 'content', $format ); 
			?>

		<?php endwhile; ?>
						
		<?php else : ?>
		
			<?php get_template_part( 'content', 'none-search' ); ?>

		<?php endif; ?>
			
	</div>

</div>

<?php get_footer(); ?>