<?php
/*
Template Name: Page - Full Width
*/
?>

<?php get_header(); ?>

<!-- template-page-full.php -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article class="cwfstory">

		<header>

			<?php 
			
				$genreflag = get_field('genre_flag'); 
				if ( $genreflag == 'fiction' ) get_template_part('parts/flag-fiction');
				if ( $genreflag == 'essay' ) get_template_part('parts/flag-essay');
				if ( $genreflag == 'microessay' ) get_template_part('parts/flag-microessay');
				if ( $genreflag == 'drawing' ) get_template_part('parts/flag-drawing');
				if ( $genreflag == 'slash' ) get_template_part('parts/flag-slash');

			?>

			<h2><?php 
				if ( get_field('cwf_title') ) : 
					the_field('cwf_title');
				else :
					the_title(); 
				endif; ?></h2>

			<?php if ( get_field('cwf_byline') ) : ?>
				<p class="byline"><?php the_field('cwf_byline'); ?></p>
			<?php endif; ?>

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
