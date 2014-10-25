<?php get_header(); ?>

<!-- search.php -->

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<?php endwhile; ?>
						
		<?php else : ?>
		
			<?php get_template_part( 'content', 'none-search' ); ?>

		<?php endif; ?>

		</article>

	</div>

</div>

<?php get_footer(); ?>