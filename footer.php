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

	$blog_info = get_bloginfo( 'name' );
?>
</div>


	<footer id="colophon" class="site-footer">

		<div class="widget-area">
			<?php if ( is_active_sidebar( 'author-bio' ) ) : ?>
				<section class="author-bio">
					<?php dynamic_sidebar( 'author-bio' ); ?>
				</section>
			<?php endif; ?>

			<div class="widget-section">
				<?php dynamic_sidebar("footer-left"); ?>
			</div>
			<div class="widget-section">
				<?php dynamic_sidebar("footer-right"); ?>
			</div>
		</div>

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
