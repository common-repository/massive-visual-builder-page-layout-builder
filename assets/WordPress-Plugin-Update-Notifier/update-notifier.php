<?php
/**************************************************************
 *                                                            *
 *   Provides a notification to the user everytime            *
 *   your WordPress plugin is updated                         *
 *															  *
 *	 Based on the script by Unisphere:						  *
 *   https://github.com/unisphere/unisphere_notifier          *
 *                                                            *
 *   Author: Pippin Williamson                                *
 *   Profile: http://codecanyon.net/user/mordauk              *
 *   Follow me: http://twitter.com/pippinsplugins             *
 *                                                            *
 **************************************************************/
 
/*
	Replace MASSB and massb by your plugin prefix to prevent conflicts between plugins using this script.
*/

// Constants for the plugin name, folder and remote XML url
define( 'MASSB_NOTIFIER_PLUGIN_NAME', 'Massive Visual Builder' ); // The plugin name
define( 'MASSB_NOTIFIER_PLUGIN_SHORT_NAME', 'MVB' ); // The plugin short name, only if needed to make the menu item fit. Remove this if not needed
define( 'MASSB_NOTIFIER_PLUGIN_FOLDER_NAME', 'massive-visual-builder-page-layout-builder' ); // The plugin folder name
define( 'MASSB_NOTIFIER_PLUGIN_FILE_NAME', 'massive_page_bui.php' ); // The plugin file name
define( 'MASSB_NOTIFIER_PLUGIN_XML_FILE', 'http://wpmeal.com/upgrade_notifier.xml' ); // The remote notifier XML file containing the latest version of the plugin and changelog
define( 'MASSB_PLUGIN_NOTIFIER_CACHE_INTERVAL', 0 ); // The time interval for the remote XML cache in the database (21600 seconds = 6 hours)
define( 'MASSB_PLUGIN_NOTIFIER_CODECANYON_USERNAME', 'phpdream' ); // Your Codecanyon username


// Adds an update notification to the WordPress Dashboard menu
function massb_update_plugin_notifier_menu() {  
	if (function_exists('simplexml_load_string')) { // Stop if simplexml_load_string funtion isn't available
	    $xml 			= massb_get_latest_plugin_version(MASSB_PLUGIN_NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server
		$plugin_data 	= get_plugin_data(WP_PLUGIN_DIR . '/' . MASSB_NOTIFIER_PLUGIN_FOLDER_NAME . '/' . MASSB_NOTIFIER_PLUGIN_FILE_NAME); // Read plugin current version from the style.css

		if( (string)$xml->latest > (string)$plugin_data['Version']) { // Compare current plugin version with the remote XML version
			if(defined('MASSB_NOTIFIER_PLUGIN_SHORT_NAME')) {
				$menu_name = MASSB_NOTIFIER_PLUGIN_SHORT_NAME;
			} else {
				$menu_name = MASSB_NOTIFIER_PLUGIN_NAME;
			}
		//	add_dashboard_page( MASSB_NOTIFIER_PLUGIN_NAME . ' Plugin Updates', $menu_name . ' <span class="update-plugins count-1"><span class="update-count">New Updates</span></span>', 'administrator', 'massb-plugin-update-notifier', 'massb_update_notifier');
			add_action('admin_notices', 'mvb_update_notifier');
                        
                        }
	}	
}
add_action('admin_menu', 'massb_update_plugin_notifier_menu');  

// Get the remote XML file contents and return its data (Version and Changelog)
// Uses the cached version if available and inside the time interval defined
function massb_get_latest_plugin_version($interval) {
	$notifier_file_url = MASSB_NOTIFIER_PLUGIN_XML_FILE;	
	$db_cache_field = 'notifier-cache';
	$db_cache_field_last_updated = 'notifier-cache-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		if( function_exists('curl_init') ) { // if cURL is available, use it...
			$ch = curl_init($notifier_file_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$cache = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
		}

		if ($cache) {			
			// we got good results	
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );
		} 
		// read from the cache file
		$notifier_data = get_option( $db_cache_field );
	}
	else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
	}

	// Let's see if the $xml data was returned as we expected it to.
	// If it didn't, use the default 1.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down
	if( strpos((string)$notifier_data, '<notifier>') === false ) {
		$notifier_data = '<?xml version="1.0" encoding="UTF-8"?><notifier><latest>1.0</latest><changelog></changelog></notifier>';
	}

	// Load the remote XML data into a variable and return it
	$xml = simplexml_load_string($notifier_data); 

	return $xml;
}
// The notifier page
function mvb_update_notifier() { 
	$xml= massb_get_latest_plugin_version(MASSB_PLUGIN_NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server
             global $current_user ;

        $user_id = $current_user->ID;

        /* Check that the user hasn't already clicked to ignore the message */

    if ( ! get_user_meta($user_id, 'mvb_nag_ignore') ) {

       
        ?>
    <div id="message" class="updated below-h2"><p><strong><?php echo __('Get More Features Of Massive Visual Builder By Upgrade to Premium Version ' ,'mvb');?><a target="_blank" href="http://wpmeal.com">Upgrade Now </a>| <a href="?mvb_nag_ignore=0">Hide Notice</a> .</p></div>

<?php } 
}

add_action('admin_init', 'mvb_nag_ignore');

function mvb_nag_ignore() {

    global $current_user;

        $user_id = $current_user->ID;

        /* If user clicks to ignore the notice, add that to their user meta */

        if ( isset($_GET['mvb_nag_ignore']) && '0' == $_GET['mvb_nag_ignore'] ) {

             add_user_meta($user_id, 'mvb_nag_ignore', 'true', true);

    }

}

?>
