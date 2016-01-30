<?php 

add_action( 'init', 'lgm_speaker_taxonomy', 0 );

function lgm_speaker_taxonomy() {

	// Add new taxonomy, NOT hierarchical (like tags)
	// References:
	// https://generatewp.com/taxonomy/
	// https://developer.wordpress.org/reference/functions/register_taxonomy/
	// https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
	
	$labels = array(
		'name'                       => _x( 'Speakers', 'taxonomy general name' ),
		'singular_name'              => _x( 'Speaker', 'taxonomy singular name' ),
		'menu_name'                  => __( 'Speakers' ),
		'search_items'               => __( 'Search Speakers' ),
		'popular_items'              => __( 'Frequent Speakers' ),
		'all_items'                  => __( 'All Speakers' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Speaker' ),
		'view_item'                  => __( 'View Speaker' ),
		'update_item'                => __( 'Update Speaker' ),
		'add_new_item'               => __( 'Add New Speaker' ),
		'new_item_name'              => __( 'New Speaker Name' ),
		'separate_items_with_commas' => __( 'Separate speakers with commas' ),
		'add_or_remove_items'        => __( 'Add or remove speakers' ),
		'choose_from_most_used'      => __( 'Choose from most used speakers' ),
		'not_found'                  => __( 'No speakers found' ),
		'no_terms'                   => __( 'No speakers' ),
		'items_list_navigation'      => __( 'Speakers list navigation' ),
		'items_list'                 => __( 'Speakers list' ),
		
	);

	$args = array(
		'labels'                => $labels,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'speaker' ),
	);

	register_taxonomy( 'speaker', 'post', $args );
}

?>