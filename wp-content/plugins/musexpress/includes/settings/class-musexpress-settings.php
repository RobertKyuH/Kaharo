<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 15:04
 */

namespace MusexPress\Settings;

use MusexPress\Admin\Panel\Panel;
use MusexPress\Messages\Message;

/**
 * Class MusexPress_Settings: handles the logic to sync page and page converter settings. Used during Activation
 * @package MusexPress\Settings
 * @since 3.2.0
 */
class MusexPress_Settings {

	/**
	 * Array of Page Settings
	 * @var mixed
	 */
	private $page_settings;


	/**
	 * Array of Page Converter Settings
	 * @var mixed
	 */
	private $page_converter_settings;

	/**
	 * MusexPress_Settings constructor.
	 * @since 3.2.0
	 */
	public function __construct() {
		$this->page_converter_settings = self::get_page_converter_settings();
		$this->page_settings           = self::get_page_settings();
	}

	/**
	 * Returns Page Converter Settings from dB
	 * @return mixed
	 * @since 3.2.0
	 */
	public static function get_page_converter_settings() {
		return get_option( 'page_converter_settings' ) ? get_option( 'page_converter_settings' ) : array();
	}

	/**
	 * Returns Page Converter Setting Value
	 * @param $key
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public function get_page_converter_setting( $key ){
		return $this->page_converter_settings[$key]['value'];
	}

	/**
	 * Returns Page Settings
	 * @return mixed
	 * @since 3.2.0
	 */
	public static function get_page_settings() {
		return get_option( 'mxp_page_settings' ) ? get_option( 'mxp_page_settings' ) : array();
	}

	/**
	 * Returns the value for a page key. E.G: coming_soon
	 *
	 * @param $key
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public static function get_page_setting_value( $key ) {
		return get_option( 'mxp_page_settings' )[ $key . '_page' ]['value'];
	}

	/**
	 * Returns Page Converter Settings
	 * @return mixed
	 * @since 3.2.0
	 */
	public function getPageConverterSettings() {
		return $this->page_converter_settings;
	}

	/**
	 * Returns Page Settings
	 * @return mixed
	 */
	public function getPageSettings() {
		return $this->page_settings;
	}

	/**
	 * Sync the user_db with the options passed
	 *
	 * @param $options
	 *
	 * @since 3.2.0
	 */
	public function sync_page_converter_settings( $options ) {

		foreach ( $options as $key => $page_converter_setting ) {
			$this->add_page_converter_option( $key, $page_converter_setting['label'], $page_converter_setting['description'], $page_converter_setting['value'] );
		}

		$page_converter_settings_to_remove = array_diff_key( $this->page_converter_settings, $options );

		foreach ( $page_converter_settings_to_remove as $key => $to_remove ) {
			$this->remove_page_converter_option( $key );
		}
		$this->save_page_converter_settings();

	}

	/**
	 * Adds an option to page converter settings, saving value if possible
	 *
	 * @param $key
	 * @param $label
	 * @param $description
	 * @param $value
	 *
	 * @since 3.2.0
	 */
	private function add_page_converter_option( $key, $label, $description, $value ) {
		$option = array(
			'label'       => $label,
			'description' => $description
		);
		if ( ! array_key_exists( $key, $this->page_converter_settings ) ) {
			$option['value'] = $value;
		} else {
			$option['value'] = $this->page_converter_settings[ $key ]['value'];
		}
		$this->page_converter_settings[ $key ] = $option;
	}

	/**
	 * Removes option from page converter settings
	 *
	 * @param $key
	 *
	 * @since 3.2.0
	 */
	private function remove_page_converter_option( $key ) {
		unset( $this->page_converter_settings[ $key ] );
	}

	/**
	 *  Saves in dB the page converter options
	 * @since 3.2.0
	 */
	private function save_page_converter_settings() {
		update_option( 'page_converter_settings', $this->page_converter_settings );
	}

	/**
	 * Sync the user_db with the options passed
	 *
	 * @param $options
	 *
	 * @since 3.2.0
	 */
	public function sync_page_settings( $options ) {

		foreach ( $options as $key => $page_setting ) {
			$this->add_page_option( $key, $page_setting['label'], $page_setting['value'] );
		}

		$page_settings_to_remove = array_diff_key( $this->page_settings, $options );

		foreach ( $page_settings_to_remove as $key => $to_remove ) {
			$this->remove_page_option( $key );
		}

		$this->save_page_settings();

	}

	/**
	 * Adds a page option, saving value if possible
	 *
	 * @param $key
	 * @param $label
	 * @param $value
	 *
	 * @since 3.2.0
	 */
	private function add_page_option( $key, $label, $value ) {
		$option = array(
			'label' => $label,
		);
		if ( ! array_key_exists( $key, $this->page_settings ) ) {
			$option['value'] = $value;
		} else {
			$option['value'] = $this->page_settings[ $key ]['value'];
		}
		$this->page_settings[ $key ] = $option;
	}

	/**
	 * Removes option from page settings
	 *
	 * @param $key
	 *
	 * @since 3.2.0
	 */
	private function remove_page_option( $key ) {
		unset( $this->page_settings[ $key ] );
	}

	/**
	 * Saves in dB the page converter options
	 * @since 3.2.0
	 */
	private function save_page_settings() {
		update_option( 'mxp_page_settings', $this->page_settings );
	}

	/**
	 * Handles Page Converter and Pages settings actions processing
	 *
	 * @param $action
	 *
	 * @since 3.2.0
	 */
	public function settings_actions( $action ) {

		if ( 'update_page_converter_settings' == $action ) {

			$page_converter_settings = self::get_page_converter_settings();
			foreach ( $page_converter_settings as $settings_name => $settings ) {
				$page_converter_settings[ $settings_name ]['value'] = isset( $_POST['page_converter_settings'][ $settings_name ] );
			}
			do_action( 'musexpress_page_converter_settings_save' );

			self::save_page_converter_options( $page_converter_settings );
			Message::print_admin_notice( 'Settings saved. <strong>Don\'t forget to reconvert your pages</strong> from <a href="' . menu_page_url( Panel::PAGE_CONVERTER_MENU_URL, false ) . '">Pages Converter Menu</a>', 'success', true );

		} elseif ( 'update_page_settings' == $action ) {

			$page_settings = self::get_page_settings();

			foreach ( $page_settings as $settings_name => $settings ) {

				$page_settings[ $settings_name ]['value'] = $_POST['mxp_page_settings'][ $settings_name ];

			}

			self::save_page_options( $page_settings );

			do_action( 'musexpress_page_settings_save' );

			Message::print_admin_notice( 'Settings saved.', 'success', true );

		}

	}

	/**
	 *  Saves in dB the page converter options
	 * @since 3.2.0
	 *
	 * @param $page_converter_settings
	 */
	public static function save_page_converter_options( $page_converter_settings ) {
		update_option( 'page_converter_settings', $page_converter_settings );
	}

	/**
	 * Saves in dB the page converter options
	 *
	 * @param $page_settings
	 *
	 * @since 3.2.0
	 */
	private static function save_page_options( $page_settings ) {
		update_option( 'mxp_page_settings', $page_settings );
	}

}