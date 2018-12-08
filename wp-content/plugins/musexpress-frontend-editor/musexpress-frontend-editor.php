<?php

/**
 * @wordpress-plugin
 * Plugin Name:       MusexPress Frontend Editor
 * Plugin URI:        musegain.com
 * Description:       This plugin enable MusexPress Frontend Editor functionality and allows you to manage your Muse website contents.
 * Version:           1.0.4
 * Author:            MuseGain.com
 * Author URI:        https://www.musegain.com
 * License:           MuseGain.com
 * License URI:       https://www.musegain.com/terms-conditions-of-use/
 * Text Domain:       musexpress-frontend-editor
 * Domain Path:       /languages
 *
All the products on Musegain.com are copyrighted and are the properties of
Eclipse s.r.l.

You acknowledge that by Your download the ownership of MusexPress
(and/or its plugins) does not get transferred to You and You must not claim
that it is Yours.

What You get includes an ongoing, non-exclusive, non transferable, worldwide
license to use the plugins on the terms and conditions available here
http://www.musegain.com/terms-conditions-of-use/ . Please read them carefully,
any violation will not be tolerated.
 *
 *
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MUSEXPRESS_FRONTEND_EDITOR_NAME', 'musexpress-frontend-editor' );
define( 'MUSEXPRESS_FRONTEND_EDITOR_VERSION', '1.0.4' );
define( 'MUSEXPRESS_FRONTEND_EDITOR_DIRECTORY_PATH', plugin_dir_path( __FILE__ ) );
define( 'MUSEXPRESS_FRONTEND_EDITOR_DIRECTORY_URL', plugin_dir_url( __FILE__ ) );
//TODO: DON'T FORGET TO CHANGE FOR EVERY TAG!
define( 'MUSEXPRESS_FRONTEND_EDITOR_UPDATE_DB' , false);

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-musexpress-frontend-editor-activator.php
 */
function activate_musexpress_frontend_editor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-musexpress-frontend-editor-activator.php';
	Musexpress_Frontend_Editor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-musexpress-frontend-editor-deactivator.php
 */
function deactivate_musexpress_frontend_editor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-musexpress-frontend-editor-deactivator.php';
	Musexpress_Frontend_Editor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_musexpress_frontend_editor' );
register_deactivation_hook( __FILE__, 'deactivate_musexpress_frontend_editor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-musexpress-frontend-editor.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_musexpress_frontend_editor() {

	$plugin = new Musexpress_Frontend_Editor();
	$plugin->run();

}
run_musexpress_frontend_editor();
