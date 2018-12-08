<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 18:52
 */

namespace MusexPress\Admin\Panel;

use MusexPress\Core\MusexPress;

/**
 * Class Panel
 * @package MusexPress\Admin\Panel
 */
class Panel {

	/**
	 * Url to the settings menu
     * @since 3.2.0
	 */
	const SETTINGS_MENU_URL = MUSEXPRESS_PLUGIN_NAME . '_settings';

	/**
	 * Urt to page converter menu
     * @since 3.2.0
	 */
	const PAGE_CONVERTER_MENU_URL = MUSEXPRESS_PLUGIN_NAME . '_page_converter';

	/**
	 * Handles the creation of the MusexPress Menu in the WordPress Panel
     * @since 3.2.0
	 */
	public function admin_menu() {
		require_once plugin_dir_path( __FILE__ ) . '/views/dashboard.php';
		require_once plugin_dir_path( __FILE__ ) . '/views/settings.php';
		require_once plugin_dir_path( __FILE__ ) . '/views/page-converter.php';

		add_menu_page( 'MusexPress', 'MusexPress', 'manage_options', MUSEXPRESS_PLUGIN_NAME, 'musexpress_panel_dashboard', '', 65 );
		add_submenu_page(
			MUSEXPRESS_PLUGIN_NAME,        // parent slug, same as above menu slug
			'Dashboard',        // empty page title
			'Dashboard',        // empty menu title
			'manage_options',        // same capability as above
			MUSEXPRESS_PLUGIN_NAME,        // same menu slug as parent slug
			'musexpress_panel_dashboard'        // same function as above
		);

		add_submenu_page( MUSEXPRESS_PLUGIN_NAME, 'Pages Converter', 'Pages Converter', 'manage_options', Panel::PAGE_CONVERTER_MENU_URL , 'musexpress_page_converter_display' );
		add_submenu_page( MUSEXPRESS_PLUGIN_NAME, 'Settings', 'Settings', 'manage_options', Panel::SETTINGS_MENU_URL, 'musexpress_panel_settings_display' );

	}

	/**
     * Changes icon for MusexPress Menu based on state
	 * @since 3.2.0
	 */
	function custom_menu_icons() {
		?>
        <style type="text/css" media="screen">
            #toplevel_page_musexpress .wp-menu-image:before {
                content: '\e900' !important;
                font-family: 'musexpress' !important;
            }
        </style>
	<?php }


}