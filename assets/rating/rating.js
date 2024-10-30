jQuery(document).ready(function($) {
 
    jQuery('.mvb-star-ctr').click(function(){
        if($(this).attr( 'data-type' )=="interactive"){
        heart = jQuery(this);
     
        // Retrieve post ID from data attribute
        post_id = heart.data("post_id");
        rate_val = heart.attr("data-value");
        rate_id = heart.attr("data-review-id");

         
        // Ajax call
        jQuery.ajax({
            type: "post",
            url: ajax_var.url,
            data: "action=mvb_post_like&nonce="+ajax_var.nonce+"&mvb_post_like=1&post_id="+post_id+"&rate_val="+rate_val+"&rate_id="+rate_id,
            success: function(count){   
  
                // If vote successfulr
                if(count != "already")
                {
                   
                 //   heart.siblings(".count").text(count);
                
                 heart.next("#rate_val").text('your rate:'+(heart.attr( 'data-value' )*5)/100+'/5');
                 heart.addClass("voted");
            }
        }
         
    });
        }
});
});