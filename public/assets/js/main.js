// side navigation
function openNav() {
  document.getElementById("mySidenav").style.height = "100%";
}
function closeNav() {
  document.getElementById("mySidenav").style.height = "0";
}
$( function() {
    $( "#datepicker" ).datepicker();
  } );
$(document).ready(function() {
     // select dropdown
    $('select:not(.ignore)').niceSelect();
    //   destination scroll
    $(".destinations").owlCarousel({
        autoplay:true,
        autoPlay : 5000,
        autoplayHoverPause:true, 
        navigation:true,
        stopOnHover : false, 
        items : 3,
        loop:true,
        pagination:true,
        margin:10,  
        lazyLoad : true,
        navigation : true,
        responsive:{
            1200:{
                items:3,
            },
            991:{
                items:2,
            },
            769:{
                items:1,
            },
            0:{
                items:1,
            }
        }
    });
    //   visa scroll
    $(".visa-scroll").owlCarousel({
        autoplay:true,
        autoPlay : 5000,
        autoplayHoverPause:true, 
        navigation:true,
        stopOnHover : false, 
        items : 4,
        loop:true,
        pagination:true,
        margin:10,  
        lazyLoad : true,
        navigation : true,
        responsive:{
            1200:{
                items:4,
            },
            991:{
                items:3,
            },
            769:{
                items:2,
            },
            0:{
                items:1,
            }
        }
    });
    $(".testimonial-scroll").owlCarousel({
        autoplay:true,
        autoPlay : 5000,
        autoplayHoverPause:true, 
        navigation:true,
        stopOnHover : false, 
        items : 3,
        loop:true,
        pagination:true,
        margin:10,  
        lazyLoad : true,
        navigation : true,
        responsive:{
            1200:{
                items:3,
            },
            991:{
                items:2,
            },
            769:{
                items:1,
            },
            0:{
                items:1,
            }
        }
    });
    $(".blog-scroll").owlCarousel({
        autoplay:true,
        autoPlay : 5000,
        autoplayHoverPause:true, 
        navigation:true,
        stopOnHover : false, 
        items : 3,
        loop:true,
        pagination:true,
        margin:10,  
        lazyLoad : true,
        navigation : true,
        responsive:{
            1200:{
                items:3,
            },
            991:{
                items:2,
            },
            769:{
                items:1,
            },
            0:{
                items:1,
            }
        }
    });
    var progressPath = document.querySelector('.progress-wrap path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		$(window).scroll(updateProgress);
		var offset = 50;
		var duration = 0;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.progress-wrap').addClass('active-progress');
			} else {
				jQuery('.progress-wrap').removeClass('active-progress');
			}
		});
		jQuery('.progress-wrap').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
        // This button will increment the value
    $('[data-quantity="plus"]').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
     
   
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "thumbs",
    "zoom",
    "fullScreen",
    "share",
    "close"
  ],
  loop: false,
  protect: true
});
   
}); 



AOS.init();
