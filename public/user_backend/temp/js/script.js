// some scripts


// jquery ready start
$(document).ready(function() {
	// jQuery code
	
	// Bootstrap tooltip
	$("[data-toggle='tooltip']").tooltip();
	
	// Bootstrap popover
	$('[data-toggle="popover"]').popover({
	html: true,
    trigger: 'hover',
    placement: 'top',
		content: function() {
			return $(this).html();
		}
	});
	
	// fancybox
	$('.fancybox').fancybox();

	$(".fancybox-form").fancybox({
		maxWidth	: 400,
		'overlayShow'		: true,
		'autoScale'			: false,
		openEffect	: 'elastic',
    	closeEffect	: 'elastic',
		helpers : {
			title	: { type : 'inside' },
			overlay : {	css : {'background' : 'rgba(0,0,0,.5)'}	}
		}
	});	
	
	
		// close action
	$(".btn-close").click(function (e) {
		e.preventDefault();
		$(this).parent().fadeOut("normal");
	});
	

	
		
	
	
	//flex slider
	
	$('.flexslider-container .flexslider').flexslider({
	controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
	directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
	slideshow: true,                //Boolean: Animate slider automatically
	slideshowSpeed: 3000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationSpeed: 600       
	});
	
	$('.slide-top .flexslider').flexslider({
	
	controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
	directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
	prevText: "Previous",           //String: Set the text for the "previous" directionNav item
	nextText: "Next",            //String: Set the text for the "next" directionNav item
	slideshow: true,                //Boolean: Animate slider automatically
	slideshowSpeed: 3000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationSpeed: 600       
	});
	
	
	$('.slide-top-full .flexslider').flexslider({
	controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
	directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
	prevText: "",           //String: Set the text for the "previous" directionNav item
	nextText: "",            //String: Set the text for the "next" directionNav item
	slideshow: true,                //Boolean: Animate slider automatically
	slideshowSpeed: 3000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationSpeed: 600       
	});
	
	
	$('.slide-items-top > .flexslider').flexslider({
	animation: "slide",             
	directionNav: true, 
	controlNav: false,        	//Boolean: Create navigation for previous/next navigation? (true/false)
	prevText: "",           //String: Set the text for the "previous" directionNav item
	nextText: "",            //String: Set the text for the "next" directionNav item
	minItems: 1,
	maxItems: 5,
	itemWidth: 200,
	slideshowSpeed: 4000, 
	animationLoop: true,         
	animationSpeed: 600       
	});
	
	
	$('.slide-items > .flexslider').flexslider({
	 animation: "slide",
	controlNav: true,               
	directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
	prevText: "Previous",           //String: Set the text for the "previous" directionNav item
	nextText: "Next",            //String: Set the text for the "next" directionNav item
	minItems: 3,
	maxItems: 4,
	itemWidth: 200,
	slideshowSpeed: 4000, 
	animationLoop: true,         
	animationSpeed: 600       
	});

	$('.slide-items2 > .flexslider').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 190,
	itemMargin: 5,
	controlNav: true, 
	minItems: 3,
	maxItems: 5,
  });
  

	
	//scroll top
	  var scroll_btn = $("a[href='#top']");
	  scroll_btn.hide();
		$(window).scroll(function(){
			if ($(this).scrollTop() > 500) {
				scroll_btn.fadeIn();
			} else {
				scroll_btn.fadeOut();
			}
	   });
	  scroll_btn.click(function () {
			$("html, body").animate({ scrollTop: 0 }, "slow");               
			return false;
		});
		
}); 
// jquery end