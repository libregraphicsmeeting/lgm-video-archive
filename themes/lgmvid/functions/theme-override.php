<?php 

// Change-Detector-XXXXX - for Espresso.app



if ( ! function_exists( 'afterlight_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function afterlight_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on afterlight, use a find and replace
	 * to change 'afterlight' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'afterlight', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 833, 0, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'afterlight' ),
		'social'  => __( 'Social Links Menu', 'afterlight' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 
		'comment-form', 
		'comment-list', 
		'gallery', 
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'afterlight_custom_background_args', array(
		'default-attachment' => 'fixed',
		'default-color'      => '1a1a1a',
		'default-image'      => get_template_directory_uri() . '/images/background.jpg',
		'default-position-x' => 'center',
		'default-repeat'     => 'no-repeat',
		'wp-head-callback'   => 'afterlight_custom_background_cb'
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	// add_editor_style( array( 'editor-style.css', 'genericons/genericons.css', afterlight_fonts_url() ) );
	
}
endif; // afterlight_setup
add_action( 'after_setup_theme', 'afterlight_setup' );



/// FONTS


if ( ! function_exists( 'afterlight_fonts_url' ) ) :
/**
 * Register Google fonts for afterlight.
 *
 * @since Afterlight 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function afterlight_fonts_url() {
	$fonts_url = '';

	return $fonts_url;
}
endif;


