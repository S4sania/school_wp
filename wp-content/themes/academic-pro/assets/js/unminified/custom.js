( function( $ ) {
$(document).ready(function(){


/*------------------------------------------------
                BODY
------------------------------------------------*/

  $('body').css({"display":"block"});

/*------------------------------------------------
                END BODY
------------------------------------------------*/

/*------------------------------------------------
                SIDR MENU
------------------------------------------------*/

$('#sidr-left-top-button').sidr({
    name: 'sidr-left-top',
    timing: 'ease-in-out',
    speed: 500,
    side: 'left',
    source: '.left'
});

/*------------------------------------------------
                END SIDR MENU
------------------------------------------------*/

/*------------------------------------------------
                PRELOADER
------------------------------------------------*/

 $('#loader').fadeOut();
 $('#loader-container').fadeOut();

/*------------------------------------------------
                END PRELOADER
------------------------------------------------*/

/*------------------------------------------------
                MENU ACTIVE
------------------------------------------------*/

$('.main-navigation ul li').click(function(){
    $('.main-navigation ul li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
});

$('.topbar-toggle').click(function(){
    $('#top-bar').toggleClass('open-topbar');
});

/*------------------------------------------------
                END MENU ACTIVE
------------------------------------------------*/

$(".search-btn").click(function(){
    $("#search").slideDown("slow");

});

$("#close-search").click(function(){
    $("#search").slideUp("slow");
});
/*------------------------------------------------
                END STICKY HEADER
------------------------------------------------*/

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

 $(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
    $('.backtotop').css({bottom:"25px"});
    } else {
    $('.backtotop').css({bottom:"-100px"});
    }
    });
    $('.backtotop').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
});
/*------------------------------------------------
                END BACK TO TOP
------------------------------------------------*/

/*------------------------------------------------
                SLICK SLIDER
------------------------------------------------*/

var slider_effect = $('#main-slider .regular').data('effect');
$('#main-slider .regular').slick({
    cssEase: slider_effect
});

$("#recent-courses-slider .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#recent-news .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#popular-courses .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 421,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#upcoming-events .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$("#our-partners .regular").slick({
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 421,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});

$("#testimonial-slider .regular").slick({
    fade: true,
    cssEase: 'linear',
    customPaging : function(slider, i) {
        var thumb = $(slider.$slides[i]).data('thumb');
        return '<a><img src="'+thumb+'"></a>';
    },
    responsive: [
    {
      breakpoint: 601,
      settings: {
        dots: false
      }
    }
  ]
});

$("#testimonial-slider .slick-dots").insertAfter('#testimonial-slider .testimonial-contents-wrapper');
$("#testimonial-slider button.slick-prev").insertBefore('#testimonial-slider .slick-dots');
$("#testimonial-slider button.slick-next").insertAfter('#testimonial-slider .slick-dots');

if ($(window).width() < 615 )
{
    $("#testimonial-slider button.slick-prev").insertBefore("#testimonial-slider button.slick-next");
}

/*------------------------------------------------
                END SLICK SLIDER
------------------------------------------------*/

/*------------------------------------------------
                BUTTON EFFECT
------------------------------------------------*/
$('.btn-js').each( function() {
  var btnText = $(this).html();
  $(this).append( '<span class="btn-show"><span class="btn-text">' + btnText + '</span></span>\
  <span class="btn-hide"><span class="btn-text">' + btnText + '</span></span>' );
});


/*------------------------------------------------
                GALLERY PORTFOLIO
------------------------------------------------*/

var $container = $('#portfolio-gallery .portfolio');

$container.packery({
 itemSelector: '.portfolio-item'
});

               
$('nav.portfolio-filter ul a').on('click', function() {
   var selector = $(this).attr('data-filter');
   $container.isotope({ filter: selector });
   $('nav.portfolio-filter ul li').removeClass('active');
   $(this).parent().addClass('active');
   return false;
});

packery = function () {
   $container.isotope({
       resizable: true,
       itemSelector: '.portfolio-item',
       layoutMode : 'packery',
       gutter: 0
   });
};
packery();

$('.gallery .gallery-item .gallery-icon a').attr('data-lightbox', 'masonry');

/*------------------------------------------------
                END GALLERY PORTFOLIO
------------------------------------------------*/

/*------------------------------------------------
                TABS
------------------------------------------------*/
$('ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('active');
    $('.tab-content').removeClass('active');

    $(this).addClass('active');
    $("#"+tab_id).addClass('active');
});

/*------------------------------------------------
                END TABS
------------------------------------------------*/

});

/*------------------------------------------------
            END JQUERY
------------------------------------------------*/
} )( jQuery );



