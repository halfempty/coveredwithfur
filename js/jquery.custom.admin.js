/*-----------------------------------------------------------------------------------

 	Call post meta boxes as needed
 
-----------------------------------------------------------------------------------*/
 
jQuery(document).ready(function() {
    
/*----------------------------------------------------------------------------------*/
/*	Portfolio Custom Fields Hide/Show
/*----------------------------------------------------------------------------------*/

    var galleryTypeTrigger = jQuery('#tj_gallery_type'),
        galleryImage = jQuery('#tj-meta-box-gallery-image'),
        galleryVideo = jQuery('#tj-meta-box-gallery-video'),
        galleryAudio = jQuery('#tj-meta-box-gallery-audio');
        currentType = galleryTypeTrigger.val();
        
    tjSwitchPortfolio(currentType);

    galleryTypeTrigger.change( function() {
       currentType = jQuery(this).val();
       
       tjSwitchPortfolio(currentType);
    });
    
    function tjSwitchPortfolio(currentType) {
        if( currentType === 'Audio' ) {
            tjHideAllPortfolio(galleryAudio);
        } else if( currentType === 'Video' ) {
            tjHideAllPortfolio(galleryVideo);
        } else {
            tjHideAllPortfolio(galleryImage);
        }
    }
    
    function tjHideAllPortfolio(notThisOne) {
		galleryImage.css('display', 'none');
		galleryVideo.css('display', 'none');
		galleryAudio.css('display', 'none');
		notThisOne.css('display', 'block');
	}


/*----------------------------------------------------------------------------------*/
/*	Quote Options
/*----------------------------------------------------------------------------------*/

	var quoteOptions = jQuery('#tj-meta-box-quote');
	var quoteTrigger = jQuery('#post-format-quote');
	
	quoteOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Image Options
/*----------------------------------------------------------------------------------*/

	var imageOptions = jQuery('#tj-meta-box-image');
	var imageTrigger = jQuery('#post-format-image');
	
	imageOptions.css('display', 'none');


/*----------------------------------------------------------------------------------*/
/*	Link Options
/*----------------------------------------------------------------------------------*/

	var linkOptions = jQuery('#tj-meta-box-link');
	var linkTrigger = jQuery('#post-format-link');
	
	linkOptions.css('display', 'none');
	
/*----------------------------------------------------------------------------------*/
/*	Audio Options
/*----------------------------------------------------------------------------------*/

	var audioOptions = jQuery('#tj-meta-box-audio');
	var audioTrigger = jQuery('#post-format-audio');
	
	audioOptions.css('display', 'none');
	
/*----------------------------------------------------------------------------------*/
/*	Video Options
/*----------------------------------------------------------------------------------*/

	var videoOptions = jQuery('#tj-meta-box-video');
	var videoTrigger = jQuery('#post-format-video');
	
	videoOptions.css('display', 'none');

/*----------------------------------------------------------------------------------*/
/*	Compute It
/*----------------------------------------------------------------------------------*/

	var group = jQuery('#post-formats-select input');

	
	group.change( function() {
		
		if(jQuery(this).val() == 'quote') {
			quoteOptions.css('display', 'block');
			tjHideAll(quoteOptions);
			
		} else if(jQuery(this).val() == 'link') {
			linkOptions.css('display', 'block');
			tjHideAll(linkOptions);
			
		} else if(jQuery(this).val() == 'audio') {
			audioOptions.css('display', 'block');
			tjHideAll(audioOptions);
			
		} else if(jQuery(this).val() == 'video') {
			videoOptions.css('display', 'block');
			tjHideAll(videoOptions);
			
		} else if(jQuery(this).val() == 'image') {
			imageOptions.css('display', 'block');
			tjHideAll(imageOptions);
			
		} else {
			quoteOptions.css('display', 'none');
			videoOptions.css('display', 'none');
			linkOptions.css('display', 'none');
			audioOptions.css('display', 'none');
			imageOptions.css('display', 'none');
		}
		
	});
	
	if(quoteTrigger.is(':checked'))
		quoteOptions.css('display', 'block');
		
	if(linkTrigger.is(':checked'))
		linkOptions.css('display', 'block');
		
	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');
		
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');
		
	if(imageTrigger.is(':checked'))
		imageOptions.css('display', 'block');
		
	function tjHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		audioOptions.css('display', 'none');
		imageOptions.css('display', 'none');
		notThisOne.css('display', 'block');
	}

});