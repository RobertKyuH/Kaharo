<?php
/*
Plugin Name:       MusexPress Blog
Plugin URI:        http://www.musegain.com/adobe-muse/blog/
Description:       The first WordPress Blog fully customizable with Adobe Muse
Version:           3.2.0
Author:            MuseGain.com
Author URI:        http://www.musegain.com
License:           MuseGain.com
License URI:       http://www.musegain.com/terms-conditions-of-use/
Documentation URI: http://www.musexpress.net/blog_documentation.php

All the products on Musegain.com are copyrighted and are the properties of
Eclipse s.r.l.

You acknowledge that by Your download the ownership of MusexPress
(and/or its plugins) does not get transferred to You and You must not claim
that it is Yours.

What You get includes an ongoing, non-exclusive, non transferable, worldwide
license to use the plugins on the terms and conditions available here
http://www.musegain.com/terms-conditions-of-use/ . Please read them carefully,
any violation will not be tolerated.
*/

//TEST MODULO BLOG

if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'MUSEXPRESS_BLOG_PLUGIN_NAME', 'blog-plugin' );
define( 'MUSEXPRESS_BLOG_PLUGIN_VERSION', '3.1' );
define( 'MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_PATH', plugin_dir_path( __FILE__ ) );
define( 'MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_URL', plugin_dir_url( __FILE__ ) );
//DON'T FORGET TO CHANGE FOR EVERY TAG!
define( 'MUSEXPRESS_BLOG_UPDATE_DB' , true);



function activate_blog_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blog-plugin-activator.php';
	Blog_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-blog-plugin-deactivator.php
 */
function deactivate_blog_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blog-plugin-deactivator.php';
	Blog_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_blog_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_blog_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-blog-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_blog_plugin() {

	$plugin = new Blog_Plugin();
	$plugin->run();

}
run_blog_plugin();