<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package miningtown
 * 
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="site-main responsive-max-width">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				printf(
					'<h1 class="page-title">%1$s <span class="page-description search-term">%2$s</span></h1>',
					__( 'Search results for:', 'miningtown' ),
					get_search_query()
				);
				?>
			</header>

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );
			endwhile;

			miningtown_the_posts_navigation();

		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
	</main>

<?php
get_footer();
