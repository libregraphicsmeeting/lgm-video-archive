<?php

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
		'add_or_remove_items' => 'Add or remove topics',
		'parent_item' => null, 'parent_item_colon' => null,
		'choose_from_most_used' => 'Choose from the most used topics',
		'separate_items_with_commas' => 'Separate topics with commas',
		'not_found' => __( 'No topics found' ),
		'no_terms' => __( 'No topics' ),
		'items_list_navigation' => __( 'Topics list navigation' ),
		'items_list' => __( 'Topics list' ),
	);
	$wp_taxonomies['post_tag']->label = 'Séries';
}
add_action( 'init', 'notes_tagged_init' );

