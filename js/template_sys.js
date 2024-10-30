/*
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 * 
 * Template Sys Data collector : used to collect data and send it to template system handler  .
 */
jQuery(document).ready(function ($) {	
    $("#save_template").click(function () {
        var tmp_name = $("input[name='template_name']").val();
        var plugin_url = $("input[name='plugin_url']").val();
        if (tmp_name != "") {
           var template = [];
            template[0] = tmp_name;
        //    var i = 1;
			var edi_id=$("#content-html");
            switchEditors.switchto(edi_id[0]);			
		    var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");          
            if (tmc_active)
            var content=tinyMCE.activeEditor.getContent();
			else content=$('#content').val();    
            template[1]=content;
                
                $.ajax({
                data: {'action': 'mvb_tmp_action','nonce':mvb_tmp_ajax_var.nonce,'temp': template },
                type: 'POST',
                url: mvb_tmp_ajax_var.url,
                complete: function () {
                },
                success: function (result) {
                   	if (result == 0)
                	alert("please do not use special chars with template name");
                	else if (result == 1)
                    alert("this Template is already exists");
                    else  $("#templates-list").html(result);
                }
            });
        }
    });    
});
function load_template(e){	
    jQuery(document).ready(function ($) {
	var tempid_parent=$(e).parent().parent(".dropdown-menu").parent(".btn-group");	
	var temp_name=$(tempid_parent).children(".btn-primary").children(".temp-name").html();
	 var plugin_url = $("input[name='plugin_url']").val();  
   	        $.ajax({
                data: {'action': 'mvb_tmp_action','nonce':mvb_tmp_ajax_var.nonce,'temp_name': temp_name },
                type: 'POST',
                url: mvb_tmp_ajax_var.url,             
                success: function (result) { 
				 var tmc_active=jQuery("#wp-content-wrap").hasClass("tmce-active");          
                 if (tmc_active){
                 tinyMCE.activeEditor.setContent(result);
          	     }else $('#content').val(result); 
				  retrieve_items();	
				} 
});
});
}

function dis_del_icon(e){
  	 var iconid=jQuery(e).children('#del-icon').css('display','block');     
   }
   function hide_del_icon(e){
	 	 var iconid=jQuery(e).children('#del-icon').css('display','none');   	
   }
   function del_template(e){
	jQuery(document).ready(function ($) { 
    var tempid_parent=$(e).parent().parent(".dropdown-menu").parent(".btn-group");	
	var tempid=$(tempid_parent).children(".btn-primary").children(".temp-name").html();
	var plugin_url = $("input[name='plugin_url']").val();	
  $.ajax({      data: {'action': 'mvb_tmp_action','nonce':mvb_tmp_ajax_var.nonce,'del-temp':tempid} ,
                type: 'POST',
                url: mvb_tmp_ajax_var.url,
                complete: function () {
                },
           success: function (result) {
           $("#templates-list").html(result);
         }
     });  
   });
	   
   }