<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 02/01/2018
 * Time: 10:09
 */

namespace MusexPress\Settings;

/**
 * Class Activation_Settings: settings needed for activation
 * @package MusexPress\Settings
 */
class Activation_Settings{

	/**
	 * @key of musexpress version
	 * @var string
	 */
	public static $version_db_key = 'musexpress_version';
	/**
	 * MusexPress version.
	 *
	 * @var string
	 * @since 3.2.0
	 */
	public static $version = '3.2.2';


	/**
	 * Updates MusexPress Version db option
	 * @since 3.2.0
	 */
	public static function update_musexpress_version(){
		update_option( self::$version_db_key , self::$version );
	}

	/**
	 * Check if the plugin should run activation again
	 * @return bool
	 * @since 3.2.0
	 */
	public static function should_reactivate() {

		return empty( get_option( self::$version_db_key ) ) || get_option( self::$version_db_key ) != self::$version;

	}
}