<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Afterlight
 */

if ( ! function_exists( 'afterlight_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since Afterlight 1.0
 */
function afterlight_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'afterlight' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'afterlight' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'afterlight' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'afterlight_entry_date' ) ) :
/**
 * Prints HTML with meta information for the post date.
 *
 * @since Afterlight 1.0
 */
function afterlight_entry_date() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'afterlight' ) );
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'afterlight' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
}
endif;

if ( ! function_exists( 'afterlight_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Afterlight 1.0
 */
function afterlight_entry_meta() {
	if ( 'post' == get_post_type() ) {
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'afterlight' ) );
		if ( $categories_list && afterlight_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'afterlight' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'afterlight' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'afterlight' ),
				$tags_list
			);
		}
	}

	if ( 'jetpack-portfolio' == get_post_type() ) {
		global $post;

		$project_types_list = get_the_term_list( $post->ID, 'jetpack-portfolio-type', '', _x( ', ', 'Used between list items, there is a space after the comma.', 'afterlight' ), '' );
		if ( $project_types_list ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Project Types', 'Used before project type names.', 'afterlight' ),
				$project_types_list
			);
		}

		$project_tag_list = get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '', _x( ', ', 'Used between list items, there is a space after the comma.', 'afterlight' ), '' );
		if ( $project_tag_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Project Tags', 'Used before project tag names.', 'afterlight' ),
				$project_tag_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			_x( 'Full size', 'Used before full size attachment link.', 'afterlight' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'afterlight' ), __( '1 Comment', 'afterlight' ), __( '% Comments', 'afterlight' ) );
		echo '</span>';
	}

}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @since Afterlight 1.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function afterlight_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'afterlight_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'afterlight_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so afterlight_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so afterlight_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in {@see afterlight_categorized_blog()}.
 *
 * @since Afterlight 1.0
 */
function afterlight_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'afterlight_categories' );
}
add_action( 'edit_category', 'afterlight_category_transient_flusher' );
add_action( 'save_post',     'afterlight_category_transient_flusher' );


if ( ! function_exists( 'afterlight_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since Afterlight 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function afterlight_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'afterlight' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'afterlight_excerpt_more' );
endif;

if ( ! function_exists( 'afterlight_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Afterlight 1.0
 */
function afterlight_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;
