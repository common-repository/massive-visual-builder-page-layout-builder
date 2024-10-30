<?php
/**
 * shortcodes ultimate.3.9.5 
 *http://wordpress.org/plugins/shortcodes-ultimate/
 * GNU General Public License, version 2
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html 
 */

	function su_mvb_shortcodes( $shortcode = false ) {
		$shortcodes = array(
			# basic shortcodes - start
			'basic-shortcodes-open' => array(
				'name' => __( 'Basic shortcodes', 'massive_visual_builder' ),
				'type' => 'opengroup'
			),
			# frame
			'frame' => array(
				'name' => 'Image frame',
				'type' => 'wrap',
				'atts' => array(
					'align' => array(
						'values' => array(
							'left',
							'center',
							'none',
							'right'
						),
						'default' => '1',
						'desc' => __( 'Frame align', 'massive_visual_builder' )
					)
				),
				'usage' => '[frame align="center"] <img src="image.jpg" alt="" /> [/frame]',
				'content' => __( 'Image tag', 'massive_visual_builder' ),
				'desc' => __( 'Styled image frame', 'massive_visual_builder' )
			),
		/*	# tabs
			'tabs' => array(
				'name' => 'Tabs',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
						'values' => array(
							'1',
							'2',
							'3'
						),
						'default' => '1',
						'desc' => __( 'Tabs style', 'massive_visual_builder' )
					)
				),
				'usage' => '[tabs style="1"] [tab title="Tab name"] Tab content [/tab] [/tabs]',
				"content" => __( "[mvb_tab title='Tab name 1'] Tab content 1[/mvb_tab][mvb_tab title='Tab name 2'] Tab content 2 [/mvb_tab]  ", 'massive_visual_builder' ),
				'desc' => __( 'Tabs container', 'massive_visual_builder' )
			),
			# tab
			'tab' => array(
				'name' => 'Tab',
				'type' => 'wrap',
				'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => __( 'Title', 'massive_visual_builder' ),
						'desc' => __( 'Tab title', 'massive_visual_builder' )
					)
				),
				'usage' => '[tabs style="1"] [tab title="Tab name"] Tab content [/tab] [/tabs]',
				'content' => __( 'Tab content', 'massive_visual_builder' ),
				'desc' => __( 'Single tab', 'massive_visual_builder' )
			),*/
		/*	# spoiler
			'spoiler' => array(
				'name' => 'Spoiler',
				'type' => 'wrap',
				'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => __( 'Spoiler title', 'massive_visual_builder' ),
						'desc' => __( 'Spoiler title', 'massive_visual_builder' )
					),
					'open' => array(
						'values' => array(
							'0',
							'1'
						),
						'default' => '0',
						'desc' => __( 'Is spoiler open?', 'massive_visual_builder' )
					),
					'style' => array(
						'values' => array(
							'1',
							'2'
						),
						'default' => '1',
						'desc' => __( 'Spoiler style', 'massive_visual_builder' )
					)
				),
				'usage' => '[spoiler title="Spoiler title"] Hidden text [/spoiler]',
				'content' => __( 'Hidden content', 'massive_visual_builder' ),
				'desc' => __( 'Hidden text', 'massive_visual_builder' )
			),*/
		/*	# accordion
			'accordion' => array(
				'name' => 'Accordion',
				'type' => 'wrap',
				'atts' => array( ),
				'usage' => '[accordion]<br/>[spoiler open="true"] content [/spoiler]<br/>[spoiler] content [/spoiler]<br/>[spoiler] content [/spoiler]<br/>[/accordion]',
				'content' => '[mvb_spoiler] content [/mvb_spoiler]',
				'desc' => __( 'Accordion', 'massive_visual_builder' )
			),*/
			# accordion
			'simple_accordion' => array(
				'name' => 'Accordion',
				'type' => 'wrap',
				'atts' => array( ),
				'desc' => __( 'Simple Accordion', 'massive_visual_builder' ),
				'content' => array(
				'type' =>'inline-shortcode',
				'shortcodes'=>array('simple_accordion_slice'=>array('type'=>'multiple'))
				)
			),
			# accordion slice
			'simple_accordion_slice' => array(
				'name' => 'Simple Accordion Slice',
				'type' => 'wrap',
				'atts' => array(
				'slice_title' => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'Slice Title', 'massive_visual_builder' ),
				)
				 ),
				'content' => __( 'Html or plain text' , 'massive_visual_builder' )
			),
			# divider
			'divider' => array(
				'name' => 'Divider',
				'type' => 'single',
				'atts' => array(
					'top' => array(
						'values' => array(
							'0',
							'1'
						),
						'default' => '0',
						'desc' => __( 'Show TOP link', 'massive_visual_builder' )
					)
				),
				'usage' => '[divider top="1"]',
				'desc' => __( 'Content divider with optional TOP link', 'massive_visual_builder' )
			),
			# spacer
			'spacer' => array(
				'name' => 'Spacer',
				'type' => 'single',
				'atts' => array(
					'size' => array(
						'values' => array(
							'0',
							'5',
							'10',
							'20',
							'40'
						),
						'default' => '20',
						'desc' => __( 'Spacer height in pixels', 'massive_visual_builder' )
					)
				),
				'usage' => '[spacer size="20"]',
				'desc' => __( 'Empty space with adjustable height', 'massive_visual_builder' )
			),
			# quote
			'quote' => array(
				'name' => 'Quote',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
						'values' => array(
							'1',
							'2',
							'3',
							'4',
							'5'
						),
						'default' => '1',
						'desc' => __( 'Quote style', 'massive_visual_builder' )
					)
				),
				'usage' => '[quote style="1"] Content [/quote]',
				'content' => __( 'Quote', 'massive_visual_builder' ),
				'desc' => __( 'Blockquote alternative', 'massive_visual_builder' )
			),
			# pullquote
			'pullquote' => array(
				'name' => 'Pullquote',
				'type' => 'wrap',
				'atts' => array(
					'align' => array(
						'values' => array(
							'left',
							'right'
						),
						'default' => 'left',
						'desc' => __( 'Pullquote alignment', 'massive_visual_builder' )
					)
				),
				'usage' => '[pullquote align="left"] Content [/pullquote]',
				'content' => __( 'Pullquote', 'massive_visual_builder' ),
				'desc' => __( 'Pullquote', 'massive_visual_builder' )
			),
			# highlight
			'highlight' => array(
				'name' => 'Highlight',
				'type' => 'wrap',
				'atts' => array(
					'bg' => array(
						'values' => array( ),
						'default' => '#DDFF99',
						'desc' => __( 'Background color', 'massive_visual_builder' ),
						'type' => 'color'
					),
					'color' => array(
						'values' => array( ),
						'default' => '#000000',
						'desc' => __( 'Text color', 'massive_visual_builder' ),
						'type' => 'color'
					)
				),
				'usage' => '[highlight bg="#fc0" color="#000"] Content [/highlight]',
				'content' => __( 'Highlighted text', 'massive_visual_builder' ),
				'desc' => __( 'Highlighted text', 'massive_visual_builder' )
			),
			# label
			'label' => array(
				'name' => 'Label',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
						'values' => array(
							'default',
							'success',
							'warning',
							'important',
							'info'
						),
						'default' => 'default',
						'desc' => __( 'Label style', 'massive_visual_builder' )
					)
				),
				'usage' => '[label style="info"]Something[/label]',
				'content' => __( 'Label', 'massive_visual_builder' ),
				'desc' => __( 'Styled label', 'massive_visual_builder' )
			),
			# dropcap
			'dropcap' => array(
				'name' => 'Dropcap',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
						'values' => array(
							'1',
							'2',
							'3'
						),
						'default' => '1',
						'desc' => __( 'Dropcap style', 'massive_visual_builder' )
					),
					'size' => array(
						'values' => array(
							'1',
							'2',
							'3',
							'4',
							'5'
						),
						'default' => '3',
						'desc' => __( 'Dropcap size', 'massive_visual_builder' )
					)
				),
				'usage' => '[dropcap style="1"]D[/dropcap]ropcap',
				'content' => __( 'D', 'massive_visual_builder' ),
				'desc' => __( 'Dropcap', 'massive_visual_builder' )
			),
			# bloginfo
			'bloginfo' => array(
				'name' => 'Bloginfo',
				'type' => 'single',
				'atts' => array(
					'option' => array(
						'values' => array(
							'name',
							'description',
							'siteurl',
							'admin_email',
							'charset',
							'version',
							'html_type',
							'text_direction',
							'language',
							'template_url',
							'pingback_url',
							'rss2_url'
						),
						'default' => 'left',
						'desc' => __( 'Option name', 'massive_visual_builder' )
					)
				),
				'usage' => '[bloginfo option="name"]',
				'desc' => __( 'Blog info', 'massive_visual_builder' )
			),
			# permalink
			'permalink' => array(
				'name' => 'Permalink',
				'type' => 'mixed',
				'atts' => array(
					'p' => array(
						'values' => array( ),
						'default' => '1',
						'desc' => __( 'Post/page ID', 'massive_visual_builder' )
					),
					'target' => array(
						'values' => array(
							'self',
							'blank'
						),
						'default' => 'self',
						'desc' => __( 'Link target', 'massive_visual_builder' )
					),
				),
				'usage' => '[permalink p=52]<br/>[permalink p="52" target="blank"] Content [/permalink]',
				'content' => __( 'Permalink text', 'massive_visual_builder' ),
				'desc' => __( 'Permalink to specified post/page', 'massive_visual_builder' )
			),
			# button
			'button' => array(
				'name' => 'Button',
				'type' => 'wrap',
				'atts' => array(
					'link' => array(
						'values' => array( ),
						'default' => '#',
						'desc' => __( 'Button link', 'massive_visual_builder' )
					),
					'backgrond' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Background (Gradient or Image)', 'massive_visual_builder' ),
					),
					'bgcolor' => array(
						'values' => array( ),
						'default' => '#AAAAAA',
						'desc' => __( 'Button background color', 'massive_visual_builder' ),
						'type' => 'color'
					),
					'fcolor' => array(
						'values' => array( ),
						'default' => '#FFFFFF',
						'desc' => __( 'Font color', 'massive_visual_builder' ),
						'type' => 'color'
					),
						
				'btn_w' =>  array(
				'values' => array(),
				'default' => '200',
				'type' => 'range',
				'range_values'=>array('min'=>'20','max'=>'700','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Width ', 'massive_visual_builder' ),				
				),
				'btn_h' =>  array(
				'values' => array(),
				'default' => '40',
				'type' => 'range',
				'range_values'=>array('min'=>'20','max'=>'700','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'height ', 'massive_visual_builder' ),				
				),
				'btn_titlecolor' => array(
						'values' => array( ),
						'default' => '#FFFFFF',
						'desc' => __( 'Title color', 'massive_visual_builder' ),
						'type' => 'color'
					),
				'btn_line_h' =>  array(
				'values' => array(),
				'default' => '40',
				'type' => 'range',
				'range_values'=>array('min'=>'20','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Line height ', 'massive_visual_builder' ),				
				),
				'btn_radius' =>  array(
				'values' => array(),
				'default' => '2',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'100','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Radius ', 'massive_visual_builder' ),				
				),
				'btn_border_w' =>  array(
				'values' => array(),
				'default' => '',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'10','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border Width ', 'massive_visual_builder' ),				
				),
				'btn_border_style' =>  array(
				'values' => array('none','solid','dotted','dashed','double','groove','ridge','inset','outset'),
				'default' => 'solid',
				'desc' => __( ' Border Style ', 'massive_visual_builder' ),				
				),
				'btn_border_color' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Border Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'btn_shadow_h' =>  array(
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Shadow Horizontal Offset ', 'massive_visual_builder' ),				
				),
				'btn_shadow_v' =>  array(
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Shadow Vertical Offset ', 'massive_visual_builder' ),				
				),
				'btn_shadow_b' =>  array(
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Shadow Blur Radius ', 'massive_visual_builder' ),				
				),
				'btn_shadow_s' =>  array(
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Shadow Spread Radius ', 'massive_visual_builder' ),				
				),
				'btn_shadow_c' => array(
				'values' => array( ),
				'default' => '#FFFFFF',
				'desc' => __( 'Shadow Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'btn_shadow_p' => array(
				'values' => array('outset','inset' ),
				'default' => '',
				'desc' => __( 'Shadow position', 'massive_visual_builder' ),
				),
				'icon' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Font Awesome icon', 'massive_visual_builder' )
					),
					'class' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Button class', 'massive_visual_builder' )
					),
					'target' => array(
						'values' => array(
							'self',
							'blank'
						),
						'default' => 'self',
						'desc' => __( 'Button link target', 'massive_visual_builder' )
					),
				'font_s' =>  array(
				'values' => array(),
				'default' => '18',
				'type' => 'range',
				'range_values'=>array('min'=>'8','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Font Size ', 'massive_visual_builder' ),				
				),
				),
				'content' => __( 'Button text', 'massive_visual_builder' ),
				'desc' => __( 'Styled button', 'massive_visual_builder' )
			),
			# fancy_link
			'fancy_link' => array(
				'name' => 'Fancy link',
				'type' => 'wrap',
				'atts' => array(
					'color' => array(
						'values' => array(
							'black',
							'white'
						),
						'default' => 'black',
						'desc' => __( 'Link color', 'massive_visual_builder' )
					),
					'link' => array(
						'values' => array( ),
						'default' => '#',
						'desc' => __( 'URL', 'massive_visual_builder' )
					)
				),
				'usage' => '[fancy_link color="black" link="http://example.com/"] Read more [/fancy_link]',
				'content' => __( 'Link text', 'massive_visual_builder' ),
				'desc' => __( 'Fancy link', 'massive_visual_builder' )
			),
			# service
			'service' => array(
				'name' => 'Service',
				'type' => 'wrap',
				'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => __( 'Service title', 'massive_visual_builder' ),
						'desc' => __( 'Service title', 'massive_visual_builder' )
					),
					'icon' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Service icon', 'massive_visual_builder' )
					),
					'size' => array(
						'values' => array(
							'24',
							'32',
							'48'
						),
						'default' => '32',
						'desc' => __( 'Icon size', 'massive_visual_builder' )
					)
				),
				'usage' => '[service title="Service title" icon="service.png" size="32"] Service description [/service]',
				'content' => __( 'Service description', 'massive_visual_builder' ),
				'desc' => __( 'Service box with title', 'massive_visual_builder' )
			),
			# members
			'members' => array(
				'name' => 'Members',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
						'values' => array(
							'0',
							'1',
							'2'
						),
						'default' => '1',
						'desc' => __( 'Box style', 'massive_visual_builder' )
					),
					'login' => array(
						'values' => array(
							'0',
							'1'
						),
						'default' => '1',
						'desc' => __( 'Show login message', 'massive_visual_builder' )
					)
				),
				'usage' => '[members style="2" login="1"] Content for logged members [/members]',
				'content' => __( 'Content for logged members', 'massive_visual_builder' ),
				'desc' => __( 'Content for logged in members only', 'massive_visual_builder' )
			),
			# guests
			'guests' => array(
				'name' => 'Guests',
				'type' => 'wrap',
				'atts' => array( ),
				'usage' => '[guests] Content for guests [/guests]',
				'content' => __( 'Content for guests', 'massive_visual_builder' ),
				'desc' => __( 'Content for guests only', 'massive_visual_builder' )
			),
			# boxcontent
			'boxcontent' => array(
				'name' => 'Box Content',
				'type' => 'wrap',
				'atts' => array(
					'class' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Box content class', 'massive_visual_builder' )
						 )
						 ),
				'content' => __( 'Box Content', 'massive_visual_builder' )						
					),
			# box
			'box' => array(
				'name' => 'Box',
				'type' => 'wrap',
				'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => __( 'Box title', 'massive_visual_builder' ),
						'desc' => __( 'Box title', 'massive_visual_builder' )
					),
					'color' => array(
						'values' => array( ),
						'default' => '#333333',
						'desc' => __( 'Box color', 'massive_visual_builder' ),
						'type' => 'color'
					),
					'class' => array(
					    'values' => array( ),
					    'default' => '',
					    'desc' => __( 'Box class', 'massive_visual_builder' ),					
						)
				),
				'usage' => '[box title="Box title" color="#f00"] Content [/box]',
	             'content' => array(
				'type' =>'inline-shortcode',
				'shortcodes'=>array('media'=>array('type'=>'none'),'boxcontent'=>array('type'=>'none'),'button'=>array('type'=>'none'))
				)			
			),
			# note
			'note' => array(
				'name' => 'Note',
				'type' => 'wrap',
				'atts' => array(
					'color' => array(
						'values' => array( ),
						'default' => '#FFCC00',
						'desc' => __( 'Note color', 'massive_visual_builder' ),
						'type' => 'color'
					)
				),
				'usage' => '[note color="#FFCC00"] Content [/note]',
				'content' => __( 'Note text', 'massive_visual_builder' ),
				'desc' => __( 'Colored box', 'massive_visual_builder' )
			),
			# private
			'private' => array(
				'name' => 'Private',
				'type' => 'wrap',
				'atts' => array( ),
				'usage' => '[private] Private content [/private]',
				'content' => __( 'Private note text', 'massive_visual_builder' ),
				'desc' => __( 'Private note for post authors', 'massive_visual_builder' )
			),
			# list
			'listitems' => array(
				'name' => 'List',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
						'values' => array(
							'star',
							'arrow',
							'check',
							'cross',
							'thumbs',
							'link',
							'gear',
							'time',
							'note',
							'plus',
							'guard',
							'event',
							'idea',
							'settings',
							'twitter'
						),
						'default' => 'star',
						'desc' => __( 'List style', 'massive_visual_builder' )
					)
				),
				'usage' => '[list style="check"] <ul> <li> List item </li> </ul> [/list]',
				'content' => '<ul><li>' . __( 'List item ', 'massive_visual_builder' ) . '</li></ul>',
				'desc' => __( 'Styled unordered list', 'massive_visual_builder' )
			),
			# feed
			'feed' => array(
				'name' => 'Feed',
				'type' => 'single',
				'atts' => array(
					'url' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Feed URL', 'massive_visual_builder' )
					),
					'limit' => array(
						'values' => array( ),
						'default' => '5',
						'desc' => __( 'Number of item to show', 'massive_visual_builder' )
					),                  
					'color' => array(
						'values' => array(),					
						'default' => '#AAAAAA',                       
						'desc' => __( 'Background Color Title', 'massive_visual_builder' ),
						'type'=>'color'
					),                 
                     'height' => array(
						'values' => array(),					
						'default' => '300',
						'desc' => __( 'Height', 'massive_visual_builder' )
					)
				),
				'usage' => '[feed url="http://rss1.smashingmagazine.com/feed/" limit="5"]',
				'desc' => __( 'Feed grabber', 'massive_visual_builder' )
			),
			# menu
			'menu' => array(
				'name' => 'Menu',
				'type' => 'single',
				'atts' => array(
					'name' => array(
						'values' => array( ),
						'default' => '',
						'desc' => __( 'Custom menu name', 'massive_visual_builder' )
					)
				),
				'usage' => '[menu name="Main menu"]',
				'desc' => __( 'Custom menu by name', 'massive_visual_builder' )
			),
		/*	# listpages
			'wp_list_pages' => array(
				'name' => 'pages list',
				'type' => 'single',
				'atts' => array(
					'authors' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Author', 'massive_visual_builder' )
					),
					'child_of' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Sub pages', 'massive_visual_builder' )
					),
					'date_format' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Date format', 'massive_visual_builder' )
					),
					'depth ' => array(
						'values' => array(),
						'default' => '0',
						'desc' => __( 'pages depth', 'massive_visual_builder' )
					),
					'echo' => array(
						'values' => array('0', '1'),
						'default' => '',
						'desc' => __( 'echo ', 'massive_visual_builder' )
					),
					'exclude' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Exclude Pages', 'massive_visual_builder' )
					),
					'include' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Include Pages', 'massive_visual_builder' )
					),
					'link_after' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Link After', 'massive_visual_builder' )
					),
					'link_before' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Link Before', 'massive_visual_builder' )
					),
					'post_type' => array(
						'values' => array('page','post','revision','attachment','nav_menu_item'),
						'default' => '',
						'desc' => __( 'Post Type', 'massive_visual_builder' )
					),
					'post_status' => array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'post status types ', 'massive_visual_builder' )
					),
					'show_date' => array(
						'values' => array(),
						'default' => 'modified',
						'desc' => __( 'Show Date ', 'massive_visual_builder' )
					),
					'sort_column' => array(
						'values' => array('post_title', 'menu_order', 'post_date', 'post_modified', 'ID', 'post_author', 'post_name'),
						'default' => '',
						'desc' => __( 'Order By ', 'massive_visual_builder' )
					),
					)
				
			),*/
		/*	# subpages
			'subpages' => array(
				'name' => 'Sub pages',
				'type' => 'single',
				'atts' => array(
					'depth' => array(
						'values' => array(
							'1',
							'2',
							'3'
						),
						'default' => '1',
						'desc' => __( 'Depth level', 'massive_visual_builder' )
					),
					'p' => array(
						'values' => false,
						'default' => '',
						'desc' => __( 'Parent page ID', 'massive_visual_builder' )
					)
				),
				'usage' => '[subpages]<br/>[subpages depth="2" p="122"]',
				'desc' => __( 'Page childrens', 'massive_visual_builder' )
			),
			# siblings
			'siblings' => array(
				'name' => 'Siblings',
				'type' => 'single',
				'atts' => array(
					'depth' => array(
						'values' => array(
							'1',
							'2',
							'3'
						),
						'default' => '1',
						'desc' => __( 'Depth level', 'massive_visual_builder' )
					)
				),
				'usage' => '[siblings]<br/>[siblings depth="2"]',
				'desc' => __( 'Page siblings', 'massive_visual_builder' )
			),
			# column
			'column' => array(
				'name' => 'Column',
				'type' => 'wrap',
				'atts' => array(
					'size' => array(
						'values' => array(
							'1-2',
							'1-3',
							'1-4',
							'1-5',
							'1-6',
							'2-3',
							'2-5',
							'3-4',
							'3-5',
							'4-5',
							'5-6'
						),
						'default' => '1-2',
						'desc' => __( 'Column width', 'massive_visual_builder' )
					),
					'last' => array(
						'values' => array(
							'0',
							'1'
						),
						'default' => '0',
						'desc' => __( 'Last column', 'massive_visual_builder' )
					),
					'style' => array(
						'values' => array(
							'0',
							'1',
							'2'
						),
						'default' => '0',
						'desc' => __( 'Column style', 'massive_visual_builder' )
					)
				),
				'usage' => '[column size="1-2"] Content [/column]<br/>[column size="1-2" last="1"] Content [/column]',
				'content' => __( 'Column content', 'massive_visual_builder' ),
				'desc' => __( 'Flexible columns', 'massive_visual_builder' )
			),*/
			# table
			'table' => array(
				'name' => 'Table',
				'type' => 'mixed',
				'atts' => array(
					'style' => array(
						'values' => array(
							'1',
							'2',
							'3'
						),
						'default' => '1',
						'desc' => __( 'Table style', 'massive_visual_builder' )
					),
					'file' => array(
						'values' => false,
						'default' => '',
						'desc' => __( 'Create table from CSV', 'massive_visual_builder' )
					)
				),
				'usage' => '[table style="1"] <table> … <table> [/table]<br/>[table style="1" file="http://example.com/file.csv"] [/table]',
				'content' => '<table><tr><td></td></tr></table>',
				'desc' => __( 'Styled table from HTML or CSV file', 'massive_visual_builder' )
			),
		/*# pricing
			'pricing' => array(
				'name' => 'Pricing table',
				'type' => 'wrap',
				'atts' => array(
					'style' => array(
					'values' => array(
							'1',
						'2'
						),
					'default' => '1',
						'desc' => __( 'Table style', 'massive_visual_builder' )
					)
				),
			'usage' => '[pricing]<br/>[plan name="Plan 1"] Plan description [/plan]<br/>[/pricing]',
				'content' => '[mvb_plan][/mvb_plan]',
				'desc' => __( 'Customizable pricing table', 'massive_visual_builder' )
		),*/
	/*	# plan
			'plan' => array(
				'name' => 'Pricing plan',
			'type' => 'wrap',
				'atts' => array(
				'name' => array(
					'values' => false,
				'default' => '&hellip;',
				'desc' => __( 'Plan name', 'massive_visual_builder' )
			),
			'price' => array(
				'values' => false,
				'default' => '$100',
				'desc' => __( 'Plan price', 'massive_visual_builder' )
			),
			'per' => array(
				'values' => false,
				'default' => 'Month',
				'desc' => __( 'Price period', 'massive_visual_builder' )
			),
			'width' => array(
				'values' => array(
					'100',
					'150',
					'200',
					'250'
				),
				'default' => '150',
				'desc' => __( 'Box width', 'massive_visual_builder' )
			),
			'primary' => array(
				'values' => array(
					'0',
					'1'
				),
				'default' => '0',
				'desc' => __( 'Is primary plan?', 'massive_visual_builder' )
			),
			'class' => array(
				'values' => false,
				'default' => '',
				'desc' => __( 'Custom box class', 'massive_visual_builder' )
			)
		),
		'usage' => '[plan name="Plan 1" price="$100" per="per month" width="150" primary="0"] Plan description [/plan]',
		'content' => "<ul><li>List item</li></ul>[mvb_button link='#']Choose[/mvb_button]",
		'desc' => __( 'Customizable pricing table', 'massive_visual_builder' )
	),*/
			# media
			'media' => array(
				'name' => 'Media',
				'type' => 'single',
				'atts' => array(
					'url' => array(
						'values' => false,
						'default' => '',
						'desc' => __( 'Media URL', 'massive_visual_builder' )
					),
					'width' => array(
						'values' => false,
						'default' => '600',
						'type' => 'range',
						'range_values'=>array('min'=>'100','max'=>'1000','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'Width', 'massive_visual_builder' )
					),
					'height' => array(
						'values' => false,
						'default' => '400',
						'type' => 'range',
						'range_values'=>array('min'=>'100','max'=>'1000','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'Height', 'massive_visual_builder' )
					),					
					'class' => array(
						'values' => array(),							
						'default' => '',
						'desc' => __( 'Media class', 'massive_visual_builder' )
				        )
				),
						
				'usage' => '[media url="http://www.youtube.com/watch?v=2c2EEacfC1M"]<br/>[media url="http://vimeo.com/15069551"]<br/>[media url="video.mp4"]<br/>[media url="video.flv"]<br/>[media url="audio.mp3"]<br/>[media url="image.jpg"]<br/>[media url="video.flv" jwplayer="controlbar=bottom&autostart=true"]',
				'desc' => __( 'YouTube video, Vimeo video, .mp4/.flv video, .mp3 file or images', 'massive_visual_builder' )
			),
		/*	# document
			'document' => array(
				'name' => 'Document',
				'type' => 'single',
				'atts' => array(
					'file' => array(
						'values' => false,
						'default' => '',
						'desc' => __( 'Document URL', 'massive_visual_builder' )
					),
					'width' => array(
						'values' => false,
						'default' => '600',
						'desc' => __( 'Width', 'massive_visual_builder' )
					),
					'height' => array(
						'values' => false,
						'default' => '400',
						'desc' => __( 'Height', 'massive_visual_builder' )
					)
				),
				'usage' => '[document file="file.doc" width="600" height="400"]',
				'desc' => __( '.doc, .xls, .pdf viewer by Google', 'massive_visual_builder' )
			),*/
			# gmap
			'gmap' => array(
				'name' => 'Gmap',
				'type' => 'single',
				'atts' => array(
					'width' => array(
						'values' => false,
						'default' => '600',
						'type' => 'range',
						'range_values'=>array('min'=>'50','max'=>'1000','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'Width', 'massive_visual_builder' )
					),
					'height' => array(
						'values' => false,
						'default' => '400',
						'type' => 'range',
						'range_values'=>array('min'=>'50','max'=>'1000','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'Height', 'massive_visual_builder' )
					),
					'address' => array(
						'values' => false,
						'default' => '',
						'desc' => __( 'Marker address', 'massive_visual_builder' )
					),
				),
				'usage' => '[gmap width="600" height="400" address="Russia, Moscow"]',
				'desc' => __( 'Maps by Google', 'massive_visual_builder' )
			),
		/*	# nivo_slider
			'nivo_slider' => array(
				'name' => 'Nivo slider',
				'type' => 'single',
				'atts' => array(
					'source' => array(
						'values' => array(
							'post',
							'post=%post_id%',
							'cat=%cat_id%'
						),
						'default' => 'post',
						'desc' => __( 'Source of images', 'massive_visual_builder' )
					),
					'link' => array(
						'values' => array(
							'none',
							'image',
							'permalink',
							'caption',
							'meta'
						),
						'default' => 'image',
						'desc' => __( 'Images links', 'massive_visual_builder' )
					),
					'size' => array(
						'values' => array(
							'100x100',
							'150x150',
							'200x200',
							'300x200',
							'500x300'
						),
						'default' => '500x300',
						'desc' => __( 'Slider size', 'massive_visual_builder' )
					),
					'limit' => array(
						'values' => array(
							'3',
							'5',
							'10',
							'20'
						),
						'default' => '10',
						'desc' => __( 'Number of slides', 'massive_visual_builder' )
					),
					'effect' => array(
						'values' => array(
							'random',
							'boxRandom',
							'fold',
							'fade'
						),
						'default' => 'random',
						'desc' => __( 'Animation effect', 'massive_visual_builder' )
					),
					'speed' => array(
						'values' => false,
						'default' => '600',
						'desc' => __( 'Animation speed (1000 = 1 second)', 'massive_visual_builder' )
					),
					'delay' => array(
						'values' => false,
						'default' => '3000',
						'desc' => __( 'Animation delay (1000 = 1 second)', 'massive_visual_builder' )
					)
				),
				'usage' => '[nivo_slider]<br/>[nivo_slider source="post" link="image" size="500x300" limit="10" effect="boxRandom"]<br/>[nivo_slider source="cat=1" link="permalink" size="500x300" limit="10" effect="boxRandom"]',
				'desc' => __( 'Nivo slider by attached to post images', 'massive_visual_builder' )
			),
			# jcarousel
			'jcarousel' => array(
				'name' => 'jCarousel',
				'type' => 'single',
				'atts' => array(
					'source' => array(
						'values' => array(
							'post',
							'post=%post_id%',
							'cat=%cat_id%'
						),
						'default' => 'post',
						'desc' => __( 'Source of images', 'massive_visual_builder' )
					),
					'link' => array(
						'values' => array(
							'none',
							'image',
							'permalink',
							'caption',
							'meta'
						),
						'default' => 'image',
						'desc' => __( 'Images links', 'massive_visual_builder' )
					),
					'size' => array(
						'values' => array(
							'100x100',
							'150x150',
							'200x200',
							'150x300'
						),
						'default' => '150x150',
						'desc' => __( 'Carousel item size', 'massive_visual_builder' )
					),
					'limit' => array(
						'values' => array(
							'3',
							'5',
							'10',
							'20'
						),
						'default' => '10',
						'desc' => __( 'Number of items', 'massive_visual_builder' )
					),
					'items' => array(
						'values' => array(
							'3',
							'4',
							'5'
						),
						'default' => '3',
						'desc' => __( 'Number of items in viewport', 'massive_visual_builder' )
					),
					'speed' => array(
						'values' => false,
						'default' => '400',
						'desc' => __( 'Animation speed (1000 = 1 second)', 'massive_visual_builder' )
					),
					'margin' => array(
						'values' => array(
							'5',
							'10',
							'15'
						),
						'default' => '10',
						'desc' => __( 'Space between items in pixels', 'massive_visual_builder' )
					)
				),
				'usage' => '[jcarousel]<br/>[jcarousel source="post" link="image" size="150x150" limit="10" items="3"]<br/>[jcarousel source="cat=1" link="permalink" size="150x150" limit="10" items="3"]',
				'desc' => __( 'jCarousel by attached to post images', 'massive_visual_builder' )
			),
			# custom_gallery
			'custom_gallery' => array(
				'name' => 'Custom gallery',
				'type' => 'single',
				'atts' => array(
					'style' => array(
						'values' => array(
							'1'
						),
						'default' => '1',
						'desc' => __( 'Gallery style', 'massive_visual_builder' )
					),
					'source' => array(
						'values' => array(
							'post',
							'post=%post_id%',
							'cat=%cat_id%'
						),
						'default' => 'post',
						'desc' => __( 'Source of images', 'massive_visual_builder' )
					),
					'link' => array(
						'values' => array(
							'none',
							'image',
							'permalink',
							'caption',
							'meta'
						),
						'default' => 'image',
						'desc' => __( 'Images links', 'massive_visual_builder' )
					),
					'description' => array(
						'values' => array(
							'0',
							'1'
						),
						'default' => '0',
						'desc' => __( 'Show image description', 'massive_visual_builder' )
					),
					'size' => array(
						'values' => array(
							'100x100',
							'150x150',
							'200x200',
							'150x300'
						),
						'default' => '200x200',
						'desc' => __( 'Gallery item size', 'massive_visual_builder' )
					),
					'limit' => array(
						'values' => array(
							'3',
							'5',
							'10',
							'20'
						),
						'default' => '10',
						'desc' => __( 'Number of items', 'massive_visual_builder' )
					)
				),
				'usage' => '[custom_gallery]<br/>[custom_gallery source="post" link="image" size="200x200" limit="10"]<br/>[custom_gallery source="cat=1" link="permalink" size="200x200" limit="10"]',
				'desc' => __( 'Custom gallery by attached to post images', 'massive_visual_builder' )
			),*/
			# tweets
			'tweets' => array(
				'name' => 'Tweets',
				'type' => 'single',
				'atts' => array(
					'username' => array(
						'values' => array( ),
						'default' => 'twitter',
						'desc' => __( 'Twitter username', 'massive_visual_builder' )
					),
					'limit' => array(
						'values' => array(
							'1',
							'3',
							'5',
							'7',
							'10'
						),
						'default' => '3',
						'desc' => __( 'Number of tweets to show', 'massive_visual_builder' )
					),
					'style' => array(
						'values' => array(
							'1',
							'2'
						),
						'default' => '1',
						'desc' => __( 'Tweets style', 'massive_visual_builder' )
					),
					'show_time' => array(
						'values' => array(
							'0',
							'1'
						),
						'default' => '1',
						'desc' => __( 'Show relative time', 'massive_visual_builder' )
					)
				),
				'usage' => '[tweets username="gn_themes" limit="3" style="1" show_time="1"]',
				'desc' => __( 'Recent tweets', 'massive_visual_builder' )
			),
				# facebook
				'fb' => array(
				'name' => 'facebook',
				'type' => 'single',
				'atts' => array(
				'page_link' =>  array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'FaceBook Page Link', 'massive_visual_builder' )
					),			
				'fb_width' =>  array(
						'values' => array(),
						'default' => '600',
						'type' => 'range',
						'range_values'=>array('min'=>'50','max'=>'1000','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'FB Widget Width', 'massive_visual_builder' )
					),
				'fb_height' =>  array(
						'values' => array(),
						'default' => '600',
						'type' => 'range',
						'range_values'=>array('min'=>'50','max'=>'1000','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'FB Widget Height', 'massive_visual_builder' )
						),
				'show_faces' => array(
				'values' => array(
				'0',
				'1'
						),
						'default' => '1',
						'desc' => __( 'Show Faces', 'massive_visual_builder' )
				),
				'colorscheme' => array(
				 'values' => array(
				 'light',
				 'dark'
					  ),
						'default' => 'light',
						'desc' => __( 'Color Scheme', 'massive_visual_builder' )
						),

				'show_stream' => array(
				'values' => array(
				'0',
				'1'
				  ),
				'default' => '0',
				'desc' => __( 'Show Stream', 'massive_visual_builder' )
						),
				'show_border' => array(
				'values' => array(
				'0',
				'1'
				 ),
				'default' => '0',
				'desc' => __( 'Show Border', 'massive_visual_builder' )
						),
				'show_header' => array(
				'values' => array(
				'0',
				'1'
					),
				'default' => '0',
				'desc' => __( 'Show Header', 'massive_visual_builder' )
					),
				),
				'usage' => '[fb page_link="" ...]',
				'desc' => __( 'FB Like Box', 'massive_visual_builder' )
				),
				# google+
				'gplus' => array(
				'name' => 'google+',
				'type' => 'single',
				'atts' => array(
				'api_key' =>  array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Google+ API key', 'massive_visual_builder' )						
						),
				'user' =>  array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Google+ profile ID', 'massive_visual_builder' )
						),
				'num' =>  array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Number of posts', 'massive_visual_builder' )
						),
				'rotate' =>  array(
						'values' => array(
								'1',
								'0'	),
						'default' => '',
						'desc' => __( 'Rotate posts list', 'massive_visual_builder' )
						),
				'body_height' =>  array(
						'values' => array(),
						'default' => '',
						'type' => 'range',
						'range_values'=>array('min'=>'50','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'10'),
						'desc' => __( 'Height of widget body', 'massive_visual_builder' )
						),
				'avatar_max' =>  array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'Width/Height of profile image', 'massive_visual_builder' )
						),
				'theme'	  => array(
						'values' => array(
								'light',
								'dark'	),
						'default' => 'light',
						'desc' => __( 'Theme Option', 'massive_visual_builder' )
						
				        )			
						),
			   'usage' => '[gplus api_key="" ...]',
			   'desc' => __( 'Google+ Activity Widget', 'massive_visual_builder' )						
						),
				# WP Archive		
				'wp_archive' => array(
				'name' => 'wparchive',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
						'values' => array(),
						'default' => '',
						'desc' => __( 'WP Archive Title', 'massive_visual_builder' )						
						),
				'count'	 => array(				
						'values' => array(),
						'default' => '0',
						'desc' => __( 'Display number of posts in each archive', 'massive_visual_builder' )						
						),
				'dropdown'  => array(				
						'values' => array('0','1'),            
						'default' => '0',
						'desc' => __( 'Display as drop-down list', 'massive_visual_builder' )						
						),
			    'before_widget'  => array(				
						'values' => array(),            
						'default' => '',
						'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )						
						),
				'after_widget'  => array(				
						'values' => array(),            
						'default' => '',
						'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )						
						),
				'before_title'  => array(				
						'values' => array(),            
						'default' => '',
						'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )						
						),
				'after_title'  => array(				
						'values' => array(),            
						'default' => '',
						'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )						
						)										
						)
						),
				# WP Calendar
				'wp_calendar' => array(
				'name' => 'wpcalendar',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Calendar Title', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)
				)
				),
				# WP Categories 
				'wp_categories' => array(
				'name' => 'wpcategories',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Categories Title', 'massive_visual_builder' )
				),		
				'count'	 => array(
				'values' => array(),
			    'default' => '0',
				'desc' => __( 'Display number of posts in each category', 'massive_visual_builder' )
				),
				'dropdown'  => array(
				'values' => array('0','1'),
				'default' => '0',
				'desc' => __( 'Display as drop-down list', 'massive_visual_builder' )
						),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)
				)
				),
				# WP Links
				'wp_links' => array(
				'name' => 'wplinks',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP links Title', 'massive_visual_builder' )
				),
				'category'	 => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'Link category IDs , separated by commas', 'massive_visual_builder' )
				),
				'description'  => array(
				'values' => array('0','1'),
				'default' => '0',
				'desc' => __( 'Display description of link', 'massive_visual_builder' )
				),
				'rating'  => array(
				'values' => array('0','1'),
				'default' => '0',
				'desc' => __( 'Display rating of link', 'massive_visual_builder' )
				),
                'images'  => array(
				'values' => array('0','1'),
				'default' => '1',
				'desc' => __( 'Display image of link', 'massive_visual_builder' )
				),
				'name'  => array(
				'values' => array('0','1'),
				'default' => '0',
				'desc' => __( 'Output link name to the alt attribute', 'massive_visual_builder' )
				),	
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)
				)
				),
				# WP Meta
				'wp_meta' => array(
				'name' => 'wpmeta',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Meta Title', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)		
				)
				),
				# WP Pages
				'wp_pages' => array(
				'name' => 'wppages',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Meta Title', 'massive_visual_builder' )	
				),				
				'exclude' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'Page IDs, separated by commas', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)		
											
				)
				),
				# WP Recent Comments
				'wp_comments' => array(
				'name' => 'wpcomments',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Recent Comments Title', 'massive_visual_builder' )
				),
				'number' =>  array(
				'values' => array(),
				'default' => '5',
				'desc' => __( 'Number of comments to show', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)		
				)
				),
				# WP Recent Posts
				'wp_posts' => array(
				'name' => 'wpposts',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Recent Posts Title', 'massive_visual_builder' )
				),
				'number' =>  array(
				'values' => array(),
				'default' => '10',
				'desc' => __( 'Number of posts to show', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)
				)
				),
				# WP Search 
				'wp_search' => array(
				'name' => 'wpsearch',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Search Title', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)		
				)
				),
				# WP Tag Cloud
				'wp_tagcloud' => array(
				'name' => 'wptagcloud',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Tag Cloud Title', 'massive_visual_builder' )
				),
				'taxonomy' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Taxonomy ', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)				
				)
				),
				# WP Text 
				'wp_text' => array(
				'name' => 'wptext',
				'type' => 'single',
				'atts' => array(
				'title' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Text Title', 'massive_visual_builder' )
				),
				'textp' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Text', 'massive_visual_builder' )
				),
				'filter' =>  array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'WP Filter', 'massive_visual_builder' )
				),
				'before_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget', 'massive_visual_builder' )
				),
				'after_widget'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget', 'massive_visual_builder' )
				),
				'before_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML before the widget title. ', 'massive_visual_builder' )
				),
				'after_title'  => array(
				'values' => array(),
				'default' => '',
				'desc' => __( 'the text or HTML after the widget title', 'massive_visual_builder' )
				)		
				)
				),
	
					
				# row
				'row' => array(
				'name' => 'Row',
				'type' => 'wrap',
				'atts' => array(
				'background_color' => array(
				'values' => array( ),
				'default' => '#FFFFFF',
				'desc' => __( 'Background Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'row_background_image' => array(
				'values' => array(),
				'default' => '',
				'type' =>'gallery',
				'desc' => __( 'Image Background', 'massive_visual_builder' )
				),
				'margin_top' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Top Margin ', 'massive_visual_builder' ),				
				),
				'margin_right' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Right Margin ', 'massive_visual_builder' ),				
				),
				'margin_bottom' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Bottom Margin ', 'massive_visual_builder' ),				
				),
				'margin_left' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Left Margin ', 'massive_visual_builder' ),				
				),
				'padding_top' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Top Padding ', 'massive_visual_builder' ),				
				),
				'padding_right' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Right Padding ', 'massive_visual_builder' ),				
				),
				'padding_bottom' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Bottom Padding ', 'massive_visual_builder' ),				
				),
				'padding_left' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Left Padding ', 'massive_visual_builder' ),				
				),
				'border_w' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'10','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border Width ', 'massive_visual_builder' ),				
				),
				'border_style' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array('none','solid','dotted','dashed','double','groove','ridge','inset','outset'),
				'default' => 'solid',
				'desc' => __( ' Border Style ', 'massive_visual_builder' ),				
				),
				'border_radius_tl' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Top - Left) ', 'massive_visual_builder' ),				
				),
				'border_radius_tr' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Top - Right) ', 'massive_visual_builder' ),				
				),
				'border_radius_bl' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Bottom - Left) ', 'massive_visual_builder' ),				
				),
				'border_radius_br' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Bottom - Right) ', 'massive_visual_builder' ),				
				),
				'border_color' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Border Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'box_shadow_h' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Shadow Horizontal Offset ', 'massive_visual_builder' ),				
				),
				'box_shadow_v' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Shadow Vertical Offset ', 'massive_visual_builder' ),				
				),
				'box_shadow_b' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Shadow Blur Radius ', 'massive_visual_builder' ),				
				),
				'box_shadow_s' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Shadow Spread Radius ', 'massive_visual_builder' ),				
				),
				'box_shadow_c' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Box Shadow Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'class' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Row Class', 'massive_visual_builder' )				
				),
				)
				),
				# column
				'column' => array(
				'name' => 'Column',
				'type' => 'wrap',
				'atts' => array(
				'background_color' => array(
				'values' => array( ),
				'default' => '#FFFFFF',
				'desc' => __( 'Background Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'background_image' => array(
				'values' => array(),
				'default' => '',
				'type' =>'gallery',
				'desc' => __( 'Image Background', 'massive_visual_builder' )
				),
				'margin_top' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Top Margin ', 'massive_visual_builder' ),				
				),
				'margin_right' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Right Margin ', 'massive_visual_builder' ),				
				),
				'margin_bottom' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Bottom Margin ', 'massive_visual_builder' ),				
				),
				'margin_left' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Left Margin ', 'massive_visual_builder' ),				
				),
				'padding_top' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Top Padding ', 'massive_visual_builder' ),				
				),
				'padding_right' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Right Padding ', 'massive_visual_builder' ),				
				),
				'padding_bottom' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Bottom Padding ', 'massive_visual_builder' ),				
				),
				'padding_left' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'500','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Left Padding ', 'massive_visual_builder' ),				
				),
				'border_w' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'10','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border Width ', 'massive_visual_builder' ),				
				),
				'border_style' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array('none','solid','dotted','dashed','double','groove','ridge','inset','outset'),
				'default' => 'solid',
				'desc' => __( ' Border Style ', 'massive_visual_builder' ),				
				),
				'border_color' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Border Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'border_radius_tl' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Top - Left) ', 'massive_visual_builder' ),				
				),
				'border_radius_tr' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Top - Right) ', 'massive_visual_builder' ),				
				),
				'border_radius_bl' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Bottom - Left) ', 'massive_visual_builder' ),				
				),
				'border_radius_br' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'300','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Border radius (Bottom - Right) ', 'massive_visual_builder' ),				
				),
				'box_shadow_h' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Shadow Horizontal Offset ', 'massive_visual_builder' ),				
				),
				'box_shadow_v' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( 'Shadow Vertical Offset ', 'massive_visual_builder' ),				
				),
				'box_shadow_b' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Shadow Blur Radius ', 'massive_visual_builder' ),				
				),
				'box_shadow_s' =>  array(
				//'values' =>su_mvb_get_gallery(null),
				'values' => array(),
				'default' => '0',
				'type' => 'range',
				'range_values'=>array('min'=>'0','max'=>'50','prefix'=>'px','postfix'=>'','step'=>'1'),
				'desc' => __( ' Shadow Spread Radius ', 'massive_visual_builder' ),				
				),
				'box_shadow_c' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Box Shadow Color', 'massive_visual_builder' ),
				'type' => 'color'
				),
				'width' =>  array(			
				'values' => array(),
				'default' => '',
				'desc' => __( 'Column Width ', 'massive_visual_builder' ),				
				),
				'class' => array(
				'values' => array( ),
				'default' => '',
				'desc' => __( 'Column Class', 'massive_visual_builder' )
				)
				)
				),		
					                                          
               	# basic shortcodes - end
			'basic-shortcodes-close' => array(
				'type' => 'closegroup'
			)
		);

		if ( $shortcode )
			return $shortcodes[$shortcode];
		else
			return $shortcodes;
	}
?>
