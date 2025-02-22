/* Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * version 2.0 
 * 
 * Gallery Handler.
 * 
 */
var file_frame;
var data;
jQuery(document).ready(function ($) {
$(document).on("click",".mvb_select_images", function(event ){	

event.preventDefault();
data=jQuery(this);
$("#colorbox").hide();
if ( file_frame ) {
file_frame.open();
return;
}
file_frame = wp.media.frames.file_frame = wp.media({
title: jQuery( this ).data( 'uploader_title' ),
button: {
text: jQuery( this ).data( 'uploader_button_text' ),
},
multiple: true 
}); 

file_frame.on( 'select', function() {
 
var selection = file_frame.state().get('selection');
 var $i=0;
 var output=[];
 var images_div="";
selection.map( function( attachment ) {
 
attachment = attachment.toJSON();
output[$i]=attachment.id;
images_div+= "<div  class='mvb_thumb small' id='"+attachment.id+"'><img height='100px' width='100px' title='"+attachment.title+"'  src='"+attachment.url+"'><div class='mvb_image_delete'>&times;</div></div>";

$i++;
});
data.next("input").val(output.join(","));
data.next("input").parent(".setting-style").next('.mvb_thumbsgrid').html(images_div);
$('.mvb_thumbsgrid').sortable({});
$("#colorbox").show();

});

file_frame.on('open',function() {
	  var selection = file_frame.state().get('selection');
	  selection.reset();
	  ids = data.next("input").val().split(',');
	  jQuery.each(ids, function(n, id){
	  attachment = wp.media.attachment(id);
	  attachment = wp.media.attachment(id);
	  attachment.fetch();		
	  selection.add( attachment ? [ attachment ] : [] );

	});
	//  selection.reset( attachment ? [ attachment ] : [] ); 
	}); 

file_frame.open();
file_frame.on( 'close', function(){ $("#colorbox").show(); });
});

$(document).on("click",".mvb_image_delete", function(event ){
	var img_id=$(this).attr("id");
	var images_val=[];var i=0;
	var req_div=$(this).parent().parent();
	$(this).parent(".mvb_thumb").remove();
	req_div.children().each(function(index,value){
	images_val[i]=$(value).attr("id");
	i++;
	});
	req_div.prev(".setting-style").children("input").val(images_val.join(","));

});
$(document).on("sortstop",".mvb_thumbsgrid", function( event, ui ) {
	var req_div=$(ui.item[0]).parent();
	var images_val=[];var i=0;
	req_div.children().each(function(index,value){
	images_val[i]=$(value).attr("id");
	i++;
	});
	req_div.prev(".setting-style").children("input").val(images_val.join(","));

});
});