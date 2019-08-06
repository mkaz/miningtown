<?php
/**
 * Theme Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package miningtown
 * @since 1.0.0
 */

add_action( 'after_setup_theme', function() {
	
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'miningtown' ),
				'shortName' => __( 'S', 'miningtown' ),
				'size'      => 19.5,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'miningtown' ),
				'shortName' => __( 'M', 'miningtown' ),
				'size'      => 22,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'miningtown' ),
				'shortName' => __( 'L', 'miningtown' ),
				'size'      => 36.5,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'miningtown' ),
				'shortName' => __( 'XL', 'miningtown' ),
				'size'      => 49.5,
				'slug'      => 'huge',
			),
		)
	);

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary', 'miningtown' ),
				'slug'  => 'primary',
				'color' => '#0000FF',
			),
			array(
				'name'  => __( 'Secondary', 'miningtown' ),
				'slug'  => 'secondary',
				'color' => '#FF0000',
			),
			array(
				'name'  => __( 'Dark Gray', 'miningtown' ),
				'slug'  => 'foreground-dark',
				'color' => '#111111',
			),
			array(
				'name'  => __( 'Gray', 'miningtown' ),
				'slug'  => 'foreground',
				'color' => '#444444',
			),
			array(
				'name'  => __( 'Light Gray', 'miningtown' ),
				'slug'  => 'foreground-light',
				'color' => '#767676',
			),
			array(
				'name'  => __( 'White', 'miningtown' ),
				'slug'  => 'background',
				'color' => '#FFFFFF',
			),
		)
	);
} );


/**
 * Add Google webfonts, if necessary
 *
 * - See: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */
function miningtown_fonts_url() {
	
	$font_families = array();
	$font_families[] = 'PT+Serif:400,700';
	$font_families[] = 'Roboto+Condensed:400,700';

	$query_args = array(
		'family' => implode( '|', $font_families ),
		'subset' => 'latin,latin-ext',
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}


/**
 * Set the content width in pixels, based on the child-theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
add_action( 'after_setup_theme', function() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'jots_content_width', 640 );
}, 0 );


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {
	
	// enqueue Google fonts, if necessary
	wp_enqueue_style( 'miningtown-fonts', miningtown_fonts_url(), array(), null );

	wp_enqueue_style( 'miningtown-style', get_stylesheet_uri(), array() );
} );


/**
 * Enqueue theme styles for the block editor.
 */
add_action( 'enqueue_block_editor_assets', function() {
	// Enqueue Google fonts in the editor, if necessary
	wp_enqueue_style( 'miningtown-editor-fonts', miningtown_fonts_url(), array(), null );
} );
