
//Owl Slider v1
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
		980:{
            items:5,
            nav:false
        },
        1000:{
            items:6,
            nav:true,
            loop:false
        }
    }
});
$(document).ready(function($) {     
     $("#areas-exp2").owlCarousel({
autoPlay : 3000,
    stopOnHover : true}
);
      var owl = $("#areas-exp2");
       // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
});


//Nice Scroll
$("html").niceScroll({ 
	styler: "fb", 
	cursorcolor: "#090A45", 
	cursorwidth: '10', 
	cursorborderradius: '0px', 
	background: '#e2e2e2', 
	cursorborder: '', 
	zindex: '20010' 
	});

//End Nice Scroll

     

