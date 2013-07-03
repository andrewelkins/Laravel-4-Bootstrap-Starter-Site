/* JS */


/* Recent posts carousel */


$(window).load(function(){
  $('.rps-carousel').carouFredSel({
  	responsive: true,
  	width: '100%',
  	pauseOnHover : true,
  	auto : false,
  	circular	: true,
  	infinite	: false,
  	prev : {
  		button	: "#car_prev",
  		key		: "left"
  	},
  	next : {
  		button	: "#car_next",
  		key		: "right"
  	},
  	swipe: {
  		onMouse: true,
  		onTouch: true
  	},
  	items: {
  		visible: {
  			min: 1,
  			max: 4
  		}
  	}
  }); 
});

/* Parallax Slider */
  $(function() {
    $('#da-slider').cslider({
      autoplay  : true,
      interval : 8000
    });
  });


/* Flex image slider */


   $('.flex-image').flexslider({
      direction: "vertical",
      controlNav: false,
      directionNav: true,
      pauseOnHover: true,
      slideshowSpeed: 10000      
   });

/* Refind slider */

    $('#rs-slider').refineSlide({
        transition : 'random'
    });

/* Testimonial slider */


   $('.testi-flex').flexslider({
      direction: "vertical",
      controlNav: true,
      directionNav: false,
      pauseOnHover: true,
      slideshowSpeed: 8000      
   });

/* About slider */


   $('.about-flex').flexslider({
      direction: "vertical",
      controlNav: true,
      directionNav: false,
      pauseOnHover: true,
      slideshowSpeed: 8000      
   });


/* Support */

$("#slist a").click(function(e){
   e.preventDefault();
   $(this).next('p').toggle(200);
});

/* Tooltip */

$('#price-tip1').tooltip();

/* Scroll to Top */

$(document).ready(function(){
  $(".totop").hide();

  $(function(){
    $(window).scroll(function(){
      if ($(this).scrollTop()>600)
      {
        $('.totop').slideDown();
      } 
      else
      {
        $('.totop').slideUp();
      }
    });

    $('.totop a').click(function (e) {
      e.preventDefault();
      $('body,html').animate({scrollTop: 0}, 500);
    });

  });
});


/* Portfolio filter */

/* Isotype */

// cache container
var $container = $('#portfolio');
// initialize isotope
$container.isotope();

// filter items when filter link is clicked
$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});

/* Pretty Photo for Gallery*/

jQuery(".prettyphoto").prettyPhoto({
overlay_gallery: false, social_tools: false
});