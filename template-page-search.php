<?php
/*
Template Name: Page - Search
*/
?>

<?php get_header(); ?>
	
<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<article id="page-<?php the_ID(); ?>" <?php post_class('tj-full-width-page clearfix'); ?>>
		
			<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
			<div class="page-hero">
			
				<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-img-full'); ?></a>
			
			</div>
			<?php } ?>
													
			<div class="entry-content">
			
				<h2 class="entry-title"><?php the_title(); ?></h2>
				
				<?php the_content(); ?>
				
				<?php get_search_form(); ?>
								
			</div>
			
		</article>
		
	<?php endwhile; endif; ?>
	
	</div>
			
</div>
			
<?php get_footer(); ?>