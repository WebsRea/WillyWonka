(function ($) {
			$( ".gmap-btn" ).click(function(){
				$( "#map-btn1" ).toggleClass( "btn-show", "btn-hide", 1000 );
				$( "#map-btn1" ).toggleClass( "btn-hide", "btn-show", 1000 );
				$( "#map-btn2" ).toggleClass( "btn-hide", "btn-show", 1000 );
				$( "#map-btn2" ).toggleClass( "btn-show", "btn-hide", 1000 );
				$( "#map-btn2" ).toggleClass( "close-map-button", "open-map-button", 1000 );
				$( "#map-btn2" ).toggleClass( "open-map-button", "close-map-button", 1000 );
				$( "#map" ).toggleClass( "close-map", "open-map", 1000 );
				$( "#map" ).toggleClass( "open-map", "close-map", 1000 );
				return false;
			});

			var folsom = new google.maps.LatLng(42.698162, 0.794008);
			var markerposition = new google.maps.LatLng(42.698162, 0.794008);

			var marker;
			var map;

			function initialize() {
			  var mapOptions = {
				zoom: 15,
				center: folsom, 
				panControl: false, 
			  };

			  map = new google.maps.Map(document.getElementById('google-map'),
					  mapOptions);

			  marker = new google.maps.Marker({
				map:map,
				draggable:false,
				animation: google.maps.Animation.DROP,
				position: markerposition
			  });
			  google.maps.event.addListener(marker, 'click', toggleBounce);
			}

			function toggleBounce() {



			  if (marker.getAnimation() != null) {
				marker.setAnimation(null);
			  } else {
				marker.setAnimation(google.maps.Animation.BOUNCE);
			  }
			}

			google.maps.event.addDomListener(window, 'load', initialize);
	
})(jQuery);