<!-- content-gallery.php -->

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<?php 

	$images = get_field('gallery');

	if( $images ): ?>
	    <div id="slider" class="flexslider">
	        <ul class="slides">
	            <?php foreach( $images as $image ): ?>
	                <li>
	                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	                    <p><?php echo $image['caption']; ?></p>
	                </li>
	            <?php endforeach; ?>
	        </ul>
	    </div>
	<?php endif; ?>
	
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