<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       musegain.com
 * @since      1.0.0
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/includes
 * @author     MuseGain <musegain.com>
 */
class Musexpress_Frontend_Editor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'musexpress-frontend_editor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
