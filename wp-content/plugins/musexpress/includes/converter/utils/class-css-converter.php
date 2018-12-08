<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 20/12/2017
 * Time: 17:30
 */

namespace MusexPress\Converter\Utils;

use MusexPress\Theme\Theme;

/**
 * Class CSS_Converter: converter utilities specific for css
 * @package MusexPress\Converter\Utils
 */
class CSS_Converter {

	/**
	 * Converts css Rules
	 *
	 * @param $page_parse
	 *
	 * @since 3.2.2
	 * @param $base_url
	 *
	 * @since 3.2.0
	 */
	public static function convert_css( $page_parse, $base_url ) {
		$user_theme_folder_url = trailingslashit( $base_url );

		foreach ( $page_parse->find( 'style' ) as $style ) {
			self::convert_css_rules( $style, $user_theme_folder_url );
		}

	}


	/**
	 * Converts  background url inside inline css
	 *
	 * @param $style
	 * @param $user_theme_folder_url
	 *
	 * @since 3.2.0
	 */
	private static function convert_css_rules( $style, $user_theme_folder_url ) {
		$rules = explode( ';', $style->innertext );

		foreach ( $rules as $index => $rule ) {

			$url = Conversion_Tools::get_string_between( 'url(', ')', $rule );

			if ( ! empty( $url ) ) {
				if ( strpos( $url, '//' ) === false ) {
					$url             = trim( $url );
					$url             = str_replace( '"', '', $url );
					$url             = str_replace( "'", '', $url );
					$rules[ $index ] = str_replace( $url, $user_theme_folder_url . $url, $rule );
				}
			}

		}

		$style->innertext = implode( ';', $rules );

	}
}