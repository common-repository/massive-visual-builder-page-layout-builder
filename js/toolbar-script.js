var coldivider_icons;
var colval_icon;
jQuery(document).ready(function($) {
				$('.toolbar-icons a').on('click', function( event ) {
					event.preventDefault();
				});		
				coldivider_icons=function(i){					
				var ssv=$(i).parent().children(".toolbar-icons");
				ssv.children().attr("class","coldivid-"+$(i).parent().attr("id"));
				$(i).toolbar({content:ssv, position: 'top', hideOnClick: 'true'});			
			     }
			  	
				$(document).on('toolbarItemClick','.settings-button2.column-row-dividing',function( event,element ) {
					var elementid=$(element).attr("class");
				var row_id=elementid.split("tool-item gradient")[0].split("coldivid-")[1];
				row_id=row_id.toString();
				var class_dival=$(element).children().attr("class");
				var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
				if(tmc_active){
				var str= tinyMCE.activeEditor.getContent();
				}else  str=$('#content').val();	
				var row_num=row_id.split("mvb-row-");
				var i=row_num[1];				
				if(class_dival=="ico-1column"){
				var col_num=1;				
				var exist_colnum=0;	
				var col_width=["1/1"];					
				var items=str.split("[/mvb_row]");	
				var req_row=items[parseInt(i)];
				var req_column=req_row.split("[/mvb_column]");
				var modified_str="";
				$("#"+row_id).children(".mvb-col-container").children().each(function(){
					if(exist_colnum<=col_width.length-1){					
					var bpos=req_column[exist_colnum].indexOf('width=');
					var epos=req_column[exist_colnum].indexOf('"',bpos+8);
					var colw_val=req_column[exist_colnum].slice(bpos,epos);
					var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
					modified_str+=modified_col;					
					$(this).attr("class","col-xs-12");
					exist_colnum++;
					}else $(this).remove();
					});
                items[parseInt(i)]=modified_str;
                var content=items.join("[/mvb_row]");
               if(tmc_active){
	           var str= tinyMCE.activeEditor.setContent(content);
	           }else  str=$('#content').val(content);					
				
				}else if(class_dival=="ico-1-2column"){
					var col_num=2;				
					var exist_colnum=0;	
					var col_width=["1/2","1/2"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						$(this).attr("class","col-xs-6");
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="col-xs-6"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)" onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				}else if(class_dival=="ico-1-3colmun"){	
					var col_num=3;				
					var exist_colnum=0;	
					var col_width=["1/3","1/3","1/3"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						$(this).attr("class","col-xs-4");
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="col-xs-4"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				
				}
				else if(class_dival=="ico-3-4-1column"){	
					var col_num=2;				
					var exist_colnum=0;	
					var col_width=["3/4","1/4"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;	
						if(exist_colnum==0)
						$(this).attr("class","col-xs-9");
						else $(this).attr("class","col-xs-3");
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="col-xs-3"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				  
				}else if(class_dival=="ico-1-4column"){	
					var col_num=4;				
					var exist_colnum=0;	
					var col_width=["1/4","1/4","1/4","1/4"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						$(this).attr("class","col-xs-3");						
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="col-xs-3"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				  }
				else if(class_dival=="ico-3-4-2column"){	
					var col_num=2;				
					var exist_colnum=0;	
					var col_width=["1/4","3/4"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						if(exist_colnum==0)
						$(this).attr("class","col-xs-3");
						else $(this).attr("class","col-xs-9");					
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="col-xs-9"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				}				
				else if(class_dival=="ico-2-4column"){	
					var col_num=3;				
					var exist_colnum=0;	
					var col_width=["1/4","1/4","1/2"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						if(exist_colnum==0 || exist_colnum==1)
						$(this).attr("class","col-xs-3");
						else $(this).attr("class","col-xs-6");					
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					if(exist_colnum==1)	var classname="col-xs-3";
					else classname="col-xs-6";
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="'+classname+'"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				}
				else if(class_dival=="ico-2-4-0column"){	
					var col_num=3;				
					var exist_colnum=0;	
					var col_width=["1/4","1/2","1/4"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						if(exist_colnum==0 || exist_colnum==2)
						$(this).attr("class","col-xs-3");
						else $(this).attr("class","col-xs-6");					
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					if(exist_colnum==1)	var classname="col-xs-6";
					else classname="col-xs-3";
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="'+classname+'"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				}
				
				else if(class_dival=="ico-1-6column"){	
					var col_num=6;				
					var exist_colnum=0;	
					var col_width=["1/6","1/6","1/6","1/6","1/6","1/6"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;			
						$(this).attr("class","col-xs-2");										
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){					
					 classname="col-xs-2";
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="'+classname+'"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column col_class="" col_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				}
				else if(class_dival=="ico-3-6column"){	
					var col_num=4;				
					var exist_colnum=0;	
					var col_width=["1/6","1/6","1/6","1/2"];					
					var items=str.split("[/mvb_row]");	
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#"+row_id).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=col_width.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;							
						if(exist_colnum<3)
						$(this).attr("class","col-xs-2");
						else $(this).attr("class","col-xs-6");					
						exist_colnum++;
						}else $(this).remove();
						});
					while(exist_colnum<col_num){
					if(exist_colnum<3)	var classname="col-xs-2";
					else classname="col-xs-6";
					$("#"+row_id).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="'+classname+'"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column mvb_class="" width="'+col_width[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);					
				}
				else if(class_dival=="ico-custom-column"){	
				   	$.colorbox({html:'<div class="addelements shortcodes_options"><p class="setting-style"><label for="su-generator-attr-title">Insert custom coulmns division in format like 1/3+1/3+1/3 : </label><input class="mvb-su-generator-attr" type="text" name="mvb_custom_column_divider"></div>', width:"80%",height:"85%",closeButton:false,      //         version 2.0
		        		title: function(){	            		
		        			var apply_button_id="mvb-custom-col-layout";
		        			  return '<div style="background-color:#E2E2E2;display:table; width:100%; height:50px;"> <a id="mb-cancel-button">Cancel</a><a id="'+apply_button_id+'" class="mvb_colorbox_buttons">Apply</a></div>';
		        				},
		        	    onComplete:function(){
		        	    	var items=str.split("[/mvb_row]");	
							var req_row=items[parseInt(i)];
							var req_column=req_row.split("[/mvb_column]");
							var old_division=[];
							for(var k=0;k<req_column.length;k++){							
							var attrname=req_column[k].indexOf("width");
							if(attrname !=-1){
							var valb=req_column[k].indexOf('"',attrname);
							var vale=req_column[k].indexOf('"',valb+1);
						    var val= req_column[k].slice(valb+1,vale); 
						    old_division[k]=val;
						    }
							}
							$("input[name=mvb_custom_column_divider]").val(old_division.join("+"));							
		        		    var title_cboxContent='<div id="box-header"><div style="float:left; font-size: 14px;font-family:Open Sans,sans-serif; color:#FFFFFF; font-weight:600; margin-left: 10px; margin-top:0; margin-bottom:0; line-height:1.3em;">Custom Columns Layout</div></div>';
		        		   $("#cboxLoadedContent").before(title_cboxContent);		        	
		       		    jQuery('.shortcodes_options').after(' <input type="hidden" name="row_num" value="' + i + '">');

						  },
		        	     onClosed:function(){ 
		        	      $("#box-header").remove();
		        	    }
		        	});
				}
	
				$(".container-editable").find(".editable-items").sortable({connectWith: ".editable-items" }).disableSelection();
					});
				$(document).on("click","#mvb-custom-col-layout",function(event,element){		
					var i=$("input[name=row_num]").val();
					var customval=$("input[name=mvb_custom_column_divider]").val();			
					var patt1 =/(\+[1-6]\/[1-6])/g;
					var re2 = new RegExp(patt1)
					var matches, output = [];var s=0;		
					while (matches= re2.exec("+"+customval)) {
						output[s]=matches[0];				
						s++;		
						}
		
					if(output.join("")!="+"+customval)
					alert("you have to use 'num1/num2+num3/num4' format with division by a 6 as maximum number");
					else  {
					var customval=customval.split("+");				
					var l=0;var colsum=0;while(l<customval.length){
						colsum=colsum+parseInt(customval[l].split("/")[0])/parseInt(customval[l].split("/")[1]);
						l++;
					}
								
					if(colsum <1 && colsum<0.99 || colsum>1 )
					alert("sum of columns divisions must be equal to 1");
					else {
					var col_num=customval.length;				
					var exist_colnum=0;	
					var col_width=customval;
					var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");
					if(tmc_active){
						var str= tinyMCE.activeEditor.getContent();
					}else  str=$('#content').val();	
					var items=str.split("[/mvb_row]");	
					
					var req_row=items[parseInt(i)];
					var req_column=req_row.split("[/mvb_column]");
					var modified_str="";
					$("#mvb-row-"+i).children(".mvb-col-container").children().each(function(){
						if(exist_colnum<=customval.length-1){					
						var bpos=req_column[exist_colnum].indexOf('width=');
						var epos=req_column[exist_colnum].indexOf('"',bpos+8);
						var colw_val=req_column[exist_colnum].slice(bpos,epos);
				
						var modified_col=req_column[exist_colnum].replace(colw_val,'width="'+col_width[exist_colnum])+"[/mvb_column]";
						modified_str+=modified_col;	
						var col=parseInt(customval[exist_colnum].split("/")[0])*12/parseInt(customval[exist_colnum].split("/")[1]);	
						if(col<1) col=Math.round(col); else  col=Math.floor(col);
						$(this).attr("class","col-xs-"+col);
						exist_colnum++;
						}else $(this).remove();
						}); 
			
					while(exist_colnum<col_num){
					var col=parseInt(customval[exist_colnum].split("/")[0])*12/parseInt(customval[exist_colnum].split("/")[1]);	
					if(col<1) col=Math.round(col); else  col=Math.floor(col);
					classname="col-xs-"+col;
					$("#mvb-row-"+i).children(".mvb-col-container").append('<div id="mvb-r'+parseInt(i)+'-c'+exist_colnum+'" class="'+classname+'"> <a href="#" class="column-ae-button"  onclick="addel_tocol(this.parentNode.id)"> <div class="column-plus"></div></a><a href="#" class="column-ee-button" onclick="edit_col(this.parentNode.id)"><div class="column-edit"></div></a><div class="editable-items"></div></div>');
					modified_str=modified_str+'[mvb_column mvb_class="" width="'+customval[exist_colnum]+'"][/mvb_column]';
					exist_colnum++;
					}
	                items[parseInt(i)]=modified_str;
	                var content=items.join("[/mvb_row]");	          	
	               if(tmc_active){
		           var str= tinyMCE.activeEditor.setContent(content);
		           }else  str=$('#content').val(content);
					
					$.colorbox.close();		
					$(".container-editable").find(".editable-items").sortable({connectWith: ".editable-items" }).disableSelection();

					}
					}
					
					});
					
			
});