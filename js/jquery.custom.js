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
	
});