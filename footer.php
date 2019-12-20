<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package miningtown
 * 
 * @since 1.0.0
 */

?>
	</div>

	<aside>
		<div class="widget-area">
			<div class="widget-section">
				<?php dynamic_sidebar("footer-left"); ?>
			</div>
			<div class="widget-section">
				<?php dynamic_sidebar("footer-right"); ?>
			</div>
		</div>
	</aside>

	<footer id="colophon" class="site-footer">
		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		?>
		<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'miningtown' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav>
		<?php endif; ?>
		<div class="site-info">
			<a href="https://wordpress.org/" class="imprint">
				Powered by WordPress
			</a>
		</div>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
