<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<?php tj_post_footer_meta(); ?>
					
	<div class="entry-content">
	
		<?php tj_link( $post->ID ); ?>
		
		<?php the_content( __( 'Read More', 'framework' ) ); ?>
		
		<?php tj_link_url( $post->ID ); ?>
					
	</div>
		
</article>
