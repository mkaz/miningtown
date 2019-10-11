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
	add_theme_support( 'title-tag' );
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
	$font_families[] = 'Source+Code+Pro:400';

	$query_args = array(
			'family' => implode( '|', $font_families ),
			'subset' => 'latin,latin-ext',
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {
    // enqueue Google fonts, if necessary
    wp_enqueue_style( 'miningtown-fonts', miningtown_fonts_url(), array(), null );
	
	wp_enqueue_style(
		'miningtown-style',
		get_stylesheet_uri(),
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

} );

add_action( 'init', function() {
	register_nav_menus( [
      'header-menu' => __( 'Header Menu' )
    ] );
} );

add_action( 'widgets_init', function() { 
	register_sidebar( array(
		'name'          => 'Footer Left',
		'id'            => 'footer-left',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footer-right',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );	
} );


/**
 * Changes comment form default fields.
 */
add_filter( 'comment_form_defaults', function( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );
	$defaults['title_reply'] = __( 'Add Comment' );
	$defaults['label_submit'] = __( 'Submit' );

	return $defaults;
} );

require get_template_directory() . '/inc/class-varia-svg-icons.php';
require get_template_directory() . '/inc/template-tags.php';
