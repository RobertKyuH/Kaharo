<?php
/**
 * Plugin Name: MusexPress
 * Plugin URI:  https://www.musegain.com/musexpress/
 * Description: This plugin enable MusexPress functionality and allows you to manage your Muse website contents.
 * Version:     3.2.2
 * Author:      MuseGain.com
 * Author URI:  https://www.musegain.com
 * License:     MuseGain.com
 * License URI: https://www.musegain.com/terms-conditions-of-use/
 * Documentation URI: https://www.musegain.com/documentation/musexpress-installation/
 *
 * All the products on Musegain.com are copyrighted and are the properties of
 * Eclipse s.r.l.
 *
 * You acknowledge that by Your download the ownership of MusexPress
 * (and/or its plugins) does not get transferred to You and You must not claim
 * that it is Yours.
 *
 * What You get includes an ongoing, non-exclusive, non transferable, worldwide
 * license to use the plugins on the terms and conditions available here
 * https://www.musegain.com/terms-conditions-of-use/ . Please read them carefully,
 * any violation will not be tolerated.
 *
 * @package MusexPress
 *
 */

//TODO: check dependencies of this function in other plugins, if not used REMOVE
require_once plugin_dir_path( __FILE__ ) . 'includes/misc-functions.php';
require_once plugin_dir_path( __FILE__ ) . 'vendor/plugin-update-checker/plugin-update-checker.php';

if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
use MusexPress\Core\MusexPress as MusexPress;

if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define MUSEXPRESS_PLUGIN_FILE.
defined( 'MUSEXPRESS_PLUGIN_FILE' ) ? : define( 'MUSEXPRESS_PLUGIN_FILE', __FILE__ );

// Define MUSEXPRESS_PLUGIN_DIRECTORY_PATH.
defined( 'MUSEXPRESS_PLUGIN_DIRECTORY_PATH' ) ? : define( 'MUSEXPRESS_PLUGIN_DIRECTORY_PATH', plugin_dir_path( __FILE__ ) );

// Define MUSEXPRESS_PLUGIN_DIRECTORY_URL.
defined( 'MUSEXPRESS_PLUGIN_DIRECTORY_URL' ) ? : define( 'MUSEXPRESS_PLUGIN_DIRECTORY_URL', plugin_dir_url( __FILE__ ) );

// Define MUSEXPRESS_PLUGIN_NAME.
defined( 'MUSEXPRESS_PLUGIN_NAME' ) ? : define( 'MUSEXPRESS_PLUGIN_NAME', 'musexpress' );

// for backwards compatibility
define('MUSEXPRESS_USER_THEME_NAME','mxp_theme');

//Registers autoload function of classes
spl_autoload_register( '\musexpress_autoload' );

/**
 * Main Instance of MusexPress
 * @return MusexPress
 * @since 3.2.0
 */
function musexpress() {
	return MusexPress::instance();
}

if ( ! \MusexPress\System\System_Status::can_run_musexpress() ) {

	add_action('admin_notices', 'musexpress_server_config_error');

}else{
	//init MusexPress Plugin
	$mxp = musexpress();
	$mxp->run();

}

/**
 * Error message for alerting that user can not run MusexPress
 * @since 3.2.1
 */
function musexpress_server_config_error(){
	?>
	<div class="notice notice-error">
		<p><?php _e( '<strong>MusexPress</strong> can not run on your server, minimum PHP Version required is 5.6.0! Your server is currently running on PHP ' . phpversion(), 'musexpress' ); ?></p>
	</div>
	<?php
}

/**
 * Enable autoloading of plugin classes in namespace MusexPress
 *
 * @param $class_name
 *
 * @since 3.2.0
 */
function musexpress_autoload( $class_name ) {

	/* Only autoload classes from this namespace */
	if ( false === strpos( $class_name, 'MusexPress\\' ) ) {
		return;
	}

	/* Remove namespace from class name */
	$class_file = str_replace( 'MusexPress' . '\\', '', $class_name );
	/* Convert class name format to file name format */
	$class_file = strtolower( $class_file );
	$class_file = str_replace( '_', '-', $class_file );
	/* Convert sub-namespaces into directories */
	$class_path = explode( '\\', $class_file );
	$class_file = array_pop( $class_path );
	$class_path = implode( '/', $class_path );
	/* Load the class */
	require_once __DIR__ . '/includes/' . $class_path . '/class-' . $class_file . '.php';

}
