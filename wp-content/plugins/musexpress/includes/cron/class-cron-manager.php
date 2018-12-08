<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 21/12/2017
 * Time: 14:22
 */

namespace MusexPress\Cron;
use MusexPress\MuseGain\User\MuseGain_User;
use MusexPress\Plugins\Plugins;

/**
 * Class Cron_Manager: manages all recurrent actions of MusexPress
 * @package MusexPress\Cron
 */
class Cron_Manager{

	/**
	 * Adds a custom event that runs every month
	 * @param $schedules
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	function add_monthly_event( $schedules ) {
		$schedules['monthly'] = array(
			'interval' => 2629000,
			'display'  => 'Once monthly'
		);

		return $schedules;
	}

	/**
	 *  Updates plugin list and verifies User
	 * @since 3.2.0
	 */
	function musexpress_monthly_event() {

		Plugins::update_plugin_list();
		$user = new MuseGain_User();
		$musegain_id = MuseGain_User::get_musegain_id();
		$user->verify_musegain_id( $musegain_id );

	}

	/**
	 * Schedules Monthly Event
	 * @since 3.2.0
	 */
	static function schedule_event(){
		if ( ! wp_next_scheduled( 'monthly_event' ) ) {
			wp_schedule_event( time(), 'monthly', 'monthly_event' );
		}
	}


}