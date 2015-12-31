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
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-date">
				<?php afterlight_entry_date(); ?>
			</div><!-- .entry-date -->
			<?php 
			
			// display speakers:
			// using taxonomy: speaker
			
			$id = $post->ID;
			
			echo get_the_term_list( 
				$id, // Post ID
				'speaker', // Name of taxonomy
				'', // $before - Leading text
				', ', // $sep - String to separate tags
				'' // $after - Trailing text
			);
			
			 ?>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>
</article><!-- #post-## -->
