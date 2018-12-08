<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 27/12/2017
 * Time: 12:13
 */

namespace MusexPress\i18n;

/**
 * Class i18n: manages i18n aspect of MusexPress
 * @package MusexPress\i18n
 */
class i18n{

	/**
	 * Textdomain for MusexPress
	 * @var string
	 */
	public static $textdomain = 'musexpress';

	/**
	 * Loads plugin textdomain
	 * @since 3.2.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			self::$textdomain,
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}