<?php 
/**
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 *
 * Tweets Shortcode.
 *
 */ 
if(!function_exists ('mvb_buildBaseString')){

function mvb_buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}
}
if(!function_exists ('mvb_buildAuthorizationHeader')){

function mvb_buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
}
}
function mvb_tweets_shortcode($atts,$content = null){
	wp_enqueue_style('tweets');
	extract(shortcode_atts( array(
	'username'   =>  '' ,
	'count'  =>'5',
	'height' => 600,
	'theme'   =>  'Light' ,
	'link_color'  =>  '',	
	), $atts ) );	
	if(!$username)  $username="mvb_wordpress";
    $oauth_access_token         = "543462149-XVlO69mtxdNDw7POCDAraq1HBGcKpwjmI2Xgauss";
    $oauth_access_token_secret  = "B26fBPId94MgJWciuNhs6U7e8G6hJlqVUnAh697HkY";
    $consumer_key               = "kDD1DkUNp4g6KvHr0EzLUA";
    $consumer_secret            = "BpSdv0lD32aaU4PE8QChmFj8ncKvWYtRP8kerUA2Us";

    $twitter_timeline           = "user_timeline";  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me

    //  create request
        $request = array(
           'screen_name'       => $username,
           'count'             => $count,
           'entities'          =>'true' );

    $oauth = array(
        'oauth_consumer_key'        => $consumer_key,
        'oauth_nonce'               => time(),
        'oauth_signature_method'    => 'HMAC-SHA1',
        'oauth_token'               => $oauth_access_token,
        'oauth_timestamp'           => time(),
        'oauth_version'             => '1.0'
    );

    //  merge request and oauth to one array
        $oauth = array_merge($oauth, $request);

    //  do some magic
        $base_info              = mvb_buildBaseString("https://api.twitter.com/1.1/statuses/$twitter_timeline.json", 'GET', $oauth);
        $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature']   = $oauth_signature;

    //  make request
        $header = array(mvb_buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
                          CURLOPT_HEADER => false,
                          CURLOPT_URL => "https://api.twitter.com/1.1/statuses/$twitter_timeline.json?". http_build_query($request),
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_SSL_VERIFYPEER => false
        		        		);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);

    $data= json_decode($json, true);  	 
    $count = count($data); //counting the number of status
	if(isset($data[0]["entities"]["media"]))
    $tweets_media= $data[0]["entities"]["media"];
    if($theme=="Light") $theme_option="root timeline ltr customisable-border twitter-timeline not-touch twitter-timeline-rendered";
    else $theme_option="root timeline ltr customisable-border twitter-timeline not-touch twitter-timeline-rendered thm-dark";
    
$output='<div lang="en" data-dt-long="%{day} %{month} %{year}" data-dt-short="%{day} %{month}" data-dt-abbr="%{number}%{symbol}" data-dt-months="Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec" data-dt-hours="hours" data-dt-hour="hour" data-dt-minutes="minutes" data-dt-minute="minute" data-dt-seconds="seconds" data-dt-second="second" data-dt-h="h" data-dt-m="m" data-dt-s="s" data-dt-now="now" data-profile-id="1399071" dir="ltr" class="'.$theme_option.'" id="twitter-widget-0" data-twitter-event-id="1">
      <div class="timeline-header customisable-border">
    <h1 class="summary">
      <a title="Tweets from"'. $data[0]['user']['name'].'" href="https://twitter.com/'. $data[0]['user']['screen_name'].'" class="customisable-highlight">Tweets</a>
    </h1>
      <a href="'. $data[0]['user']['screen_name'].'" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @'.$data[0]['user']['screen_name'].'</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    </div>
      <div aria-relevant="additions" aria-atomic="false" aria-live="polite" class="new-tweets-bar" role="alert">
        <button><i class="ic-top"></i>New Tweets</button>
      </div>
      <div class="stream" style="height:'.$height.'px" >
        <ol class="h-feed">';
        for($i=0;$i<$count;$i++){    	
        $output .='<li data-tweet-id="'. $data[$i]['id_str'].'" class="tweet h-entry with-expansion customisable-border">';

           $currenttime=date("D, d M Y H:i:s"); 
                $date1 = new DateTime($currenttime);
                $date2 = new DateTime($data[$i]['created_at']);
                $interval = $date1->diff($date2);
                if($interval->h ==0) $hour_ago=null;             else $hour_ago=$interval->h.'h ';
                if($interval->d ==0) $day_ago=null;              else $day_ago=$interval->d.'D ';
                if($interval->m ==0) $mon_ago=null;              else $mon_ago=$interval->m.'M ';
                if($interval->y ==0) $year_ago=null;              else $year_ago=$interval->y.'Y ';
                
                $date_interval=$hour_ago.$day_ago.$mon_ago.$year_ago;
                
    
   $output.=' <a data-datetime="'. $data[$i]['created_at'].'" href="https://twitter.com/'.$data[$i]['user']['screen_name'].'" class="u-url permalink customisable-highlight"><time  datetime="'.$data[$i]['created_at'].'" class="dt-updated" pubdate="'. strtotime($data[$i]['created_at']).'"><abbr title="Time Ago"> '. $date_interval.'</abbr></time></a>
          <div class="header h-card p-author">
      <a aria-label="World Travel (screen name: "'. $data[$i]['user']['screen_name'].'")" href="https://twitter.com/'. $data[$i]['user']['screen_name'].'" class="u-url profile">
        <img width="73" height="73" data-src-2x="'.$data[$i]['user']['profile_image_url'].'" src="'. $data[$i]['user']['profile_image_url'].'" alt="" class="u-photo avatar">
        <span class="full-name">
          
          <span class="p-name customisable-highlight">'. $data[$i]['user']['name'].' </span>
        </span>
        <span dir="ltr" class="p-nickname">@<b>'. $data[$i]['user']['screen_name'].'</b></span>
      </a>
    </div>
    
      <div class="e-entry-content">
        <p class="e-entry-title">'. $data[$i]['text'].'<a dir="ltr" data-pre-embedded="true" class="link media customisable"';
		if(!empty($data[$i]['entities']['media'][0]['media_url'])) 
		 $output.=' href="'.$data[$i]['entities']['media'][0]['media_url'].'">'. $data[$i]['entities']['media'][0]['display_url'].'</a></p>';
          if(!empty($data[$i]['entities']['media'])) {
        $output.=' <div class="inline-media"><a href="'.$data[$i]['entities']['media'][0]['expanded_url'].'" target="_blank">
      <img width="281" height="375" title="View image on Twitter" alt="View image on Twitter" data-src-2x="'. $data[$i]['entities']['media'][0]['media_url'].'":large" src="'. $data[$i]['entities']['media'][0]['media_url'].'":large">
    </a></div>';
     }
    
    $output.='</div> <div class="footer customisable-border">
        <span class="stats-narrow"><span class="stats">
      <span class="stats-retweets">
        <strong>118</strong> Retweets
      </span>
      <span class="stats-favorites">
        <strong>149</strong> favorites
      </span>
    </span>
    </span>';
            if(!empty($data[$i]['entities']['media'])) {	
       $output.='<a data-toggled-text="Collapse" href="'. $data[$i]['entities']['media'][0]['expanded_url'].'" class="expand customisable-highlight"><b>Expand</b></a>';
            }
       $output.=' <ul class="tweet-actions">
      <li><a title="Reply" class="reply-action web-intent" href="https://twitter.com/intent/tweet?in_reply_to='. $data[$i]['id_str'].'"><i class="ic-reply ic-mask"></i><b>Reply</b></a></li>
      <li><a title="Retweet" class="retweet-action web-intent" href="https://twitter.com/intent/retweet?tweet_id='.$data[$i]['id_str'].'"><i class="ic-retweet ic-mask"></i><b>Retweet</b></a></li>
      <li><a title="Favorite" class="favorite-action web-intent" href="https://twitter.com/intent/favorite?tweet_id='.$data[$i]['id_str'].'" ><i class="ic-fav ic-mask"></i><b>Favorite</b></a></li>
    </ul>
        <span class="stats-wide"><b>� </b><span class="stats">
      <span class="stats-retweets">
        <strong>118</strong> Retweets
      </span><span class="stats-favorites">
        <strong>149</strong> favorites
      </span></span></span></div></li>';            
        }
       $output.='</ol></div> 
    <div class="timeline-footer">
      <a href="https://twitter.com/intent/tweet?screen_name='.$data[0]['user']['screen_name'].'" class="tweet-box-button web-intent">Tweet to '.$data[0]['user']['screen_name'].'</a></div></div>';
       return $output;         

}
?>