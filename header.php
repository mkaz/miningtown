<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package miningtown
 *
 * @since 1.0.0
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

	<header id="masthead" class="site-header">
		<?php $blog_info = get_bloginfo( 'name' ); ?>
		<?php if ( ! empty( $blog_info ) ) : ?>
			<h3 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php echo esc_html( $blog_info ); ?>
				</a>
			</h3>
		<?php endif; ?>

		<?php if ( has_nav_menu('header-menu') ) : ?>
			<nav class="main-navigation" aria-label="Main Navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			</nav>
		<?php endif; ?>
	</header>

	<div id="content" class="site-content">
