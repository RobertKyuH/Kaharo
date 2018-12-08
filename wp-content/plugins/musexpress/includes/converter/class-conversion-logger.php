<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 17:26
 */

namespace MusexPress\Converter;

use MusexPress\Theme\Theme;

/**
 * Class Conversion_Logger
 * @package MusexPress\Converter
 */
class Conversion_Logger {

	/**
	 * Log File
	 * @var string
	 * @since 3.2.0
	 */
	private $log;
	/**
	 * Array of converted pages
	 * @var mixed
	 * @since 3.2.0
	 */
	private $converted_pages;

	/**
	 * Conversion_Logger constructor.
	 *
	 * @since 3.2.0
	 */
	public function __construct() {
		$this->log             = Theme::get_user_theme_folder_path() . '/conv_pages.json';
		$this->converted_pages = array();
		if ( file_exists( $this->log ) ) {
			$this->converted_pages = json_decode( file_get_contents( $this->log ), true );
		}
	}

	/**
	 * Checks if a page has already been converted since last mod
	 *
	 * @param $page
	 *
	 * @param $type
	 *
	 * @return bool
	 * @since 3.2.0
	 */
	public function is_page_already_converted( $page, $type ) {
		$type       = $type == 'desktop' ? '' : $type . '-';
		$page_index = $type . basename( $page );
		if ( isset( $this->converted_pages[ $page_index ] ) ) {
			if ( $this->converted_pages[ $page_index ]['mtime'] >= filemtime( $page ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Adds a converted Page to the log
	 *
	 * @param $page
	 * @param string $type
	 *
	 * @since 3.2.2 : fix stats for tablet, phone pages not related to desktop
	 * @since 3.2.0
	 */
	public function add_converted_page( $page, $type = 'desktop' ) {
		$type_format                                               = $type == 'desktop' ? '' : $type . '-';
		$type = $type == 'desktop' ? '' : $type;
		if( file_exists( ABSPATH . Theme::USER_THEME_NAME . '/' . $type . '/' . $page )){
			$this->converted_pages[ $type_format . basename( $page ) ] = array(
				'mtime' => filemtime( ABSPATH . Theme::USER_THEME_NAME . '/' . $type . '/'  . $page )
			);
		}
	}

	/**
	 * Remove Converted Page from log
	 * @param $page
	 * @param string $type
	 * @since 3.2.0
	 */
	public function remove_converted_page( $page, $type = 'desktop' ){
		$type                                               = $type == 'desktop' ? '' : $type . '-';

	}

	/**
	 * Saves Log to file
	 * @since 3.2.0
	 */
	public function save_log() {
		file_put_contents( $this->log, json_encode( $this->converted_pages, JSON_PRETTY_PRINT ) );
	}


}