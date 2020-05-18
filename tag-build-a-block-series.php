<?php
/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package miningtown
 * @since 1.0.0
 */

global $wp_the_query;
$wp_the_query->posts = array_reverse($wp_the_query->posts);

get_header();
?>

	<main id="main" class="site-main">

		<header class="page-header">
			<h1> Build a Block Series </h1>
			<p> A series that walks you through creating your first block for the WordPress Block Editor, aka. Gutenberg. </p>
		</header>
		<ul class="post-list">

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'home' );
			endwhile;

			miningtown_the_posts_navigation();

			?>
		</ul>
	</main>

<?php
get_footer();
