<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Afterlight
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function afterlight_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'afterlight_jetpack_setup' );

/**
 * Add support for the Site Logo
 *
 * @since Afterlight 1.0
 */
function afterlight_site_logo_init() {
	add_image_size( 'afterlight-logo', 192, 192 );
	add_theme_support( 'site-logo', array( 'size' => 'afterlight-logo' ) );
}
add_action( 'after_setup_theme', 'afterlight_site_logo_init' );

/**
 * Return early if Site Logo is not available.
 *
 * @since Afterlight 1.0
 */
function afterlight_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
 * Add theme support for Responsive Videos
 *
 * @since Afterlight 1.0
 */
function afterlight_responsive_videos_init() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'afterlight_responsive_videos_init' );

/**
 * Overwritte default gallery widget content width.
 *
 * @since Afterlight 1.0
 */
function afterlight_gallery_widget_content_width( $width ) {
	return 704;
}
add_filter( 'gallery_widget_content_width', 'afterlight_gallery_widget_content_width');
