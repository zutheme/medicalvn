  (function($) {

    //var revapi24;
    //var tpj = jQuery;
			//*-----------------------owl caouresel Team---------------------------*//	
	$(document).ready(function() {
            $('.testimonial_slider_wrapper .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                responsiveClass: true,
                smartSpeed: 1200,
                navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>'],
                responsive: {
                    0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:3
					}
                }
            })
        })
})(jQuery);

