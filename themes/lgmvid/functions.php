<?php 

// Change-Detector-XXXXX - for Espresso.app

// Override Parent Theme:

require_once('functions/theme-override.php');


function custom_register_styles() {
	
	wp_dequeue_style( 'afterlight-fonts' );
	wp_deregister_style( 'afterlight-fonts' );

}
add_action( 'wp_enqueue_scripts', 'custom_register_styles', 25 );