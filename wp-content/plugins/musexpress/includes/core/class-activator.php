<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 12:14
 */

namespace MusexPress\Core;

use MusexPress\Cron\Cron_Manager;
use MusexPress\Features\Admin_Bar;
use MusexPress\Features\Coming_Soon;
use MusexPress\Messages\Message;
use MusexPress\MuseGain\User\MuseGain_User;
use MusexPress\Settings\Activation_Settings;
use MusexPress\Settings\MusexPress_Settings as Settings;
use MusexPress\System\System_Status as SystemStatus;
use MusexPress\Theme\Theme as Theme;

/**
 * Class Activator
 * @package MusexPress\Core
 */
class Activator {

	/**
	 *  This function handles MusexPress Activation
	 *
	 * @since 3.2.0
	 */
	public static function activate() {

		$page_converter_settings = array(
			'remove_muse_seo'              => array(
				'description' => 'If checked it removes, title, description and keywords set in Adobe Muse',
				'label'       => 'Remove Muse Seo',
				'value'       => true,
			),
			'convert_redirect_version_url' => array(
				'description' => 'If checked it allows you to use your project in both phone and tablet version with MusexPress widget',
				'label'       => 'Convert redirect version url',
				'value'       => true,
			),
			'muse_jquery'                  => array(
				'description' => 'If checked it removes jQuery injected by Adobe Muse',
				'label'       => 'Remove Muse jQuery',
				'value'       => true,
			),
			'jquery_no_conflict_head'      => array(
				'description' => 'If checked it injects jQuery noConflict in head',
				'label'       => 'jQuery No Conflict Head',
				'value'       => true,
			),
			'jquery_no_conflict_footer'    => array(
				'description' => 'If checked it injects jQuery noConflict in footer',
				'label'       => 'jQuery No Conflict Footer',
				'value'       => true,
			),
			'remove_protocol'              => array(
				'description' => 'If checked it removes Network protocol from links',
				'label'       => 'Remove Network Protocol',
				'value'       => true,
			),
			'convert_base_url'             => array(
				'description' => 'Converts the base url',
				'label'       => 'Convert Base URL',
				'value'       => false,
			),
			'suppress_missing_file'        => array(
				'description' => 'Changes to true the value of suppressMissingFileError preference of Muse',
				'label'       => 'Suppress Missing File Error',
				'value'       => true,
			),
			'alert_to_console'             => array(
				'description' => 'If checked alerts message will be converted to console.log',
				'label'       => 'Alert to Console.log',
				'value'       => false,
			),
			'robots'                       => array(
				'description' => 'If checked converter creates a robots file to prevent indexing of muse html files',
				'label'       => 'Create Robots.txt',
				'value'       => true,
			),
			'move_require_js'              => array(
				'description' => 'If checked converter moves RequireJS scripts to the bottom of the page',
				'label'       => 'Move RequireJS',
				'value'       => false,
			),
			'prefill_body_content'              => array(
				'description' => 'If checked converter prefills WordPress pages with Muse texts for Search purposes',
				'label'       => 'Prefill Page Content',
				'value'       => false,
			),
		);

		$db_settings = new Settings();

		$db_settings->sync_page_converter_settings( $page_converter_settings );

		$page_settings = array(
			'error_page'       => array(
				'label' => 'Error Page',
				'value' => 'error'
			),
			'coming_soon_page' => array(
				'label' => 'Coming Soon Page',
				'value' => 'coming_soon'
			),
		);

		$db_settings->sync_page_settings( $page_settings );

		MuseGain_User::init_options();

		Admin_Bar::init_options();

		Coming_Soon::init_options();

		Activation_Settings::update_musexpress_version();

		Cron_Manager::schedule_event();

		Theme::copy_base_theme();

		Theme::activate_base_theme();

		Theme::create_user_theme_upload_folder();

	}
}