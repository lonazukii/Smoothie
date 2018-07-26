
(function($){
$(window).scroll(function() {
    
});

$(document).ready(function(){
	// if (jQuery('ul#primary-menu li').hasClass('active')) {
	// 	jQuery('ul li.active a').append('<span class="underline_dash"> </span>');
	// }else{
	// }

	

	$('.menu').owlCarousel({
		
		dots:true,
		loop:true,
    	margin:10,
    	responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
	});

});
})(jQuery)