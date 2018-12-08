<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 20/12/2017
 * Time: 17:07
 */

namespace MusexPress\Converter\Utils;

use MusexPress\Theme\Theme;

/**
 * Class Html_Converter: converter utilities specific for html
 * @package MusexPress\Converter\Utils
 */
class Html_Converter {

	/**
	 * Converts all links
	 *
	 * @param $page_parse
	 * @param $base_url
	 * @param $all_pages
	 *
	 * @since 3.2.2 fixed path with uri function
	 * @since 3.2.0
	 */
	public static function convert_links( $page_parse, $base_url, $all_pages ) {

		foreach ( $page_parse->find( 'a' ) as $link ) {

			$link_href = $link->href;

			if ( ( strpos( $link_href, $base_url ) !== false ) ) {
				$without_ext = str_replace( '.html', '', $link_href );
				$link->href  = Php_Converter::get_permalink( $without_ext );
			}
			if ( in_array( $link->href, $all_pages ) ) {
				$without_ext = str_replace( '.html', '', $link_href );
				$link->href  = Php_Converter::get_permalink( $without_ext );
			} elseif ( substr( $link_href, 0, 7 ) === 'assets/' ) {
				$link->href = trailingslashit( $base_url ) . $link->href;
			} //Converts Anchor Links
			elseif ( strpos( $link_href, 'MUSEGAIN-CODE' ) === false ) {
				if ( strpos( $link_href, "#" ) !== false ) {
					$positionAnchor   = strpos( $link_href, "#" );
					$anchorLink       = substr( $link_href, $positionAnchor );
					$page_name_anchor = substr( $link_href, 0, $positionAnchor );
					$without_ext      = str_replace( '.html', '', $page_name_anchor );
					$link->href       = Php_Converter::get_permalink( $without_ext ) . $anchorLink;
				}
			}


		}

	}

	/**
	 * Converts all html tags relative urls to absolute
	 *
	 * @param $page_parse
	 * @param $base_url
	 *
	 * @since 3.2.0
	 */
	public static function convert_html_tags( $page_parse, $base_url ) {

		$toAbs = array( 'link', 'img', 'video', 'div', 'a', 'form', 'source', 'script', 'object', 'iframe' );
		foreach ( $toAbs as $tag ) {
			self::convert_relative_url( $page_parse, $tag, $base_url );
		}

	}

	/**
	 * Converts relative urls inside all attrs of a tag
	 *
	 * @param $page_parse
	 * @param $tag
	 * @param $base_url
	 *
	 * @since 3.2.0 convert relative Url
	 */
	private static function convert_relative_url( $page_parse, $tag, $base_url ) {
		$file_formats = '(css\/|images\/|assets\/|video\/|scripts\/)';

		foreach ( $page_parse->find( $tag ) as $element ) {

			$attrs = $element->attr;
			foreach ( $attrs as $key => $attr ) {
				if ( strpos( $attr, '//' ) === false ) {
					if ( preg_match_all( $file_formats, $attr ) ) {
						if ( $key !== 'type' ) {
							$attrs[ $key ] = $base_url . '/' . $attr;
						}
					}
				}
			}
			$element->attr = $attrs;

		}
	}

	/**
	 * Removes network protocol from urls
	 *
	 * @param $php_page
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public static function remove_network_protocol( $php_page ) {
		$php_page = str_replace( 'http://www.w3.org/1999/xhtml', '[MXP_XHTML_NS_URI]', $php_page );
		$php_page = str_replace( 'http://www.w3.org/2000/svg', '[MXP_SVG_NS_URI]', $php_page );
		$php_page = str_replace( 'http://www.mozilla.org/xbl', '[MXP_XBL_NS_URI]', $php_page );
		$php_page = str_replace( 'http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul', '[MXP_XUL_NS_URI]', $php_page );

		$php_page = str_replace( 'http://', '//', $php_page );
		$php_page = str_replace( 'https://', '//', $php_page );

		$php_page = str_replace( '[MXP_XHTML_NS_URI]', 'http://www.w3.org/1999/xhtml', $php_page );
		$php_page = str_replace( '[MXP_SVG_NS_URI]', 'http://www.w3.org/2000/svg', $php_page );
		$php_page = str_replace( '[MXP_XBL_NS_URI]', 'http://www.mozilla.org/xbl', $php_page );

		return str_replace( '[MXP_XUL_NS_URI]', 'http://www.mozilla.org/keymaster/gatekeeper/there.is.only.xul', $php_page );

	}


}