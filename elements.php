<?php
/**
 * Massive Visual Builder for Wordpress
 * all rights reserved 2014
 *
 * loading UI for Admin User
 *
 */

function mvb_load_ui(){ ?>
<div class="addelements">
<div style="display:none">
<input type="hidden" name="contentuser-id">
<div id="editordiv"><textarea id="custom-content-editor"></textarea></div></div>
<div id="mvb_main" class="addelements container">
<a id="mvb_addrow" class="addelements sort-post-title">
				
					<?php echo '<div class="format">'. __('Add Row', 'massive_page_bui') .'</div>';?>
				
			</a>
<a id="mvb_addwidgets" class="addelements sort-post-title">
				
					<?php echo '<div class="format">'. __('Add Widgets', 'massive_page_bui') .'</div>';?>
				
			</a>
           <a id="save_tmplate" class="addelements sort-post-title">
				
					<?php echo '<div class="format">'. __('Template System', 'massive_page_bui') .'</div>';?>
				
			</a>
           
<div class="addelements items-form">
<div class="templatesys"><?php echo '<label>'. __('Template Name', 'massive_page_bui').'</label>';?><input type="text" name="template_name" value="" class="ts">
<a class="btn-save btn-large btn-info" id="save_template" >
  <i class="icon-ok-sign" style="color:#FFF"></i> <?php echo ''. __('Save as Template', 'massive_page_bui').'';?></a>
<!--<a id="save_template_title"><button>Save As Template File </button></a>-->
<div id="templates-list">
<?php $templist_array=get_option('templates-list'); 
if($templist_array){ ?>
<label id="load_template_title" ><?php echo ''. __('Template List', 'massive_page_bui').'';?> </label>
<?php foreach($templist_array as $key=>$value){ ?>
<div class="btn-group">
  <a class="btn btn-primary" ><i></i><span class="temp-name"><?php echo $value ;?></span></a>
  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
    <span class="icon-caret-down"></span></a>
  <ul class="dropdown-menu">
    <li><a  onclick="load_template(this)"><i class="icon-fixed-width icon-download"></i><span style="padding-left:5px"><?php echo ''. __('Load', 'massive_page_bui').'';?></span></a></li>
    <li><a onclick="del_template(this)"><i class="icon-fixed-width icon-trash"></i> <?php echo ''. __('Delete', 'massive_page_bui').'';?></a></li>    
  </ul>
</div>
  <?php  } ?>
<!-- <a id="load_template" >Load </a>-->
<?php } ?>
</div>
</div>
</div>
<div style="display:none;">	 
		    <div id="mvb_widgetlist">
<div class="addelements content">
		<div class="addelements sort-post latest-arti">
		 <div id="mvb-content" style="display:none;" >
			<div class="addelements shortcodes_options" style="display:none;"> </div>			
            <div id="special_shortcodes_options" style="display:none;" ><label></label></div> 
            <div class="additional_shortcodes_options" style="display:none;"> </div>	  
            </div>
            <ul id="mixitup">
<li class="filter" data-filter="contn box media gallery data other"><?php echo ''. __('All', 'massive_page_bui').'';?></li>
    <li class="filter" data-filter="contn"><?php echo ''. __('Content', 'massive_page_bui').'';?></li>
    <li class="filter" data-filter="box"><?php echo ''. __('Box', 'massive_page_bui').'';?></li>
    <li class="filter" data-filter="media"><?php echo ''. __('Media', 'massive_page_bui').'';?></li>
    <li class="filter" data-filter="gallery"><?php echo ''. __('Gallery', 'massive_page_bui').'';?></li>
    <li class="filter" data-filter="data"><?php echo ''. __('Data', 'massive_page_bui').'';?></li>
     <li class="filter" data-filter="other"><?php echo ''. __('Other', 'massive_page_bui').'';?></li>
</ul>
<div class="ui-divider"></div>      
            <ul id="mvb_wlist" class="addelements sort-post-content image-grid"  >
 
           <li class="mix other">
           <a  class="addelements shortcode_hlinks" id="custom-content"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-code icon-2x">
              
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Custom Content', 'massive_page_bui').'';?></div>
          </div>
          </a>
          </li>
  
     <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="simple_accordion"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
             <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/spoiler.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Simple Accordion', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
 
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="divider"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/divider.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Divider', 'massive_page_bui').'';?>Divider</div>
          </div>
          </a> </li>
          <li class="mix contn">
          <a  class="addelements shortcode_hlinks" id="spacer"  >
          <div class="addelements recent-list ">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/spacer.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Spacer', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
          <li class="mix box">
          <a  class="addelements shortcode_hlinks" id="quote"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/quote.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Quote', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="pullquote"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/pullquote.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Pullquote', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
          <a  class="addelements shortcode_hlinks" id="highlight"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/highlight.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('HighLight', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="label"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/label.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('label', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="dropcap"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
             <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/dropcab.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Dropcap', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix other">
           <a  class="addelements shortcode_hlinks" id="bloginfo"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-info icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('Bloginfo', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="permalink" >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-link icon-2x"></div>
            <div class="addelements title-cat"><?php echo ''. __('Permalink', 'massive_page_bui').'';?></div>
          </div>
          </a>
           </li> 
          <li class="mix contn">
          <a  class="addelements shortcode_hlinks" id="button"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/button.png', __FILE__ ) ;?>' alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Button', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="fancy_link"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-link icon-2x"></div>
            <div class="addelements title-cat">Fancy Link</div>
          </div>
          </a></li>
         <!-- <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="column"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-columns icon-2x"></div>
            <div class="addelements title-cat">Column</div>
          </div>
          </a> </li>-->
           <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="listitems"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-list icon-2x"></div>
            <div class="addelements title-cat"><?php echo ''. __('Lists', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="service"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-wrench  icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('Services', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
          <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="box"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/box.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Box', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="note"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/note.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Note', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
          <li class="mix other">
          <a  class="addelements shortcode_hlinks" id="private"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/private-note.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Private Note', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix media">
           <a  class="addelements shortcode_hlinks" id="media"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/media.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Media', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="table"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-table icon-2x"> </div>
            <div class="addelements title-cat">Table</div>
          </div>
          </a></li>
         <!-- <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="plan"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="20px" height="20px"
									src='<?php//  echo plugins_url( '/images/admin-icon/pricing.png', __FILE__ ) ;?>'
									alt="img">
            </div>
            <div class="addelements title-cat"><?php// echo ''. __('Pricing Plan', 'massive_page_bui').'';?></div>
          </div>
          </a></li>-->
         <!-- <li class="mix other">
           <a  class="addelements shortcode_hlinks" id="subpages"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php// echo plugins_url( '/images/admin-icon/subpages.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?ph//p echo ''. __('Subpages', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix other">
           <a  class="addelements shortcode_hlinks" id="siblings"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-link icon-2x"></div>
            <div class="addelements title-cat">Siblings</div>
          </div>
          </a></li>-->
          <li class="mix other">
          <a  class="addelements shortcode_hlinks" id="menu"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
             <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/menu.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Menu', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix media">
           <a  class="addelements shortcode_hlinks" id="gmap"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-map-marker icon-2x"></div>
            <div class="addelements title-cat"><?php echo ''. __('Google Map', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix other">
           <a  class="addelements shortcode_hlinks" id="members"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-group icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('Members', 'massive_page_bui').'';?></div>
          </div>
          </a></li> 
          <li class="mix other">
          <a  class="addelements shortcode_hlinks" id="guests"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-user icon-2x"></div>
            <div class="addelements title-cat"><?php echo ''. __('Guests', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="feed"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-rss-sign icon-2x"></div>
            <div class="addelements title-cat"><?php echo ''. __('Feed', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
          <li class="mix media">
          <a  class="addelements shortcode_hlinks" id="fb"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-facebook-sign icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('FB Like Box', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix media">
           <a  class="addelements shortcode_hlinks" id="tweet"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-twitter-sign icon-2x"></div>
            <div class="addelements title-cat"><?php echo ''. __('Tweets Box', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
          <li class="mix media">
          <a  class="addelements shortcode_hlinks" id="gplus"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-google-plus-sign icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('Google+ Box', 'massive_page_bui').'';?></div>
          </div>
          </a> </li>
           <li class="mix contn">
          <a  class="addelements shortcode_hlinks" id="frame"  >
            <div class="addelements recent-list ">
              <div class="addelements thumbnail">
                <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/frame.png', __FILE__ ) ;?>'
										alt="img">
              </div>
              <div class="addelements title-cat"><?php echo ''. __('Frame', 'massive_page_bui').'';?></div>
            </div>
            </a> </li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_archive"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Archive', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_calendar"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
             <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Calendar', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_categories"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Categories', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_links"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Links', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_meta"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Meta', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_pages"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Pages', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_comments"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat" style="font-size:11px"><?php echo ''. __('Recent Comments', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_posts"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Recent Posts', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_search"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Search', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="wp_tagcloud"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Tag Cloud', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="wp_text"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('WP Text', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
                <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Review Widget Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
                <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="24px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/wordpress.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Ad Widget Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
                  <li class="mix contn gallery">
          <a  id="post-modules"  id="pro">
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
               <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/addposts.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Post Modules Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/heading.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Heading Sets Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <li class="mix box gallery">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
             <img width="25px" height="23px" src='<?php echo plugins_url( '/images/admin-icon/va.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Vertical Slide Accordion Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
     <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-usd icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('Pricing Plan Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
        <li class="mix gallery">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list" >
          <div class="addelements thumbnail">
              <img width="25px" height="23px" src='<?php echo plugins_url( '/images/admin-icon/gallery.png', __FILE__ ) ;?>'
										alt="img">
                                        </div>
            <div class="addelements title-cat"><?php echo ''. __('Gallery Pro', 'massive_page_bui').'';?></div>
          </div>
          </a>
          </li>
       <li class="mix gallery">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="45px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/slider2.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Sequence Slider Pro', 'massive_page_bui').'';?></div>
          </div>
          </a>
          </li>
      <li class="mix gallery">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="37px" height="24px" src='<?php echo plugins_url( '/images/admin-icon/slider.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Camera Slider Pro', 'massive_page_bui').'';?></div>
          </div>
          </a>
          </li>
     <li class="mix data">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list" align="center">
            <div class="list-content icon-comment icon-2x"> </div>
            <div class="addelements title-cat"><?php echo ''. __('Dialog Window Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
       <li class="mix box">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
              <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/tab.png', __FILE__ ) ;?>' alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Animated Tabs Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
         <li class="mix contn">
           <a  class="addelements shortcode_hlinks" id="pro"  >
          <div class="addelements recent-list">
            <div class="addelements thumbnail">
             <img width="25px" height="21px" src='<?php echo plugins_url( '/images/admin-icon/button.png', __FILE__ ) ;?>'
										alt="img">
            </div>
            <div class="addelements title-cat"><?php echo ''. __('Animation Button Pro', 'massive_page_bui').'';?></div>
          </div>
          </a></li>
          <div class="addelements clear"></div>
        </ul>
		</div>
	</div>
</div>
</div>
</div>

<input type="hidden" name="plugin_url" id="plugin_url" value="<?php echo plugins_url('',__FILE__); ?>" />
<input type="hidden" name="mvb_drag_shrt"  value="" />
<ul id="added_items"  ><!--<div class="postmodule-edit-area" style="display:none" ><div class="control-obj">
</div></div>--> </ul> 
<div class="container-editable">
</div>
</div>

<?php }?>
