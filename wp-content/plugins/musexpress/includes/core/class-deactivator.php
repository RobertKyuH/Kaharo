<?php

namespace MusexPress\Core;

/**
 * Class Deactivator
 * @package MusexPress\Core
 */
class Deactivator{


	/**
	 *  This function handles MusexPress Deactivation
	 *
	 * @since 3.2.0
	 */

	public static function deactivate() {
	   wp_clear_scheduled_hook( 'monthly_event' );
	}

}