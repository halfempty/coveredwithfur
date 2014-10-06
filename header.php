<!DOCTYPE html>
<!-- A ThemeJug.com WordPress Theme -->
<!--[if IE 7]>
	<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
	<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
	<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
		
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (of_get_option('custom_rss')) { echo of_get_option('custom_rss'); } else { bloginfo( 'rss2_url' ); } ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<script type="text/javascript" src="//use.typekit.net/mzu7zej.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<?php wp_head(); ?>

	<link rel='stylesheet' href='http://jennshapland.com/wp-content/themes/Carajillo/css/cwf.css' type='text/css' media='all' />

</head>

<body <?php body_class(); ?>>
<div id="tj-mobile-menu"></div>

<div class="header-wrap" id="cwfheader">

	<header id="header" class="clearfix">
	
		<div class="logo">
		<?php if (of_get_option('plain_logo') == '1') { ?>
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php } elseif (of_get_option('custom_logo')) { ?>
			<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes(of_get_option('custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a></h1>
		<?php } else { ?>
			<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
		<?php } ?>
		</div>
		
		<?php if ( has_nav_menu( 'primary-menu' ) ) {  ?>
			
			<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'tj-header-menu', 'fallback_cb' => 'wp_page_menu', 'theme_location' => 'primary-menu' ) ); ?>
			
		<?php } ?>
		
	</header>
	
	<a class="tj-mobile-menu" href="#menu-primary"><span><i class="icon-align-justify"></i></span></a>
		
</div>
