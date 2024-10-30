<?php
/* Plugin Name: Massive Visual Builder 
  Plugin URI: http://wpmeal.com
  Description: Enable its users to build Wordpress Pages Visually using a wide set of Shortcodes With advanced platform that has every things you need to manage page items and their layouts, came with post modules feature To display posts categories in different customized Style & Skin .
  Version: 1.0
  Author: wpmeal
  License: GPL3
  Author URI: http://wpmeal.com
  License URI: http://www.gnu.org/licenses/gpl.html
  Donate link: http://wpmeal.com
 */

function mvb_action_init() {
// Localization
    load_plugin_textdomain('massive_page_bui', false, plugins_url('/languages', (__FILE__)));
}

// Add actions
add_action('init', 'mvb_action_init');

require_once dirname(__FILE__) . '/advanced_shortcodes.php';
require_once dirname(__FILE__) . '/assets/shortcodes/shortcodes.php';
require_once dirname(__FILE__) . '/assets/shortcodes/available.php';
require_once dirname(__FILE__) . '/assets/shortcodes/csv.php';
require_once dirname(__FILE__) . '/assets/shortcodes/media.php';
require_once dirname(__FILE__) . '/assets/shortcodes/color.php';
require_once dirname(__FILE__) . '/assets/shortcodes/define_sh.php';
require_once dirname(__FILE__) . '/assets/WordPress-Plugin-Update-Notifier/update-notifier.php';
require_once dirname(__FILE__) . '/tweets.php';
require_once dirname(__FILE__) . '/pos_shortcode.php';
require_once dirname(__FILE__) . '/elements.php';
require_once dirname(__FILE__) . '/review.php';
require_once dirname(__FILE__) . '/edit_items.php';
require_once dirname(__FILE__) . '/assets/shortcodes/generator.php';
require_once dirname(__FILE__) . '/template.php';

function mvb_load_Ui_files() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_register_script('masonry-package', plugins_url('/assets/masonry/masonry.pkgd.min.js', __FILE__));
        wp_enqueue_script('masonry-package');
        wp_register_style('gplus-light-theme', plugins_url('/assets/gplus_activity_widget/light.css', __FILE__));
        wp_register_style('gplus-dark-theme', plugins_url('/assets/gplus_activity_widget/dark.css', __FILE__));
        wp_register_style('tweets', plugins_url('/css/tweets_style.css', __FILE__));


        wp_register_script('flexslide-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
        wp_enqueue_script('flexslide-jquery');

        wp_register_script('shortcodes-init', plugins_url('/assets/shortcodes/js/init.js', __FILE__), array('jquery'));
        wp_register_style('shortcodes-style', plugins_url('/assets/shortcodes/style.css', __FILE__));
        wp_enqueue_style('shortcodes-style');
        wp_enqueue_script('shortcodes-init');
        wp_register_script('fb', plugins_url('/js/fb.js', __FILE__), array('jquery'));
        wp_register_script('gplus-js', plugins_url('/assets/gplus_activity_widget/jquery.googleplus-activity-1.0.min.js', __FILE__));
// model dialog
        wp_register_style('modelweffect', plugins_url('/assets/modalwindoweffects/css/component.css', __FILE__));
        wp_register_script('classie', plugins_url('/assets/modalwindoweffects/js/classie.js', __FILE__));
        wp_register_script('css-filters-polyfill', plugins_url('/assets/modalwindoweffects/js/css-filters-polyfill.js', __FILE__));
        wp_register_script('cssParser', plugins_url('/assets/modalwindoweffects/js/cssParser.js', __FILE__));
        wp_register_script('modalEffects', plugins_url('/assets/modalwindoweffects/js/modalEffects.js', __FILE__));

        wp_register_style('animationbutton', plugins_url('/assets/animationmenus/css/style.css', __FILE__));
        wp_register_style('font-awesome-4-icon', plugins_url('/assets/font-awesome-4.0.3/css/font-awesome.min.css', __FILE__));
        wp_register_style('headingsets', plugins_url('/assets/headingsets/css/style.css', __FILE__));
//********************* TABs ***************************//
        wp_register_style('animatedtabs', plugins_url('/assets/animated_tabs/css/style.css', __FILE__));
        wp_register_style('tabulous-css', plugins_url('/assets/animated_tabs/css/tabulous.css', __FILE__));
        wp_register_script('tabulous', plugins_url('/assets/animated_tabs/tabulous/tabulous.js', __FILE__));
        wp_register_style('bootstrap-css', plugins_url('/assets/bootstrap/css/bootstrap.css', __FILE__));


//********************* Pricing Box ***************************//
        wp_register_style('pb-css', plugins_url('/assets/pb/style.css', __FILE__));
        wp_register_style('btn-css', plugins_url('/assets/btn/btn.css', __FILE__));
/** ****************************** review system********************** */

        wp_register_style('mvb-review-css', plugins_url('/assets/rating/jquery-bar-rating/rates.css', __FILE__));
        wp_register_script('mvb-review-call-js', plugins_url('/assets/rating/jquery-bar-rating/jquery.barrating.call.js', __FILE__));
        wp_register_style('mvb-review-fontawsm', plugins_url('/assets/font-awesome-4.0.3/css/font-awesome.min.css', __FILE__));
        wp_enqueue_style('mvb-review-css');
        wp_enqueue_style('mvb-review-fontawsm');
        wp_enqueue_script('mvb-review-call-js');
        /*         * ****************************** review system********************** */
     /*         * ****************************** frontend********************** */
        wp_register_style('mvb_frontend', plugins_url('/css/mvb_frontend.css', __FILE__));
        wp_enqueue_style('mvb_frontend');
      /*         * *********************** simple accordion   ********************** */
        wp_register_style('simpleaccordion-css', plugins_url('/assets/sim_acor/css/style.css', __FILE__));
        wp_register_script('simpleaccordion-js', plugins_url('/assets/sim_acor/js/jquery.accordion.js', __FILE__));
        wp_register_script('simpleaccordion-js-easing', plugins_url('/assets/sim_acor/js/jquery.easing.1.3.js', __FILE__));


        /*         * *********************** row/colmun  background     ****************************** */
        wp_register_script('backstretch', plugins_url('/assets/jquery/jquery.backstretch.min.js', __FILE__));
        wp_enqueue_script('backstretch');
    }
}

function mvb_load_adminUi_files() {

    /*     * *********************************** Images Grid ******************** */
    wp_register_style('images-grid', plugins_url('/css/images-grid/stylesheets/sample.css', __FILE__));
    wp_register_style('inline-bar', plugins_url('/css/inline_bar.css', __FILE__));
    /*     * *********************************** Images Grid ******************** */
    wp_register_script('imageLoader', plugins_url('/assets/imagepicker/jquery.imageloader.js', __FILE__));
    wp_register_script('imagepicker', plugins_url('/assets/imagepicker/image-picker.js', __FILE__));
    wp_register_style('imagepicker', plugins_url('/assets/imagepicker/image-picker.css', __FILE__));
    wp_register_script('gallery-handler', plugins_url('/js/galleries_handler.js', __FILE__));
    wp_register_style('checkinput', plugins_url('/assets/postcontrol/check.css', __FILE__));
    wp_register_script('check-js', plugins_url('/assets/postcontrol/jquery.customInput.js', __FILE__));
    wp_enqueue_style('checkinput');
    wp_enqueue_script('check-js');
    wp_register_style('btn-css', plugins_url('/assets/bootstrap/drowpdown-btn/btn.css', __FILE__));
    wp_register_style('blue-css', plugins_url('/assets/icheck/flat/blue.css', __FILE__));
    wp_register_style('chosen', plugins_url('/assets/chosen/chosen.css', __FILE__));
    wp_register_script('chosen', plugins_url('/assets/chosen/chosen.jquery.js', __FILE__));
    wp_register_script('chosen-proto', plugins_url('/assets/chosen/chosen.proto.js', __FILE__));
    wp_register_style('font-awesome', plugins_url('/css/font-awesome/css/font-awesome.min.css', __FILE__));
    wp_register_style('settings-style', plugins_url('/css/settings.css', __FILE__));
    wp_register_script('jwplayer', plugins_url('/assets/shortcodes/js/jwplayer.js', __FILE__));
    wp_register_script('dragp_generator', plugins_url('/js/dragp_generator.js', __FILE__));
    wp_register_script('mvb_settings_generator', plugins_url('/js/add_items.js', __FILE__));
    wp_register_script('dragsort', plugins_url('/assets/dragsort/jquery.dragsort-0.5.1.min.js', __FILE__));

    wp_register_script('template-sys', plugins_url('/js/template_sys.js', __FILE__));
    wp_register_script('special-shortcodes', plugins_url('/js/special_shortcodes.js', __FILE__));
    wp_register_script('colorbox-jquery', plugins_url('/assets/colorbox-master/jquery.colorbox.js', __FILE__));
    wp_register_script('bootstrap-js', plugins_url('/assets/bootstrap/js/bootstrap.min.js', __FILE__));
    wp_register_style('colorbox-style', plugins_url('/assets/colorbox-master/colorbox.css', __FILE__));
    wp_register_style('mass_plugin_additems_style', plugins_url('/css/add_items.css', __FILE__));
    wp_register_style('bootstrap-style', plugins_url('/assets/bootstrap/css/bootstrap.min.css', __FILE__));
    wp_register_style('jquery-ui-style', plugins_url('/assets/jquery/smoothness-jquery-ui.css', __FILE__));
    wp_register_script('jquery-ui-js', plugins_url('/assets/jquery/jquery-ui.js', __FILE__));
    wp_register_style('colorpicker-css', plugins_url('/assets/spectrum/spectrum.css', __FILE__));
    wp_register_script('colorpicker11', plugins_url('/assets/spectrum/spectrum.js', __FILE__));
    wp_register_style('radiocsss', plugins_url('/assets/radio/style2.css', __FILE__));
    wp_register_script('radio-js', plugins_url('/assets/radio/radio.js', __FILE__));
    wp_register_script('switcheditor', plugins_url('/js/switcheditor.js', __FILE__));
    wp_register_script('mixitup', plugins_url('/assets/mixitup/jquery.mixitup.min.js', __FILE__));
    wp_register_script('mixcall', plugins_url('/assets/mixitup/mixcall.js', __FILE__));
    wp_register_style('rs-skin', plugins_url('/assets/ionrangeSlider/css/ion.rangeSlider.skinNice.css', __FILE__));
    wp_register_style('rs-css', plugins_url('/assets/ionrangeSlider/css/ion.rangeSlider.css', __FILE__));
    wp_register_script('rangeslider', plugins_url('/assets/ionrangeSlider/js/ion.rangeSlider.min.js', __FILE__));
    wp_register_style('elemants-added', plugins_url('/css/elemants-added.css', __FILE__));
    wp_register_script('rowcol_manager', plugins_url('/js/rowcol_manager.js', __FILE__));
    wp_register_style('toolbarStyle', plugins_url('/assets/paulkinzett/toolbar.css', __FILE__));
    wp_register_script('toolbar', plugins_url('/assets/paulkinzett/jquery.toolbar.js', __FILE__));
    wp_register_script('toolbar-script', plugins_url('/js/toolbar-script.js', __FILE__));
    wp_register_script('tempsysslid', plugins_url('/js/temp_sys_slid.js', __FILE__));

    wp_enqueue_script('tempsysslid');
    wp_enqueue_script('toolbar');
    wp_enqueue_style('toolbarStyle');
    wp_enqueue_script('toolbar-script');
    wp_enqueue_style('rs-skin');
    wp_enqueue_style('rs-css');
    wp_enqueue_script('rangeslider');
    wp_enqueue_script('imageLoader');
    wp_enqueue_style('imagepicker');
    wp_enqueue_script('imagepicker');
    wp_enqueue_style('btn-css');
    wp_enqueue_style('blue-css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_style('radiocsss');
    wp_enqueue_script('radio-js');
    wp_enqueue_style('chosen');
    wp_enqueue_script('chosen');
    wp_enqueue_script('chosen-proto');
    wp_enqueue_style('colorpicker-css');
    wp_enqueue_script('colorpicker11');
    wp_enqueue_style('jquery-ui-style');
    wp_enqueue_style('colorbox-style');
    wp_enqueue_script('jquery-ui-js');
    wp_enqueue_script('colorbox-jquery');
  //  wp_enqueue_script('template-sys');
    wp_enqueue_style('settings-style');
    wp_enqueue_script('jwplayer');
    wp_enqueue_script('dragsort');
    wp_enqueue_script('dragp_generator');
    wp_enqueue_style('head_shortcode_style');
    wp_enqueue_style('font-awesome');
  //  wp_enqueue_script('add_items_js');
    wp_enqueue_script('special-shortcodes');
    wp_enqueue_style('mass_plugin_additems_style');

    wp_enqueue_script('switcheditor');
    wp_enqueue_script('gallery-handler');
    wp_enqueue_script('mixitup');
    wp_enqueue_script('mixcall');
    wp_enqueue_style('elemants-added');
    wp_enqueue_style('images-grid');
    wp_enqueue_style('inline-bar');
///adding markitup
    wp_register_script('jquerymarkitup', plugins_url('/assets/latest/markitup/jquery.markitup.js', __FILE__));
    wp_enqueue_script('jquerymarkitup');
    wp_register_script('setmarkitup', plugins_url('/assets/latest/markitup/sets/default/set.js', __FILE__));
    wp_enqueue_script('setmarkitup');
    wp_register_style('skinsmarkitup', plugins_url('/assets/latest/markitup/skins/markitup/style.css', __FILE__));
    wp_enqueue_style('skinsmarkitup');
    wp_register_style('setsmarkitup', plugins_url('/assets/latest/markitup/sets/default/style.css', __FILE__));
    wp_enqueue_style('setsmarkitup');
//
    wp_enqueue_script('rowcol_manager');
}

function mvb_add_mass_boxai() {
    add_meta_box('massivepb', 'Massive Visual Builder', 'mvb_massive_boxai_func', 'page', 'normal', 'high');
    add_meta_box('massivepb', 'Massive Visual Builder', 'mvb_massive_boxai_func', 'post', 'normal', 'high');
}

function mvb_massive_boxai_func() {
    return mvb_load_ui();
}

add_action('admin_init', 'mvb_load_plugin');

function mvb_load_plugin() {
    if (is_admin()) {
        add_action('load-post.php', 'mvb_load_adminUi_files');
        add_action('load-post-new.php', 'mvb_load_adminUi_files');
        add_action('add_meta_boxes', 'mvb_add_mass_boxai');
    }
}

function mvb_define_shortcodes() {
    add_shortcode('pos_dim', 'mvb_pos_shortcode');
    add_shortcode('mvb_custom-content', 'mvb_custom_content');
    add_shortcode('mvb_tweet', 'mvb_tweets_shortcode');
    add_shortcode('mvb_row', 'mvb_row_shortcode');
    add_shortcode('mvb_column', 'mvb_column_shortcode');
}

add_action('init', 'mvb_define_shortcodes');
add_action('init', 'mvb_load_Ui_files');
?>