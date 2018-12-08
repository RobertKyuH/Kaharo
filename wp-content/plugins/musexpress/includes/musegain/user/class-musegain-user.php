<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 12:47
 */

namespace MusexPress\MuseGain\User;

use MusexPress\Admin\Panel\Panel;
use MusexPress\Messages\Message;
use MusexPress\MuseGain\RestAPI\MuseGain_API;

/**
 * Class MuseGain_User: manages all the aspects of a User registered to MuseGain
 * @package MusexPress\MuseGain\User
 */
class MuseGain_User {

	/**
	 * Init Musegain User options
	 * @since 3.2.0
	 */
	static function init_options() {
		add_option( 'musegain_id' );
	}

	/**
	 * Handles musegain id actions processing
	 *
	 * @param $action
	 *
	 * @since 3.2.0
	 */
	function musegain_id_actions( $action ) {
		if ( 'verify_musegain_id' == $action ) {
			$musegain_id = sanitize_email( $_POST['musegain_id'] );
			if ( ! empty( $musegain_id ) ) {
				$this->verify_musegain_id( $musegain_id );
			} else {
				Message::print_admin_notice( 'Please insert your "MuseGain ID"', 'error', true );
			}
		} elseif ( 'delete_musegain_id' == $action ) {
			$this->delete_musegain_id();
		}
	}

	/**
	 * Verifies MuseGain ID
	 *
	 * @param $musegain_id
	 *
	 * @since 3.2.0
	 */
	function verify_musegain_id( $musegain_id ) {

		if ( empty( $musegain_id ) ) {
			return;
		}
		if ( MuseGain_API::can_user_verify( $musegain_id ) ) {
			update_option( 'musegain_id', $musegain_id );
			Message::print_admin_notice( 'MuseGain ID verified correctly.', 'success', true );
		} else {
			update_option( 'musegain_id', '' );
			Message::print_generic_error( 'MuseGain ID - Error', 'Your <i>"MuseGain ID"</i> could not be verified.
 			Be sure you have an active subscription on <a href="http://www.musegain.com">MuseGain.com</a> associated with the email: <strong>' . $musegain_id . '</strong>. ' );
		}
	}

	/**
	 * Deletes MuseGain ID
	 * @since 3.2.0
	 */
	private function delete_musegain_id() {
		update_option( 'musegain_id', '' );
		Message::print_admin_notice( 'MuseGain ID removed', 'success', true );
	}

	/**
	 * Prints a notice if necessary
	 * @since 3.2.0
	 */
	public function musegain_id_notice() {
		if ( empty( self::get_musegain_id() ) ){
			Message::print_admin_notice( 'Please <a href="' . menu_page_url( Panel::SETTINGS_MENU_URL , false ) . '">verify</a> your <i>"MuseGain ID"</i> to enable MusexPress automatic updates!', 'info', false );
		}
	}

	/**
	 * Returns MuseGain ID
	 * @return mixed
	 * @since 3.2.0
	 */
	static function get_musegain_id() {
		return get_option( 'musegain_id' );
	}

}