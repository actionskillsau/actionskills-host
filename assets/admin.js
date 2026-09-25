/* ActionSkills Host – accessible tabs */
( function () {
	var list = document.querySelector( '.actionskills-host-tabs' );
	if ( ! list ) {
		return;
	}

	var tabs = Array.prototype.slice.call( list.querySelectorAll( '[role="tab"]' ) );

	function select( tab, focus ) {
		tabs.forEach( function ( t ) {
			var on = t === tab;
			t.setAttribute( 'aria-selected', on ? 'true' : 'false' );
			t.tabIndex = on ? 0 : -1;
			document.getElementById( t.getAttribute( 'aria-controls' ) ).hidden = ! on;
		} );
		if ( focus ) {
			tab.focus();
		}
	}

	list.addEventListener( 'click', function ( e ) {
		var tab = e.target.closest( '[role="tab"]' );
		if ( tab ) {
			select( tab, false );
		}
	} );

	list.addEventListener( 'keydown', function ( e ) {
		var i = tabs.indexOf( document.activeElement );
		if ( i < 0 ) {
			return;
		}
		var next = null;
		if ( 'ArrowRight' === e.key ) {
			next = tabs[ ( i + 1 ) % tabs.length ];
		} else if ( 'ArrowLeft' === e.key ) {
			next = tabs[ ( i - 1 + tabs.length ) % tabs.length ];
		} else if ( 'Home' === e.key ) {
			next = tabs[ 0 ];
		} else if ( 'End' === e.key ) {
			next = tabs[ tabs.length - 1 ];
		}
		if ( next ) {
			e.preventDefault();
			select( next, true );
		}
	} );
} )();
