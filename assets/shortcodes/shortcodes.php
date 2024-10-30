<?php
/**
 * shortcodes-ultimate.3.9.5
 * http://wordpress.org/plugins/shortcodes-ultimate/
 * GNU General Public License, version 2
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
/**	 * Shortcode: heading
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
 
function su_mvb_do_shortcode( $content, $modifier ) {
	if ( strpos( $content, '[_' ) !== false ) {
		$content = preg_replace( '@(\[_*)_(' . $modifier . '|/)@', "$1$2", $content );
	}
	return do_shortcode( $content );
}

	function su_mvb_heading_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,
				'width' =>'50%'
						), $atts ) );

		return '<div   class="su-heading su-heading-style-' . $style . '"><div class="su-heading-shell">' . $content . '</div></div>';
	}

	/**
	 * Shortcode: frame
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_frame_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'align' => 'none'
				), $atts ) );

		return '<div class="su-frame su-frame-align-' . $align . '"><div class="su-frame-shell">' . do_shortcode( $content ) . '</div></div>';
	}

	/**
	 * Shortcode: spoiler
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_spoiler_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title' => __( 'Spoiler title', 'shortcodes-ultimate' ),
				'open' => false,
				'style' => 1
				), $atts ) );

		$open_class = ( $open ) ? ' su-spoiler-open' : '';
		$open_display = ( $open ) ? ' style="display:block"' : '';

		return '<div class="su-spoiler su-spoiler-style-' . $style . $open_class . '"><div class="su-spoiler-title">' . $title . '</div><div class="su-spoiler-content"' . $open_display . '>' . su_mvb_do_shortcode( $content, 's' ) . '</div></div>';
	}


	/**
	 * Shortcode: divider
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_divider_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'top' => false
				), $atts ) );

		return ( $top ) ? '<div class="su-divider"><a href="#">' . __( 'Top', 'shortcodes-ultimate' ) . '</a></div>' : '<div class="su-divider"></div>';
	}

	/**
	 * Shortcode: spacer
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_spacer_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'size' => 0
				), $atts ) );

		return '<div class="su-spacer" style="height:' . $size . 'px"></div>';
	}

	/**
	 * Shortcode: highlight
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'bg' => '#df9',
				'color' => '#000'
				), $atts ) );

		return '<span class="su-highlight" style="background:' . $bg . ';color:' . $color . '">&nbsp;' . $content . '&nbsp;</span>';
	}

	/**
	 * Shortcode: label
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_label_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 'default'
				), $atts ) );

		return '<span class="su-label su-label-style-' . $style . '">' . $content . '</span>';
	}

	/**
	 * Shortcode: dropcap
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_dropcap_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,
				'size' => 3
				), $atts ) );

		$em = $size * 0.5 . 'em';

		return '<span class="su-dropcap su-dropcap-style-' . $style . '" style="font-size:' . $em . '">' . $content . '</span>';
	}

/**
	 * Shortcode: list
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_listitems_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 'star'
				), $atts ) );

		return '<div class="su-list su-list-style-' . $style . '">' . do_shortcode( $content ) . '</div>';
	}

	/**
	 * Shortcode: quote
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_quote_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1
				), $atts ) );

		return '<div class="su-quote su-quote-style-' . $style . '"><div class="su-quote-shell">' . do_shortcode( $content ) . '</div></div>';
	}

	/**
	 * Shortcode: pullquote
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_pullquote_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,
				'align' => 'left'
				), $atts ) );

		return '<div class="su-pullquote su-pullquote-style-' . $style . ' su-pullquote-align-' . $align . '">' . do_shortcode( $content ) . '</div>';
	}

	/**
	 * Shortcode: button
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_button_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'link' => '#',
				'backgrond' => '',
				'bgcolor' => '',
				'fcolor' => '',
				'btn_w' => '',
				'btn_h' => '',
				'btn_titlecolor' => '',
				'btn_line_h' => '',
				'btn_radius' => '',
				'btn_border_w' => '',
				'btn_border_style' => '',
				'btn_border_color' => '',
				'btn_shadow_h' => '',
				'btn_shadow_v' => '',
				'btn_shadow_b' => '',
				'btn_shadow_s' => '',
				'btn_shadow_c' => '',
				'btn_shadow_p' => '',
				'font_s' => '',
				'icon' => '',
				'class' => '',
				'target' => false
				), $atts ) );
		if(empty($class) ) $class='mvb_btn';
				if(strcmp($btn_shadow_p,'inset')==0)
		$shadow_num='inset';
		elseif(strcmp($btn_shadow_p,'outset')==0)
		$shadow_num='';
		$target = ( $target ) ? ' target="_' . $target . '"' : '';

		return '<a href="' . $link . '" class="mvb_sbtn '.$class.'" style=" background:'.$backgrond.' '.$bgcolor.'; color:'.$fcolor.'; width:'.$btn_w.'px; height:'.$btn_h.'px; border-radius:'.$btn_radius.'px; border:'.$btn_border_w.'px '.$btn_border_style.' '.$btn_border_color.'; box-shadow:'.$btn_shadow_h.'px '.$btn_shadow_v.'px '.$btn_shadow_b.'px '.$btn_shadow_s.'px '.$btn_shadow_c.' '.$shadow_num.'" ' . $target . '><span style="line-height:'.$btn_line_h.'px; font-size:'.$font_s.'px" class="fa '.$icon.'">' . $content . '</span></a>';
	}

	/**
	 * Shortcode: fancy-link
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_fancy_link_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'link' => '#',
				'color' => 'black'
				), $atts ) );

		return '<a class="su-fancy-link su-fancy-link-' . $color . '" href="' . $link . '">' . $content . '</a>';
	}

	/**
	 * Shortcode: service
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_service_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'title' => __( 'Service name', 'shortcodes-ultimate' ),
				'icon' => plugins_url( basename( __FILE__, '.php' ), dirname( __FILE__ )) . '/images/service.png',
				'size' => 32
				), $atts ) );

		return '<div class="su-service"><div class="su-service-title" style="padding:' . round( ( $size - 16 ) / 2 ) . 'px 0 ' . round( ( $size - 16 ) / 2 ) . 'px ' . ( $size + 15 ) . 'px"><img src="' . $icon . '" width="' . $size . '" height="' . $size . '" alt="' . $title . '" /> ' . $title . '</div><div class="su-service-content" style="padding:0 0 0 ' . ( $size + 15 ) . 'px">' . do_shortcode( $content ) . '</div></div>';
	}

	/**
	 * Shortcode: box
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_box_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '#333',
				'title' => __( 'This is box title', 'shortcodes-ultimate' ),
				'class' => 'su-box',
				), $atts ) );
		if(empty($class) ) $class='su-box';	

		$styles = array(
			'dark_color' => su_mvb_hex_shift( $color, 'darker', 20 ),
			'light_color' => su_mvb_hex_shift( $color, 'lighter', 60 ),
			'text_shadow' => su_mvb_hex_shift( $color, 'darker', 70 ),
		);

		return '<div class="'.$class.'" style="border:1px solid ' . $styles['dark_color'] . '"><div class="su-box-title" style="background-color:' . $color . '; text-shadow:1px 1px 0 ' . $styles['text_shadow'] . '">' . $title . '</div><div class="su-box-content">' . su_mvb_do_shortcode( $content, 'b' ) . '</div></div>';
	}

	/**
	 * Shortcode: note
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_note_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'color' => '#fc0'
				), $atts ) );

		$styles = array(
			'dark_color' => su_mvb_hex_shift( $color, 'darker', 10 ),
			'light_color' => su_mvb_hex_shift( $color, 'lighter', 20 ),
			'extra_light_color' => su_mvb_hex_shift( $color, 'lighter', 80 ),
			'text_color' => su_mvb_hex_shift( $color, 'darker', 70 )
		);

		return '<div class="su-note" style="background-color:' . $styles['light_color'] . ';border:1px solid ' . $styles['dark_color'] . '"><div class="su-note-shell" style="border:1px solid ' . $styles['extra_light_color'] . ';color:' . $styles['text_color'] . '">' . su_mvb_do_shortcode( $content, 'n' ) . '</div></div>';
	}

	/**
	 * Shortcode: private
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_private_shortcode( $atts = null, $content = null ) {

		if ( current_user_can( 'publish_posts' ) )
			return '<div class="su-private"><div class="su-private-shell">' . do_shortcode( $content ) . '</div></div>';
	}

	/**
	 * Shortcode: media
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_media_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'url' => '',
				'width' => '',
				'height' => '',
				'jwplayer' => false,
				'class'=>''
				), $atts ) );
		if(empty($class) ) $class='su-media';

		if (isset($jwplayer)) {
			$jwplayer = str_replace( '#038;', '&', $jwplayer );
			parse_str( $jwplayer, $jwplayer_options );
		}
       // if($class) $return = '<div class="'.$class.'">';
		//else
		$return = '<div class="'.$class.'">';
		$return .= ( $url ) ? su_mvb_get_media( $url, $width, $height, $jwplayer_options ) : __( 'Please specify media url', 'shortcodes-ultimate' );
		$return .= '</div>';

		return $return;
	}

	/**
	 * Shortcode: table
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_table_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,
				'file' => false
				), $atts ) );

		$return = '<div class="su-table su-table-style-' . $style . '">';
		$return .= ( $file ) ? su_mvb_parse_csv( $file ) : do_shortcode( $content );
		$return .= '</div>';

		return $return;
	}

	/**
	 * Shortcode: permalink
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_permalink_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'p' => 1,
				'target' => ''
				), $atts ) );

		$text = ( $content ) ? $content : get_the_title( $p );
		$tgt = ( $target ) ? ' target="_' . $target . '"' : '';

		return '<a href="' . get_permalink( $p ) . '" title="' . $text . '"' . $tgt . '>' . $text . '</a>';
	}

	/**
	 * Shortcode: bloginfo
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_bloginfo_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'option' => 'name'
				), $atts ) );

		return get_bloginfo( $option );
	}

	/**
	 * Shortcode: subpages
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_subpages_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'depth' => 1,
				'p' => false
				), $atts ) );

		global $post;

		$child_of = ( $p ) ? $p : get_the_ID();

		$return = wp_list_pages( array(
			'title_li' => '',
			'echo' => 0,
			'child_of' => $child_of,
			'depth' => $depth
			) );

		return ( $return ) ? '<ul class="su-subpages">' . $return . '</ul>' : false;
	}

	/**
	 * Shortcode: siblings pages
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_siblings_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'depth' => 1
				), $atts ) );

		global $post;

		$return = wp_list_pages( array(
			'title_li' => '',
			'echo' => 0,
			'child_of' => $post->post_parent,
			'depth' => $depth,
			'exclude' => $post->ID
			) );

		return ( $return ) ? '<ul class="su-siblings">' . $return . '</ul>' : false;
	}

	/**
	 * Shortcode: menu
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_menu_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'name' => 1
				), $atts ) );

		$return = wp_nav_menu( array(
			'echo' => false,
			'menu' => $name,
			'container' => false,
			'fallback_cb' => 'su_menu_shortcode_fb_cb'
			) );

		return ( $name ) ? $return : false;
	}

	/**
	 * Fallback callback function for menu shortcode
	 *
	 * @return string Text message
	 */
	function su_mvb_menu_shortcode_fb_cb() {
		return __( 'This menu doesn\'t exists, or has no elements', 'shortcodes-ultimate' );
	}

	/**
	 * Shortcode: gmap
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_gmap_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'width' => '',
				'height' => '',
				'address' => 'Russia, Moscow'
				), $atts ) );

		return '<iframe width="' . $width . '" height="' . $height . '" src="http://maps.google.com/maps?q=' . urlencode( $address ) . '&amp;output=embed" class="su-gmap"></iframe>';
	}

	/**
	 * Shortcode: members
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_members_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'style' => 1,
				'login' => 1
				), $atts ) );

		// Logged user
		if ( is_user_logged_in() && !is_null( $content ) && !is_feed() ) {
			return do_shortcode( $content );
		}

		// Not logged user, show login message
		elseif ( $login == 1 ) {
			return '<div class="su-members su-members-style-' . $style . '"><span class="su-members-shell">' . __( 'This content is for members only.', 'shortcodes-ultimate' ) . ' <a href="' . wp_login_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Please login', 'shortcodes-ultimate' ) . '</a>.' . '</span></div>';
		}
	}

	/**
	 * Shortcode: guests
	 *
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_guests_shortcode( $atts = null, $content = null ) {

		// Logged user
		if ( !is_user_logged_in() && !is_null( $content ) ) {
			return '<div class="su-guests">' . do_shortcode( $content ) . '</div>';
		}
	}
	/**
	 * Shortcode: boxcontent
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 */
	function su_mvb_boxcontent_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
		'class' => ''
		), $atts ) );
		return '<div class="'.$class.'">'.$content.'</div>';
	}
?>