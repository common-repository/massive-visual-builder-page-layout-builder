<?php
/**
 * shortcodes-ultimate.3.9.5
 * http://wordpress.org/plugins/shortcodes-ultimate/
 * GNU General Public License, version 2
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

require('inline_generator.php');
//require('../../edit_items.php');
add_action( 'admin_enqueue_scripts', 'mvb_settings_loadfiles' );

function mvb_settings_loadfiles(){

wp_enqueue_script('mvb_settings_generator');
wp_localize_script('mvb_settings_generator', 'mvb_ajax_var', array(
    'url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('ajax-nonce')
));
}
add_action( 'wp_ajax_mvb_action', 'mvb_action_callback' );
function mvb_action_callback()
{
  
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
   if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
      die ( 'Busted!');
      // Param check
   if ( empty( $_POST['shortcode'] ) )
      die( 'Shortcode not specified' );

	$shortcode = su_mvb_shortcodes( $_POST['shortcode'] );
$shortcode_name=$_POST['shortcode'];
if(isset($_POST['shortcode_content'])){
if(isset($_POST['depth'])) $dep=$_POST['depth']; else $dep=null;
$sh_req_main=shortcode_array_req(stripslashes($_POST['shortcode_content']),$dep)[0]["main"];
$init_array=shortcode_array_req(stripslashes($_POST['shortcode_content']),$dep);
if(isset($init_array[1]["inline"]))
$sh_req_inline=$init_array[1]["inline"];

$attr_array=shortcode_parse_atts($sh_req_main[3]);
  //  }
    }else{
	$attr_array=null;
	$sh_req_inline=null;
}
if(isset($_POST["depth"])) $display=" style='display:none'"; else $display="";
$return='<div class="addelements shortcodes_options" >';

	// Shortcode has atts
	if ( count( $shortcode['atts'] ) && $shortcode['atts'] ) {
		foreach ( $shortcode['atts'] as $attr_name => $attr_info ) {
			if($attr_name=="width")
			$return .= '<p class="setting-style" '.$display.'>';
			else $return .= '<p class="setting-style">';
                        if(isset($attr_info['desc']))
			$return .= '<label for="su-generator-attr-' . $attr_name . '">' . $attr_info['desc'] . '</label>';

			// Select
			if ( count( $attr_info['values'] ) && $attr_info['values'] ) {
			            
				        if(isset($attr_array[$attr_name]))
						$nodefault=true; else $nodefault=false;
						$return .= '<select name="' . $attr_name . '"  class="mvb-su-generator-attr">';
						foreach ( $attr_info['values'] as $attr_value ) {
						if(isset($attr_array[$attr_name]) && $attr_array[$attr_name]==$attr_value)
						$attr_value_selected =' selected="selected"';								
						else if($nodefault==false && $attr_info['default'] == $attr_value )
						$attr_value_selected =' selected="selected"';								
                        else $attr_value_selected ='';					
						$return .= '<option' . $attr_value_selected . '>' . $attr_value . '</option>';						
						}
						$return .= '</select>';
			//		}
						
						
						
				
			}else if(isset($attr_info['type'])){
                            if($attr_info['type']=='gallery'){
						if(isset($attr_array[$attr_name])){
						$return .= '<a class="button-primary mvb_select_images" >Select Images</a><input class="mvb-su-generator-attr" type="hidden" name="' . $attr_name  . '" value="'. $attr_array[$attr_name].'">';
						$return .= '</p><div class="mvb_thumbsgrid">';
						$imageid=	explode(",",$attr_array[$attr_name]);	
						$args =array('post_type' => 'attachment',
									'numberposts' => -1,
									'post_status' => null,
									'post_parent' => null);
							$posts = get_posts($args);
							if($posts) {
								foreach ($imageid as $id)
								foreach ($posts as $post){
									if($id==$post->ID){								
										$camimg_url=$post->guid;
										$img_title=$post->post_title;
										$return .= "<div  class='mvb_thumb small' id='".$id."'><img height='100px' width='100px' title='".$img_title."'  src='".$camimg_url."'><div class='mvb_image_delete'>&times;</div></div>";
										
									}
								}
								wp_reset_postdata();							
							}
				
						$return .= '</div>';
						}else $return .= '<a class="button-primary mvb_select_images">Select Images</a><input class="mvb-su-generator-attr" type="hidden" name="' . $attr_name  . '" value="'.$attr_info['default'].'" ></p><div class="mvb_thumbsgrid"></div>';

			// Text & color input
                            
			}else {
            
				// Color picker
                           
				if ($attr_info['type'] == 'color' ) {				
					if(isset($attr_array[$attr_name]))
					$return .= '<input class="color-attr" type="text" name="' . $attr_name . '" value="' . $attr_array[$attr_name] . '" />';						
					else $return .= '<input class="color-attr" type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" />';
				}		//  range slider
                           	else  if ($attr_info['type'] == 'range' ) {
					$range_attrs_str ="";
					foreach($attr_info['range_values'] as $rangekey=>$rangevalue)
					$range_attrs_str .=' data-'.$rangekey.'="'.$rangevalue.'"';
					
					if(isset($attr_array[$attr_name]))
					$return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_array[$attr_name] . '"  class="mvb-su-generator-attr mvb_range" '.$range_attrs_str.' />';
					else $return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" class="mvb-su-generator-attr mvb_range" '.$range_attrs_str.' />';
				}

				// Text input
				
                            }
                         
                        }else {					
					if(isset($attr_array[$attr_name]))						
					 $return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_array[$attr_name] . '"  class="mvb-su-generator-attr" />';
					 else $return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '"  class="mvb-su-generator-attr" />';
				
                                         
                        }
				
				
			  $return .= '</p>';
		
		}
	}
   
	// Single shortcode (not closed)
	if ( $shortcode['type'] == 'single' ) {		
		$return .= '<input type="hidden"  name="mvb-su-generator-content" id="mvb-su-generator-content" value="false"  />';
	}

	// Wrapping shortcode
	else {
           	if(is_array($shortcode['content'])){
		if($shortcode['content']['type']=="inline-shortcode"){
			$i=0;$mulitple='';
	       if(!isset($sh_req_inline))
			foreach($shortcode['content']['shortcodes'] as $shortcodename =>$inline_attr){			
			$inline_shortcode = su_mvb_shortcodes($shortcodename);
			$return .= inline_generator($shortcodename,$inline_attr,$inline_shortcode,null,null,$edit=false,$mulitple=false);
			  }
		   $test=array(); $j=0; while(isset($sh_req_inline[2][$j])){
			$shortcodename=explode("mvb_",$sh_req_inline[2][$j])[1];
				if($shortcode['content']['shortcodes'][$shortcodename]["type"]=="multiple"){			
			if(in_array($shortcodename,$test)){
				$mulitple=false;	
			}else $mulitple=true;
			}
			$test[$j]=$shortcodename;				
			$inline_shortcode = su_mvb_shortcodes($shortcodename);		
			$short_attr=$sh_req_inline[3][$j];
			$short_content=$sh_req_inline[5][$j];
	    	$return .= inline_generator($shortcodename,$inline_attr=null,$inline_shortcode,$short_attr,$short_content,$edit=true,$mulitple);      	    
					
			$j++;
		}
		}

	//}
              }else if(isset($sh_req_main[5]))	
			 $return .= '<p class="setting-style" '.$display.'><label>' . __( 'Content', 'shortcodes-ultimate' ) . '</label><textarea name="mvb-su-generator-content" id="mvb-su-generator-content"  >' . $sh_req_main[5] . '</textarea></p>';
			 else $return .= '<p class="setting-style"><label>' . __( 'Content', 'shortcodes-ultimate' ) . '</label><textarea name="mvb-su-generator-content" id="mvb-su-generator-content"  >' . $shortcode['content'] . '</textarea></p>';
	
     //   }
                        }
	$return .= '<input type="hidden" name="mvb-su-generator-result" id="mvb-su-generator-result" value="" />';
	$return .='<input type="hidden" name="shortcode_name" value="'.$shortcode_name.'">';
	$return .='</div>';
	
	echo $return;
        die();
}
?>