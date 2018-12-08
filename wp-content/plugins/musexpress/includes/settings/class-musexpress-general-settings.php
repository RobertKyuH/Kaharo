<?php

namespace MusexPress\Settings;

use MusexPress\Features\Admin_Bar;
use MusexPress\Features\Coming_Soon;
use MusexPress\Messages\Message;

/**
 * Handles MusexPress General Settings that you can find in General Tab of MusexPress Dashboard
 * @package MusexPress\Settings
 */
class MusexPress_General_Settings {

	/**
	 * Adds the Section General to General Tab of MusexPress Dashboard
	 *
	 * @param $sections
	 *
	 * @since 3.2.0
	 * @return mixed
	 */
	function add_section( $sections ) {

		array_push( $sections, 'general' );

		return $sections;

	}

	/**
	 * Shows General Section options if it is selected
	 *
	 * @param $selected_section
	 *
	 * @since 3.2.0
	 */
	public function show_section( $selected_section ) {

		if ( $selected_section === 'general' ) {
			include plugin_dir_path( __FILE__ ) . 'views/admin-bar.php';
			include plugin_dir_path( __FILE__ ) . 'views/coming-soon.php';
		}

	}

	/**
	 * Saves Settings for General Section options
	 * @since 3.2.0
	 *
	 * @param $form_data
	 */
	public function save_settings( $form_data ) {

		if ( isset( $form_data['selected_section'] ) ) {
			if ( $form_data['selected_section'] === 'general' ) {
				Admin_Bar::save_option( $form_data );
				Coming_Soon::save_option( $form_data );
				Message::print_admin_notice( 'General options saved correctly', 'success', true );
			}
		}
	}

}