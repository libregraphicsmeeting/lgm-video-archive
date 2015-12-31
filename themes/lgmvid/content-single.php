<?php
/**
 * @package Afterlight
 * @since Afterlight 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-date">
			<?php afterlight_entry_date(); ?>
		</div>
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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php afterlight_post_thumbnail(); ?>
	
	<?php 
	
	// display video files
	
	// test for custom field "talk_video"
	// get_post_meta($post_id, $key, $single);
	
	$talk_videos = get_post_meta(
		$id, // post ID
		'talk_video', // $key
		false ); // true = string, false = array
	
	if ( !empty($talk_videos) ) {
		foreach($talk_videos as $video) {
			echo '<div class="video-player">';
			echo do_shortcode( '[video src="'.$video.'"]' );
			echo '</div>';
		}
	}
	
	 ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'afterlight' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'afterlight' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
		<?php afterlight_entry_meta(); ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
