<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 14:27
 */

namespace MusexPress\Theme;

use MusexPress\Messages\Message;
use MusexPress\Settings\MusexPress_Settings;
use MusexPress\Settings\Plugin_Settings;
use MusexPress\System\File_System;

/**
 * Class Theme: Handles the MusexPress Base Theme and User Theme
 * @package MusexPress\Core
 */
class Theme {

	/**
	 * MusexPress Base theme slug
	 */
	const BASE_THEME_NAME = 'mxp_base_theme';

	/**
	 * MusexPress user theme name
	 */
	const USER_THEME_NAME = 'mxp_theme';

	/**
	 *  Copy the Base theme from the plugin to the theme folder
	 *
	 * @since 3.2.0
	 */
	static function copy_base_theme() {
		File_System::delete_dir( self::get_themes_base_theme_path() . '/woocommerce' );
		File_System::copy_dir( self::get_plugin_base_theme_path(), self::get_themes_base_theme_path() );
	}

	/**
	 * Returns the path to MusexPress Base Theme inside the WordPress Theme Directory
	 * @return string
	 * @since 3.2.0
	 */
	static function get_themes_base_theme_path() {
		return trailingslashit( get_theme_root() ) . Theme::BASE_THEME_NAME;
	}

	/**
	 * Returns the path to MusexPress Base Theme inside the MusexPress Plugin
	 * @return string
	 * @since 3.2.0
	 */
	static function get_plugin_base_theme_path() {
		return trailingslashit( MUSEXPRESS_PLUGIN_DIRECTORY_PATH ) . Theme::BASE_THEME_NAME;
	}

	/**
	 * Activates MusexPress Base Theme, if not active
	 *
	 * @since 3.2.0
	 */
	static function activate_base_theme() {
		if ( wp_get_theme() != Theme::BASE_THEME_NAME ) {
			switch_theme( Theme::BASE_THEME_NAME );
		}
	}

	/**
	 *  Creates the folder where users can upload their own theme
	 *
	 * @since 3.2.0
	 */
	static function create_user_theme_upload_folder() {
		File_System::create_dir( self::get_user_theme_upload_folder_path(), 0777 );
	}

	/**
	 * Returns the path to the folder where users upload their theme
	 * @return string
	 * @since 3.2.0
	 */
	static function get_user_theme_upload_folder_path() {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );

		return trailingslashit( get_home_path() ) . Theme::USER_THEME_NAME;
	}

	/**
	 * Returns the uri to the folder where users upload their theme
	 * @return string
	 * @since 3.2.2
	 */
	static function get_user_theme_upload_folder_uri() {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );

		return trailingslashit( get_home_url() ) . Theme::USER_THEME_NAME;
	}

	/**
	 * Returns the uri to user theme folder, that can be found inside WordPress Theme Directory > MusexPress Base Theme
	 * @return string
	 * @since 3.2.0
	 */
	public static function get_user_theme_folder_uri() {
		return trailingslashit( self::get_themes_base_theme_uri() ) . Theme::USER_THEME_NAME;
	}

	/**
	 * Returns the uri to MusexPress Base Theme inside the WordPress Theme Directory
	 * @return string
	 * @since 3.2.0
	 */
	static function get_themes_base_theme_uri() {
		return trailingslashit( get_theme_root_uri() ) . Theme::BASE_THEME_NAME;
	}

	/**
	 * Locates Template for Page
	 *
	 * @param $key : 'coming_soon'
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	static function get_template_for_page( $key ) {
		return locate_template( self::USER_THEME_NAME . '/' . MusexPress_Settings::get_page_setting_value( $key ) . '.php' );
	}

	/**
	 * Locates Plugin template for page
	 *
	 * @param $page_db_key
	 * @param $key
	 *
	 * @return mixed
	 *
	 * @since 3.2.0
	 */
	static function get_plugin_template_for_page( $page_db_key, $key ) {
		$plugin_settings = new Plugin_Settings( $page_db_key );

		return locate_template( self::USER_THEME_NAME . '/' . $plugin_settings->get_page_setting_value( $key ) . '.php' );
	}

	/**
	 * Returns the pages basenames in the upload folder
	 * @return array
	 * @since 3.2.0
	 */
	static function get_basename_of_pages_in_upload_folder() {

		$pages_by_category = self::get_pages_in_upload_folder();

		for ( $i = 0; $i < count( $pages_by_category['desktop'] ); $i ++ ) {
			$pages_by_category['desktop'][ $i ] = basename( $pages_by_category['desktop'][ $i ] );
		}
		for ( $i = 0; $i < count( $pages_by_category['tablet'] ); $i ++ ) {
			$pages_by_category['tablet'][ $i ] = basename( $pages_by_category['tablet'][ $i ] );
		}
		for ( $i = 0; $i < count( $pages_by_category['phone'] ); $i ++ ) {
			$pages_by_category['phone'][ $i ] = basename( $pages_by_category['phone'][ $i ] );
		}

		return $pages_by_category;

	}

	/**
	 * Returns all the pages in the upload folder
	 * @return array
	 */
	static function get_pages_in_upload_folder() {

		$path = trailingslashit( self::get_user_theme_upload_folder_path() );

		$pages_by_category = array(

			'desktop' => glob( $path . '*.html' ),
			'tablet'  => glob( $path . 'tablet/*.html' ),
			'phone'   => glob( $path . 'phone/*.html' )
		);

		return $pages_by_category;
	}

	/**
	 * Returns the pages basenames in the theme folder
	 * @return array
	 * @since 3.2.0
	 */
	static function get_basename_of_pages_in_theme_folder() {

		$pages_by_category = self::get_pages_in_theme_folder();

		for ( $i = 0; $i < count( $pages_by_category['desktop'] ); $i ++ ) {
			$pages_by_category['desktop'][ $i ] = basename( $pages_by_category['desktop'][ $i ] );
		}
		for ( $i = 0; $i < count( $pages_by_category['tablet'] ); $i ++ ) {
			$pages_by_category['tablet'][ $i ] = basename( $pages_by_category['tablet'][ $i ] );
		}
		for ( $i = 0; $i < count( $pages_by_category['phone'] ); $i ++ ) {
			$pages_by_category['phone'][ $i ] = basename( $pages_by_category['phone'][ $i ] );
		}

		return $pages_by_category;

	}

	/**
	 * Returns all the pages in the theme folder
	 * @return array
	 */
	static function get_pages_in_theme_folder() {

		$path = trailingslashit( self::get_user_theme_folder_path() );

		$pages_by_category = array(

			'desktop' => glob( $path . '*.html' ),
			'tablet'  => glob( $path . 'tablet/*.html' ),
			'phone'   => glob( $path . 'phone/*.html' )
		);

		return $pages_by_category;
	}

	/**
	 * Returns the path to user theme folder, that can be found inside WordPress Theme Directory > MusexPress Base Theme
	 * @return string
	 * @since 3.2.0
	 */
	static function get_user_theme_folder_path() {
		return trailingslashit( self::get_themes_base_theme_path() ) . Theme::USER_THEME_NAME;
	}

	/**
	 * Copies user theme from root to the User theme folder
	 * @since 3.2.0
	 */
	static function copy_user_theme() {
		File_System::copy_dir_if_file_modified( self::get_user_theme_upload_folder_path(), self::get_user_theme_folder_path() );
	}

	/**
	 * Invalidates WP Theme Cache
	 * @since 3.2.0
	 */
	static function invalidate_wp_theme_cache() {
		$theme = wp_get_theme();
		if ( $theme ) {
			$cache_hash    = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
			$label         = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
			$transient_key = substr( $label, 0, 29 ) . md5( $label );
			delete_transient( $transient_key );
		}
	}

	/**
	 * Checks if user has uploaded pages in the upload folder
	 * @return bool
	 *
	 * @since 3.2.0
	 */
	static function has_uploaded_pages() {
		$pages_by_category = self::get_pages_in_upload_folder();
		$count             = 0;
		foreach ( $pages_by_category as $key => $values ) {
			$count += count( $values );
		}

		return $count > 0;
	}

	/**
	 * Checks if there are wrong files on server root
	 * @since 3.2.0
	 */
	static function has_uploaded_pages_on_server_root() {
		return file_exists( trailingslashit( get_home_path() ) . 'muse_manifest.xml' ) || file_exists( trailingslashit( get_home_path() ) . 'index.html' );
	}


	/**
	 * Moves file from the root of WordPress to mxp_theme
	 * @since 3.2.0
	 */
	static function move_muse_files_to_upload_folder() {

		$root_path     = trailingslashit( get_home_path() );
		$manifest_file = $root_path . 'muse_manifest.xml';
		$sitemap_file  = $root_path . 'sitemap.xml';
		$upload_folder = self::get_user_theme_upload_folder_path();

		if ( ! file_exists( $manifest_file ) ) {
			Message::print_admin_notice( "Sorry, couldn't find muse_manifest.xml, can't move files.", "info" );

			return;
		}

		$manifest_xml = simplexml_load_file( $manifest_file );

		foreach ( $manifest_xml->folder as $folder ) {
			$folder_name = self::xml_attribute( $folder, 'name' );
			File_System::create_dir( trailingslashit( $upload_folder ) . "$folder_name" );
			File_System::move_dir( $root_path, $root_path . $folder_name, $upload_folder );
			File_System::delete_dir( $root_path . $folder_name );
		}
		foreach ( $manifest_xml->file as $file ) {
			$filename = self::xml_attribute( $file, 'name' );
			File_System::move_file_into_folder( $root_path . $filename, $filename, $upload_folder );
		}

		File_System::move_file_into_folder( $manifest_file, "muse_manifest.xml", $upload_folder );
		File_System::move_file_into_folder( $sitemap_file, "sitemap.xml", $upload_folder );
		Message::print_admin_notice( "File moved successfully", "success" );
	}

	/**
	 * Gets an attribute from an xml object
	 *
	 * @param $object
	 * @param $attribute
	 *
	 * @return string
	 * @since 3.2.0
	 */
	static function xml_attribute( $object, $attribute ) {
		if ( isset( $object[ $attribute ] ) ) {
			return (string) $object[ $attribute ];
		}

		return '';
	}

}