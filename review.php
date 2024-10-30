<?php
/******************* biz rating sys *******************/
add_action('wp_ajax_nopriv_mvb_post_like', 'mvb_post_like');
add_action('wp_ajax_mvb_post_like', 'mvb_post_like');
add_action( 'wp_enqueue_scripts', 'mvb_review_loadfiles' );

function mvb_review_loadfiles(){

wp_enqueue_script('mvb_like_post', plugins_url('/assets/rating/rating.js',__FILE__), array('jquery'), '1.0', true );
wp_localize_script('mvb_like_post', 'ajax_var', array(
    'url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('ajax-nonce')
));
}
function mvb_post_like()
{
  
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
   if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
       die ( 'Busted!');
     
    if(isset($_POST['mvb_post_like']))
    {
        
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
        $rate_id=$_POST['rate_id'];
               
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "mvb_voted_IP_".$rate_id);
        $voted_IP = $meta_IP[0];
 
        if(!is_array($voted_IP))
            $voted_IP = array();

        // Use has already voted ?
       if(!mvb_hasAlreadyVoted($post_id,$rate_id))              // remove slashes for user has  already voted !!!
       {
       
      // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "mvb_votes_count_".$rate_id, true); 

//************ rating value *********//     

        $user_rate_val=$_POST['rate_val'];
         $rating_VL = get_post_meta($post_id, "mvb_rating_VL_".$rate_id, true);
         if(!empty($rating_VL)){ 
            
        
         $sum_rateval= $meta_count*$rating_VL;
          $total_rate=($sum_rateval+$user_rate_val)/($meta_count+1);
   
         }else $total_rate =$user_rate_val;
           update_post_meta($post_id, "mvb_rating_VL_".$rate_id, $total_rate);
       
                //************ rating value *********//
            
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "mvb_voted_IP_".$rate_id, $voted_IP);
           
            update_post_meta($post_id, "mvb_votes_count_".$rate_id, ++$meta_count);
       
       }
        else
           echo "already";
    }
    exit;
}
$timebeforerevote = 120; // = 2 hours

function mvb_hasAlreadyVoted($post_id,$rate_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "mvb_voted_IP_".$rate_id);
    $voted_IP = $meta_IP[0];
   // echo $meta_IP;
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}

/******************* biz rating sys *******************/
?>