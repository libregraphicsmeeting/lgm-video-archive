<?php

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

// Add Session Type taxonomy

add_action( 'init', 'lgm_session_type_taxonomy', 0 );

function lgm_session_type_taxonomy() {

	// Add new taxonomy, NOT hierarchical (like tags)
	// References:
	// https://generatewp.com/taxonomy/
	// https://developer.wordpress.org/reference/functions/register_taxonomy/
	// https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
	
	$labels = array(
		'name'                       => _x( 'Type', 'taxonomy general name' ),
		'singular_name'              => _x( 'Type', 'taxonomy singular name' ),
		'menu_name'                  => __( 'Types' ),
		'search_items'               => __( 'Search Types' ),
		'popular_items'              => __( 'Frequent Types' ),
		'all_items'                  => __( 'All Types' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Type' ),
		'view_item'                  => __( 'View Type' ),
		'update_item'                => __( 'Update Type' ),
		'add_new_item'               => __( 'Add New Type' ),
		'new_item_name'              => __( 'New Type Name' ),
		'separate_items_with_commas' => __( 'Separate type with commas' ),
		'add_or_remove_items'        => __( 'Add or remove types' ),
		'choose_from_most_used'      => __( 'Choose from most used types' ),
		'not_found'                  => __( 'No types found' ),
		'no_terms'                   => __( 'No types' ),
		'items_list_navigation'      => __( 'Types list navigation' ),
		'items_list'                 => __( 'Types list' ),
		
	);

	$args = array(
		'labels'                => $labels,
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'types' ),
	);

	register_taxonomy( 'type', 'post', $args );
}