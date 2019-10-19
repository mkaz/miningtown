<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package miningtown
 * 
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main responsive-max-width">

	<header class="page-header">
		<h2> Hi, I'm Marcus Kazmierczak </h2>
		<p> A software engineer creating tools to help people empower themselves.
		I believe open source and sharing our collective knowledge can help us move
		the world forward. I hope this site is a small contribution to that collective.
		</p>
	</header>

	<?php if ( have_posts() ) : ?>

		<h5> Articles </h5>

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

<?php get_footer();
