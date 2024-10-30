/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Tweet Shortcode Manager : Add,Edit and Delete.
 */
jQuery(document).ready(function ($) {
 $("#tweet").click(function(){	
	 $(".additional_shortcodes_options").html('<p class="setting-style"><label>Username </label> <input type="text" class="tweets-settings-list" name="tweet-username" value="" ></p><p class="setting-style"><label>Theme</label><select name="tweet-theme"><option value="Light">Light</option><option value="Dark">Dark</option></select></p><p  class="setting-style"><label>Count</label><input type="text" name="tweet-count" value="5" class="tweets-settings-list" ></p><p class="setting-style"><label>Height</label><input id="tweets_height" type="text" name="tweet-height" value="" class="tweets-settings-list" ></p>');
	 $(".additional_shortcodes_options").find("select").chosen({width: "100%",disable_search:true});
     jQuery("#mvb-content").show();
	 $(".shortcodes_options").hide();
     $("#special_shortcodes_options").hide();
	 $(".additional_shortcodes_options").show();	 
     //colorbox call
 	$.colorbox({href: "#mvb-content",inline:true, width:"90%",height:"95%",closeButton:false,
 		title: function(){	            		
 			var apply_button_id="add_tweets";
 			  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"><a class="mvb_back_fullwidgets">Back To Widget List</a><a id="mb-cancel-button">Cancel</a><a  id="'+apply_button_id+'">Apply</a></div>';
 				},
 	    onComplete:function(){
 	       $("#box-header").remove();
 		   var item_title=$("#tweet").children().children(".title-cat").text();
 		   var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight: 600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">'+item_title+'</div></div>';
 		   $("#cboxLoadedContent").before(title_cboxContent);
		   $("#tweets_height").ionRangeSlider({
	            min: 50,
	            max: 1000,
				from: 70,
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
	    }
 	    }); 		 
 });
 $(document).on('click', '#add_tweets',function(){
	  var edi_id=$("#content-html");
      switchEditors.switchto(edi_id[0]);
	  var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
      if (tmc_active){
      var    str= tinyMCE.activeEditor.getContent();     
      }else  str=$('#content').val();
      var username=  $("input[name='tweet-username']").val().replace(/["']/g, "");
      var theme=$("select[name='tweet-theme']").val().replace(/["']/g, "");
      var count=  $("input[name='tweet-count']").val().replace(/["']/g, "");
      var height=  $("input[name='tweet-height']").val().replace(/["']/g, "");
      var tweet_shortcode='[mvb_tweet  username="'+username+'" theme="'+theme+'" count="'+count+'" height="'+height+'"]';
      if(str=="") var i=0;
      else{
      var array_items = str.split("[/mvb_row]");
      var  i = array_items.length-1;
       }     
      // version 2.0
      if($("input[name=mvb-addtocol]").val() !=undefined)
      var colnum=$("input[name=mvb-addtocol]").val();
      if($("input[name=mvb-addtorow]").val() !=undefined)
      var rownum=$("input[name=mvb-addtorow]").val();
      if(!colnum && !rownum){
      str = str + '[mvb_row row_class=""][mvb_column width="1/1"][pos_dim pos_width=6]' + tweet_shortcode + '[/pos_dim][/mvb_column][/mvb_row]';
      $(".container-editable").append('<div id="mvb-row-'+i+'" class="row-editable editable-component"><div onclick="coldivider_icons(this)"  class="settings-button2 column-row-dividing"></div><div class="settings-button2 row-edit-btn" onclick="edit_row(this.parentNode.id)"></div><div class="settings-button2 row-delet-btn" onclick="del_row(this.parentNode.id)"></div><div class="settings-button2 row-copy-btn" onclick="clone_row(this.parentNode.id)" ></div><div style="display: none;" class="toolbar-icons" id="user-options"><a onclick="colval_icon(this)" href="#"><i class="ico-1column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-1-2column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-1-3colmun"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-3-4-1column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-1-4column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-3-4-2column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-2-4column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-2-4-0column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-1-6column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-3-6column"></i></a><a onclick="colval_icon(this)" href="#"><i class="ico-custom-column"></i></a></div><div class="mvb-col-container"><div id="mvb-r'+i+'-c0" class="col-xs-12"><a onclick="addel_tocol(this.parentNode.id)"  class="column-ae-button" href="#"> <div class="column-plus"></div></a><a onclick="edit_col(this.parentNode.id)" class="column-ee-button" href="#"><div class="column-edit"></div></a><div class="editable-items"><li id=' + i + ' style="width: 100%;"><a   onclick="del_items(this)"><div class="del-icon"></div></a><a  onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a  onclick="copy_items(this)"><div class="clone-icon"></div></a><a onclick="del_items(this)"><div class="del-icon"></div></a><div class="item-name" ><div>tweet</div></div></li></div></div></div></div></div>');
        var top=$("#mvb-row-"+i).offset().top-200;
		 $(window).scrollTop(top);
	  } else {
      var rowitems=str.split("[/mvb_row]");      
      var columnitems=rowitems[rownum].split("[/mvb_column]"); 
      var req_colval=columnitems[colnum];
      columnitems[colnum]=req_colval+'[pos_dim pos_width=6]'+tweet_shortcode+'[/pos_dim]';
      rowitems[rownum]=columnitems.join("[/mvb_column]");
      str=rowitems.join("[/mvb_row]");
      $("#mvb-row-"+rownum.toString()).children(".mvb-col-container").children("#mvb-r"+rownum+"-c"+colnum).children(".editable-items").append('<li style="width: 100%;" ><a onclick="del_items(this)"><div class="del-icon"></div></a><a onclick="edit_items(this)"><div class="edit-item-styl"></div></a><a onclick="copy_items(this)"><div class="clone-icon"></div></a><a onclick="del_items(this)"><div class="del-icon"></div></a><div class="item-name"><div>tweet</div></div></li>');
	   var top=$("#mvb-row-"+rownum.toString()).offset().top-200;
       $(window).scrollTop(top);
      }
      //         
      if (tmc_active){
      tinyMCE.activeEditor.setContent(str);     
      }else $('#content').val(str);
      $(".postmodule-edit-area").show();
      $(".additional_shortcodes_options").hide();
      $.colorbox.close();
	  $(".container-editable").find(".editable-items").sortable({connectWith: ".editable-items" }).disableSelection();
 });
 $(document).on('click', '#edit_tweets',function(){
	 var colnum=$("input[name=mvb-addtocol]").val(); //version 2.0
   	 var rownum=$("input[name=mvb-addtorow]").val(); //version 2.0
     var shortcodenum=$("input[name=mvb-shortcodenum]").val(); //version 2.0
	 var edi_id=$("#content-html");
     switchEditors.switchto(edi_id[0]);
	 var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
     if (tmc_active){
     var    str= tinyMCE.activeEditor.getContent();     
     }else  str=$('#content').val();
     var username=  $("input[name='tweet-username']").val().replace(/["']/g, "");
     var theme=$("select[name='tweet-theme']").val().replace(/["']/g, "");
     var count=  $("input[name='tweet-count']").val().replace(/["']/g, "");
     var height=  $("input[name='tweet-height']").val().replace(/["']/g, "");
     var item_id=$("input[name='tweet-item-id']").val().replace(/["']/g, "");
     var shortcode='[mvb_tweet username="'+username+'" theme="'+theme+'" count="'+count+'" height="'+height+'" ]'; 
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

     if (tmc_active){
     tinyMCE.activeEditor.setContent(str);     
     }else  $('#content').val(str);
     $.colorbox.close();

});

});