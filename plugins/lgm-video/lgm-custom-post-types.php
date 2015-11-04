<?php

/* Register Post Types
 ********************
*/

add_action( 'init', 'lgm_register_post_types' );
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


// relabel "post" as "talk" 

function change_post_menu_label() {
    global $menu, $submenu;

    $menu[5][0] = 'Talks';
    $submenu['edit.php'][5][0] = 'Talks';
    $submenu['edit.php'][10][0] = 'New Talk';
    // $submenu['edit.php'][16][0] = 'Topics';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Talks';
    $labels->singular_name = 'Talk';
    $labels->add_new = 'New Talk';
    $labels->add_new_item = 'New Talk';
    $labels->edit_item = 'Edit Talk';
    $labels->new_item = 'New Talk';
    $labels->view_item = 'View Talk';
    $labels->search_items = 'Search Talks';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in trash';
}
add_action( 'init', 'change_post_object_label' );


/**
 * Rename 'Tags' to be Notes or anything you want
 * http://new2wp.com/snippet/rename-default-post-tags-taxonomy-wordpress/
 * see also: http://w4dev.com/wp/remove-taxonomy/
 */
 
function notes_tagged_init() {
	global $wp_taxonomies;
	$wp_taxonomies['post_tag']->labels = (object) array(
		'name' => 'Topics',
		'singular_name' => 'Topic',
		'all_items' => 'All Topics',
		'edit_item' => 'Edit',
		'view_item' => 'View',
		'menu_name' => 'Topics',
		'update_item' => 'Update Topic',
		'add_new_item' => 'Add Topic',
		'search_items' => 'Search',
		'popular_items' => 'Popular Topics',
		'new_item_name' => 'Topic name',
		'add_or_remove_items' => 'Add or remove items',
		'parent_item' => null, 'parent_item_colon' => null,
		'choose_from_most_used' => 'Choose from the most used topics',
		'separate_items_with_commas' => 'Separate topics with commas',
	);
	$wp_taxonomies['post_tag']->label = 'Séries';
}
add_action( 'init', 'notes_tagged_init' );



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
add_action( 'init', 'lgm_connection_types', 100 );



