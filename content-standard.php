<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<?php if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
	
		<div class="blog-hero">
		
			<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-img-full'); ?></a>
		
		</div>
	
	<?php } ?>
	
	<?php tj_post_footer_meta(); ?>
			
	<div class="entry-content">
	
		<?php if( is_single() ) { ?>
		
			<h1 class="entry-title"><?php the_title(); ?></h1>
		   
		<?php } else { ?>
		
		    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2> 
		       
		<?php } ?>
				
		<?php the_content( __( 'Read More', 'framework' ) ); ?>
				
	</div>	
	
</article>





