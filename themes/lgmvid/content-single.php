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
	if( have_rows('talk_video_elsewhere_list') ):
	
	    while ( have_rows('talk_video_elsewhere_list') ) : the_row();
	
	        $lgm_video_src = get_sub_field('talk_video_elsewhere_url');
	        
	        echo do_shortcode( '[video src="'.$lgm_video_src.'"]' );
	        	
	    endwhile;
	
	else :
	endif;
	
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
