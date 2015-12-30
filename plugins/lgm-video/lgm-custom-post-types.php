<?php

/* Register Post Types
 ********************
*/

// add_action( 'init', 'lgm_register_post_types' );
function lgm_register_post_types() {

		$labels = array(
				"name" => "Speakers",
				"singular_name" => "Speaker",
				"menu_name" => "Speakers",
				"add_new" => "Add",
				"edit" => "Edit",
				"edit_item" => "Edit the speaker",
				"new_item" => "New speaker",
				"view_item" => "View speaker",
				"search_items" => "Search",
				);
		
			$args = array(
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"show_ui" => true,
				"has_archive" => true,
				"show_in_menu" => true,
				"menu_icon" => "dashicons-universal-access-alt", // src: http://melchoyce.github.io/dashicons/
				// dashicons-admin-post
				"exclude_from_search" => false,
				"capability_type" => "post",
				"map_meta_cap" => true,
				"hierarchical" => false,
				"rewrite" => array('slug' => 'speakers'),
				"query_var" => true,
				"menu_position" => 7,		
				"supports" => array( 
					"title", 
					"editor", 
					// "excerpt", 
					"custom-fields", 
					"revisions", 
					"thumbnail" 
				),		
			);
			register_post_type( "speaker", $args );
			
					
} // end defining post types


// Post 2 Post - connection between talks and speakers

// post_2_posts plugin
// https://github.com/scribu/wp-posts-to-posts/wiki/Basic-usage

function lgm_connection_types() {
	// Make sure the Posts 2 Posts plugin is active.
	if ( !function_exists( 'p2p_register_connection_type' ) )
		return;

	p2p_register_connection_type( array(
		'name' => 'posts_to_posts',
		'from' => 'post',
		'to' => 'speaker',
		'reciprocal' => true,
		'title' => 'Talks & Speakers',
		// 'admin_box' => 'from',
	) );
	

}
// add_action( 'init', 'lgm_connection_types', 100 );



