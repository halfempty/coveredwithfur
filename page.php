<?php get_header(); ?>

<!-- page.php -->
	
<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<article id="page-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		
			<div class="entry-content">

				<?php the_content(); ?>

			</div>

		</article>
		
	<?php endwhile; endif; ?>
	
	</div>
			
</div>
			
<?php get_footer(); ?>