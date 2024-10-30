/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2013
 * 
 * Trigger Flexslider plugin.
 */
jQuery(window).load(function () {      	
    	jQuery('.mode-7 .flexslider').flexslider({    	  
       animation: "slide",        
       animationLoop: true,
	   slideshow:true,       
       itemWidth: 210,
       itemMargin:5       
      });      
   
   	  jQuery('.mode-8 .flexslider').flexslider({
       animation: "slide",
	   animationLoop: true,
       slideshow:true    	
      });
      
   	 jQuery('.mode-9 .flexslider').flexslider({
         animation: "slide",
         controlNav: "thumbnails"
   	 });
   	 
   	 jQuery('.mode-10-nav .flexslider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        itemWidth: 180,
        itemMargin: 5,
        asNavFor: '.mode-10 .flexslider'
      });
      
      jQuery('.mode-10 .flexslider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: true,
        sync: '.mode-10-nav .flexslider'     
      });
}); 

