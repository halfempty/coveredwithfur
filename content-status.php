<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

	<div class="entry-content">
			
		<span class="author-status-img"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?></a></span>
		
		<div class="status-content">
				
			<?php the_content( __( 'Read More', 'framework' ) ); ?>
			
		</div>
		
		
	</div>
	
</article>





