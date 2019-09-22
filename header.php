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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'miningtown' ); ?></a>

		<header id="masthead" class="site-header responsive-max-width">

			<div class="site-branding">

				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php endif; ?>
				<?php $blog_info = get_bloginfo( 'name' ); ?>
				<?php if ( ! empty( $blog_info ) ) : ?>
					<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
					<p class="site-description">
						<?php esc_html( bloginfo( 'description' ) ); ?>
					</p>
					
				<?php endif; ?>
			</div>

			<?php if ( is_active_sidebar('sidebar-main') ) : ?>
				<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'miningtown' ); ?>">
					<input type="checkbox" role="button" aria-haspopup="true" id="toggle" class="hide-visually">
					<label for="toggle" id="toggle-menu">
						<span class="dropdown-icon open" title="Open Menu">
							<?php echo TwentyNineteen_SVG_Icons::get_svg( 'ui', 'menu', 32 ); ?>
						</span>
						<span class="dropdown-icon close" title="Close Menu">
							<?php echo TwentyNineteen_SVG_Icons::get_svg( 'ui', 'menu-close', 32 ); ?>
						</span>
						<span class="hide-visually expanded-text"><?php _e( 'expanded', 'miningtown' ); ?></span>
						<span class="hide-visually collapsed-text"><?php _e( 'collapsed', 'miningtown' ); ?></span>
					</label>
					<div id="sidebar-main">
						<?php dynamic_sidebar( 'sidebar-main' ); ?>
					</div>
				</nav>
			<?php endif; ?>

		</header>

	<div id="content" class="site-content">
