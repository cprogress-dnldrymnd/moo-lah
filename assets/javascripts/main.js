jQuery(document).ready(function($) {
	swiper_slider();
	if(window.innerWidth > 992) {
		sticky_header();
	}
});

var lastScrollTop = 0;
jQuery(window).scroll(function() {    
	var st = jQuery(this).scrollTop();

	if(st > lastScrollTop) {
		jQuery('body.single-medicalconditions').addClass('show-sticky-cta');
		jQuery('.back-top').addClass('display-none');

	} else {
		jQuery('body.single-medicalconditions').removeClass('show-sticky-cta');
	}
	if(st < 300 ) {
		jQuery('.back-top').addClass('display-none');
	} else {
		jQuery('.back-top').removeClass('display-none');
	}
	lastScrollTop = st;
}); 

jQuery(window).resize(function(event) {
	
});

function sticky_header() {
	var header = jQuery('.navbar-wrapper');
	var header_height = header.height();
	var stickySidebar = header.offset().top;
	sticky();

	jQuery(window).scroll(function() {  
		sticky();
	});

	function sticky() {

		if(jQuery('body').hasClass('admin-bar')) {
			var scrollTop = jQuery(window).scrollTop() + 32;
		} else {
			var scrollTop = jQuery(window).scrollTop();
		}

		if (scrollTop > stickySidebar) {
			header.addClass('fixed-header');
		}
		else {
			header.removeClass('fixed-header');
		} 
	}

}
function swiper_slider() {
	const swiper_testimonial = new Swiper('.swiper-testimonial', {
  		// Optional parameters
  		direction: 'horizontal',
  		preventInteractionOnTransition: true,
  		loop: true,
  		slidesPerView: 2,
  		spaceBetween: 45,
  		autoHeight: true,
  		autoplay: {
  			delay: 3000,
  			disableOnInteraction: true,
  		},
  		breakpoints: {
  			0: {
  				slidesPerView: 1,
  			},
  			481: {
  				slidesPerView: 1,
  				spaceBetween: 15,
  			},
  			768: {
  				slidesPerView: 2,
  				spaceBetween: 45,
  			},
  		},
  		navigation: {
  			nextEl: ".swiper-button-next",
  		},

  	});

	const changin_text = new Swiper('.changing-text', {
  		// Optional parameters
  		preventInteractionOnTransition: true,
  		loop: true,
  		slidesPerView: 1,
  		spaceBetween: 0,
  		autoHeight: true,
  		simulateTouch: false,
  		direction: "vertical",
  		speed: 1000,
  		autoplay: {
  			delay: 3000,
  			disableOnInteraction: false,
  		},

  	});


	const swiper_info_slider = new Swiper('.swiper-info-slider', {
  		// Optional parameters
  		direction: 'horizontal',
  		preventInteractionOnTransition: true,
  		loop: true,
  		slidesPerView: 2,
  		spaceBetween: 50,
  		autoHeight: true,
  		autoplay: {
  			delay: 3000,
  			disableOnInteraction: true,
  		},
  		breakpoints: {
  			0: {
  				slidesPerView: 1,
  			},
  			768: {
  				slidesPerView: 2,
  				spaceBetween: 50,
  			},
  			992: {
  				slidesPerView: 3,
  				spaceBetween: 50,
  			},
  		},
  		navigation: {
  			nextEl: ".swiper-button-next",
  		},

  	});

	const swiper_logo_slider = new Swiper('.swiper-logo-slider', {
  		// Optional parameters
  		direction: 'horizontal',
  		preventInteractionOnTransition: true,
  		loop: true,
  		slidesPerView: 7,
  		spaceBetween: 0,
  		autoHeight: true,
  		autoplay: {
  			delay: 3000,
  			disableOnInteraction: true,
  		},
  		breakpoints: {
  			0: {
  				slidesPerView: 2,
  			},
  			481: {
  				slidesPerView: 3,
  			},
  			768: {
  				slidesPerView: 4,
  			},
  			992: {
  				slidesPerView: 5,
  			},
  			1025: {
  				slidesPerView: 6,
  			},
  			1200: {
  				slidesPerView: 7,
  			},
  		},

  	});
	
}

document.addEventListener("DOMContentLoaded", function(){
	if (window.innerWidth > 992) {

		document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

			everyitem.addEventListener('mouseover', function(e){

				let el_link = this.querySelector('a[data-bs-toggle]');

				if(el_link != null){
					let nextEl = el_link.nextElementSibling;
					el_link.classList.add('show');
					nextEl.classList.add('show');
				}

			});
			everyitem.addEventListener('mouseleave', function(e){
				let el_link = this.querySelector('a[data-bs-toggle]');

				if(el_link != null){
					let nextEl = el_link.nextElementSibling;
					el_link.classList.remove('show');
					nextEl.classList.remove('show');
				}


			})
		});

	}
}); 

var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1),
	sURLVariables = sPageURL.split('&'),
	sParameterName,
	i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
		}
	}
};
