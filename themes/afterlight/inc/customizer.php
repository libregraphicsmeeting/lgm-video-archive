<?php
/**
 * afterlight Theme Customizer
 *
 * @package Afterlight
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function afterlight_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport              = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport       = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'background_image' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'background_repeat' )->transport     = 'postMessage';
	$wp_customize->get_setting( 'background_position_x' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_attachment' )->transport = 'postMessage';

	// Add custom description to controls or sections.
	$wp_customize->get_control( 'blogdescription' )->description  = __( 'Tagline is hidden in this theme.', 'afterlight' );

	// Add Theme section.
	$wp_customize->add_section( 'afterlight_theme_options', array(
		'title'    => __( 'Theme', 'afterlight' ),
		'priority' => 200,
	) );

	// Add custom background overlay option setting and control.
	$wp_customize->add_setting( 'afterlight_background_overlay', array(
		'default'           => '1',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'afterlight_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'afterlight_background_overlay', array(
		'label'          => __( 'Add an overlay to background.', 'afterlight' ),
		'section'        => 'afterlight_theme_options',
		'visibility'     => 'background_image',
		'theme_supports' => 'custom-background',
		'type'           => 'checkbox',
		'priority'		 => 1,
	) );

	// Add custom full page background image option setting and control.
	$wp_customize->add_setting( 'afterlight_full_page_background', array(
		'default'           => '1',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'afterlight_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'afterlight_full_page_background', array(
		'label'          => __( 'Scale background image to fit.','afterlight' ),
		'section'        => 'afterlight_theme_options',
		'visibility'     => 'background_image',
		'theme_supports' => 'custom-background',
		'type'           => 'checkbox',
		'priority'		 => 2,
	) );
}
add_action( 'customize_register', 'afterlight_customize_register' );

if ( ! function_exists( 'afterlight_sanitize_checkbox' ) ) :
/**
 * Sanitize a checkbox setting.
 *
 * @since Afterlight 1.0
 */
function afterlight_sanitize_checkbox( $value ) {
	return ( 1 == $value );
}
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function afterlight_customize_preview_js() {
	wp_enqueue_script( 'afterlight_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20150421', true );
	wp_enqueue_script( 'afterlight-dotorg-customizer', get_template_directory_uri() . '/js/dotorg-customizer.js', array( 'customize-preview' ), '20150421', true );
}
add_action( 'customize_preview_init', 'afterlight_customize_preview_js' );
