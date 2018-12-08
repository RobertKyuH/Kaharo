<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 20/12/2017
 * Time: 15:42
 */

namespace MusexPress\Converter\Utils;

/**
 * Class Conversion_Tools: utilities for conversion
 * @package MusexPress\Converter\Utils
 */
class Conversion_Tools {

	/**
	 * Returns a string between 2 matches
	 *
	 * @param $start
	 * @param $end
	 * @param $string
	 *
	 * @return bool|string
	 *
	 * @since 3.2.0
	 */
	static function get_string_between( $start, $end, $string ) {
		$string = ' ' . $string;
		$ini    = strpos( $string, $start );
		if ( $ini == 0 ) {
			return '';
		}
		$ini += strlen( $start );
		$len = strpos( $string, $end, $ini ) - $ini;

		return substr( $string, $ini, $len );
	}

}