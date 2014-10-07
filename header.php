<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
		
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
	<script type="text/javascript" src="//use.typekit.net/mzu7zej.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="layout">

<header>
	<?php if ( has_nav_menu( 'primary-menu' ) ) :
		wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'tj-header-menu', 'fallback_cb' => 'wp_page_menu', 'theme_location' => 'primary-menu' ) ); 
	endif; ?>
</header>