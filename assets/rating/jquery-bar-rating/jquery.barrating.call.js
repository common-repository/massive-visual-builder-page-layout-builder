  jQuery(function ($) {
      
      var $bg, $fg, wd, cc, ini;  
    $( '.mvb-star-ctr' ).each(function(){
    var $me = $( this );
 
//var $bgs, $fgs, wds;
 wd= $me.attr( 'data-value' )+'%';
 
$bg = $me.children( 'ul' );
//if($mes.attr( 'data-type' )=="static")
$fg = $bg.clone().addClass( 'star-fg' ).css( 'width', wd ).appendTo( $me ); 
 $bg.addClass( 'star-bg' );   
   });
       
       
       
 function initialize() {
 
   ini = true;
 
   // How many rating elements
   cc = $bg.children().length;
 
   // Total width of the bar
   wd = $bg.width();
 
}
   
       
       

 
//$( '.mvb-star-ctr' ).each(function(index,el){
$('.mvb-star-ctr').mousemove(function( e ) {
      $me= $(this);
   if($me.attr( 'data-type' )=="interactive"){
   
   // Do once, deferred since fonts might not
   // be loaded so the calcs will be wrong
   if ( !ini ) initialize();
 
   var dt, vl;
 
   // Where is the mouse relative to the left
   // side of the bar?
   dt = e.pageX - $me.offset().left;
   vl = ((Math.round( dt / wd * cc * 10 ) / 10)*100)/5;
   
   $me.attr( 'data-value', vl );
   $me.find('.star-fg').css( 'width', Math.round( dt )+'px' );
   }
});
//});
       // .mouseleave(function() {
  // var  aa= $me.attr( 'data-value' )+'%';
  // $me.children('.star-fg').css( 'width', aa );
    
//});
 //       .click(function() {
 //   if($me.attr( 'data-type' )=="interactive"){
//$("#rate_val").text('your rate:'+($( this ).attr( 'data-value' )*5)/100+'/5');
    // Grab value
   // alert( $( this ).attr( 'data-value' ) );
 
  //  return false;
//    }
});  
       
         
            
