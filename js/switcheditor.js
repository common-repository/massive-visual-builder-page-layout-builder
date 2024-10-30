/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Custom Content handler: is called when user switch between Massive Builder and Editor .
 */

 var edit_usercontent;
jQuery(document).ready(function ($) {

$("#custom-content-editor").markItUp(mySettings); 
$("#postdivrich").before("<a id='editor_switcher' class='button-primary' style='margin-bottom:5px'>Switch To Editor</a><br>");

$(document).on("click","#editor_switcher",function(){
	var id=$("#content-html");
        switchEditors.switchto(id[0]);
	content=$('#content').val(); 
	$("#postdivrich").show();
	$("#massivepb").hide();
	$(this).attr("id","editor_switcher_back");
	$(this).html("Switch To Massive Builder");
});
$(document).on("click","#editor_switcher_back",function(){
	$(this).attr("id","editor_switcher");
	$(this).html("Switch TO Editor");
    var id=$("#content-html");
    switchEditors.switchto(id[0]);
	content=$('#content').val(); 
    if(content !=""){
    var newcontent=[];
    var output=[];
    var items = content.split("[/mvb_row]");
    if(items.length==1){	
	newcontent[0]='[mvb_row row_class=""][mvb_column col_class="" width="1/1"][pos_dim]'+items[0]+'[/pos_dim][/mvb_column][/mvb_row]';	 
	 }else{
	  var j=0;
	  for(var i=0;i<items.length-1;i++){		  
	  var item=items[i].split("[mvb_row");
	  if(item[0].length !=0){
	  output[j]='[mvb_row row_class=""][mvb_column col_class="" width="1/1"][pos_dim]'+item[0]+'[/pos_dim][/mvb_column][/mvb_row]';
	  newcontent[j]=output[j]+ "[mvb_row" +item[1] +"[/mvb_row]";	
	  }else  newcontent[j]="[mvb_row" +item[1] +"[/mvb_row]";			
	   j++;
	  }
	   if(items[items.length-1].length !=0){
	   newcontent[newcontent.length]='[mvb_row row_class=""][mvb_column col_class="" width="1/1"][pos_dim]'+items[items.length-1]+'[/pos_dim][/mvb_column][/mvb_row]';
	   }			
	   }
	jQuery("#content").val(newcontent.join(""));	
	retrieve_items();
	 }else{  $(".container-editable").html("");
	 $(".postmodule-edit-area").hide();
	 }
	$("#postdivrich").hide();
	$("#massivepb").show();
	}); 

$(document).on('click','#edit_usercontent_button',function(){
	 var colnum=$("input[name=mvb-addtocol]").val(); //version 2.0
	 var rownum=$("input[name=mvb-addtorow]").val(); //version 2.0
	 var shortcodenum=$("input[name=mvb-shortcodenum]").val(); //version 2.0	
	var id= $('input[name="contentuser-id"]').val();
	var edi_id=$("#content-html");
    switchEditors.switchto(edi_id[0]);
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if (tmc_active){
	var     str= tinyMCE.activeEditor.getContent();
	}else  str=$('#content').val();	
    var user_content=$('#custom-content-editor').val(); 
    // version 2.0
    var rowitems=str.split("[/mvb_row]");
    var columnitems=rowitems[rownum].split("[/mvb_column]"); 
    var req_colval=columnitems[colnum];
    var array_items=req_colval.split("[/pos_dim]"); 
    shortcode='[pos_dim]'+user_content;
    if(shortcodenum ==0){
    var num1 = array_items[shortcodenum].indexOf("[pos_dim");
    var old_shortcode = array_items[shortcodenum].slice(num1);
    array_items[shortcodenum] = array_items[shortcodenum].replace(old_shortcode, shortcode);
    }else array_items[shortcodenum] =shortcode;
	
	columnitems[colnum]=array_items.join("[/pos_dim]");
	rowitems[rownum]=columnitems.join("[/mvb_column]");
    str=rowitems.join("[/mvb_row]");    
    $("#mvb-r"+rownum.toString()+"-c"+colnum.toString()).children(".editable-items").children("li").children(".item-name").children().children().val(user_content);  
    if (tmc_active){
	tinyMCE.activeEditor.setContent(str);
	}else  $('#content').val(str);    
    $.colorbox.close();
    $(window).scrollTop(top);
});


edit_usercontent=function (i){
   var edi_id=$("#content-html");
   switchEditors.switchto(edi_id[0]);	   
   var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
   if (tmc_active){
   var    str= tinyMCE.activeEditor.getContent();
   }else  str=$('#content').val(); 
   
   
   //version 2.0
   var rowcol_id=$(i).parent("li").parent(".editable-items").parent().attr("id"); 
   var colrow_num=$("#"+rowcol_id).attr("id").split("mvb-r")[1].split("-c");
   var rownum=colrow_num[0];
	 var colnum=colrow_num[1];
   var q_shortcode= $(i).parent("li").children(".item-name").children().html();  
   $(i).parent("li").attr("class","mvb-item-signal");
   var j=0; var shortcodenum=0;
   $(i).parent("li").parent(".editable-items").children("li").each(function(){
   if($(this).attr("class")=="mvb-item-signal"){        
   shortcodenum=j;
   $(this).removeAttr("class");
   }      
   j++;
   });  
     var rowitems=str.split("[/mvb_row]");      
	 var columnitems=rowitems[rownum].split("[/mvb_column]"); 
	 var req_colval=columnitems[colnum];
	 var array_items=req_colval.split("[/pos_dim]"); 
	 var shortcode = array_items[shortcodenum];  	 
    var content = shortcode;    
    $('input[name="contentuser-id"]').val(id);
    var init=content.indexOf("[pos_dim");
    var end=content.indexOf("]",init);
    var content_filter=content.slice(end+1);
    $('#custom-content-editor').val(content_filter);
	  $.colorbox({href: "#editordiv", inline:true, width:"60%",height:"70%",closeButton:false,
			title: function(){			
				  return '<div style="background-color:#CCCCCC;display:table; width:100%; height:50px;"><a id="edit_usercontent_button">Apply</a><a id="mb-cancel-button">Cancel</a></div>';
					},
		    onComplete:function(){$("#box-header").remove();     			
			   var item_title="User Content";    			   
			   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 16px;font-family:Open Sans,sans-serif; color:#FFFFFF; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">'+item_title+'</div></div>';
			   $("#cboxLoadedContent").before(title_cboxContent);
			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtocol' value="+colnum+">");
			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtorow' value="+rownum+">");
			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-shortcodenum' value="+shortcodenum+">");
			   },
			onClosed:function(){$("#box-header").remove();
		 	$("input[name=mvb-addtocol]").remove(); 
	    	$("input[name=mvb-addtorow]").remove(); 
	    	$("input[name=mvb-shortcodenum]").remove(); }  		
});
   
}
});