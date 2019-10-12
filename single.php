<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package miningtown
 * 
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="site-main responsive-max-width">

		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'single' );

			if ( is_singular( 'attachment' ) ) {
				the_post_navigation(
					array(
						/* translators: %s: parent post link */
						'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'miningtown' ), '%title' ),
					)
				);
			} elseif ( is_singular( 'post' ) ) {
				the_post_navigation(
					array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'miningtown' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'miningtown' ) . '</span> <br/>' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'miningtown' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'miningtown' ) . '</span> <br/>' .
							'<span class="post-title">%title</span>',
					)
				);
			}

		endwhile;
		?>

	</main>

<?php
get_footer();
