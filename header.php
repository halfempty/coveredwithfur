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

	<!-- Fav Icons: Browser, iOS, Windows 8 -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicons/favicon-114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicons/favicon-72.png" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicons/favicon-57.png" />
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
	<meta name="msapplication-TileColor" content="#ffffff"/> 
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/img/favicons/favicon-144.png"/>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="searchbox" style="display: none;">
		<form method="get" id="searchform" action="<?php echo get_search_link(); ?>">
			<div class="inputmargin">
				<input type="search" name="s" id="s" onfocus="if(this.value == 'Search...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search...'; }" value="Search...">
			</div>
		</form>
	</div>


<div class="layout">

	<header class="siteheader">

		<div class="cwflogo">
			<a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/comb.png" alt="Covered With Fur"></a>
		</div>

		<div class="cwfnav">
			<?php if ( has_nav_menu( 'primary-menu' ) ) wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'tj-header-menu', 'fallback_cb' => 'wp_page_menu', 'theme_location' => 'primary-menu' ) ); ?>
		</div>
	</header>