<?php

function inline_generator($shortcodename,$inline_attr,$shortcode,$short_attr,$short_content,$edit=false,$mulitple){
$return="";
$return .='<div class="mvb_main_inline">';
if(isset($inline_attr) && $inline_attr["type"]=="multiple"){
$return .= '<div class="brick small" id="mvb_addnew_inline">Add new '.$shortcode["name"].'</div>';
$del_icon=null;
}else if($mulitple){
$return .= '<div class="brick small" id="mvb_addnew_inline">Add new '.$shortcode["name"].'</div>';
$del_icon=null;
}else $del_icon='<a class="mvb_delete_inline" >&times;</a>';
	
$return .='<div class="brick small"><div class="mvb_barname">'.$shortcode["name"].'</div>'.$del_icon.'</div>';
$return .='	<div class="inline_shortcode_options" style="display:none"><input type="hidden" name="inlineshort_name" value="'.$shortcodename.'" >';
if($edit==true)
 $attr_array=shortcode_parse_atts($short_attr);
else $attr_array=null;
	// Shortcode has atts
	if ( count( $shortcode['atts'] ) && $shortcode['atts'] ) {
		foreach ( $shortcode['atts'] as $attr_name => $attr_info ) {
			$return .= '<p class="setting-style">';
			$return .= '<label for="su-generator-attr-' . $attr_name . '">' . $attr_info['desc'] . '</label>';

			// Select
			if ( count( $attr_info['values'] ) && $attr_info['values'] ) {
						$return .= '<select name="' . $attr_name . '"  class="mvb-su-generator-attr-inline">';
						foreach ( $attr_info['values'] as $attr_value ) {
						if(isset($attr_array[$attr_name])){
						if($attr_array[$attr_name]==$attr_value)
						$attr_value_selected =' selected="selected"';
						else $attr_value_selected="";								
						}else $attr_value_selected = ( $attr_info['default'] == $attr_value ) ? ' selected="selected"' : '';						
						$return .= '<option' . $attr_value_selected . '>' . $attr_value . '</option>';						
						}
						$return .= '</select>';
				               
                        	
				
			}else  if(isset($attr_info['type'])){                            
                               if($attr_info['type']=='gallery'){
								if(isset($attr_array[$attr_name])){
						$return .= '<a class="button-primary mvb_select_images">Select Images</a><input class="mvb-su-generator-attr-inline" type="hidden" name="' . $attr_name  . '" value="'. $attr_array[$attr_name].'">';
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
									if($post->ID==$id){										
										$camimg_url=$post->guid;
										$img_title=$post->post_title;
										$return .= "<div  class='mvb_thumb small' id='".$id."'><img height='100px' width='100px' title='".$img_title."'  src='".$camimg_url."'><div class='mvb_image_delete'>&times;</div></div>";
										
									}
								}
								wp_reset_postdata();							
							}
				
						$return .= '</div>';
						}else $return .= '<a class="button-primary mvb_select_images">Select Images</a><input class="mvb-su-generator-attr-inline" type="hidden" name="' . $attr_name  . '" value="'.$attr_info['default'].'" ></p><div class="mvb_thumbsgrid"></div>';

			// Text & color input
			}else {
				
				// Color picker
				if ($attr_info['type'] == 'color' ) {					
					if(isset($attr_array[$attr_name]))
					$return .= '<input class="color-attr-inline" type="text" name="' . $attr_name . '" value="' . $attr_array[$attr_name] . '" />';
					else $return .= '<input class="color-attr-inline" type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '"   />';
				}else  if ($attr_info['type'] == 'range' ) {
					$range_attrs_str ="";
					foreach($attr_info['range_values'] as $rangekey=>$rangevalue)
					$range_attrs_str .=' data-'.$rangekey.'="'.$rangevalue.'"';
					if(isset($attr_array[$attr_name]))
					$return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_array[$attr_name] . '"  class="mvb-su-generator-attr-inline mvb_range" '.$range_attrs_str.' />';
					else $return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" class="mvb-su-generator-attr-inline mvb_range" '.$range_attrs_str.' />';
				}
                        }
                      
                        }
				// Text input
				else {
					if(isset($attr_array[$attr_name]))
					$return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_array[$attr_name] . '"  class="mvb-su-generator-attr-inline" />';
					else $return .= '<input type="text" name="' . $attr_name . '" value="' . $attr_info['default'] . '" class="mvb-su-generator-attr-inline" />';
				
                                      
                                }
                                  $return .= '</p>';
			}
			
		
	}
   
	// Single shortcode (not closed)
	if ( $shortcode['type'] == 'single' ) {		
		$return .= '<input type="hidden"  name="mvb-su-generator-content" class="mvb-su-generator-content-inline" value="false"  /></div>';
	}

	// Wrapping shortcode
	
	else if(isset($short_content)) 	
		$return .= '<p class="setting-style"><label>' . __( 'Content', 'shortcodes-ultimate' ) . '</label><textarea name="mvb-su-generator-content" class="mvb-su-generator-content-inline"  >' . $short_content . '</textarea></p></div>';
	else $return .= '<p class="setting-style"><label>' . __( 'Content', 'shortcodes-ultimate' ) . '</label><textarea name="mvb-su-generator-content" class="mvb-su-generator-content-inline"  >' . $shortcode['content'] . '</textarea></p></div>';
	
		
	$return .='</div>';

return $return;
}
?>