<?php
/**
 * shortcodes-ultimate.3.9.5
 * http://wordpress.org/plugins/shortcodes-ultimate/
 * GNU General Public License, version 2
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
	/**
	 * Get media object by url
	 *
	 * @param string $media_url Media file url
	 * @param int $width Media object width
	 * @param int $height Media object height
	 * @return string Object markup
	 */
	function su_mvb_get_media( $media_url, $width, $height, $jwplayer = false ) {

		// Youtube video
		$video_url = parse_url( $media_url );

		if ( $video_url['host'] == 'youtube.com' || $video_url['host'] == 'www.youtube.com' ) {
			parse_str( $video_url['query'], $youtube );
			$id = uniqid( '', false );
			$return = '
					<iframe width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $youtube['v'] . '" frameborder="0" allowfullscreen="true"></iframe>
				';
		}

		// Vimeo video
		$video_url = parse_url( $media_url );

		if ( $video_url['host'] == 'vimeo.com' || $video_url['host'] == 'www.vimeo.com' ) {
			$vimeo_id = mb_substr( $video_url['path'], 1 );
			$return = '<iframe src="http://player.vimeo.com/video/' . $vimeo_id . '?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe>';
		}

		// Images (bmp/jpg/jpeg/png/gif)
		$images = array( '.bmp', '.BMP', '.jpg', '.JPG', '.png', '.PNG', 'jpeg', 'JPEG', '.gif', '.GIF' );
		$image_ext = mb_substr( $media_url, -4 );

		if ( in_array( $image_ext, $images ) ) {
			$return = '<img src="'.$media_url.'" alt="" width="' . $width . '" height="' . $height . '" />';
		}



		return $return;
	}

?>