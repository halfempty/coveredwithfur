<?php
/*
Template Name: Page - Home
*/
?>

<?php get_header(); ?>

<!-- template-home.php -->

<?php 
if ( of_get_option('tj_home_slideshow') == '1' ) {
	get_template_part( 'content-cpt-slider' ); 
}
?>

<div id="content" class="clearfix">

	<div id="primary" class="clearfix">
	
		<?php 
		if ( of_get_option('tj_home_gallery') == '1' ) {
			get_template_part( 'content-cpt-gallery' ); 
		}
		?>
		
		<?php 
		if ( of_get_option('tj_home_testimonials') == '1' ) {
			get_template_part( 'content-cpt-testimonials' ); 
		}
		?>
		
	</div>
	
</div>	
	
<?php get_footer(); ?>