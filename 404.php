<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package miningtown
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="site-main responsive-max-width">

		<div class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'miningtown' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'miningtown' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>

	</main>

<?php
get_footer();
