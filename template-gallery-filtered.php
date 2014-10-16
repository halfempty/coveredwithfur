<?php
/*
Template Name: Page - Gallery - Filtered
*/

get_header(); ?>

<!-- template-gallery-filtered.php -->

<div id="content" class="gallery-paginated clearfix">

	<div id="primary" class="clearfix">
		
		<?php while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
			
				<div class="entry-content">
					
					<?php the_content(); ?>
				
				</div>
			
			</article>
			
		<?php endwhile; ?>
			
		<?php get_template_part( 'content-cpt-gallery-filtered' ); ?>
	
	</div>

</div>

<?php get_footer(); ?>