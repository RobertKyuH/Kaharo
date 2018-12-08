<?php

namespace MusexPress\Core;

use MusexPress\Admin\Panel\Panel;
use MusexPress\Admin\Post_Types\Pages_Columns;
use MusexPress\Admin\Toolbar\Toolbar;
use MusexPress\Ajax\Ajax;
use MusexPress\Converter\Conversion_Handler;
use MusexPress\Cron\Cron_Manager;
use MusexPress\Features\Coming_Soon;
use MusexPress\Features\Error_Page;
use MusexPress\i18n\i18n;
use MusexPress\MuseGain\User\MuseGain_User as MuseGainUser;
use MusexPress\Plugins\Plugins;
use MusexPress\Settings\Activation_Settings;
use MusexPress\Settings\MusexPress_General_Settings as GeneralSettings;
use MusexPress\Settings\MusexPress_Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class MusexPress, its the main class of MusexPress
 * @package MusexPress\Core
 */
class MusexPress {

	/**
	 * The Single instance of MusexPress
	 * @var MusexPress
	 * @since 3.2.0
	 */
	protected static $_instance = null;

	/**
	 * Url pointing to plugin assets folder.
	 * @var string
	 */
	public $assets_folder_url = MUSEXPRESS_PLUGIN_DIRECTORY_URL . 'assets/';

	/**
	 * The class that enables hooks and filters to be enabled
	 * @var Loader
	 */
	protected $loader;

	/**
	 * MusexPress constructor.
	 * Registers activation, deactivation and defines hooks
	 * @since 3.2.0
	 */
	private function __construct() {

		register_activation_hook( MUSEXPRESS_PLUGIN_FILE, array( Activator::class, 'activate' ) );
		register_deactivation_hook( MUSEXPRESS_PLUGIN_FILE, array( Deactivator::class, 'deactivate' ) );

		if ( Activation_Settings::should_reactivate() ) {
			Activator::activate();
		}

		$this->loader = new Loader();

		$this->set_locale();

		if ( is_admin() ) {
			$this->define_admin_hooks();
		}
		$this->define_public_hooks();

		do_action( 'musexpress_init' );

	}

	/**
	 * Init the plugin locale
	 * @since 3.2.0
	 */
	private function set_locale() {
		$i18n = new i18n();
		$this->loader->add_action( 'plugins_loaded', $i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Here are defined all hooks that runs on Admin pages
	 * @since 3.2.0
	 */
	private function define_admin_hooks() {

		//Hooks to include styles and css
		$this->loader->add_action( 'admin_enqueue_scripts', $this, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $this, 'enqueue_scripts' );

		//Hook to filter MusexPress Actions
		$this->loader->add_action( 'admin_init', $this, 'filter_musexpress_actions' );

		//Hooks to handle WordPress Admin Panel
		$admin_panel = new Panel();
		$this->loader->add_action( 'admin_menu', $admin_panel, 'admin_menu' );
		$this->loader->add_action( 'admin_head', $admin_panel, 'custom_menu_icons' );

		//Hooks to handle MusexPress General Settings
		$general_settings = new GeneralSettings();
		$this->loader->add_filter( 'musexpress_general_settings_sections', $general_settings, 'add_section', 10, 1 );
		$this->loader->add_action( 'musexpress_general_settings_form_content', $general_settings, 'show_section', 10, 1 );
		$this->loader->add_action( 'musexpress_general_settings_save', $general_settings, 'save_settings', 10, 1 );

		//Hook to handle MuseGain User actions;
		$musegain_user = new MuseGainUser();
		$this->loader->add_action( 'process_musexpress_action', $musegain_user, 'musegain_id_actions', 13, 1 );
		$this->loader->add_action( 'admin_notices', $musegain_user, 'musegain_id_notice' );

		$coming_soon = new Coming_Soon();
		$this->loader->add_action( 'admin_notices', $coming_soon, 'coming_soon_notice' );

		$settings = new MusexPress_Settings();
		$this->loader->add_action( 'process_musexpress_action', $settings, 'settings_actions', 12, 1 );

		$converter = new Conversion_Handler();
		$this->loader->add_action( 'process_musexpress_action', $converter, 'conversion_actions', 10, 1 );

		$plugins = new Plugins();
		$this->loader->add_action( 'process_musexpress_action', $plugins, 'plugins_action', 15, 1 );
		$plugins->enable_musexpress_updates();
		$this->loader->add_filter( 'plugin_row_meta', $plugins, 'musexpress_plugin_row_meta', 10, 2 );


		$ajax = new Ajax();
		$this->loader->add_action( 'admin_footer', $ajax, 'ajax_notices' );
		$this->loader->add_action( 'wp_ajax_musexpress_notices', $ajax, 'musexpress_notices' );

		$columns = new Pages_Columns();
		$this->loader->add_filter( 'manage_pages_columns', $columns, 'type_pages_column' );
		$this->loader->add_action( 'manage_pages_custom_column', $columns,'custom_page_column_content', 10, 2 );

	}

	/**
	 * Defines all public facing hooks
	 * @since 3.2.0
	 */
	public function define_public_hooks() {

		$coming_soon = new Coming_Soon();
		$this->loader->add_filter( 'template_include', $coming_soon, 'coming_soon_mode_redirect', 999999 );
		$this->loader->add_filter( 'document_title_parts', $coming_soon, 'coming_soon_mode_title', 9999999, 2 );

		$error_page = new Error_Page();
		$this->loader->add_filter( 'template_include', $error_page, 'redirect_error_page', 12 );

		$toolbar = new Toolbar();
		$this->loader->add_action( 'wp_before_admin_bar_render', $toolbar, 'render_toolbar', 100 );

		$cron = new Cron_Manager();
		$this->loader->add_filter( 'cron_schedules', $cron, 'add_monthly_event' );
		$this->loader->add_action( 'monthly_event', $cron, 'musexpress_monthly_event' );
	}

	/**
	 * Main MusexPress Instance.
	 *
	 * Ensures only one instance of MusexPress is loaded or can be loaded.
	 *
	 * @since 3.2.0
	 * @static
	 * @see musexpress()
	 * @return MusexPress - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * The function loads all the action and filters
	 * @since 3.2.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Enqueue admin stylesheet
	 * @since 3.2.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'musexpress-admin-css', $this->assets_folder_url . 'css/musexpress-admin.css', array(), Activation_Settings::$version, 'all' );
		wp_enqueue_style( 'fa-5', $this->assets_folder_url . 'css/fontawesome-all.min.css', array(), Activation_Settings::$version, 'all' );
	}

	/**
	 * Enqueue admin javascript
	 * @since 3.2.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'musexpress-admin-js', $this->assets_folder_url . 'js/musexpress-admin.js', array( 'jquery' ), Activation_Settings::$version, false );
	}

	/**
	 * Launches MusexPress actions if needed
	 * @since 3.2.0
	 */
	public function filter_musexpress_actions() {
		if ( isset( $_REQUEST['musexpress_action'] ) && wp_verify_nonce( $_REQUEST['nonce'], $_REQUEST['musexpress_action'] . '_nonce' ) ) {
			do_action( 'process_musexpress_action', $_REQUEST['musexpress_action'] );
		}
	}

}
