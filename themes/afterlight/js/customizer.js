/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );

				$( '.site-title a, .site-description' ).css( {
					'color': to,
				} );
			}
		} );
	} );

	// Background Image.
	wp.customize( 'background_image', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '<style>body.full-page-background:before { display: none; }</style>' ).appendTo( 'head' );
			} else {
				$( '<style>body.full-page-background:before { background-image: url("' + to + '"); display: block; }</style>' ).appendTo( 'head' );
			}
		} );
	} );

	// Background Overlay.
	wp.customize( 'afterlight_background_overlay', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( 'body' ).addClass( 'has-overlay' );
			} else {
				$( 'body' ).removeClass( 'has-overlay' );
			}
		} );
	} );

	// Full-Page Background.
	wp.customize( 'afterlight_full_page_background', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$( 'body' ).addClass( 'full-page-background' );
			} else {
				$( 'body' ).removeClass( 'full-page-background' );
			}
		} );
	} );
} )( jQuery );
