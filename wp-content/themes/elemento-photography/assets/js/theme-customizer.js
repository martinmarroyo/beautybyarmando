(function( $ ) {
	"use strict";

	// Home Top Background Image - Image Control
	wp.customize( 'bg_image_3', function( value ) {
		value.bind( function( to ) {
			$( '.about-row' ).css( 'background-image', 'url( ' + to + ')' );
		} );
	});


})( jQuery );


(function( $ ) {
	"use strict";

	// Home Top Background Image - Image Control
	wp.customize( 'bg_image_4', function( value ) {
		value.bind( function( to ) {
			$( '.full-wd' ).css( 'background-image', 'url( ' + to + ')' );
		} );
	});


})( jQuery );