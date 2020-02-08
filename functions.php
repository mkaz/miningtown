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
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

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

	// Adjust code-syntax-block to only support a small set
	add_filter( 'mkaz_code_syntax_language_list', function() {
		return array(
			"bash" => "Bash",
			"go" => "Go",
			"html" => "HTML",
			"javascript" => "JavaScript",
			"json" => "JSON",
			"markdown" => "Markdown",
			"php" => "PHP",
			"python" => "Python",
			"jsx" => "React JSX",
			"sass" => "Sass",
			"sql" => "SQL",
			"svg" => "SVG",
			"toml" => "TOML",
			"vim" => "vim",
			"xml" => "XML",
			"yaml" => "YAML",
		);
	} );

} );

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {

	if ( is_page_template( 'page-tut.php' ) ) {
		wp_enqueue_style(
			'miningtown-tutorial-style',
			get_stylesheet_directory_uri() . '/tut/style.css',
			array(),
			filemtime( get_stylesheet_directory() . '/tut/style.css' )
		);

		wp_enqueue_style(
			'miningtown-asciinema-style',
			get_stylesheet_directory_uri() . '/tut/asciinema/asciinema-player.css'
		);

		wp_enqueue_script(
			'miningtown-asciinema-script',
			get_stylesheet_directory_uri() . '/tut/asciinema/asciinema-player.js',
			array(),
			filemtime( get_stylesheet_directory() . '/tut/asciinema/asciinema-player.js' ),
			true // in footer
		);

	}

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
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footer-right',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => 'Author Bio',
		'id'            => 'author-bio',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Follow Block',
		'id'            => 'follow-block',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

} );

// No says text
add_filter( 'comment_author_says_text', function() { return ' '; } );

require get_template_directory() . '/inc/class-varia-svg-icons.php';
require get_template_directory() . '/inc/class-twentynineteen-walker-comment.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';

