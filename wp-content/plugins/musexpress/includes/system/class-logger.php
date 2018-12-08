<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 21/12/2017
 * Time: 07:59
 */

namespace MusexPress\System;

/**
 * Class Logger: utility class to log actions
 * @package MusexPress\System
 */
class Logger{

	/**
	 * Path to log file
	 * @var string
	 */
	private static $log = MUSEXPRESS_PLUGIN_DIRECTORY_PATH . '/logs.txt';

	/**
	 * Logs a string in current date
	 * @param $string
	 * @since 3.2.0
	 */
	public static function log( $string ){
	    file_put_contents(Logger::$log,  "$string --"  . date('Y-m-d H:i s') . PHP_EOL, FILE_APPEND );
	}

}