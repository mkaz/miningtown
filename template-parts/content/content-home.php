<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package miningtown
 *
 * @since 1.0.0
 */

?>

<li class="entry-title">
	<span class="posted-on">
	<?php
		printf(
			'<time class="entry-date published" datetime="%1$s">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date( "Y-m-d") )
		);
	?>
	</span>
	<?php
		the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
	?>
</li>
