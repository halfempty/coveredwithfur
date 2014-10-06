<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<?php tj_post_footer_meta(); ?>

	<div class="entry-content">
	
		<?php tj_quote( $post->ID ); ?>	
		
		<?php the_content( __( 'Read More', 'framework' ) ); ?>
		
	</div>
						
</article>





