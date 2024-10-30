<?php 
/**
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 *
 * Edit Items Function.
 *
 */

function shortcode_array_req($content,$depth){
$pattern = get_shortcode_regex();
if($depth!=1){
$content=explode("[pos_dim",$content)[1];	
$content="[pos_dim".$content;
preg_match( "/$pattern/s", $content,$match);

if($match[5]){
preg_match( "/$pattern/s", $match[5],$shortcodes);
$main_shortcode=array("main"=>$shortcodes);
$array_req[0]=$main_shortcode;
}
preg_match_all( "/$pattern/s", $shortcodes[5],$inline_shortcode_attrs);
if(!empty($inline_shortcode_attrs[0][0])){
$inline_shortcode=array("inline"=>$inline_shortcode_attrs);	
$array_req[1]=$inline_shortcode;	
}
}else if($depth==1){
preg_match( "/$pattern/s", $content,$match);
$main_shortcode=array("main"=>$match);
$array_req[0]=$main_shortcode;

}
	
return $array_req;

	}
?>
