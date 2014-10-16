<?php
/*
Template Name: Page - Gallery
*/
?>

<?php get_header(); ?>

<!-- template-gallery.php -->

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
	
		<?php while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
			
				<div class="entry-content">
				
					<?php the_content(); ?>
				
				</div>
			
			</article>
			
		<?php endwhile; ?>
	
		<?php get_template_part( 'content-cpt-gallery' ); ?>
	
	</div>

</div>

<?php get_footer(); ?>