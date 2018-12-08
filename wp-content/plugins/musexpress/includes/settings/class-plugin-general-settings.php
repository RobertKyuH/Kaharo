<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 28/12/2017
 * Time: 12:24
 */

namespace MusexPress\Settings;

/**
 * Class Plugin_General_Settings: Helper class for third party plugins
 * @package MusexPress\Settings
 */
class Plugin_General_Settings {


	/**
	 * Add a section to general settings
	 *
	 * @param $sections: passed from the @hook musexpress_general_settings_sections
	 *
	 * @param $section: the name of the section to add
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public static function add_section( $sections, $section ) {

		array_push( $sections, $section );

		return $sections;

	}


}