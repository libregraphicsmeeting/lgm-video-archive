/**
 * Theme Customizer enhancements for a better user experience in the background option.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Background color.
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( {
				'background-color': to,
			} );

			$( 'mark, ins, .widget_calendar tbody a' ).css( {
				'color': to,
			} );

			$( '<style>.widget_calendar tbody a:hover, .widget_calendar tbody a:focus { background-color:' + to + '; color: #fff !important; }</style>' ).appendTo( 'head' );

			$( '<style>button:hover, button:focus, button:active, input[type="button"]:hover, input[type="button"]:focus, input[type="button"]:active, input[type="reset"]:hover, input[type="reset"]:focus, input[type="reset"]:active, input[type="submit"]:hover, input[type="submit"]:focus, input[type="submit"]:active, .site-header .nav-menu li:hover, .site-header .nav-menu li:focus, .pagination .prev:hover, .pagination .prev:focus, .pagination .next:hover, .pagination .next:focus, .page-links a:hover, .page-links a:focus, #infinite-handle span:hover, #infinite-handle span:focus, .comment-reply-link:hover, .comment-reply-link:focus { color:' + to + '; }</style>' ).appendTo( 'head' );

			$( '<style>@media screen and (min-width: 52.0625em) { .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover { color:' + to + '; } }</style>' ).appendTo( 'head' );
		} );
	} );
} )( jQuery );
