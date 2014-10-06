jQuery(document).ready(function($) {
    var galleryList = $('#gallery_list');
    
    galleryList.sortable({
        update: function(event, ui) {
            
            opts = {
                url: ajaxurl,
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    action: 'gallery_sort',
                    order: galleryList.sortable('toArray').toString() 
                },
                success: function(response) {
                    return;
                },
                error: function(xhr,textStatus,e) {
                    alert('There was an error saving the update.');
                    return;
                }
            };
            $.ajax(opts);
        }
    });
});