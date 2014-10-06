<?php get_header(); ?>

<?php $tj_post_type = get_post_type(); ?>

<?php $class = tj_gallery_background_exists( $post->ID ); ?>

<?php tj_gallery_background_init( $post->ID ); ?>

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
	
		<div class="<?php echo 'tj-cpt-' . $tj_post_type; ?>">
			
			<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="<?php if ( $class ) { echo $class.' '; } ?>single-gallery-hero clearfix"></div>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					
				<div class="entry-title-wrapper">
				
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
				</div>
				
				<div class="entry-content">
				
					<?php the_content( __( 'Read More', 'framework' ) ); ?>
				
				</div>
			
			</article>
			
			<div class="single-gallery-media">
			
				<?php tj_gallery_type( $post->ID ); ?>
				
			</div>
							
			<?php endwhile; endif; ?>
			
			<?php wp_reset_postdata(); ?>
		
		</div>
		
		<div class="single-gallery-footer clearfix">
		
			<div class="single-gallery-meta-wrapper clearfix">
		
				<div class="single-gallery-meta">
			
					<?php tj_gallery_client( $post->ID ); ?>
				
				</div>
				
				<div class="single-gallery-meta last">
				
					<?php tj_gallery_client_date( $post->ID ); ?>
					
				</div>
				
			</div>
			
			<div class="pagination-gallery clearfix">
			
				<?php if( get_previous_post() ) : ?>
					 <div class="pagination-gallery-left"><?php previous_post_link('%link','Prev') ?></div>
				<?php endif; ?>
					 			
				<?php if( get_next_post() ) : ?>
					 <div class="pagination-gallery-right"><?php next_post_link('%link','Next') ?></div>
				<?php endif; ?>	
			
			</div>
			
		</div>
		
		<?php get_template_part( 'content-cpt-gallery-more' ); ?>
		
	</div>
	
</div>

<?php get_footer(); ?>


