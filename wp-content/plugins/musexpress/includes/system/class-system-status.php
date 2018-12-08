<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 11:12
 */

namespace MusexPress\System;

use MusexPress\Settings\Activation_Settings;

/**
 * Class System_Status: class that manages system status
 * @package MusexPress\System
 */
class System_Status {

	/**
	 * Checks if MusexPress dependencies are fullfilled
	 * @return mixed
	 * @since 3.2.0
	 */
	static function can_run_musexpress() {

		return version_compare( phpversion(), '5.6.0', '>=' );

	}

	/**
	 * Check if server can do a post response
	 * @return bool
	 * @since 3.2.0
	 */
	static function can_do_post_response() {
		$post_response = wp_safe_remote_post( 'https://www.paypal.com/cgi-bin/webscr', array(
			'timeout'     => 10,
			'user-agent'  => 'MusexPress/' . Activation_Settings::$version,
			'httpversion' => '1.1',
			'body'        => array(
				'cmd' => '_notify-validate',
			),
		) );
		if ( ! is_wp_error( $post_response ) && $post_response['response']['code'] >= 200 && $post_response['response']['code'] < 300 ) {
			return true;
		}

		return false;
	}

	/**
	 * Tries to convert a string e.g 4M to bytes value
	 *
	 * @param $val
	 *
	 * @return int
	 * @since 3.2.0
	 *
	 */
	static function string_to_bytes( $val ) {
		if ( empty( $val ) ) {
			return 0;
		}

		$val = trim( $val );

		preg_match( '#([0-9]+)[\s]*([a-z]+)#i', $val, $matches );

		$last = '';
		if ( isset( $matches[2] ) ) {
			$last = $matches[2];
		}

		if ( isset( $matches[1] ) ) {
			$val = (int) $matches[1];
		}

		switch ( strtolower( $last ) ) {
			case 'g':
			case 'gb':
				$val *= 1024;
			case 'm':
			case 'mb':
				$val *= 1024;
			case 'k':
			case 'kb':
				$val *= 1024;
		}

		return (int) $val;
	}

}