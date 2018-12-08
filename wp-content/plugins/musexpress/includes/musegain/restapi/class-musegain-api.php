<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 13:19
 */

namespace MusexPress\MuseGain\RestAPI;

/**
 * Class MuseGain_API: handles all the calls to the MuseGain Rest API
 * @package MusexPress\MuseGain\RestAPI
 */
class MuseGain_API {

	/**
	 * Server to the update server master
	 * @var string
	 */
	const MUSEGAIN_UPDATE_SERVER_URL = 'https://www.musegain.com/wp-update-server-master/';

	/**
	 * Checks if a user can verify
	 *
	 * @param $musegain_id
	 *
	 * @return bool
	 * @since 3.2.0
	 */
	public static function can_user_verify( $musegain_id ) {

		$response = wp_remote_post( self::get_verify_user_url(), array(
			'sslverify' => false,
			'body'      => array(
				'musegain_id' => $musegain_id
			)
		) );

		if ( ! is_wp_error( $response ) ) {
			$user_verified = json_decode( $response['body'] );
			if ( $user_verified->user_verified ) {
				return true;
			}
		}

		return false;

	}

	/**
	 * Returns url for verify user
	 * @return string
	 * @since 3.2.0
	 */
	private static function get_verify_user_url() {
		return MuseGain_API::MUSEGAIN_UPDATE_SERVER_URL . '?action=verify_musegain_id';
	}

	/**
	 * Returns plugins data from server
	 *
	 * @return array|mixed
	 *
	 * @since 3.2.0
	 */
	public static function get_plugins() {
		$response = wp_remote_get( self::get_plugins_url() );
		if ( is_array( $response ) ) {
			return $response['body'];
		}

		return array();
	}

	/**
	 * Returns url for getting plugins
	 * @return string
	 * @since 3.2.0
	 */
	private static function get_plugins_url() {
		return MuseGain_API::MUSEGAIN_UPDATE_SERVER_URL . '?action=get_plugins';
	}

	/**
	 * Downloads widget for MusexPress Plugin
	 *
	 * @param $musexpress_plugin
	 *
	 * @since 3.2.0
	 */
	public static function get_widgets( $musexpress_plugin ) {
		$response = wp_remote_post( self::get_widgets_url(), array(
			'sslverify' => false,
			'body'      => array(
				'plugin_slug' => $musexpress_plugin
			)
		) );

		$response_body = json_decode( $response['body'] );

		if ( $response_body->download_type !== "local_download" ) {
			header( 'Content-Disposition: attachment; filename="' . ucwords( implode( ' ', explode( '-', $musexpress_plugin ) ) ) . ' Widgets.zip"' );
			header( 'Content-Type: ' . $response_body->{'content-type'} );
			header( 'Content-Length: ' . $response_body->length );
			header( "Location: " . $response_body->url );
		} else {
			$filename = plugin_dir_path( WP_PLUGIN_DIR . "/$musexpress_plugin/$musexpress_plugin.php" ) . 'widgets.zip';

			header( 'Content-Disposition: attachment; filename="' . ucwords( implode( ' ', explode( '-', $musexpress_plugin ) ) ) . ' Widgets.zip"' );
			header( 'Content-Length: ' . filesize( $filename ) );
			header( 'Content-Transfer-Encoding: binary' );
			header( 'Content-Type: application/zip' );

			readfile( $filename );
		}
	}

	/**
	 * Returns url for widgets
	 * @return string
	 * @since 3.2.0
	 */
	private static function get_widgets_url() {
		return MuseGain_API::MUSEGAIN_UPDATE_SERVER_URL . '?action=get_widgets';
	}

	/**
	 * Return a plugin metadata
	 *
	 * @param $plugin_slug
	 *
	 * @return string
	 * @since 3.2.0
	 */
	public static function get_plugin_metadata( $plugin_slug ) {
		return MuseGain_API::get_metadata_url() . "&slug=$plugin_slug";
	}

	/**
	 * Returns url for get metadata
	 * @return string
	 * @since 3.2.0
	 */
	private static function get_metadata_url() {
		return MuseGain_API::MUSEGAIN_UPDATE_SERVER_URL . '?action=get_metadata';
	}


}