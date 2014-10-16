<?php get_header(); ?>

<!-- single.php -->

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">	

		<?php if (have_posts()) : 
			while (have_posts()) : 
				the_post(); 
				$format = get_post_format();

				if( false === $format ) { $format = 'standard'; }

				get_template_part( 'content', $format );

			endwhile; 
		else: 
			get_template_part( 'content', 'none' ); 
		endif; ?>

	</div>
		
</div>

<?php get_footer(); ?>