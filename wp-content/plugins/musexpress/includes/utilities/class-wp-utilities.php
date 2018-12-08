<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 07/01/2018
 * Time: 18:27
 */

namespace MusexPress\Utilities;


/**
 * Class Wp_Utilities: manages WordPress related functions
 * @package MusexPress\Utilities
 */
class Wp_Utilities {

	/**
	 * WordPress Index
	 * @since 3.2.0
	 */
	const WP_INDEX = <<<EOT
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

EOT;

	/**
	 * Regenerates htaccess
	 * @since 3.2.0
	 */
	public static function regenerate_htaccess() {
		global $wp_rewrite;
		update_option( "rewrite_rules", false );
		$wp_rewrite->flush_rules( true );
	}


	public static function restore_index() {

		$dst = trailingslashit( get_home_path() ) . 'index.php';

		file_put_contents( $dst, Wp_Utilities::WP_INDEX );
	}

}