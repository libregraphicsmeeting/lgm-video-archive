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

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php afterlight_post_thumbnail(); ?>
	
	<?php 
	
	// display video files
	
	// test for custom field "talk_video"
	//  get_post_meta($post_id, $key, $single);
	
	$talk_videos = get_post_meta(
		get_the_ID(), // post ID
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
		<?php
			if ( '' != get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
		<?php afterlight_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'afterlight' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
