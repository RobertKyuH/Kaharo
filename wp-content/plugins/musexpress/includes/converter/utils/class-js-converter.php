<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 20/12/2017
 * Time: 17:30
 */

namespace MusexPress\Converter\Utils;

use MusexPress\Theme\Theme;

/**
 * Class JS_Converter: converter utilities for Js
 * @package MusexPress\Converter\Utils
 */
class JS_Converter {

	/**
	 * Script jQuery noConflict
	 * @since 3.2.0
	 */
	const JQUERY_NO_CONFLICT = '<script>if( window.jQuery ){ var $ = jQuery.noConflict(); }</script>';

	/**
	 * Converts JS urls
	 *
	 * @param $script
	 *
	 * @param $base_url
	 *
	 * @since 3.2.2
	 * @param $noConflict = if both jquery no conflict are on, for best practices there should be a jQuery no conflict for each script
	 *
	 * @since 3.2.1
	 * @since 3.2.0
	 */
	public static function convert_js_rules( $script, $base_url, $noConflict ) {
		$inner = $script->innertext;

		$url = trailingslashit( $base_url ) . 'assets/';

		$inner = str_replace( '"assets/', '"' . $url, $inner );
		$inner = str_replace( '" assets/', '"' . $url, $inner );
		$inner = str_replace( '\'assets/', '\'' . $url, $inner );
		$inner = str_replace( '\' assets/', '\'' . $url, $inner );

		if( $noConflict ) {
			$script->innertext = 'if( window.jQuery ){ var $ = jQuery.noConflict(); } '. $inner;
		}
		else{
			$script->innertext =  $inner;
		}
	}

	/**
	 * Injects jQuery no conflict in the head of the page
	 * @param $page_parse
	 * @since 3.2.0
	 */
	public static function inject_jquery_no_conflict_head( $page_parse ){
		$page_parse->find( 'body', 0 )->innertext = JS_Converter::JQUERY_NO_CONFLICT . $page_parse->find( 'body', 0 )->innertext;
	}

	/**
	 * Injects jQuery no conflict in the footer
	 *
	 * @param $php_page
	 *
	 * @since 3.2.0
	 *
	 * @return mixed
	 */
	public static function inject_jquery_no_conflict_footer( $php_page ){
		return str_replace( '<!-- RequireJS script -->', JS_Converter::JQUERY_NO_CONFLICT.'<!-- RequireJS script -->', $php_page );
	}


	/**
	 * Injects alert to console.log script
	 * @param $php_page
	 *
	 * @return mixed
	 *
	 * @since 3.2.0
	 */
	public static function inject_alert_to_console_log_script( $php_page ){
		return str_replace( '<head>', '<head><script type="text/javascript">alert = function(message){console.log("Alert Blocked: " + message);}; </script>', $php_page );
	}

}