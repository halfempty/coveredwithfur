<?php get_header(); ?>

<!-- taxonomy-gallery-type.php -->

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
	
		<article class="taxonomy-description clearfix">
		
			<div class="entry-content">
		
				<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
				<h1 class="entry-title"><?php echo $term->name; ?></h1>		
				<?php if ( $term->description ) { echo "<p>".$term->description."</p>"; } ?>
				
			</div>
			
		</article>
			
		<?php get_template_part( 'content-cpt-gallery-taxonomy' ); ?>
	
	</div>

</div>
		
<?php get_footer(); ?>