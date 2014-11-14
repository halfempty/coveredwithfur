<?php get_header(); ?>

<!-- page.php -->
	
<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<article id="page-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		
			<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
			<div class="page-hero">
			
				<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-img-full'); ?></a>
			
			</div>
			<?php endif; ?>

			<div class="entry-content">

				<?php the_content(); ?>

			</div>

		</article>
		
	<?php endwhile; endif; ?>
	
	</div>
			
</div>
			
<?php get_footer(); ?>