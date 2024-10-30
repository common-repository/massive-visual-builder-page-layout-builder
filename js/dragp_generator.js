/*
 * Massive Visual Builder for Wordpress
 * All rights reserved 2014
 * 
 * Drag & Drop Page Items Handler.
 */
	var shortcode;

jQuery(document).ready(function ($) {
	
	$(document).on("sortstop",".editable-items", function( event, ui ) {
		if(event.target.parentNode.id == $(ui.item[0]).parent().parent().attr("id") ){
	    var i=event.target.parentNode.id;
		var old_shortcodenum=ui.item[0].id.split("mvb-drag-item-signal-")[1];
		var colrow_num=$("#"+i).attr("id").split("mvb-r")[1].split("-c");
		var rownum=colrow_num[0];
		var colnum=colrow_num[1];		    
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
      		     	  var j=0; 				
						var init_rowcol=array_items[0].split("[pos_dim")[0];
					  array_items[0] ="[pos_dim"+array_items[0].split("[pos_dim")[1];
					var newarray_items=[];      	  var j=0; 
			  		   $(event.target).children("li").each(function(){
			  			 var id=$(this).attr("id").split("mvb-drag-item-signal-")[1];
						 if(j==0)
					   newarray_items[j]=init_rowcol+array_items[id]+"[/pos_dim]"; 				
			  		   else  newarray_items[j]=array_items[id]+"[/pos_dim]"; 
			  		    j++;
			  		    }); 
			         columnitems[colnum]=newarray_items.join(""); 
			          rowitems[rownum]=columnitems.join("[/mvb_column]"); 
			          var str= rowitems.join("[/mvb_row]");	       
			          if(tmc_active){
			          	tinyMCE.activeEditor.setContent(str);
			          	}else jQuery('#content').val(str);			 
		}
		
	});
	
	$(document).on("sortstart",".editable-items", function( event, ui ){
		    var j=0; var shortcodenum=0;
		    $(event.target).children("li").each(function(event){
		    if($(this).hasClass("ui-sortable-placeholder")==false){
		    $(this).attr("id","mvb-drag-item-signal-"+j);	  
		    j++;
			}			
		    });	
	});
	
$(document).on("sortremove",".editable-items", function( event, ui ){
	var i=event.target.parentNode.id;
	var shortcodenum=ui.item[0].id.split("mvb-drag-item-signal-")[1];
	var colrow_num=$("#"+i).attr("id").split("mvb-r")[1].split("-c");
	var rownum=colrow_num[0];
	var colnum=colrow_num[1];
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
	
	 if(shortcodenum==0){		
		 var shortcode ="[pos_dim"+array_items[shortcodenum].split("[pos_dim")[1];;
	 }else  var shortcode = array_items[shortcodenum];  
	$("input[name=mvb_drag_shrt]").val(shortcode);
    if(shortcodenum ==0){
        var num1 = array_items[shortcodenum].indexOf("[pos_dim");
        var shortcode = array_items[shortcodenum].slice(num1);
        array_items[shortcodenum] = array_items[shortcodenum].replace(shortcode, "");
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
}); 

	

$(document).on("sortreceive",".editable-items", function( event, ui){
	var j=0;
    $(event.target).children("li").each(function(){
    if($(this).attr("id")==ui.item[0].id){ 
    $(this).attr("id","mvb-drop-item-signal-"+j);	  
    }      
    j++;
    });
	var i=event.target.parentNode.id;
	var shortcodenum=ui.item[0].id.split("mvb-drop-item-signal-")[1];
	var colrow_num=$("#"+i).attr("id").split("mvb-r")[1].split("-c");
	var rownum=colrow_num[0];
	var colnum=colrow_num[1];	
	var shrt_val=$("input[name=mvb_drag_shrt]").val();
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
    if(shortcodenum ==0){
      	if(event.target.children.length !==1){
        var shortcode ="[pos_dim"+array_items[shortcodenum].split("[pos_dim")[1];
         array_items[shortcodenum] = array_items[shortcodenum].replace(shortcode, shrt_val+"[/pos_dim]"+shortcode);
    	}else {
    	 array_items[shortcodenum] =array_items[shortcodenum].split("[/mvb_column]")[0]+shrt_val+"[/pos_dim]";
	
    	}
  
        }else  array_items.splice(shortcodenum,0,shrt_val);

        columnitems[colnum]=array_items.join("[/pos_dim]"); 
        rowitems[rownum]=columnitems.join("[/mvb_column]"); 
        var str= rowitems.join("[/mvb_row]");   
        
        if(tmc_active){
        	tinyMCE.activeEditor.setContent(str);
        	}else jQuery('#content').val(str);
 

});	

	    function saveOrder() {	    	
	   	var j=0;	   	
	   	var item_id=jQuery(".editable-items li").attr("id");	
		var edi_id=jQuery("#content-html");
        switchEditors.switchto(edi_id[0]);  	
	   	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
    	if (tmc_active){
    	var content= tinyMCE.activeEditor.getContent();
    	}else  var  content= jQuery('#content').val();
		var array_items = content.split("[/pos_dim]");	   
	    var newarray=[];	   		   
		jQuery("#added_items li").each(function(){
		var id=jQuery(this).attr("id");		
		newarray[j]=array_items[id]+"[/pos_dim]";			
		j++; });		
		var data=newarray.join("");		
		jQuery('#content').val(data);
		var j=0;
		jQuery("#added_items li").each(function(){
		jQuery(this).attr("id",j);		
		j++; }); 		
        }

$(".container-editable").sortable({
stop: function( event, ui ) {
           	var item_id=$(event.target).children("div").attr("id");
           	var j=0;
        	var edi_id=jQuery("#content-html");
            switchEditors.switchto(edi_id[0]);  
        	var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
        		if(tmc_active){
        		var str= tinyMCE.activeEditor.getContent();
        		}else  str=jQuery('#content').val();	
        	var items=str.split("[/mvb_row]");	
            var newarray=[];	   		   
            jQuery(".row-editable").each(function(){
    		var id=jQuery(this).attr("id");
    		var row_num=id.split("mvb-row-");
    		var id=row_num[1];
    		newarray[j]=items[id]+"[/mvb_row]";			
    		j++; });
        	var content =newarray.join("");
        	var j=0;
        	jQuery(".row-editable").each(function(){
        	jQuery(this).attr("id","mvb-row-"+j);
        	var colnum=0;
        	jQuery(this).attr("id","mvb-row-"+j).children(".mvb-col-container").children().each(function(){jQuery(this).attr("id","mvb-r"+j+"-c"+colnum);colnum++;   });	
        	j++;
        	});
        	if(tmc_active){
        	tinyMCE.activeEditor.setContent(content);
        	}else jQuery('#content').val(content);
        	
        }
});

});