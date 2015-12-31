<?php

function lgm_archive_query($query) {

	// Disable pagination on archive pages - just show everything!
	
  if ( !is_admin() && $query->is_main_query() ) {
    if (is_archive()) {
    
    // An Archive is a Category, Tag, Author, Date, Custom Post Type or Custom Taxonomy based pages. 
    
      set_query_var('posts_per_archive_page', -1);
      set_query_var('nopaging', true);
			
    }
  }
}

add_action('pre_get_posts','lgm_archive_query');