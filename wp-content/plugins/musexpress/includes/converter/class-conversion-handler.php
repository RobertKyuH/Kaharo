<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 17:08
 */

namespace MusexPress\Converter;

use MusexPress\Messages\Message;
use MusexPress\Theme\Theme;

/**
 * Class Conversion_Handler: handles conversion actions
 * @package MusexPress\Converter
 */
class Conversion_Handler {

	/**
	 * Handles conversion actions
	 *
	 * @param $action
	 *
	 * @since 3.2.0
	 */
	public function conversion_actions( $action ) {

		if ( 'musexpress_page_converter' == $action ) {

			$pages_to_convert = array();

			$pages_to_convert['desktop'] = isset( $_POST['musexpress_page_converter_desktop_pages'] ) ? $_POST['musexpress_page_converter_desktop_pages'] : array();
			$pages_to_convert['tablet']  = isset( $_POST['musexpress_page_converter_tablet_pages'] ) ? $_POST['musexpress_page_converter_tablet_pages'] : array();
			$pages_to_convert['phone']   = isset( $_POST['musexpress_page_converter_phone_pages'] ) ? $_POST['musexpress_page_converter_phone_pages'] : array();

			$this->convert_pages( $pages_to_convert );

		} elseif ( 'musexpress_page_converter_all' == $action ) {
			$this->convert_pages();
		}
	}

	/**
	 * Starts conversion for selected pages if $pages_to_convert is set
	 *
	 * @param null $pages_to_convert
	 *
	 * @since 3.2.0
	 */
	private function convert_pages( $pages_to_convert = null ) {


		Theme::copy_user_theme();

		do_action( 'musexpress_before_page_conversion' );

		$page_converter = new Pages_Converter( $pages_to_convert );

		$page_converter->init();

		do_action( 'musexpress_after_page_conversion' );

		Theme::invalidate_wp_theme_cache();

		Message::print_admin_notice("Pages converted successfully, to set all the pages of your Muse project <a href='".admin_url( 'admin.php?page=musexpress_settings&tab=page_settings&musexpress_notice=musexpress-page-converter' ) ."'>click here!</a>",'success',false );

	}

	/**
	 * Starts Conversion for all Pages;
	 * @since 3.2.0
	 */
	public function convert_all_pages() {
		$this->convert_pages();
	}

}