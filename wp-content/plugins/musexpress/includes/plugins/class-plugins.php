<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 21/12/2017
 * Time: 10:50
 */

namespace MusexPress\Plugins;

use MusexPress\MuseGain\RestAPI\MuseGain_API;
use MusexPress\MuseGain\User\MuseGain_User;

/**
 * Class Plugins: handles MusexPress Extensions
 * @package MusexPress\Plugins
 */
class Plugins {

	/**
	 * Updates the official plugins list
	 * @since 3.2.0
	 *
	 * @param $action
	 */
	public function plugins_action( $action ) {
		if ( 'update_official_plugins_list' == $action ) {
			self::update_plugin_list();
		} elseif ( 'musexpress_download_widgets' == $action ) {
			$this->download_widgets();
		}
	}

	/**
	 * Updates MusexPress.json
	 * @since 3.2.0
	 */
	public static function update_plugin_list() {
		$musexpress_json_file = MUSEXPRESS_PLUGIN_DIRECTORY_PATH . 'musexpress.json';
		file_put_contents( $musexpress_json_file, MuseGain_API::get_plugins() );
	}

	/**
	 * Downloads the Widgets for the MusexPress Plugin
	 * @since 3.2.0
	 */
	private function download_widgets() {

		if ( ini_get( 'zlib.output_compression' ) ) {
			@ini_set( 'zlib.output_compression', 'Off' );
		}

		$musexpress_plugin = $_GET['musexpress_plugin'];

		MuseGain_API::get_widgets( $musexpress_plugin );

	}

	/**
	 * Enables MusexPress plugin Updates
	 * @since 3.2.0
	 */
	public function enable_musexpress_updates() {

		$installed_plugins = array();
		foreach ( self::get_musexpress_plugins() as $plugin ) {
			$plugin_filename = $plugin['filename'];
			$plugin_slug     = $plugin['slug'];

			if ( array_key_exists( $plugin_filename, get_plugins() ) ) {
				$installed_plugins[] = $plugin_filename;

				\PucFactory::buildUpdateChecker( MuseGain_API::get_plugin_metadata( $plugin_slug ), WP_PLUGIN_DIR . "/$plugin_filename", $plugin_slug );

				add_filter( "puc_pre_inject_update-$plugin_slug", array(
					$this,
					'add_musegain_id_to_download_request'
				) );
			}

		}

	}

	/**
	 * Gets MusexPress Plugins from the json file
	 * @return array
	 *
	 * @since 3.2.0
	 */
	public static function get_musexpress_plugins() {
		$musexpress_json_file = MUSEXPRESS_PLUGIN_DIRECTORY_PATH . 'musexpress.json';

		$musexpress_plugins = array();

		if ( file_exists( $musexpress_json_file ) ) {
			foreach ( json_decode( file_get_contents( $musexpress_json_file ) ) as $musexpress_plugin ) {
				$slug = $musexpress_plugin->slug;

				$musexpress_plugins[] = array(
					'slug'              => $slug,
					'filename'          => "$slug/$slug.php",
					'name'              => $musexpress_plugin->name,
					'description'       => $musexpress_plugin->description,
					'version'           => $musexpress_plugin->version,
					'documentation_uri' => $musexpress_plugin->documentation_uri,
					'plugin_uri'        => $musexpress_plugin->plugin_uri
				);
			}
		}

		return $musexpress_plugins;
	}

	/**
	 * Adds MuseGain id to download request
	 *
	 * @param $update
	 *
	 * @return mixed
	 */
	public function add_musegain_id_to_download_request( $update ) {

		$musegain_id = MuseGain_User::get_musegain_id();

		if ( ! empty( $musegain_id ) ) {
			$update->download_url = add_query_arg( 'musegain_id', $musegain_id, $update->download_url );

		}

		return $update;

	}

	/**
	 * Modifies plugins row for MusexPress plugins
	 *
	 * @param $links
	 * @param $file
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public function musexpress_plugin_row_meta( $links, $file ) {
		foreach ( $this->get_musexpress_plugins() as $plugin ) {
			if ( $plugin['filename'] === $file ) {
				$url_query_args = array(
					'musexpress_action' => 'musexpress_download_widgets',
					'musexpress_plugin' => $plugin['slug']
				);
				$links[]        = sprintf( '<a href="%s" class="thickbox" title="%s">%s</a>',
					self_admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=' . $plugin['slug'] . '&amp;TB_iframe=true&amp;width=600&amp;height=550' ),
					esc_attr( sprintf( __( 'More information about %s' ), $plugin['name'] ) ),
					__( 'More Details' )
				);

					$url_query_args['nonce'] = wp_create_nonce( $url_query_args['musexpress_action'] . '_nonce' );

					$links['musexpress_download_widgets'] = '<a href="' . esc_url_raw( add_query_arg( $url_query_args ), MUSEXPRESS_PLUGIN_DIRECTORY_PATH ) . '">Download Widgets</a>';

			}
		}

		return $links;
	}

}