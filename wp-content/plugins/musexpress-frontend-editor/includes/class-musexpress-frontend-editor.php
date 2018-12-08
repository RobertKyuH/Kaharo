<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       musegain.com
 * @since      1.0.0
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/includes
 * @author     MuseGain <musegain.com>
 */
class Musexpress_Frontend_Editor {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Musexpress_Frontend_Editor_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'MUSEXPRESS_FRONTEND_EDITOR_VERSION' ) ) {
			$this->version = MUSEXPRESS_FRONTEND_EDITOR_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		if ( defined( 'MUSEXPRESS_FRONTEND_EDITOR_NAME' ) ) {
			$this->plugin_name = MUSEXPRESS_FRONTEND_EDITOR_NAME;
		} else {
			$this->plugin_name = 'musexpress-frontend_editor';
		}


		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		$this->define_musexpress_frontend_editor_settings_hooks();

		$this->define_musexpress_frontend_editor_converter_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Musexpress_Frontend_Editor_Loader. Orchestrates the hooks of the plugin.
	 * - Musexpress_Frontend_Editor_i18n. Defines internationalization functionality.
	 * - Musexpress_Frontend_Editor_Admin. Defines all hooks for the admin area.
	 * - Musexpress_Frontend_Editor_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-musexpress-frontend-editor-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-musexpress-frontend-editor-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-musexpress-frontend-editor-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-musexpress-frontend-editor-public.php';

		/**
		 * The class responsible for defining all actions that occur in the dashboard settings
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'settings/class-musexpress-frontend-editor-settings.php';

		/**
		 * The class responsible for defining all actions that occur in the converter
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'converter/class-musexpress-frontend-editor-converter.php';

		$this->loader = new Musexpress_Frontend_Editor_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Musexpress_Frontend_Editor_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Musexpress_Frontend_Editor_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Musexpress_Frontend_Editor_Admin( $this->get_plugin_name(), $this->get_version() );

		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		//Controlla la versione del plugin
		$this->loader->add_action( 'admin_init', $plugin_admin, 'check_musexpress_frontend_editor_version' );

		$this->loader->add_action( 'init', $plugin_admin, 'register_mxp_frontend_editor_post_type' );

		$this->loader->add_action( 'add_meta_boxes_page', $plugin_admin, 'mxp_frontend_editor_add_meta_box' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Musexpress_Frontend_Editor_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter('template_include',$plugin_public,'redirect_musexpress_frontend_editor_pages',10);

		$this->loader->add_action( 'wp_ajax_mxp_save_content_editable', $plugin_public, 'mxp_save_content_editable' );

		$this->loader->add_action( 'init', $plugin_public, 'mxp_fee_image_shortcode' );
	}

	/**
	 * Register all of the hooks related to the pages settings
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_musexpress_frontend_editor_settings_hooks(){

		$musexpress_frontend_editor_settings = new Musexpress_Frontend_Editor_Settings();

		$this->loader->add_filter('musexpress_general_settings_sections',$musexpress_frontend_editor_settings,'musexpress_frontend_editor_settings_add_section',11,1);
		$this->loader->add_action('musexpress_general_settings_form_content', $musexpress_frontend_editor_settings, 'musexpress_frontend_editor_settings_show_form', 11, 1);
		$this->loader->add_action('musexpress_general_settings_save', $musexpress_frontend_editor_settings, 'musexpress_frontend_editor_settings_save', 11 ,1);
	}

	/**
	 * Register all of the hooks related to the converter
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_musexpress_frontend_editor_converter_hooks(){

		$musexpress_frontend_editor_converter = new Musexpress_Frontend_Editor_Converter();
		$this->loader->add_action( 'musexpress_template_creation_action', $musexpress_frontend_editor_converter, 'MusexPress_Frontend_Editor_Converter::musexpress_frontend_editor_conversion', 10, 2);
		$this->loader->add_action('musexpress_after_page_conversion',$musexpress_frontend_editor_converter,'musexpress_frontend_editor_after_page_conversion',13);
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Musexpress_Frontend_Editor_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
