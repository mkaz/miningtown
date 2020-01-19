<?php
/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package miningtown
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header>

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );
			endwhile;

			miningtown_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
	</main>

<?php
get_footer();
