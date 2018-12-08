<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 27/12/2017
 * Time: 17:37
 */

namespace MusexPress\Settings;

/**
 * Class Plugin_Settings: its an helper class for third party plugins
 * @package MusexPress\Settings
 * @since 3.2.0
 */
class Plugin_Settings{

	/**
	 * Page Settings array
	 * @var mixed
	 */
	private $page_settings;


	/**
	 * @key for db page settings
	 * @var string
	 */
	private $page_db_key;

	/**
	 * Plugin_Settings constructor.
	 *
	 * @param $page_db_key
	 * @since 3.2.0
	 */
	public function __construct( $page_db_key ) {
		$this->page_db_key = $page_db_key;
		$this->page_settings = $this->get_page_settings( $page_db_key );
	}

	/**
	 * Returns page settings
	 * @return mixed
	 * @since 3.2.0
	 */
	private function get_page_settings( ) {
		return get_option( $this->page_db_key ) ? get_option( $this->page_db_key ) : array();
	}

	/**
	 * Returns page setting value
	 * @param $key
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public function get_page_setting_value( $key ) {
		return get_option( $this->page_db_key )[ $key . '_page' ]['value'];
	}

	/**
	 * Syncs pages settings in db with options array
	 * @param $options
	 * @3.2.0
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
	 * Adds Page Option
	 * @param $key
	 * @param $label
	 * @param $value
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
	 * Removes page option
	 * @param $key
	 * @since 3.2.0
	 */
	private function remove_page_option( $key ) {
		unset( $this->page_settings[ $key ] );
	}

	/**
	 *  Saves Pages Settings
	 * @since 3.2.0
	 */
	private function save_page_settings() {
		update_option( $this->page_db_key, $this->page_settings );
	}

	/**
	 * Adds Page Settings to the @hook musexpress_page_settings_option
	 * @param $options
	 *
	 * @return array
	 * @since 3.2.0
	 */
	public function add_pages_settings( $options ){
		return array_merge($options, get_option($this->page_db_key,true));
	}

	/**
	 * Saves Pages Settings inside Page Settings tab
	 * @hook musexpress_page_settings_save
	 * @since 3.2.0
	 */
	public function save_pages_settings(){

		foreach ( $this->page_settings as $settings_name => $settings ) {

			$this->page_settings[ $settings_name ]['value'] = $_POST['mxp_page_settings'][ $settings_name ];

		}

		$this->save_page_settings();

	}


}