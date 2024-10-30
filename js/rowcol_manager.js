/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Manage rows & columns.
 */
var add_row; var clone_row;var del_row;var edit_row;var addel_tocol;var edit_col;
jQuery(document).ready(function ($) {	
add_row=function(){ 
$("#mvb_addrow").click(function(){
var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
if(tmc_active){
var str= tinyMCE.activeEditor.getContent();
}else  str=$('#content').val();	
if(str!="")
var row_id=str.split("[/mvb_row]").length-1; 
else row_id=0;
$(".container-editable").append('<div id="mvb-row-'+row_id+'" class="row-editable editable-component"><div onclick="coldivider_icons(this)" class="settings-button2 column-row-dividing"></div><div class="settings-button2 row-edit-btn" onclick="edit_row(this.parentNode.id)"></div><div class="settings-button2 row-delet-btn" onclick="del_row(this.parentNode.id)"></div><div class="settings-button2 row-copy-btn" onclick="clone_row(this.parentNode.id)" ></div><div   style="display: none;" class="toolbar-icons" ><a href="#" ><i class="ico-1column"></i></a><a href="#" ><i class="ico-1-2column" ></i></a><a href="#" ><i class="ico-1-3colmun"></i></a><a href="#" ><i class="ico-3-4-1column"></i></a><a href="#" ><i class="ico-1-4column"></i></a><a href="#" ><i class="ico-3-4-2column"></i></a><a href="#" ><i class="ico-2-4column"></i></a><a href="#" ><i class="ico-2-4-0column"></i></a><a href="#" ><i class="ico-1-6column"></i></a><a href="#" ><i class="ico-3-6column"></i></a><a href="#" ><i class="ico-custom-column"></i></a></div><div class="mvb-col-container"><div id="mvb-r'+row_id+'-c0" class="col-xs-12"> <a onclick="addel_tocol(this.parentNode.id)" class="column-ae-button" href="#"> <div class="column-plus"></div></a><a onclick="edit_col(this.parentNode.id)" class="column-ee-button" href="#"><div class="column-edit"></div></a><div class="editable-items"></div></div></div></div>');
str=str+'[mvb_row row_class=""][mvb_column col_class="" width="1/1"][/mvb_column][/mvb_row]';
if(tmc_active){
tinyMCE.activeEditor.setContent(str);
}else $('#content').val(str);
$(".container-editable").find(".editable-items").sortable({connectWith: ".editable-items" }).disableSelection();
});
}
clone_row=function(i){ 
row_num=i.split("mvb-row-");
i=row_num[1];
var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if(tmc_active){
	var str= tinyMCE.activeEditor.getContent();
	}else  str=$('#content').val();	
var items=str.split("[/mvb_row]");	
items.splice(i,0,items[i]); 
var content =items.join("[/mvb_row]");
var itemval='<div id="mvb-row-'+i+'" class="row-editable editable-component">'+$("#mvb-row-"+i).html()+'</div>';
$("#mvb-row-"+i).after(itemval);
var j=0;
$(".row-editable").each(function(){
$(this).attr("id","mvb-row-"+j);
var colnum=0;
$(this).attr("id","mvb-row-"+j).children(".mvb-col-container").children().each(function(){$(this).attr("id","mvb-r"+j+"-c"+colnum);colnum++;   });	
j++;
});
if(tmc_active){
tinyMCE.activeEditor.setContent(content);
}else $('#content').val(content);
$(".container-editable").find(".editable-items").sortable({connectWith: ".editable-items" }).disableSelection();
}

del_row=function(i){
	$("#"+i).remove();
	row_num=i.split("mvb-row-");
	i=row_num[1];	
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
		if(tmc_active){
		var str= tinyMCE.activeEditor.getContent();
		}else  str=$('#content').val();	
	var items=str.split("[/mvb_row]");	
	items.splice(i,1);
	var content =items.join("[/mvb_row]");	
	var j=0;
	$(".row-editable").each(function(){
	$(this).attr("id","mvb-row-"+j);
	var colnum=0;
	$(this).attr("id","mvb-row-"+j).children(".mvb-col-container").children().each(function(){$(this).attr("id","mvb-r"+j+"-c"+colnum);colnum++;   });	
	j++;
	});	
	if(tmc_active){
	tinyMCE.activeEditor.setContent(content);
	}else $('#content').val(content);

}
edit_row=function(i){
	row_num=i.split("mvb-row-");
	i=row_num[1];
	var edi_id=$("#content-html");
	switchEditors.switchto(edi_id[0]);
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if(tmc_active){
	var str= tinyMCE.activeEditor.getContent();
	}else  str=$('#content').val();	
	var items=str.split("[/mvb_row]");		
	var item=items[i]+"[/mvb_row]";	
$.colorbox({href: mvb_ajax_var.url,data:{'action': 'mvb_action','nonce':mvb_ajax_var.nonce,shortcode: "row",shortcode_content:item,depth:1}
,width:"90%",height:"95%",closeButton:false ,title: function(){	            		
			var apply_button_id="mvb-editrow-button";
			  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"><a id="mb-cancel-button">Cancel</a><a class="mvb_colorbox_buttons" id="'+apply_button_id+'">Apply</a></div>';
				}, 
	    onComplete:function(){
		   var item_title="Custom Content";             		 
		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">Custom Row Class</div></div>';
		  $("#cboxLoadedContent").before(title_cboxContent);
		  $("#cboxLoadedContent").append("<input type='hidden' name='mvb_row_num' value='"+i+"'>");
		  $(".color-attr").spectrum({}); 
		  $(".color-attr").show(); 
		  $(".shortcodes_options").find("select").chosen({width: "100%",disable_search:true});
		  $(".mvb_range").ionRangeSlider({
	            min: $(this).attr("data-min"),
	            max: $(this).attr("data-max"),
				from: $(this).val(),
	            type: 'single',
				postfix: $(this).attr("data-postfix"),
	            step: $(this).attr("data-step"),
	            prefix: $(this).attr("data-prefix"),
	            prettify: true,
	            hasGrid: false,
				hideMinMax: $(this).attr("data-hideMinMax"),
				hideFromTo: $(this).attr("data-hideFromTo")
				
	        });
		   	
	    },
	    onClosed:function(){
	    	$("#box-header").remove();
	    } 
	});
}
$(document).on('click','#mvb-editrow-button',function(event) { 
var i=$("input[name=mvb_row_num]").val();
var row_class=$("input[name=mvb-row-class]").val();
var edi_id=$("#content-html");
switchEditors.switchto(edi_id[0]);
var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
if(tmc_active){
var str= tinyMCE.activeEditor.getContent();
}else  str=$('#content').val();	
var items=str.split("[/mvb_row]");
var item=items[i];
        var queried_shortcode = jQuery("input[name=shortcode_name]").val();       
        jQuery('#mvb-su-generator-result').val('[mvb_'+ queried_shortcode);
        jQuery('.shortcodes_options .mvb-su-generator-attr').each(function () {        
            if (jQuery(this).val() !==null) {
            	var attr_value=	jQuery(this).val().toString().replace(/["']/g, "");
                jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ' ' + jQuery(this).attr('name') + '="' + attr_value + '"');
            }
        });
        $(".color-attr").each(function () {
		jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val()  + ' ' + jQuery(this).attr('name') +'="' + jQuery(this).attr('value') + '"'); });
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ']');
        if (jQuery('#mvb-su-generator-content').val() != 'false') {
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + jQuery('#mvb-su-generator-content').val());
        }
        var shortcode = jQuery('#mvb-su-generator-result').val();
items[i]=shortcode;
var content =items.join("[/mvb_row]");
var lastitem=items[items.length-1]; 
if(lastitem.length>0) 
content=content+"[/mvb_row]";
if(tmc_active)
tinyMCE.activeEditor.setContent(content);
else $('#content').val(content);
$.colorbox.close();
});

$("#mvb_addwidgets").click(function(){
	$("#mvb_wlist").show();
    $("#mvb-content").hide();
	$.colorbox({href: "#mvb_widgetlist",inline:true,width:"90%",height:"95%",closeButton:false,
		title: function(){	       		
		  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"></div>';
				}, 
	    onComplete:function(){	
	       $("#cboxLoadedContent").find('.mvb_back_fullwidgets').remove();
	       $("#box-header").remove();
		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">Widget List</div></div>';
		   $("#cboxLoadedContent").before(title_cboxContent);	
	    },
	    onClosed:function(){
	    	$("#box-header").remove();    

	    } 
	});
	
});
$(document).on("click",".mvb_back_fullwidgets",function(){
	$("#mvb_wlist").show();
    $("#mvb-content").hide();
	$.colorbox({href: "#mvb_widgetlist",inline:true,width:"90%",height:"95%",closeButton:false,
		title: function(){	       		
		  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"></div>';
				}, 
	    onComplete:function(){
		     $("#cboxLoadedContent").find('.mvb_back_fullwidgets').remove();
	    	$("#box-header").remove();
		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">Widget List</div></div>';
		   $("#cboxLoadedContent").before(title_cboxContent);	
	    },
	    onClosed:function(){
	    	$("#box-header").remove();    

	    } 
	});
	
});
addel_tocol=function(i){
	var colrow_num=$("#"+i).attr("id").split("mvb-r")[1].split("-c");
	var rownum=colrow_num[0];
	var colnum=colrow_num[1];
	$("#mvb_wlist").show();
    $("#mvb-content").hide();    
	$.colorbox({href: "#mvb_widgetlist",inline:true,width:"90%",height:"95%",closeButton:false,
		title: function(){	       		
		  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"></div>';
				}, 
	    onComplete:function(){		               		 
		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">Widget List</div></div>';
		   $("#cboxLoadedContent").before(title_cboxContent);
		   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtocol' value="+colnum+">");
		   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtorow' value="+rownum+">");
			
	    },
	    onClosed:function(){
	    	$("#box-header").remove();  

    } 
	});
}
edit_col=function(i){
	var colrow_num=$("#"+i).attr("id").split("mvb-r")[1].split("-c");
	var rownum=colrow_num[0];
	var colnum=colrow_num[1];
	var edi_id=$("#content-html");
	switchEditors.switchto(edi_id[0]);
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if(tmc_active){
	var str= tinyMCE.activeEditor.getContent();
	}else  str=$('#content').val();	
	var rowitems=str.split("[/mvb_row]");		
	var columnitems=rowitems[rownum].split("[/mvb_column]"); 
	var req_colval=columnitems[colnum]+"[/mvb_column]";
	if(colnum==0){
	var req_colval="[mvb_column"+columnitems[colnum].split("[mvb_column")[1]+"[/mvb_column]";
	var init_row=columnitems[colnum].split("[mvb_column")[0];
	}
	$.colorbox({width:"90%",height:"95%",closeButton:false,href: mvb_ajax_var.url,data:{'action': 'mvb_action','nonce':mvb_ajax_var.nonce,shortcode: "column",shortcode_content:req_colval,depth:1},
		title: function(){	            		
			var apply_button_id="mvb-editcol-button";
			  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"><a id="mb-cancel-button">Cancel</a><a class="mvb_colorbox_buttons" id="'+apply_button_id+'">Apply</a></div>';
				}, 
	    onComplete:function(){
		   var item_title="Custom Content";             		 
		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">Custom Column Class</div></div>';
		   $("#cboxLoadedContent").before(title_cboxContent);	
		   $("#cboxLoadedContent").append("<input type='hidden' name='mvb_row_num' value="+rownum+">");
		   $("#cboxLoadedContent").append("<input type='hidden' name='mvb_column_num' value="+colnum+">");
		   $(".color-attr").spectrum({}); 
		   $(".color-attr").show(); 
		  $(".shortcodes_options").find("select").chosen({width: "100%",disable_search:true});
		  $(".mvb_range").ionRangeSlider({
	            min: $(this).attr("data-min"),
	            max: $(this).attr("data-max"),
				from: $(this).val(),
	            type: 'single',
				postfix: $(this).attr("data-postfix"),
	            step: $(this).attr("data-step"),
	            prefix: $(this).attr("data-prefix"),
	            prettify: true,
	            hasGrid: false,
				hideMinMax: $(this).attr("data-hideMinMax"),
				hideFromTo: $(this).attr("data-hideFromTo")
				
	        });
	    },
	    onClosed:function(){
	    	$("#box-header").remove();
	    } 
	});	
}
$(document).on('click','#mvb-editcol-button',function(event) { 
	var rownum=$("input[name=mvb_row_num]").val();
	var colnum=$("input[name=mvb_column_num]").val();
	var column_class=$("input[name=mvb-column-class]").val();
	var edi_id=$("#content-html");
	switchEditors.switchto(edi_id[0]);
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if(tmc_active){
	var str= tinyMCE.activeEditor.getContent();
	}else  str=$('#content').val();	
	var rowitems=str.split("[/mvb_row]");		
	var columnitems=rowitems[rownum].split("[/mvb_column]"); 
	var req_colval=columnitems[colnum];

        var queried_shortcode = jQuery("input[name=shortcode_name]").val();       
        jQuery('#mvb-su-generator-result').val('[mvb_'+ queried_shortcode);
        jQuery('.shortcodes_options .mvb-su-generator-attr').each(function () {        
            if (jQuery(this).val() !==null) {
            	var attr_value=	jQuery(this).val().toString().replace(/["']/g, "");
                jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ' ' + jQuery(this).attr('name') + '="' + attr_value + '"');
            }
        });
        $(".color-attr").each(function () {
		jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val()  + ' ' + jQuery(this).attr('name') +'="' + jQuery(this).attr('value') + '"'); });
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ']');
        if (jQuery('#mvb-su-generator-content').val() != 'false') {
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + jQuery('#mvb-su-generator-content').val());

        }
        var shortcode = jQuery('#mvb-su-generator-result').val();
    if(colnum==0){
	var init_row=columnitems[colnum].split("[mvb_column")[0];	
	columnitems[colnum]=init_row+shortcode;
	}else columnitems[colnum]=shortcode;
	rowitems[rownum]=columnitems.join("[/mvb_column]");
	var str=rowitems.join("[/mvb_row]");
	if(tmc_active)
	tinyMCE.activeEditor.setContent(str);
	else $('#content').val(str);
	$.colorbox.close();
	});

add_row();
});