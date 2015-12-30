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