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
		
		$speakers = get_the_terms( $id, 'speaker' );
		
		if ( !empty($speakers) && !is_wp_error($speakers) ) { 
			
			// echo '<div class="speaker-names">';
			
			if ( count($speakers) > 1 ) {
				echo 'Speakers: ';
			} else {
				echo 'Speaker: ';
			}
			
			foreach ( $speakers as $speaker ) {
				
			}
			// echo '</div>';
		}
		
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
	
	<div class="entry-content">
	
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
			echo '<div class="lgm-video-player">';
			echo do_shortcode( '[video src="'.$video.'"]' );
			echo '</div>';
		}
	}
	
	// display audio files
	
	$talk_audio = get_post_meta(
		$id, // post ID
		'talk_audio', // $key
		false ); // true = string, false = array
	
	if ( !empty($talk_audio) ) {
		foreach($talk_audio as $audio) {
			echo '<div class="lgm-audio-player">';
			echo do_shortcode( '[audio src="'.$audio.'"]' );
			echo '<div>[<a href="'.$audio.'">audio file</a>]</div>';
			echo '</div>';
		}
	}
	
	 ?>

		<?php the_content(); 
		
		// display speaker bio
									
		if ( !empty($speakers) && !is_wp_error($speakers) ) { 
			
			echo '<div class="lgm-speakers">';
			foreach ( $speakers as $speaker ) {
					echo '<div class="lgm-speaker-info">';
					echo '<h4 class="lgm-speaker-name"><a href="'.site_url('/speakers/').$speaker->slug.'/">'.$speaker->name.'</a></h4>'; 
					echo '<p class="lgm-speaker-bio">'.$speaker->description.'</p>';
						// test if speaker has term_meta: key: speaker_url
//						$speaker_url = get_term_meta ( $speaker->ID, 'speaker_url', true );
//						echo '$speaker_url: '.$speaker_url;
					echo '</div>';
			}
			echo '</div>';
		}
		
		?>
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
