jQuery(window).ready(function() {

	/*-----------------------------------------------------------------------------------*/
	/*	Superfish Settings - http://users.tpg.com.au/j_birch/plugins/superfish/
	/*-----------------------------------------------------------------------------------*/
	
	if( jQuery().superfish ) {
	    jQuery(function() {	
			jQuery('#header nav ul').superfish({
				delay: 0,
				animation: {opacity:'show',height:'show'},
				speed: 'medium',
				autoArrows: true,
				dropShadows: false
			});
		});
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Responsive Videos - avec FitVids.js
	/*-----------------------------------------------------------------------------------*/
	
	if( jQuery().fitVids ) {
		jQuery(function() {	
			jQuery('#content').fitVids();
		});
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Responsive Menu
	/*-----------------------------------------------------------------------------------*/
	
	jQuery('.tj-header-menu').clone().appendTo('#tj-mobile-menu');
	jQuery(function() {
		jQuery('.tj-mobile-menu').click(function() {			
			jQuery('#tj-mobile-menu').slideToggle();
			
			jQuery('html, body').animate({
				scrollTop: 0
			});
		  	return false;
		});
	});
	
	/*-----------------------------------------------------------------------------------*/
	/*	Gallery Filter
	/*-----------------------------------------------------------------------------------*/
	
	if( jQuery().isotope ) {
		jQuery(function() {
	        var container = jQuery('.isotope'),
	            optionFilter = jQuery('#sort-by'),
	            optionFilterLinks = optionFilter.find('a');
	        	optionFilterLinks.attr('href', '#');
	        	optionFilterLinks.click(function(){
	        
	        var selector = jQuery(this).attr('data-filter');
	            container.isotope({ 
	                filter : '.' + selector, 
	                itemSelector : '.isotope-item',
	                layoutMode : 'fitRows',
	                animationEngine : 'best-available'
	                
	            });
	            
	            optionFilterLinks.removeClass('active');
	            jQuery(this).addClass('active');
	            return false;
	        });
	    });
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Sticky Header
	/*-----------------------------------------------------------------------------------*/
	
    var tjstickthatHeader = jQuery('.header-wrap');

    jQuery(window).scroll(function() {
        if( tjstickthatHeader.offset().top > 100 ) {
            tjstickthatHeader.addClass('sticky')
        } else {
            tjstickthatHeader.removeClass('sticky')
        }
    });
    doResize();
    jQuery(window).on('resize', doResize);
});

/*-----------------------------------------------------------------------------------*/
/*	Dynamic Header Height As Browser Sizes Changes
/*-----------------------------------------------------------------------------------*/

function doResize() {
	var headerHeight = jQuery('.header-wrap').outerHeight();
	
	if ( headerHeight ) {
		jQuery('#tj-mobile-menu nav').css('margin-top', headerHeight);
	}
}