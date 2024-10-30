/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Manage page items: Add, Edit and delete Items.
 * version          2.0 
 */
var copy_items;var more_width;var less_width;var del_items;var edit_items;var retrieve_items;var cccv;
jQuery(document).ready(function ($) {
	    jQuery("#additems_button").click(function () {
        jQuery(".items").css("display", "block");
        jQuery(".shortcodes_options").hide();
        jQuery("#special_shortcodes_options").hide();
        jQuery(".additional_shortcodes_options").hide();
    });

    $(document).on('click', '#mvb-su-generator-insert',function (event) {
    	var inline_shortcode="";
    	if($("input[name=mvb-addtocol]").val() !=undefined)
    	var colnum=$("input[name=mvb-addtocol]").val();
    	if($("input[name=mvb-addtorow]").val() !=undefined)
    	var rownum=$("input[name=mvb-addtorow]").val();

   
        var i = 0;
        var items_num = [];
	    var edi_id=$("#content-html");
        switchEditors.switchto(edi_id[0]);
        var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
        if (tmc_active){
         var    str= tinyMCE.activeEditor.getContent();     
       	}else  str=$('#content').val();  		     
        if(str=="") var i=0;
        else{
        var array_items = str.split("[/mvb_row]");
        i = array_items.length-1;
        } 
        ////////////////////////////inline shortcode////////////////////
        $('.inline_shortcode_options').each(function () {
        if($(this).children("input[name=inlineshort_name]").val()){
         var inline_queried_shortcode = $(this).children("input[name=inlineshort_name]").val();   
        jQuery('#mvb-su-generator-result').val('[mvb_'+ inline_queried_shortcode);      
        var $items = $(this).find('.mvb-su-generator-attr-inline');
        $.each($items, function(n, e){
          	
            if ($(e).val() !==null) {
            	var attr_value=	$(e).val().toString().replace(/["']/g, "");
                jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ' ' + $(e).attr('name') + '="' + attr_value + '"');
            }
        });
        var $items = $(this).find('.color-attr-inline');
        $.each($items, function(n, e){
		jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val()  + ' ' + $(e).attr('name') +'="' + $(e).attr('value') + '"'); });
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ']');
        if ($(this).find('.mvb-su-generator-content-inline').val() != 'false') {
            jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + $(this).find('.mvb-su-generator-content-inline').val() + '[/mvb_'+ inline_queried_shortcode + ']');
        }	        
         inline_shortcode+=jQuery('#mvb-su-generator-result').val();
        }
        });   

        
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
        	if(inline_shortcode)
            jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + inline_shortcode + '[/mvb_'+ queried_shortcode + ']');
        	else jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + jQuery('#mvb-su-generator-content').val() + '[/mvb_'+ queried_shortcode + ']');

        }
        /////////////////////////inline shortcode end///////////////
        var shortcode = jQuery('#mvb-su-generator-result').val();  
        if(!colnum && !rownum){
        str = str + '[mvb_row row_class=""][mvb_column col_class="" width="1/1"][pos_dim pos_width=6]' + shortcode + '[/pos_dim][/mvb_column][/mvb_row]';
         $(".container-editable").append('<div id="mvb-row-'+i+'" class="row-editable editable-component"><div onclick="coldivider_icons(this)"  class="settings-button2 column-row-dividing"></div><div class="settings-button2 row-edit-btn" onclick="edit_row(this.parentNode.id)"></div><div class="settings-button2 row-delet-btn" onclick="del_row(this.parentNode.id)"></div><div class="settings-button2 row-copy-btn" onclick="clone_row(this.parentNode.id)" ></div><div style="display: none;" class="toolbar-icons" id="user-options"><a  href="#"><i class="ico-1column"></i></a><a  href="#"><i class="ico-1-2column"></i></a><a  href="#"><i class="ico-1-3colmun"></i></a><a  href="#"><i class="ico-3-4-1column"></i></a><a  href="#"><i class="ico-1-4column"></i></a><a  href="#"><i class="ico-3-4-2column"></i></a><a  href="#"><i class="ico-2-4column"></i></a><a  href="#"><i class="ico-2-4-0column"></i></a><a  href="#"><i class="ico-1-6column"></i></a><a  href="#"><i class="ico-3-6column"></i></a><a  href="#"><i class="ico-custom-column"></i></a></div><div class="mvb-col-container"><div id="mvb-r'+i+'-c0" class="col-xs-12"><a onclick="addel_tocol(this.parentNode.id)"  class="column-ae-button" href="#"> <div class="column-plus"></div></a><a  class="column-ee-button" onclick="edit_col(this.parentNode.id)" href="#"><div class="column-edit"></div></a><div class="editable-items"><li id=' + i + ' style="width: 100%;"><a   onclick="del_items(this)"><div class="del-icon"></div></a><a  onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a  onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name" ><div>' + queried_shortcode + '</div></div></li></div></div></div></div></div>');
 
         var top=$("#mvb-row-"+i).offset().top-200;
		         $(window).scrollTop(top);
        } else {
        var rowitems=str.split("[/mvb_row]");      
        var columnitems=rowitems[rownum].split("[/mvb_column]"); 
        var req_colval=columnitems[colnum];
       	columnitems[colnum]=req_colval+'[pos_dim pos_width=6]'+shortcode+'[/pos_dim]';
        rowitems[rownum]=columnitems.join("[/mvb_column]");
        str=rowitems.join("[/mvb_row]");
       // //alert(str);     
        $("#mvb-row-"+rownum.toString()).children(".mvb-col-container").children("#mvb-r"+rownum+"-c"+colnum).children(".editable-items").append('<li style="width: 100%;" ><a onclick="del_items(this)"><div class="del-icon"></div></a><a onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name"><div>'+queried_shortcode+'</div></div></li>');
		 var top=$("#mvb-row-"+rownum.toString()).offset().top-200;
        $(window).scrollTop(top);
        } 
        jQuery(".container-editable").find(".editable-items").sortable({
        	connectWith: ".editable-items" 
		//	placeholder: "mvb-placeholder"       
        }).disableSelection();
        


        if (tmc_active){
           tinyMCE.activeEditor.setContent(str);
        }else $('#content').val(str);  
        // version 2.0

        $(".postmodule-edit-area").show();
        $.colorbox.close();     
      
        i++;
    });

    jQuery(".shortcode_hlinks").click(function () { 
         var queried_shortcode = jQuery(this).attr("id");
         if(queried_shortcode !=='pro'){
        $("#mvb_wlist").hide();                //  version 2.0
        $("#mvb-content").show();            //  version 2.0        
        if (queried_shortcode !='custom-content' &&  queried_shortcode !='tweet'){            
            jQuery(".shortcodes_options").show();
            jQuery("#special_shortcodes_options").hide();
            jQuery(".additional_shortcodes_options").hide();  
            //colorbox call
        	$.colorbox({href: mvb_ajax_var.url,data:{'action': 'mvb_action',shortcode: queried_shortcode,'nonce':mvb_ajax_var.nonce}, width:"90%",height:"95%",closeButton:false,      //         version 2.0
        		title: function(){	            		
        			var apply_button_id="mvb-su-generator-insert";
        			  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"><a class="mvb_back_fullwidgets">Back To Widget List</a> <a id="mb-cancel-button">Cancel</a><a id="'+apply_button_id+'">Apply</a></div>';
        				},
        	    onComplete:function(){
        	       $("#box-header").remove(); 
        		   var item_title=$("#"+queried_shortcode).children().children(".addelements .title-cat").text();             		 
        		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">'+item_title+'</div></div>';
        		   $("#cboxLoadedContent").before(title_cboxContent);	
        		   $(".color-attr").spectrum({});
        		   $(".color-attr").show();
        		   $(".color-attr-inline").spectrum({}); // inline shortcode
        		   $(".color-attr-inline").show();
                   $(".shortcodes_options").find("select").chosen({width: "100%",disable_search:true});                 
				$(".mvb_range").ionRangeSlider();
	        /*   min: $(this).attr("data-min"),
	            max: $(this).attr("data-max"),
				from: $(this).val(),
	            type: 'single',
			//	postfix: $(this).attr("data-postfix"),
	            step: $(this).attr("data-step"),
	            prefix: $(this).attr("data-prefix"),
	            prettify: true, 
	            hasGrid: false,
				hideMinMax: false,
				hideFromTo: false */
				
	     //  }); 
			
			//	});
				
				  },
        	     onClosed:function(){
        	    $(".shortcodes_options").html("");
				$("#box-header").remove();
				$("input[name=mvb-addtocol]").remove(); 
		    	$("input[name=mvb-addtorow]").remove(); 
        	    }
        	});      	//  version 2.0
           }
        }
    });
    var i=0;
    $(document).on('click', '#cus-content-button', function () {     
        var items_num = [];
		var edi_id=$("#content-html");
        switchEditors.switchto(edi_id[0]);       
        var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
        if (tmc_active){
         var    str= tinyMCE.activeEditor.getContent();
       	}else  str=$('#content').val();
        if(str=="") var i=0;
        else{
        var array_items = str.split("[/mvb_row]");
        i = array_items.length-1;
         } 
        var content = jQuery("#cus-content-textarea").val();    
        var shortcode_custom_content = "[mvb_custom-content]" + content + "[/mvb_custom-content]";
        if($("input[name=mvb-addtocol]").val() !=undefined)                  //version 2.0
       	var colnum=$("input[name=mvb-addtocol]").val();                      //version 2.0
        if($("input[name=mvb-addtorow]").val() !=undefined)                  //version 2.0
        var rownum=$("input[name=mvb-addtorow]").val();                      //version 2.0
        if(!colnum && !rownum){                                              //version 2.0   
        //var content = str + "[pos_dim pos_width=6]" + shortcode_custom_content + "[/pos_dim]";           
        str = str + '[mvb_row row_class=""][mvb_column col_class="" width="1/1"][pos_dim pos_width=6]' + shortcode_custom_content + '[/pos_dim][/mvb_column][/mvb_row]';//version 2.0 
        $(".container-editable").append('<div id="mvb-row-'+i+'" class="row-editable editable-component"><div onclick="coldivider_icons(this)"  class="settings-button2 column-row-dividing"></div><div class="settings-button2 row-edit-btn" onclick="edit_row(this.parentNode.id)"></div><div class="settings-button2 row-delet-btn" onclick="del_row(this.parentNode.id)"></div><div class="settings-button2 row-copy-btn" onclick="clone_row(this.parentNode.id)" ></div><div style="display: none;" class="toolbar-icons" id="user-options"><a  href="#"><i class="ico-1column"></i></a><a  href="#"><i class="ico-1-2column"></i></a><a  href="#"><i class="ico-1-3colmun"></i></a><a  href="#"><i class="ico-3-4-1column"></i></a><a  href="#"><i class="ico-1-4column"></i></a><a  href="#"><i class="ico-3-4-2column"></i></a><a  href="#"><i class="ico-2-4column"></i></a><a  href="#"><i class="ico-2-4-0column"></i></a><a  href="#"><i class="ico-1-6column"></i></a><a  href="#"><i class="ico-3-6column"></i></a><a href="#" ><i class="ico-custom-column"></i></a></div><div class="mvb-col-container"><div id="mvb-r'+i+'-c0" class="col-xs-12"><a onclick="addel_tocol(this.parentNode.id)"  class="column-ae-button" href="#"> <div class="column-plus"></div></a><a onclick="edit_col(this.parentNode.id)" class="column-ee-button" href="#"><div class="column-edit"></div></a><div class="editable-items"><li id=' + i + ' style="width: 100%;"><a   onclick="del_items(this)"><div class="del-icon"></div></a><a  onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a  onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name" ><div>custom-content</div></div></li></div></div></div></div></div>');  //version 2.0  
         var top=$("#mvb-row-"+i).offset().top-200;
		   $(window).scrollTop(top);
	    }else { //version 2.0 
            var rowitems=str.split("[/mvb_row]");      
            var columnitems=rowitems[rownum].split("[/mvb_column]"); 
            var req_colval=columnitems[colnum];
           	columnitems[colnum]=req_colval+'[pos_dim pos_width=6]'+shortcode_custom_content+'[/pos_dim]';
            rowitems[rownum]=columnitems.join("[/mvb_column]");
            str=rowitems.join("[/mvb_row]");
          //  //alert(str);     
            $("#mvb-row-"+rownum.toString()).children(".mvb-col-container").children("#mvb-r"+rownum+"-c"+colnum).children(".editable-items").append('<li style="width: 100%;" ><a onclick="del_items(this)"><div class="del-icon"></div></a><a onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name"><div>custom-content</div></div></li>');
         var top=$("#mvb-row-"+rownum.toString()).offset().top-200;
        $(window).scrollTop(top);
			} //version 2.0 
        if (tmc_active){
        tinyMCE.activeEditor.setContent(str);
       	}else $('#content').val(str);
        $(".postmodule-edit-area").show();
        $.colorbox.close();
        jQuery(".container-editable").find(".editable-items").sortable({
            connectWith: ".editable-items"        
         }).disableSelection();
 
    });
    jQuery("#custom-content").click(function () {
    	jQuery("#mvb-content").show();
        jQuery("#special_shortcodes_options").show();
        jQuery(".additional_shortcodes_options").hide();
        jQuery(".shortcodes_options").hide();
        jQuery("#special_shortcodes_options label").html("<textarea  id='cus-content-textarea'>Add Html Code Or Plain Text Here</textarea>");
        $("#cus-content-textarea").markItUp(mySettings); 
        //colorbox call       
    	$.colorbox({href: "#mvb-content",inline:true, width:"90%",height:"95%",closeButton:false,
    		title: function(){	            		
    			var apply_button_id="cus-content-button";
    			  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"><a class="mvb_back_fullwidgets">Back To Widget List</a><a id="mb-cancel-button">Cancel</a><a id="'+apply_button_id+'">Apply</a></div>';
    				}, 
    	    onComplete:function(){
    	       $("#box-header").remove();
    		   var item_title="Custom Content";             		 
    		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">'+item_title+'</div></div>';
    		   $("#cboxLoadedContent").before(title_cboxContent);	
    	    },
    	    onClosed:function(){
    	    	$("#box-header").remove();
    	    	$("input[name=mvb-addtocol]").remove(); 
    	    	$("input[name=mvb-addtorow]").remove(); 
    	    }
    	});
    	//
       
    });
    $(document).on('click', '#shortcode-edit', function () { 
    	var colnum=$("input[name=mvb-addtocol]").val(); //version 2.0
    	var rownum=$("input[name=mvb-addtorow]").val(); //version 2.0
    	var shortcodenum=$("input[name=mvb-shortcodenum]").val(); //version 2.0   	
    	
        ////////////////////////////inline shortcode////////////////////
    	var inline_shortcode="";
        $('.inline_shortcode_options').each(function () {
        if($(this).children("input[name=inlineshort_name]").val()){
         var inline_queried_shortcode = $(this).children("input[name=inlineshort_name]").val();   
        jQuery('#mvb-su-generator-result').val('[mvb_'+ inline_queried_shortcode);      
        var $items = $(this).find('.mvb-su-generator-attr-inline');
        $.each($items, function(n, e){
            if ($(e).val() !==null) {
            	var attr_value=	$(e).val().toString().replace(/["']/g, "");
                jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ' ' + $(e).attr('name') + '="' + attr_value + '"');
            }
        });
        var $items = $(this).find('.color-attr-inline');
        $.each($items, function(n, e){
		jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val()  + ' ' + $(e).attr('name') +'="' + $(e).attr('value') + '"'); });
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ']');
        if ($(this).find('.mvb-su-generator-content-inline').val() != 'false') {
            jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + $(this).find('.mvb-su-generator-content-inline').val() + '[/mvb_'+ inline_queried_shortcode + ']');
        }	        
         inline_shortcode+=jQuery('#mvb-su-generator-result').val();
        }
        });    	    		   	

        
        var queried_shortcode = jQuery("input[name='shortcode_name']").val();
        jQuery('#mvb-su-generator-result').val('[mvb_'+ queried_shortcode);
        jQuery('.shortcodes_options .mvb-su-generator-attr').each(function () {
            if (jQuery(this).val() !==null) {
                var attr_value=	jQuery(this).val().toString().replace(/["']/g, "");
                jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ' ' + jQuery(this).attr('name') + '="' + attr_value + '"');
            }
        });
		$(".color-attr").each(function () {		
		 jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val()  + ' ' + jQuery(this).attr('name') +'="' +         jQuery(this).attr('value') + '"'); });
        jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + ']');      

        if (jQuery('#mvb-su-generator-content').val() != 'false') {			
        	if(inline_shortcode)
                jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + inline_shortcode + '[/mvb_'+ queried_shortcode + ']');
            	else jQuery('#mvb-su-generator-result').val(jQuery('#mvb-su-generator-result').val() + jQuery('#mvb-su-generator-content').val() + '[/mvb_'+ queried_shortcode + ']');                }
       
        //////////////inline shortcode end////////////

        var shortcode = jQuery('#mvb-su-generator-result').val();     
        var shortcode_name = jQuery("input[name='shortcode_name']").val();       
        var item_id = jQuery("input[name='item-id']").val();  
        var str=$('#content').val();
        // version 2.0
        var rowitems=str.split("[/mvb_row]");
        var columnitems=rowitems[rownum].split("[/mvb_column]"); 
        var req_colval=columnitems[colnum];
        var array_items=req_colval.split("[/pos_dim]"); 
        shortcode='[pos_dim]'+shortcode;
        if(shortcodenum ==0){
        var num1 = array_items[shortcodenum].indexOf("[pos_dim");
        var num2 = array_items[shortcodenum].lastIndexOf("]");                
        var old_shortcode = array_items[shortcodenum].slice(num1, num2+1);
        array_items[shortcodenum] = array_items[shortcodenum].replace(old_shortcode, shortcode);
        }else array_items[shortcodenum] =shortcode;
		
		columnitems[colnum]=array_items.join("[/pos_dim]");
		rowitems[rownum]=columnitems.join("[/mvb_column]");
        str=rowitems.join("[/mvb_row]");    

        // Insert into editor        
        var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
        if (tmc_active){
        tinyMCE.activeEditor.setContent(str);
       	}else  $('#content').val(str);
        $.colorbox.close();
 

    });
    $(document).on('click', '#cus-content-button-edit', function () {
    	 var colnum=$("input[name=mvb-addtocol]").val(); //version 2.0
    	 var rownum=$("input[name=mvb-addtorow]").val(); //version 2.0
    	 var shortcodenum=$("input[name=mvb-shortcodenum]").val(); //version 2.0
    	 var item_id = jQuery("input[name='custom-item-id']").val();
		 var edi_id=$("#content-html");
         switchEditors.switchto(edi_id[0]);    	
    	 var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
    	 if (tmc_active){
    	 var str= tinyMCE.activeEditor.getContent();
    	 }else  str=$('#content').val();    	 
         var content=$('#cus-content-textarea').val();
         var shortcode="[mvb_custom-content]"+content+"[/mvb_custom-content]";          
         //version 2.0
         var rowitems=str.split("[/mvb_row]");     
          var columnitems=rowitems[rownum].split("[/mvb_column]"); 
          var req_colval=columnitems[colnum];    
          var array_items=req_colval.split("[/pos_dim]"); 
          shortcode='[pos_dim]'+shortcode;
          if(shortcodenum ==0){
          var num1 = array_items[shortcodenum].indexOf("[pos_dim");
          var num2 = array_items[shortcodenum].lastIndexOf("]");                
          var old_shortcode = array_items[shortcodenum].slice(num1, num2+1);
          array_items[shortcodenum] = array_items[shortcodenum].replace(old_shortcode, shortcode);
          }else array_items[shortcodenum] =shortcode;  		
  		columnitems[colnum]=array_items.join("[/pos_dim]");
  		rowitems[rownum]=columnitems.join("[/mvb_column]");
          str=rowitems.join("[/mvb_row]");    
         var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
         if (tmc_active){
         tinyMCE.activeEditor.setContent(str);
       	 }else  $('#content').val(str);       
         $.colorbox.close(); 	
    });
$(document).on("click","#mb-cancel-button",function(){ $.colorbox.close();});    



del_items=function (i){ 	
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
    if(shortcodenum !=undefined)
    $(i).parent("li").remove();	
    var edi_id=$("#content-html");
    switchEditors.switchto(edi_id[0]);
	 var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
    if (tmc_active){
    var str= tinyMCE.activeEditor.getContent();
    }else  str=$('#content').val();
	// version 2.0		
    var rowitems=str.split("[/mvb_row]"); 
    var columnitems=rowitems[rownum].split("[/mvb_column]"); 
    var req_colval=columnitems[colnum];
    var array_items=req_colval.split("[/pos_dim]"); 
    shortcode='[pos_dim]'+array_items[shortcodenum];
    if(shortcodenum ==0){
    var num1 = array_items[shortcodenum].indexOf("[pos_dim");
    var old_shortcode = array_items[shortcodenum].slice(num1);
    array_items[shortcodenum] = array_items[shortcodenum].replace(old_shortcode, "");
    var arr="";    
    if(array_items.length>2){
    for(var k=1; k<array_items.length-1;k++)
    arr+=array_items[k]+"[/pos_dim]";
    arr=array_items[shortcodenum]+arr;
    }else var arr=array_items[shortcodenum];    
    columnitems[colnum]=arr;   
    rowitems[rownum]=columnitems.join("[/mvb_column]");
   var str= rowitems.join("[/mvb_row]");
    }else{  array_items.splice(shortcodenum,1);
    columnitems[colnum]=array_items.join("[/pos_dim]"); 
    rowitems[rownum]=columnitems.join("[/mvb_column]"); 
    var str= rowitems.join("[/mvb_row]");
    }
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if (tmc_active){
	 tinyMCE.activeEditor.setContent(str);
	}else  $('#content').val(str);
	
}
 less_width=function(i){     
    var  value =684 / 6;
    var width_el = $("#added_items li#"+i).css("width");
    var postmod = $("#added_items #"+i).attr("class");
    var lesswidth =parseInt(width_el) - parseInt(value);
    if (postmod =="postmodules-class" && lesswidth<342 ) 
    lesswidth=684; 	
  	else if (lesswidth < 114)
  		lesswidth=684;  	
	    $("#added_items li#"+i).css("width", lesswidth);
	    var percent_prev= parseInt(width_el) / 114;  
	    if (postmod =="postmodules-class" && percent_prev==3)
	    var percent=6;
	    else if(percent_prev!=1)
        var percent = percent_prev - 1;
        else var percent=6;
	    if(percent==6 )
	    $("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "355");
	    else if(percent==3)
        $("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "230");
        else if(percent==2)
      	$("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "140");
        else if(percent==1)
       	$("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "45");
		var edi_id=$("#content-html");
        switchEditors.switchto(edi_id[0]);      
        var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
        if (tmc_active){
        var e_content= tinyMCE.activeEditor.getContent();
        }else  e_content=$('#content').val();
        var array_items = e_content.split("[/pos_dim]");  
        var shortcode = array_items[i]+'[/pos_dim]';     
	    var newpos=  shortcode.replace("pos_width="+ percent_prev,"pos_width="+ percent);
	    var shortcode_modeified=newpos.split("[/pos_dim]"); 
        array_items[i]=shortcode_modeified[0];	   
		var content =array_items.join("[/pos_dim]"); 
		var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
		if (tmc_active){
	    tinyMCE.activeEditor.setContent(content);
		}else  $('#content').val(content);
	
	   
} 
more_width= function(i){
	   var value =684 / 6;
	   var postmod = $("#added_items #"+i).attr("class");
       var width_el=$("#added_items li#"+i).css("width")
	   var morewidth =parseInt(width_el) + parseInt(value);
       if (postmod =="postmodules-class" && morewidth>684 ) 
       morewidth=342;     	
       else if (morewidth > 684)
       morewidth=114;   
       $("#added_items li#"+i).css("width", morewidth);
	   var percent_prev= parseInt(width_el) / 114;   
       if(percent_prev !=6)
       var percent = percent_prev + 1;
       else if(postmod =="postmodules-class")
       var percent=3;    
       else percent=1; 
       if(percent==4)
       $("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "355");
       else if(percent==3)
       $("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "230");
       else if(percent==2)
       $("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "140");
       else if(percent==1)
       $("#added_items li#"+i).children(".item-name").children("div").children("textarea").css("width", "45");    
       var edi_id=$("#content-html");
       switchEditors.switchto(edi_id[0]);
       var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
       if (tmc_active){
       var e_content= tinyMCE.activeEditor.getContent();
        }else  e_content=$('#content').val();
       var array_items = e_content.split("[/pos_dim]");  
       var shortcode = array_items[i]+'[/pos_dim]';     //
	   var newpos=  shortcode.replace("pos_width="+ percent_prev,"pos_width="+ percent);
	   var shortcode_modeified=newpos.split("[/pos_dim]"); 
       array_items[i]=shortcode_modeified[0];	   
	   var content =array_items.join("[/pos_dim]"); 
	   var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	   if (tmc_active){
	   tinyMCE.activeEditor.setContent(content);
	   }else  $('#content').val(content);
	   
}
 edit_items=function(i){
	     jQuery("#mvb-content").show();
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
         
         var edi_id=$("#content-html");
         switchEditors.switchto(edi_id[0]);
		 var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
         if (tmc_active){
         var str= tinyMCE.activeEditor.getContent();
         }else  str=$('#content').val();
         var rowitems=str.split("[/mvb_row]");      
 		 var columnitems=rowitems[rownum].split("[/mvb_column]"); 
 		 var req_colval=columnitems[colnum];
 		 var array_items=req_colval.split("[/pos_dim]"); 
 		 var shortcode = array_items[shortcodenum]+'[/pos_dim]';  
          var edit_button_id=null;
          if(q_shortcode =="tweet"){ 
        	edit_button_id="edit_tweets";
       	   jQuery(".additional_shortcodes_options").show();
           jQuery(".shortcodes_options").hide();
           jQuery("#special_shortcodes_options").hide();
           jQuery(".additional_shortcodes_options").html('<p class="setting-style"><label>Username </label> <input type="text" class="tweets-settings-list" name="tweet-username" value="" ></p><p class="setting-style"><label>Theme</label><select name="tweet-theme"><option value="Light">Light</option><option value="Dark">Dark</option></select></p><p  class="setting-style"><label>Count</label><input type="text" name="tweet-count" value="5" class="tweets-settings-list" ></p><p class="setting-style"><label>Height</label><input id="tweets_height" type="text" name="tweet-height" value="600" class="tweets-settings-list" ></p><input type="hidden" name="tweet-item-id" value="' + i + '">');
                var num_init = shortcode.indexOf('username');
	            var num_fv = shortcode.indexOf('"', num_init );
	            var num_ev = shortcode.indexOf('"', num_fv + 1);	            
	            var value = shortcode.slice(num_fv+1 , num_ev);
	           $("input[name='tweet-username']").val(value);
	           var num_init = shortcode.indexOf('theme');
	            var num_fv = shortcode.indexOf('"', num_init );
	            var num_ev = shortcode.indexOf('"', num_fv + 1);	            
	            var value = shortcode.slice(num_fv+1 , num_ev);
	           $("select[name='tweet-theme']").val(value);
	           var num_init = shortcode.indexOf('count');
	            var num_fv = shortcode.indexOf('"', num_init );
	            var num_ev = shortcode.indexOf('"', num_fv + 1);	            
	            var value = shortcode.slice(num_fv+1 , num_ev);
	           $("input[name='tweet-count']").val(value);
	           var num_init = shortcode.indexOf('height');
	            var num_fv = shortcode.indexOf('"', num_init );
	            var num_ev = shortcode.indexOf('"', num_fv + 1);	            
	            var value = shortcode.slice(num_fv+1 , num_ev);
	           $("input[name='tweet-height']").val(value);	
			    $(".additional_shortcodes_options").find("select").chosen({width: "100%",disable_search:true});   
	        
        }else if(q_shortcode =="custom-content"){
        	edit_button_id="cus-content-button-edit";
    	   jQuery("#special_shortcodes_options").css("display","block");
    	   jQuery(".additional_shortcodes_options").hide();
           jQuery(".shortcodes_options").css("display","none");
           jQuery("#special_shortcodes_options label").html("<textarea  id='cus-content-textarea'></textarea>");
           $("#cus-content-textarea").markItUp(mySettings);
           var content_init = shortcode.indexOf("mvb_"+q_shortcode);
		    var content_f = shortcode.indexOf("]", content_init);
		    var content_e = shortcode.indexOf("[/mvb_" + q_shortcode + "]", content_f + 1);
		    var content = shortcode.slice(content_f + 1, content_e);
		    jQuery("#cus-content-textarea").val(content);
			$("input[name='custom-item-id']").remove();
		    jQuery('#special_shortcodes_options').after(' <input type="hidden" name="custom-item-id" value="' + i + '">');
        }else {
        	edit_button_id="shortcode-edit";
     	   jQuery("#special_shortcodes_options").css("display","none");
    	   jQuery(".additional_shortcodes_options").hide();     	   
           jQuery(".shortcodes_options").css("display","block");
	    	jQuery('.shortcodes_options').load(mvb_ajax_var.url,{'action': 'mvb_action','nonce':mvb_ajax_var.nonce,shortcode: q_shortcode,shortcode_content:shortcode}, function () {	
		    jQuery(this).append(' <input type="hidden" name="item-id" value="' + i + '">');

		 $(".shortcodes_options").find("select").chosen({width: "100%",disable_search:true});
		 $(".shortcodes_options").find(".color-attr").spectrum({}); 
		 $(".shortcodes_options").find(".color-attr").show(); 
		 $(".shortcodes_options").find(".color-attr-inline").spectrum({}); 
		 $(".shortcodes_options").find(".color-attr-inline").show(); 
		 $(".shortcodes_options").find('.mvb_thumbsgrid').sortable({});
		 $(".shortcodes_options").find(".mvb_range").ionRangeSlider();
	     /*      min: $(this).attr("data-min"),
	            max: $(this).attr("data-max"),
				from: $(this).val(),	          
				postfix: $(this).attr("data-postfix"),
	            step: $(this).attr("data-step"),
	            prefix: $(this).attr("data-prefix"),
	            prettify: true,
	            hasGrid: false,
				hideMinMax: $(this).attr("data-hideMinMax"),
				hideFromTo: $(this).attr("data-hideFromTo") 
	      }); */
		});
		  $.colorbox({href: "#mvb-content", inline:true, width:"90%",height:"95%",closeButton:false,	
	    			title: function(){			
	    				  return '<div style="background-color:#CCCCCC;display:table; width:100%; height:50px;"><a id="mb-cancel-button">Cancel</a><a id="'+edit_button_id+'">Apply</a></div>';
	    					},
	    		    onComplete:function(){$("#box-header").remove();     			
	    			   var item_title=$("#"+q_shortcode).children().children(".title-cat").text();    			   
	    			   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">'+item_title+'</div></div>';
	    			   $("#cboxLoadedContent").before(title_cboxContent);
	    			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtocol' value="+colnum+">");
	    			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtorow' value="+rownum+">");
	    			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-shortcodenum' value="+shortcodenum+">");
	    		
					   	},						       		
	        	       onClosed:function(){
	            	    $(".shortcodes_options").html("");
						$("#box-header").remove();
			   	    	$("input[name=mvb-addtocol]").remove(); 
	    		    	$("input[name=mvb-addtorow]").remove(); 
	    		    	$("input[name=mvb-shortcodenum]").remove(); 
	            	    }
	    					
	      });
        }
       if(q_shortcode =="tweet" || q_shortcode =="custom-content"){
     // colorbox call
	  $.colorbox({href: "#mvb-content", inline:true, width:"90%",height:"95%",closeButton:false,	
    			title: function(){			
    				  return '<div style="background-color:#CCCCCC;display:table; width:100%; height:50px;"> <a id="mb-cancel-button">Cancel</a><a id="'+edit_button_id+'">Apply</a></div>';
    					},
    		    onComplete:function(){$("#box-header").remove();     			
    			   var item_title=$("#"+q_shortcode).children().children(".title-cat").text();    			   
    			   var title_cboxContent='<div id="box-header" ><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">'+item_title+'</div></div>';
    			   $("#cboxLoadedContent").before(title_cboxContent);
    			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtocol' value="+colnum+">");
    			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-addtorow' value="+rownum+">");
    			   $("#cboxLoadedContent").append("<input type='hidden' name='mvb-shortcodenum' value="+shortcodenum+">");
					$(".additional_shortcodes_options").find("#tweets_height").ionRangeSlider({
	            min: 50,
	            max: 1000,
				from: $(this).val(),
	            type: 'single',
	            step: 1,
	            prefix: "px",
	            prettify: true,
	            hasGrid: false
	        });	
    		    },
    		   onClosed:function(){
           	    	$("#box-header").remove();
           	    	$("input[name=mvb-addtocol]").remove(); 
    		    	$("input[name=mvb-addtorow]").remove(); 
    		    	$("input[name=mvb-shortcodenum]").remove(); 
         	    }   //	 
    				
      });	  
	   } 
		
	} 
 
retrieve_items= function() {
	 $(".container-editable").html("");
     var str=$('#content').val();  
	//version 2.0
    if(str!==undefined){
	var rowitems=str.split("[/mvb_row]");	
	var columnitems=[];var array_items=[];var j=0;
	for(var i=0;i<rowitems.length;i++)
	if(rowitems[i].indexOf("[mvb_row")!==-1)	
	if(rowitems[i].length>0){
	columnitems[j]=rowitems[i].split("[/mvb_column]"); 
	j++;
	}
	for(var h=0;h<columnitems.length;h++){
	$(".container-editable").append('<div id="mvb-row-'+h+'" class="row-editable editable-component"><div onclick="coldivider_icons(this)" class="settings-button2 column-row-dividing"></div><div class="settings-button2 row-edit-btn" onclick="edit_row(this.parentNode.id)"></div><div class="settings-button2 row-delet-btn" onclick="del_row(this.parentNode.id)"></div><div class="settings-button2 row-copy-btn" onclick="clone_row(this.parentNode.id)" ></div><div   style="display: none;" class="toolbar-icons" ><a href="#" ><i class="ico-1column"></i></a><a href="#" ><i class="ico-1-2column" ></i></a><a href="#" ><i class="ico-1-3colmun"></i></a><a href="#" ><i class="ico-3-4-1column"></i></a><a href="#" ><i class="ico-1-4column"></i></a><a href="#" ><i class="ico-3-4-2column"></i></a><a href="#" ><i class="ico-2-4column"></i></a><a href="#" ><i class="ico-2-4-0column"></i></a><a href="#" ><i class="ico-1-6column"></i></a><a href="#" ><i class="ico-3-6column"></i></a><a href="#" ><i class="ico-custom-column"></i></a></div><div class="mvb-col-container"></div></div>');

	for(var k=0;k<columnitems[h].length;k++)	
	if(columnitems[h][k]){
	var str=columnitems[h][k];
	var attrname=str.indexOf("width");
	if(attrname !=-1){
	var valb=str.indexOf('"',attrname);
	var vale=str.indexOf('"',valb+1);
	var val= str.slice(valb+1 , vale);
	var colnumerator=val.split("/")[0];
	var coldenominator=val.split("/")[1];
	var colclassval=parseInt(colnumerator)*12/parseInt(coldenominator);
	if(colclassval<1) colclassval=Math.round(colclassval); else  colclassval=Math.floor(colclassval);
	}
	$(".container-editable").children("#mvb-row-"+h).children('.mvb-col-container').append('<div id="mvb-r'+h+'-c'+k+'" class="col-xs-'+colclassval+'"> <a onclick="addel_tocol(this.parentNode.id)" class="column-ae-button" href="#"> <div class="column-plus"></div></a><a onclick="edit_col(this.parentNode.id)" class="column-ee-button" href="#"><div class="column-edit"></div></a><div class="editable-items"></div></div></div></div>');
	 var array_items = str.split("[/pos_dim]");
     var i = 0;
     var shortcode_name = [];
     $(".shortcode_hlinks").each(function () {
         shortcode_name[i] = $(this).attr("id");
         i++;
     });
     var i = 0;
     while (array_items[i]) {
         var num_init = array_items[i].indexOf("[pos_dim");
         var num_ws = array_items[i].indexOf("=");
         var num_we = array_items[i].indexOf("]", num_ws + 1);          
         var width_value = array_items[i].slice(num_ws + 1, num_we);        
         var width_px = (width_value / 6) * 684;
         var num_s = array_items[i].indexOf("]",num_init);
         var num_e = array_items[i].indexOf("]",num_s+1);       
         if(num_e!=-1){
         var str_source = array_items[i].slice(num_s, num_e);      
         var j = 0;       
         var post="mvb_post-modules";
         r = "\\[("+post+")";
     	 reg = new RegExp(r, "g");
         var result = str_source.match(reg); 
         var tweet="mvb_tweet";
         r = "\\[("+tweet+")";
     	 reg = new RegExp(r, "g");            
         var result_tweet = str_source.match(reg);        
         if (result == null && result_tweet== null ) {
         while (shortcode_name[j]) {
		 var req_shortcode="mvb_"+shortcode_name[j];
         r = "\\[("+req_shortcode+")";
         reg = new RegExp(r, "g");
         var result3 = str_source.match(reg);
         if (result3 == null)
         var name="none";
         else {
         var name = shortcode_name[j];
         break;
          }
          j++;               
          }
          }else if (result !== null)
         var name = "Post";
         else if(result_tweet !== null)
          name = "tweet";
         else name="none"; 
         }else  name="none";
         if (num_init != -1) {
             if (name == "Post")                 
             $("#mvb-r"+h+"-c"+k).children(".editable-items").append('<li class="postmodules-class" ><a   onclick="del_items(this)"><div class="del-icon"></div></a><a  onclick="edit_postmodules(this)"><div class="edit-item-styl"></div></a><a onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name" ><div>' + name + '</div></div></li></div>');           
             else if(name == "none")
             $("#mvb-r"+h+"-c"+k).children(".editable-items").append('<li class="user-content" ><a   onclick="del_items(this)"><div class="del-icon"></div></a><a  onclick="edit_usercontent(this)"><div class="edit-item-styl"></div></a><a onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name" ><div><textarea  style="height:25px;margin-top:22px;overflow:hidden;resize:none;padding:0;" disabled>' + array_items[i].slice(num_s+1) + '</textarea></div></div></li></div>');           
            
             else  $("#mvb-r"+h+"-c"+k).children(".editable-items").append('<li><a   onclick="del_items(this)"><div class="del-icon"></div></a><a  onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a onclick="copy_items(this)"><div class="clone-icon"></div></a><div class="item-name" ><div>' + name + '</div></div></li></div>');
                          
             $("#added_items li#" + i).css("width", width_px);
             $(".postmodule-edit-area").show();
         }
         i++;
     }
	}
	}
	$(".container-editable").find(".editable-items").sortable({connectWith: ".editable-items" }).disableSelection();
 }
}
copy_items=function(i){	
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
    var itemdiv=$(i).parent("li").html();
    if(shortcodenum !=undefined)
    $(i).parent("li").after("<li style='width:100%'>"+itemdiv+"</li>");
    var edi_id=$("#content-html");
    switchEditors.switchto(edi_id[0]);
	 var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
    if (tmc_active){
    var str= tinyMCE.activeEditor.getContent();
    }else  str=$('#content').val();
	// version 2.0		
    var rowitems=str.split("[/mvb_row]");
    var columnitems=rowitems[rownum].split("[/mvb_column]"); 
    var req_colval=columnitems[colnum];
    var array_items=req_colval.split("[/pos_dim]"); 
    if(shortcodenum ==0){
   var num1=array_items[shortcodenum].indexOf("[pos_dim");	
   var cloneitem=array_items[shortcodenum].slice(num1,array_items[shortcodenum].length);  
   }else var cloneitem=	array_items[shortcodenum];
    array_items.splice(shortcodenum+1,0,cloneitem); 
    columnitems[colnum]=array_items.join("[/pos_dim]"); 
    rowitems[rownum]=columnitems.join("[/mvb_column]"); 
    var str= rowitems.join("[/mvb_row]");
	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
	if (tmc_active){
	tinyMCE.activeEditor.setContent(str);
	}else  $('#content').val(str);  
	

}
retrieve_items();

$(document).on("click","#mvb_addnew_inline",function(e){
var selector=$("#mvb_addnew_inline").parent(".mvb_main_inline");
selector.children(".inline_shortcode_options").children(".setting-style").children().each(function(){
});
selector.clone().insertAfter(selector);

selector.next(".mvb_main_inline").find(".chosen-container").remove();
selector.next(".mvb_main_inline").find("#mvb_addnew_inline").remove();
selector.next(".mvb_main_inline").find("select").chosen({width: "100%",disable_search:true});
selector.next(".mvb_main_inline").find(".sp-replacer").remove();
selector.next(".mvb_main_inline").find(".color-attr-inline").spectrum({});
selector.next(".mvb_main_inline").find(".color-attr-inline").show();
selector.next(".mvb_main_inline").find(".irs").remove();
selector.next(".mvb_main_inline").find(".mvb_range").ionRangeSlider();
	    /*        min: $(this).attr("data-min"),
	            max: $(this).attr("data-max"),
				from: $(this).val(),
	            type: 'single',
				//postfix: $(this).attr("data-postfix"),
	            step: $(this).attr("data-step"),
	            prefix: $(this).attr("data-prefix"),
	            prettify: true,
	            hasGrid: false, 
		
				
	        }); */

if(selector.next(".mvb_main_inline").find(".mvb_delete_inline").attr("class")==undefined)
selector.next(".mvb_main_inline").find(".mvb_barname").after('<a class="mvb_delete_inline" >&times;</a>');
});
$(document).on("click",".mvb_barname",function(){
	
	$(this).parent(".brick").next(".inline_shortcode_options").slideToggle();
});

$(document).on("click",".mvb_delete_inline",function(e){	
	$(this).parent(".brick").parent(".mvb_main_inline").remove();


    });
});