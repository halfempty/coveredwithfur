<article id="post-0" <?php post_class(''); ?>>

	<div class="entry-content">		
	
		<?php if ( current_user_can( 'publish_posts' ) ) {
				
			global $current_user;
		    get_currentuserinfo();
		    echo '<h1 class="entry-title">Welcome <strong>' . $current_user->display_name . ',</strong> you need to create your first post or page.</h1>'; ?>		
		
		<?php }else { ?>
		
			<h1 class="entry-title"><?php _e('404 - Not Found', 'framework') ?></h1>
		
			<p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
		
		<?php } ?>
		
	</div>
					
</article>