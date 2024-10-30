<?php
/**
 * shortcodes-ultimate.3.9.5
 *http://wordpress.org/plugins/shortcodes-ultimate/
 * GNU General Public License, version 2
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 */
foreach ( su_mvb_shortcodes() as $shortcode => $params ) { 
if ( $params['type'] != 'opengroup' && $params['type'] != 'closegroup' ){
add_shortcode("mvb_".$shortcode, 'su_mvb_'. $shortcode . '_shortcode' );
add_shortcode("mvb_".$shortcode, 'mvb_'. $shortcode . '_shortcode' );
}
}	
?>