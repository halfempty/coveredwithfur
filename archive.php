<?php get_header(); ?>

<?php /* Get author data */
	if(get_query_var('author_name')) {
	    $curauth = get_user_by( 'login', get_query_var('author_name') );
	} else {
    	$curauth = get_userdata(get_query_var('author'));
	}
?>
		
<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
	
		<div class="archive-breadcrumb">
		
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2 class="archive-title meta"><?php printf(__('Categories / %s', 'framework'), single_cat_title('',false)); ?></h2>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<h2 class="archive-title meta"><?php printf(__('Tagged / %s', 'framework'), single_tag_title('',false)); ?></h2>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="archive-title meta"><?php _e('Day /', 'framework') ?> / <?php the_time('F jS, Y'); ?></h2>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="archive-title meta"><?php _e('Month', 'framework') ?> / <?php the_time('F, Y'); ?></h2>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="archive-title meta"><?php _e('Year', 'framework') ?> / <?php the_time('Y'); ?></h2>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="archive-title meta"><?php _e('Author', 'framework') ?> / <?php echo $curauth->display_name; ?></h2>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="archive-title meta"><?php _e('Archives', 'framework') ?></h2>
		<?php } ?>
									            
		</div>
									            
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
			<?php 
			$format = get_post_format();
			if( false === $format ) { $format = 'standard'; }
			get_template_part( 'content', $format ); 
			?>
			
		<?php endwhile; ?>
							
		<?php else : ?>
		
			<?php get_template_part( 'content', 'none' ); ?>
					
		<?php endif; ?>
	
	</div>
	
	<?php tj_pagination(); ?>
	
</div>

<?php get_footer(); ?>