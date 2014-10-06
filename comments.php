<div class="commentlist clearfix" id="comments">

	<div class="comments-meta">
		<h4><?php comments_number( '' . __('', 'framework') . '', '' . __('1 Comment', 'framework') . '', '' . __('% Comments', 'framework') . '' ); ?></h4>
	</div>
	
	<?php
	
	// Do not delete these lines
		if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die ('Do Not Do This...Dam Script Kids!');
	
		if ( post_password_required() ) { ?>
			<p><?php _e('Password protected. Enter pass to view comments.', 'framework') ?></p>
		<?php
			return;
		}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Display the comments + Pings
	/*-----------------------------------------------------------------------------------*/
	
			if ( have_comments() ) : // if there are comments ?>
	        
	        <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
					
			<?php wp_list_comments( array( 'style' => 'div', 'callback' => 'tj_html5comments', 'end-callback' => 'tj_comment_close' ) ); ?>		
	        <?php endif; ?>
			
			<nav>
				<div class="previous"><?php previous_comments_link(); ?></div>
				<div class="next"><?php next_comments_link(); ?></div>
			</nav>
			
			<?php
			
	/*-----------------------------------------------------------------------------------*/
	/*	Deal with no comments or closed comments
	/*-----------------------------------------------------------------------------------*/
			
			if ('closed' == $post->comment_status ) : // if the post has comments but comments are now closed ?>
			
			<p class="comments-closed"><?php _e('Comments are now closed.', 'framework') ?></p>
			
			<?php endif; ?>
	
	 		<?php else :  ?>
			
	        <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>
	
	        <?php else : // if comments are closed ?>
			
			<?php if (is_single()) { ?><p class="comments-closed"><?php _e('Comments are now closed.', 'framework') ?></p><?php } ?>
	
	        <?php endif; ?>
	        
	<?php endif;
	
	/*-----------------------------------------------------------------------------------*/
	/*	Comment Form
	/*-----------------------------------------------------------------------------------*/
	
		if ( comments_open() ) : ?>
		
			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p><?php printf(__('You must be %1$slogged in%2$s to post a comment.', 'framework'), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
			<?php else : ?>
		
			<?php comment_form(); ?>
	
		<?php endif; // If registration required and not logged in ?>
	
		<?php endif; // if you delete this the sky will fall on your head ?>
		
</div>