<?php 
/**
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 *
 * Define Shortcode For Elements Dimensions
 *
 */
function mvb_pos_shortcode( $atts, $content = null ) {
	/*extract( shortcode_atts( array(
	'pos_width'   =>  1 ,
	'pos_display' => 'inline-block',
	'pos_float'   =>  'left' ,
	'pos_margin'  =>  '5px'
			), $atts ) );
          
	$width=(($pos_width / 6) * 100)-2; */
   	return '<div class="massb_item" >' .do_shortcode($content) . '</div>';
}
function mvb_custom_content( $atts, $content = null ) {	
	return $content;
}

function mvb_row_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'margin_top' =>'',
	'margin_right' =>'',
	'margin_left' =>'',
	'margin_bottom' =>'',
	'padding_top' =>'',
	'padding_right' =>'',
	'padding_bottom' =>'',
	'padding_left' =>'',
	'border_w' =>'',
	'border_style' =>'',
	'border_color' =>'',
	'border_radius_tl' =>'',
	'border_radius_tr' =>'',
	'border_radius_br' =>'',
	'border_radius_bl' =>'',
	'box_shadow_h' =>'',
	'box_shadow_v' =>'',
	'box_shadow_b' =>'',
	'box_shadow_s' =>'',
	'box_shadow_c' =>'',
	'row_background_image' =>'',
	'background_color' =>'',
	'class' =>''	
	), $atts ) );
	Static $idx=0;
    $idx++;
	$imageid=explode(',',$row_background_image);
		    	$args = array(
		    			'post_type' => 'attachment',
		    			'numberposts' => -1,
		    			'post_status' => null,
		    			'post_parent' => null);
		    	$posts = get_posts($args);
                        $rowbackground_image_url="";
		    	if($posts) {	
				    foreach ($imageid as $id)	    		
		    		foreach ($posts as $post) 
		    		{	
		    			if($post->ID==$id){
		    			//	var_dump($post);
						$rowbackground_image_url=$post->guid;
						}
						}	
						}
if(strlen($margin_top)>0)		
	return '<div id="mvb-row-'.$idx.'" class="mvb_row mvb_row-fluid '.$class.'" style="background:'.$background_color.'; margin-top:'.$margin_top.'px; margin-right:'.$margin_right.'px; margin-left:'.$margin_left.'px; margin-bottom:'.$margin_bottom.'px; padding-top:'.$padding_top.'px; padding-right:'.$padding_right.'px; padding-bottom:'.$padding_bottom.'px; padding-left:'.$padding_left.'px; border:'.$border_w.'px '.$border_style.' '.$border_color.'; border-radius:'.$border_radius_tl.'px '.$border_radius_tr.'px '.$border_radius_br.'px '.$border_radius_bl.'px; -moz-box-shadow:'.$box_shadow_h.'px '.$box_shadow_v.'px '.$box_shadow_b.'px '.$box_shadow_s.'px '.$box_shadow_c.'; -webkit-box-shadow:'.$box_shadow_h.'px '.$box_shadow_v.'px '.$box_shadow_b.'px '.$box_shadow_s.'px '.$box_shadow_c.'; box-shadow:'.$box_shadow_h.'px '.$box_shadow_v.'px '.$box_shadow_b.'px '.$box_shadow_s.'px '.$box_shadow_c.'">' .do_shortcode($content) . '</div><script>$("#mvb-row-'.$idx.'").backstretch("'.$rowbackground_image_url.'");</script>';
else 	return '<div id="mvb-row-'.$idx.'" class="mvb_row mvb_row-fluid" style="margin-bottom:20px">' .do_shortcode($content) . '</div>';
	
}
function mvb_column_shortcode( $atts, $content = null ) { extract(shortcode_atts(array(
"width"=>"",
'margin_top' =>'',
'margin_right' =>'',
'margin_left' =>'',
'margin_bottom' =>'',
'padding_top' =>'',
'padding_right' =>'',
'padding_bottom' =>'',
'padding_left' =>'',
'border_w' =>'',
'border_style' =>'',
'border_color' =>'',
'border_radius_tl' =>'',
'border_radius_tr' =>'',
'border_radius_br' =>'',
'border_radius_bl' =>'',
'box_shadow_h' =>'',
'box_shadow_v' =>'',
'box_shadow_b' =>'',
'box_shadow_s' =>'',
'box_shadow_c' =>'',
'background_image' =>'',
'background_color' =>'',
'class' =>''
), $atts ) );
Static $idx=0;
    $idx++;
$imageid=explode(',',$background_image);
		    	$args = array(
		    			'post_type' => 'attachment',
		    			'numberposts' => -1,
		    			'post_status' => null,
		    			'post_parent' => null);
		    	$posts = get_posts($args);
                        $background_image_url="";
		    	if($posts) {	
				    foreach ($imageid as $id)	    		
		    		foreach ($posts as $post) 
		    		{	
		    			if($post->ID==$id){
		    			//	var_dump($post);
						$background_image_url=$post->guid;
						}
						}	
						}
		
$width=explode("/",$width);
$col_width=($width[0]/$width[1])*12;
if(strlen($margin_top)>0)
return '<div id="mvb-column-'.$idx.'" class="mvb_column'.$col_width.' mvb_col_m '.$class.'" style="background:'.$background_color.'; margin-top:'.$margin_top.'px; margin-right:'.$margin_right.'px; margin-left:'.$margin_left.'px; margin-bottom:'.$margin_bottom.'px; padding-top:'.$padding_top.'px; padding-right:'.$padding_right.'px; padding-bottom:'.$padding_bottom.'px; padding-left:'.$padding_left.'px; border:'.$border_w.'px '.$border_style.' '.$border_color.'; border-radius:'.$border_radius_tl.'px '.$border_radius_tr.'px '.$border_radius_br.'px '.$border_radius_bl.'px; -moz-box-shadow:'.$box_shadow_h.'px '.$box_shadow_v.'px '.$box_shadow_b.'px '.$box_shadow_s.'px '.$box_shadow_c.'; -webkit-box-shadow:'.$box_shadow_h.'px '.$box_shadow_v.'px '.$box_shadow_b.'px '.$box_shadow_s.'px '.$box_shadow_c.'; box-shadow:'.$box_shadow_h.'px '.$box_shadow_v.'px '.$box_shadow_b.'px '.$box_shadow_s.'px '.$box_shadow_c.'">' .do_shortcode($content) . '</div><script>$("#mvb-column-'.$idx.'").backstretch("'.$background_image_url.'");</script>';
else return '<div id="mvb-column-'.$idx.'" class="mvb_column'.$col_width.' mvb_col_m" >' .do_shortcode($content) . '</div>';
 	
}




?>
