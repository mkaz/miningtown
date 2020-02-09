<?php
/**
 * Custom template tags for this theme
 *
 * @package MiningTown
 * @since 1.0.0
 */

if ( ! function_exists( 'miningtown_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function miningtown_posted_on() {
		if ( get_the_time( 'Ymd' ) !== get_the_modified_time( 'Ymd' ) ) {
			$label = "Updated: ";
			$time_string = sprintf(
				'<time class="entry-date updated" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);
		} else {
			$label = "Created: ";
			$time_string = sprintf(
				'<time class="entry-date published" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);
		}

		printf(
			'<span class="posted-on">%1$s %2$s<a href="%3$s" rel="bookmark">%4$s</a></span>',
			TwentyNineteen_SVG_Icons::get_svg( 'ui', 'watch', 16 ),
			$label,
			esc_url( get_permalink() ),
			$time_string
		);
	}
endif;

if ( ! function_exists( 'miningtown_categories_list' ) ) :
	function miningtown_categories_list() {
		/* translators: used between list items, there is a space after the comma. */
		$categories_list = get_the_category_list( __( ', ', 'miningtown' ) );
		if ( $categories_list ) {
			printf(
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
				'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
				TwentyNineteen_SVG_Icons::get_svg( 'ui', 'archive', 16 ),
				__( 'Posted in', 'miningtown' ),
				$categories_list
			); // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'miningtown_tags_list' ) ) :
	function miningtown_tags_list() {
		/* translators: used between list items, there is a space after the comma. */
		$tags_list = get_the_tag_list( '', __( ', ', 'miningtown' ) );
		if ( $tags_list ) {
			printf(
				/* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
				'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
				TwentyNineteen_SVG_Icons::get_svg( 'ui', 'tag', 16 ),
				__( 'Tags:', 'miningtown' ),
				$tags_list
			); // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'miningtown_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function miningtown_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'chevron_left', 22 ),
					__( 'Newer posts', 'miningtown' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', 'miningtown' ),
					TwentyNineteen_SVG_Icons::get_svg( 'ui', 'chevron_right', 22 )
				),
			)
		);
	}
endif;

if ( ! function_exists( 'miningtown_edit_link' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function miningtown_edit_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'miningtown' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . TwentyNineteen_SVG_Icons::get_svg( 'ui', 'edit', 16 ),
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'miningtown_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function miningtown_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;
