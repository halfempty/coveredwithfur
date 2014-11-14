<?php
/*
Template Name: Info Template
*/
?>

<?php get_header(); ?>

<!-- page-info.php -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article class="cwfstory">

		<header>

			<h2><?php the_title(); ?></h2>

		</header>
	
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail('featured-img-full'); ?>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</article>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>
