<?php get_header(); ?>

<!-- search.php -->

<article class="cwfstory searchresults">

	<p><strong>Search results for <em>&ldquo;<?php printf( __( '%s'), get_search_query() ); ?>&rdquo;</em></strong></p>


<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>

			<header>

				<?php 

					$genreflag = get_field('genre_flag'); 
					if ( $genreflag == 'fiction' ) get_template_part('parts/flag-fiction');
					if ( $genreflag == 'essay' ) get_template_part('parts/flag-essay');
					if ( $genreflag == 'microessay' ) get_template_part('parts/flag-microessay');
					if ( $genreflag == 'photoessay' ) get_template_part('parts/flag-photoessay');
					if ( $genreflag == 'drawing' ) get_template_part('parts/flag-drawing');
					if ( $genreflag == 'slash' ) get_template_part('parts/flag-slash');

				?>

				<h2><a href="<?php the_permalink(); ?>"><?php 
					if ( get_field('cwf_title') ) : 
						the_field('cwf_title');
					else :
						the_title(); 
					endif; ?></a></h2>

					<?php if ( get_field('cwf_byline') ) : ?>
						<p class="byline"><?php the_field('cwf_byline'); ?></p>
					<?php endif; ?>

			</header>
	
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>

	<?php endwhile; ?>

<?php else : ?>
	<header>
		<h2>Sorry, no results found.</h2>
	</header>

	<img src="<?php echo get_stylesheet_directory_uri() ?>/img/cat.jpg" alt="The Covered w/ Fur Mascot">

<?php endif; ?>

</article>

<?php get_footer(); ?>
