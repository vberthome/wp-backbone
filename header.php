<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelblog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="h-sr-only" href="#main"><?php esc_html_e( 'Skip to content', 'travelblog' ); ?></a>

	<header id="masthead" class="site__header header header--classic" role="banner">
		<div class="header__wrapper">
			<div class="header__branding branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="branding__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div><!-- .branding -->

			<a href="#navigation" class="header__burger js-burger button button--primary">
				<span class="icon icon-bars"></span>
				<span class="header__burger-title"><?php _e( 'Menu', 'fw' ) ?></span>
			</a>
		</div>
		<nav id="navigation" class="header__menu" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu menu--primary' ) ); ?>
		</nav><!-- #navigation -->
	</header><!-- #masthead -->