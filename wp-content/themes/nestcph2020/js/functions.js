/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */


( function( $ ) {




 // Do we need this? -- Andy

 /*
	var $body, $window, $sidebar, adminbarOffset, top = false,
	    bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
	    topOffset = 0, bodyHeight, sidebarHeight, resizeTimer;

	// Add dropdown toggle that display child menu items.
	$( '.main-navigation .page_item_has_children > a, .main-navigation .menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

	$( '.dropdown-toggle' ).click( function( e ) {
		var _this = $( this );
		e.preventDefault();
		_this.toggleClass( 'toggle-on' );
		_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
		_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
	} );

	// Enable menu toggle for small screens.
	( function() {
		var secondary = $( '#secondary' ), button, menu, widgets, social;
		if ( ! secondary ) {
			return;
		}

		button = $( '.site-branding' ).find( '.secondary-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if there are no widgets and the menus are missing or empty.
		menu    = secondary.find( '.nav-menu' );
		widgets = secondary.find( '#widget-area' );
		social  = secondary.find( '#social-navigation' );
		if ( ! widgets.length && ! social.length && ( ! menu || ! menu.children().length ) ) {
			button.hide();
			return;
		}

		button.on( 'click.twentyfifteen', function() {
			secondary.toggleClass( 'toggled-on' );
			secondary.trigger( 'resize' );
			$( this ).toggleClass( 'toggled-on' );
		} );
	} )();

	// Sidebar scrolling.
	function resize() {
		windowWidth   = $window.width();
		windowHeight  = $window.height();
		bodyHeight    = $body.height();
		sidebarHeight = $sidebar.height();

		if ( 955 > windowWidth ) {
			top = bottom = false;
			$sidebar.removeAttr( 'style' );
		}
	}

	function scroll() {
		var windowPos = $window.scrollTop();

		if ( 955 > windowWidth ) {
			return;
		}

		if ( sidebarHeight + adminbarOffset > windowHeight ) {
			if ( windowPos > lastWindowPos ) {
				if ( top ) {
					top = false;
					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
				} else if ( ! bottom && windowPos + windowHeight > sidebarHeight + $sidebar.offset().top && sidebarHeight + adminbarOffset < bodyHeight ) {
					bottom = true;
					$sidebar.attr( 'style', 'position: fixed; bottom: 0;' );
				}
			} else if ( windowPos < lastWindowPos ) {
				if ( bottom ) {
					bottom = false;
					topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
					$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
				} else if ( ! top && windowPos + adminbarOffset < $sidebar.offset().top ) {
					top = true;
					$sidebar.attr( 'style', 'position: fixed;' );
				}
			} else {
				top = bottom = false;
				topOffset = ( $sidebar.offset().top > 0 ) ? $sidebar.offset().top - adminbarOffset : 0;
				$sidebar.attr( 'style', 'top: ' + topOffset + 'px;' );
			}
		} else if ( ! top ) {
			top = true;
			$sidebar.attr( 'style', 'position: fixed;' );
		}

		lastWindowPos = windowPos;
	}

	function resizeAndScroll() {
		resize();
		scroll();
	}

	$( document ).ready( function() {
		$body          = $( document.body );
		$window        = $( window );
		$sidebar       = $( '#sidebar' ).first();
		adminbarOffset = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;

		$window
			.on( 'scroll.twentyfifteen', scroll )
			.on( 'resize.twentyfifteen', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( resizeAndScroll, 500 );
			} );
		$sidebar.on( 'click keydown', 'button', resizeAndScroll );

		resizeAndScroll();

		for ( var i = 1; i < 6; i++ ) {
			setTimeout( resizeAndScroll, 100 * i );
		}
	} );
*/

$(document).ready(function(){

  var $window = $( window ),
      $navbar = $( '.site-navigation' ),
      $header = $( '.site-header' ),
      $siteNavigation = $( '.site-navigation' ),
      headerHeight = $header.outerHeight(),
      navbarIsFixed = false;

  $window.scroll(function() {
    var scroll = window.scrollY;
    if (navbarIsFixed === false && scroll >= headerHeight) {
      $navbar.addClass('fixed');
      navbarIsFixed = true;
    } else if (navbarIsFixed === true && scroll <= headerHeight) {
      $navbar.removeClass('fixed');
      navbarIsFixed = false;
    }
  });

  $siteNavigation.on('click', function() {
    $siteNavigation.toggleClass('open');
  });


	// Maps stuff!
	/*var map, styles = [
		{
		  "featureType": "water",
		  "stylers": [
		    { "color": "#b95318" }
		  ]
		},{
		  "featureType": "landscape",
		  "stylers": [
		    { "color": "#ed6c22" }
		  ]
		},{
		  "featureType": "road",
		  "elementType": "geometry",
		  "stylers": [
		    { "color": "#f9a255" }
		  ]
		},{
		  "featureType": "road",
		  "elementType": "labels",
		  "stylers": [
		    { "visibility": "off" }
		  ]
		},{
		  "featureType": "poi",
		  "stylers": [
		    { "visibility": "off" }
		  ]
		},{
		  "featureType": "transit",
		  "elementType": "geometry",
		  "stylers": [
		    { "color": "#f9a255" },
		    { "visibility": "simplified" }
		  ]
		},{
		  "featureType": "transit",
		  "elementType": "labels",
		  "stylers": [
		    { "visibility": "off" }
		  ]
		},{
		  "featureType": "administrative",
		  "elementType": "labels.text.fill",
		  "stylers": [
		    { "color": "#f9a255" }
		  ]
		},{
		  "featureType": "administrative",
		  "elementType": "labels.text.stroke",
		  "stylers": [
		    { "color": "#ed6c22" }
		  ]
		},{
		  "featureType": "administrative",
		  "elementType": "geometry",
		  "stylers": [
		    { "visibility": "off" }
		  ]
		}
	];
	function initialize() {
		var nestCoords = new google.maps.LatLng(55.672942, 12.562943)
		var mapOptions = {
			zoom: 14,
			center: new google.maps.LatLng(55.672942, 12.562943 + 0.025),
			disableDefaultUI: true,
			disableDoubleClickZoom: false,
			draggable: false,
			scrollwheel: false,
			keyboardShortcuts: false,
			styles: styles
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),
				mapOptions);

		var imgSize = 40

		var marker = new google.maps.Marker({
			position: nestCoords,
			map: map,
			title: 'Reventlowsgade 10, Copenhagen',
			icon: {
				url: '/wp-content/themes/nestcopenhagen/images/logosmall.svg',
				size: new google.maps.Size(56.1, 57.3),
				scaledSize: new google.maps.Size(0.98*imgSize, imgSize),
				origin: new google.maps.Point(0,0),
				anchor: new google.maps.Point((0.98*imgSize)/2, imgSize/2)
			}
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);*/
})

} )( jQuery );


