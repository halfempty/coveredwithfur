<?php get_header(); ?>
<!-- author.php -->

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">

	<?php if (have_posts()) : the_post(); ?>
	
		<?php if ( get_the_author_meta( 'description' ) ) { ?>
		<div class="author-meta bypostauthor clearfix">
		
			<div class="author-avatar">
			
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			
			</div>
			
			<div class="author-description clearfix">
			
				<h3 class="author-title"><?php echo get_the_author() ; ?></h3>
				<p><?php the_author_meta( 'description' ); ?></p>
				
			</div>
			
		</div>
		<?php } ?>
		
	<?php rewind_posts(); while (have_posts()) : the_post(); ?>
	
	<?php 
	$format = get_post_format();
	if( false === $format ) { $format = 'standard'; }
	get_template_part( 'content', $format ); 
	?>

	<?php endwhile; ?>
	
	<?php else : ?>
	
		<?php get_template_part( 'content', 'none' ); ?>
				
	<?php endif; ?>
	
	</div>
	
	<?php tj_pagination(); ?>
	
</div>

<?php get_footer(); ?>