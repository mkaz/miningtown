<?php
/**
 * The template for displaying a page.
 * @package miningtown
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="site-main responsive-max-width">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
		?>
	</main>

<?php
get_footer();
