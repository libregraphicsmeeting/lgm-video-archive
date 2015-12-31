<?php 

// Change-Detector-XXXXX - for Espresso.app

// Override Parent Theme:

require_once('functions/theme-override.php');

require_once('functions/archive-query.php');


function custom_register_styles() {
	
	wp_dequeue_style( 'afterlight-fonts' );
	wp_deregister_style( 'afterlight-fonts' );
	
	wp_enqueue_style( 
			'main-style', 
			get_stylesheet_directory_uri() . '/css/dev/00-index.css', // main.css
			false, // dependencies
			null // version
	);

}
add_action( 'wp_enqueue_scripts', 'custom_register_styles', 25 );

/* Register Custom Header Menu */

