<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 11:33
 */

namespace MusexPress\Messages;

use MusexPress\i18n\i18n;

/**
 * Class Message: handles all aspect relative to notices and pretty wp die errors;
 * @package MusexPress\Messages
 */
class Message {

	/**
	 * Prints a stylized wp die message;
	 *
	 * @param $title
	 * @param $message
	 *
	 * @since 3.2.0
	 */
	static function print_generic_error( $title, $message ) {

		$error_content = '<link rel="stylesheet" id="error-css" href="' . MUSEXPRESS_PLUGIN_DIRECTORY_URL . 'assets/css/error-handler.css" type="text/css" media="all">';
		$error_content .= '<div class="MusexPress-Logo"><svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . MUSEXPRESS_PLUGIN_DIRECTORY_URL . 'assets/img/icons.svg#mg-logo"></use>
					</svg></div>';
		$error_content .= '<h2 class="MusexPress-Error-Title">' . $title . '</h2><div class="MusexPress-Error-Body" style="text-align: center">' . $message . '</div>';

		wp_die( $error_content, $title, array( 'back_link' => true ) );

	}

	/**
	 * Prints an Admin Notice
	 *
	 * @param $message
	 * @param $status
	 * @param bool $is_dismissible
	 */
	static function print_admin_notice( $message, $status, $is_dismissible = false ) {

		$icons = array(
			'info'    => 'info-circle',
			'error'   => 'exclamation-triangle',
			'success' => 'check-circle'
		);

		$musexpress_notice  = '<div class="mxp_wrap notice notice-' . $status . ( $is_dismissible ? ' is-dismissible' : null ) . '"><p><i class="fas fa-' . $icons[ $status ] . '"></i>' . __( $message, i18n::$textdomain ) . '</p></div>';
		$musexpress_notices = get_transient( 'musexpress_notices' );
		if ( $musexpress_notices ) {
			set_transient( 'musexpress_notices', $musexpress_notices . $musexpress_notice );
		} else {
			set_transient( 'musexpress_notices', $musexpress_notice );
		}

	}

}