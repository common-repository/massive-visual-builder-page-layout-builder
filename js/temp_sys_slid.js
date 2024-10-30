/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Template Sys UI Slider.
 */
jQuery(function( $ ){
 
var widgetsContainer = $( ".sort-post-content" );
 var tempsysContainer = $( ".items-form" );

 $( "#save_tmplate" ).click(
function( event ){
event.preventDefault();
if (tempsysContainer.is( ":visible" )){ 
tempsysContainer.slideUp( 600 ); 
} else { 
tempsysContainer.slideDown( 600 );
}
}
);
});