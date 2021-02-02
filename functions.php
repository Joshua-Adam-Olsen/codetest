<?php
// Require WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {

	require get_template_directory() . '/includes/back-compat.php';
}

// Theme Setup.
if ( ! function_exists( 'code_test_setup' ) ) {

	function code_test_setup() {

		load_theme_textdomain( 'codetest' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Add support for core custom logo.
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
			)
		);

		//Add post-formats support.
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1920, 1080 );

		// Register Navigational Menues
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'codetest' ),
				'footer' => esc_html__( 'Secondary menu', 'codetest' ),
			)
		);

		// Register Custom Navigation Walker
		require_once get_template_directory() . '/includes/menu-functions.php';

		//Switch default core markup to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for editor color palette.
		add_theme_support( 'editor-color-palette' );

		// Add support for editor gradient presets.
		add_theme_support( 'editor-gradient-presets' );

		// add support for editor font sizes.
		add_theme_support( 'editor-font-sizes');

		// Add support for wp block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for custom units.
		add_theme_support( 'custom-units' );

		// Add support for align-wide and align-full.
		add_theme_support( 'align-wide' );
	}
}
add_action( 'after_setup_theme', 'code_test_setup' );

// Set the content width in pixels, based on the theme's design and stylesheet.
function code_test_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'code_test_content_width', 750 );
}
add_action( 'after_setup_theme', 'code_test_content_width', 0 );

// Enqueue scripts and styles.
function code_test_scripts_and_styles() {

	wp_enqueue_script( 'jQuery', '//code.jquery.com/jquery-3.4.1.slim.min.js' );

	wp_enqueue_script( 'Popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap/css/bootstrap.min.css' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.min.js' );

	wp_enqueue_style( 'code-test-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'code-test-script', get_template_directory_uri() . '/assets/js/app.js', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'code_test_scripts_and_styles' );

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/includes/template-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/includes/template-tags.php';

// Calculate classes for the main <html> element.
function codetest_the_html_classes() {
	$classes = apply_filters( 'codetest_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}
