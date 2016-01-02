<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) { ?>
			<?php 
			
			$id = $post->ID;
			
			// Are we in taxonomy archive?
			
			if ( is_tax( 'speaker' ) ) {
			
				// no need to show speaker name
			
			} else {
				
				// display speakers:
				// using taxonomy: speaker
				
				echo get_the_term_list( 
					$id, // Post ID
					'speaker', // Name of taxonomy
					'', // $before - Leading text
					', ', // $sep - String to separate tags
					'' // $after - Trailing text
				);
			
			}
			
			 ?>
		<?php } ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		<?php
		 // what LGM? 
		 
		 if ( 'post' == get_post_type() ) { 
		 	
		 	if ( is_category() ) {
		 	
		 		// no need to show category
		 	
		 	} else {
		 	
		 		// show category
		 		
		 		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'afterlight' ) );
		 		if ( $categories_list ) {
		 			printf( '<span class="archive-cat-links"><span>%1$s</span>%2$s</span>',
		 				'at ',
		 				$categories_list
		 			);
		 		}
		 	}
		 
		 
		 }
		 
		?>
		
	</header>
</article><!-- #post-## -->
