(function($) {

	function closeSearch(first) {

		$( ".searchbox" ).slideToggle( "fast", function() {
			$('.searchtoggle').removeClass('active');
		  });

	}

	function openSearch() {

		$( ".searchbox" ).slideToggle( "fast", function() {
		    // Animation complete.
		  });

		$('.searchtoggle').addClass('active');

	}

	$(document).ready(function() {

		$('.flexslider').flexslider({
			'animation' : 'slide',
			'slideshow' : false
		});


		// Prevent search submission of default value
		$('#searchform').submit(function(e){
		    if ( $("#search_input").val() == "Search here...") {
				return false;
		    }
		});


		$('li.searchtoggle a').on('click', function( event ){
			event.preventDefault();
			if ( $(this).parent().hasClass('active') ) {
				closeSearch();
			} else {
				openSearch();
			}
		});

		$('.closesearch').on('click', function( event ) {
			event.preventDefault();
			closeSearch();
		});

	});

})(jQuery);