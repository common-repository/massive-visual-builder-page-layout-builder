<?php
/**
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 *
 * Advanced Shortcodes Outputs  
 */
 		/**
	 * Shortcode: accordion
	 *
	 */
	function su_mvb_simple_accordion_shortcode( $atts = null, $content = null ) {extract( shortcode_atts( array(

), $atts ) );
Static $idx=0;
    $idx++;
			wp_enqueue_style( 'simpleaccordion-css' );
                         wp_enqueue_script('simpleaccordion-js-easing');
			wp_enqueue_script('simpleaccordion-js');
		return '<div class="wrapper">
                <div id="st-accordion-'.$idx.'" class="st-accordion">
                    <ul>'. do_shortcode($content) .'</div></div></ul><script type="text/javascript">
            $(function() { $("#st-accordion-'.$idx.'").accordion({
				oneOpenedItem	: true
				});
				
            });
        </script>';
		//return $return;
	}
function su_mvb_simple_accordion_slice_shortcode( $atts, $content = null ) {extract( shortcode_atts( array(
'slice_title' =>''
),

			 $atts ) );
			$return ='<li>
                            <a href="#">'.$slice_title.'<span class="st-arrow">Open or Close</span></a>
                            <div class="st-content">'.$content.'</div></li>';
			
		 return $return;
	
	}
/**
 * Shortcode: feed
 *
 */
function mvb_feed_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'url' => get_bloginfo_rss( 'rss2_url' ),
	'limit' => 3,
	'title'=>'',
	'color'=>'#D4D6D9',
	'height'=>'200'
			), $atts ) );

	$options = array(CURLOPT_HEADER => false,
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false
	);
if(!empty($url)){
	$feed = curl_init();
	curl_setopt_array($feed, $options);
	$str = curl_exec($feed);
	curl_close($feed);
	$obj=simplexml_load_string($str);
	$return= '<div style="height:'.$height.'px;border-style:solid;border-width:1px;border-color:#DEDEDE;overflow:auto">
		<ul><li style="background-color:'.$color.'; padding:12px 12px 12px 12px;font-size:22px;margin:0;"><a target="_blank"  href="'.$obj->channel->link.'">'.$obj->channel->title.'</a></li>';
	$i=0; $return .= '<div style="padding:12px 12px 12px 12px;">';
	while($obj->channel->item[$i] ){
		$return .= '<li style="font-size:16px;padding:4px 4px 4px 4px; margin:0;font-size:16px"><a class="feed-title" onclick="feed_slide('.$i.')"  onmouseout="feed_date_hide(this);function feed_date_hide(e){$(e).next().hide();}" onmouseover="feed_date_show(this); function feed_date_show(e){ $(e).next().show();}" >'.$obj->channel->item[$i]->title.'</a><span class="feed-date"  style="padding-right:10px;display:none;font-size:10px;width:50px;margin-left:50px;">'.mysql2date('F j, Y', $obj->channel->item[$i]->pubDate).'</span></li>
				    <li class="feed-desc-'.$i.'" style="display:none;font-size:14px" >'.$obj->channel->item[$i]->description.'<a target="_blank"  class="feed-more" href="'.$obj->channel->item[$i]->link.'" style="margin-left:10px;">...Read More<a/></li>';
		if($i==$limit-1)
			break;
		$i++;
	}
	$return .='</div></ul></div><script>var feed_slide;
jQuery(document).ready(function($){
feed_slide=function (i){
   	if($(".feed-desc-"+i).css("display")=="none")
	$(".feed-desc-"+i).slideDown();
	else $(".feed-desc-"+i).slideUp();
}
	});</script>';
	return $return;
}
}
/**
	 * Shortcode: Facebook
	
	 */
	function mvb_fb_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(		
		'page_link' => '',
		'fb_width' => '',
		'fb_height' => '',
		'show_faces' => true,
		'colorscheme'=>'light',
		'show_stream'=> false,
		'show_border'=> true,
		'show_header'=> true
		), $atts ) );	
	
	$return='<div id="fb-root"></div>
			<div class="fb-like-box" data-href="'.$page_link.'" data-width="'.$fb_width.'px" data-height="'.$fb_height.'px"  data-show-faces="'.$show_faces.'" data-stream="'.$show_stream.'" data-show-border="'.$show_border.'" data-header="'.$show_header.'"></div>';
	wp_enqueue_script('fb');
		return $return;
		
	}
	/**
	 * Shortcode: Google+
	
	 */
	function mvb_gplus_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'api_key' => '',
		'user' => '',
		'num' => '10',
		'rotate' => '0',
		'body_height'=>'335',
		'avatar_max'=> '50',
		'theme'=>'light'		
		), $atts ) );		
		
		 if($theme=="light")
		 wp_enqueue_style('gplus-light-theme');
		 else wp_enqueue_style('gplus-dark-theme');   		
		$settings="{api_key:'".$api_key."',user:'".$user."',n:".$num.",rotate:".$rotate.",body_height:".$body_height.",avatar_max:".$avatar_max." }";
		$return ='<div class="google-plus-activity" data-options="'.$settings.'"></div> ';                       
		wp_enqueue_script('gplus-js');
		return $return;
	}

	
    function mvb_wp_archive_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' => '',
		'count' => '',
		'drowpdown' => '',		
		'before_widget'=>'',
		'after_widget'=> '</div>',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'				
		), $atts ) );
		$args=array('before_widget'=>$before_widget,
		                'after_widget'=>$after_widget, 
		                'before_title'=>$before_title, 
                        'after_title'=>$after_title);
       $instance=array('title'=>$title,
		           'count'=>$count, 
		           'drowpdown'=>$drowpdown);
    ob_start();        
	the_widget('WP_Widget_Archives', $instance, $args);	
	$output = ob_get_clean();
	return $output;
	
	}
	function mvb_wp_calendar_shortcode( $atts, $content = null ) {		
		extract( shortcode_atts( array(
		'title' => '',	
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title);
				ob_start();
				the_widget('WP_Widget_Calendar', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	
	function mvb_wp_categories_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' => '',
		'count' => '',
		'drowpdown' => '',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'count' => $count,	'drowpdown' => $drowpdown);
				ob_start();				
				the_widget('WP_Widget_Categories', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	
	function mvb_wp_links_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' => '',	
		'category' => '0',
		'description' => '0',
		'rating' => '0',
		'images' => '1',
		'name' => '0',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'category' => $category,'description' =>$description,'rating' => $rating,'images' => $images ,'name' => $name);
				ob_start();				
				the_widget('WP_Widget_Links', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	
	function mvb_wp_meta_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' => '',		
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title);
				ob_start();				
				the_widget('WP_Widget_Meta', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	
	function mvb_wp_pages_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' => '',
		'exclude'=>'null',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'exclude'=>$exclude);
				ob_start();
				the_widget('WP_Widget_Pages', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	function mvb_wp_comments_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' =>'',
		'number'=>'',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'number'=>$number);
				ob_start();
				the_widget('WP_Widget_Recent_Comments', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	function mvb_wp_posts_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' =>'',
		'number'=>'',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'number'=>$number);
				ob_start();
				the_widget('WP_Widget_Recent_Posts', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	function mvb_wp_search_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' =>'',	
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title);
				ob_start();
				the_widget('WP_Widget_Search', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	function mvb_wp_tagcloud_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' =>'',
		'taxonomy' =>'',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'taxonomy'=>$taxonomy);
				ob_start();
				the_widget('WP_Widget_Tag_Cloud', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	function mvb_wp_text_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'title' =>'',
		'textp' =>'',
		'filter' =>'',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=> '<h2 class="widgettitle">',
		'after_title'=> '</h2>'
				), $atts ) );
				$args=array('before_widget'=>$before_widget,
						'after_widget'=>$after_widget,
						'before_title'=>$before_title,
						'after_title'=>$after_title);
				$instance=array('title'=>$title,'text'=>$textp,'filter'=>$filter);
				ob_start();
				the_widget('WP_Widget_Text', $instance, $args);
				$output = ob_get_clean();
				return $output;
	
	}
	


  function mvb_videodata_shortcode($atts, $content = null ){
	extract( shortcode_atts( array('video_thumbnail' =>'','video_url' =>''), $atts ) );
	$imageid=explode(',',$video_thumbnail);
	$args = array('post_type' => 'attachment',
		    	  'numberposts' => -1,
		    	  'post_status' => null,
		    	  'post_parent' => null);
		$posts = get_posts($args);
		    	if($posts) {
	               foreach ($imageid as $id)
					foreach ($posts as $post) 
		    		{	
		    			if($post->ID==$id){		    			
						$img_url=$post->guid;
						$img_title=$post->post_title;
								$return .='<li class="video"><a href="'.$video_url.'" rel="video"><img src="'.$img_url.'" title="'.$img_title.'" ></a></li>';
						}
						}
				}
					return $return;
	}
 wp_reset_postdata();
?>