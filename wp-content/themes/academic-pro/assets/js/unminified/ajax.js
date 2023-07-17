jQuery(document).ready(function($) {
var pageNumber = 1;
var $container = $('#portfolio-gallery .portfolio');

function academic_pro_load_posts(){
   pageNumber++;

    $.ajax({
       type: "POST",
       dataType: "html",
       url: academic_pro.ajaxurl,
       data: {action: 'academic_pro_ajax_handler',
           pageNumber: pageNumber,
       },
       success: function(data){
           if( data.length > 0 ){
               $container.isotope('destroy');
               $container.append(data).isotope({
                   resizable: true,
                   itemSelector: '.portfolio-item',
                   layoutMode : 'packery',
                   gutter: 0
               });
               $container.packery('reloadItems');
               $container.packery('layout');
               $("#loadmore").removeClass("hide");
           } else {
               $("#loadmore").addClass("hide");
           }
       },
       error : function(jqXHR, textStatus, errorThrown) {
           $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
       }

   });
   return false;
}

$("#loadmore").removeAttr("href");
$("#loadmore").click(function(){ // When btn is pressed.
   $("#loadmore").addClass("hide");
   academic_pro_load_posts();
});

});
