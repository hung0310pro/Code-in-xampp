$(document).ready(function(){
	// menu-responsive
    
	$(".open-menu").click(function(){
		$("#myNav").css("width","100%");
	});

	$("#closemenu").click(function(){
		$("#myNav").css("width","0%");
	});


	// slider1

	$(".icon_nav").click(function(){
		$(".menu_responsive").css("width","300px");
	});
	$(".closebtn").click(function(){
		$(".menu_responsive").css("width","0px");
	});

	$('.sliderall').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:false,
	    items:1,
	    autoHeight:true,
	    
	})
	var owl1 = $('.sliderall');
	owl1.owlCarousel();
	// Go to the next item
	$('.slider1-prev').click(function() {
	    owl1.trigger('next.owl.carousel');
	});
	// Go to the previous item
	$('.slider1-next').click(function() {
	    owl1.trigger('prev.owl.carousel', [300]);
	});


	$('.slider2').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:false,
	    items:1,
	    autoHeight:true,
	    
	})
	var owl = $('.slider2');
	owl.owlCarousel();
	// Go to the next item
	$('.slider2-prev').click(function() {
	    owl.trigger('next.owl.carousel');
	});
	// Go to the previous item
	$('.slider2-next').click(function() {
	    owl.trigger('prev.owl.carousel', [300]);
	});


     // slider brands
	var owl2 = $('.brandslider');
	owl2.owlCarousel({
	    responsive:{
	        0:{
	            items:2
	        },
	        576:{
	            items:3
	        },
	        1000:{
	            items:4
	        },
	        1200:{
	            items:6
	        }
	    },
	    
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:1000,
	    autoplayHoverPause:false
	   
	});

});
