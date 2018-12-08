<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 18/12/2017
 * Time: 12:57
 */

namespace MusexPress\System;

/**
 * Class File_System: handles File System relative functions
 * @package MusexPress\System
 */
class File_System {

	/**
	 * Copies a dir if file are modified
	 *
	 * @param $src
	 * @param $dst
	 *
	 * @since 3.2.2 fixed copy dir with copy dir if file modified, uses copyemz as workaround
	 * @since 3.2.0
	 */
	public static function copy_dir_if_file_modified( $src, $dst ) {
		$dir = opendir( $src );
		@mkdir( $dst, 0777 );
		while ( false !== ( $file = readdir( $dir ) ) ) {
			if ( ( $file != '.' ) && ( $file != '..' ) ) {
				if ( is_dir( $src . '/' . $file ) ) {
					self::copy_dir_if_file_modified( $src . '/' . $file, $dst . '/' . $file );
				} else {
					if ( ! file_exists( $dst . '/' . $file ) || filemtime( $src . '/' . $file ) > filemtime( $dst . '/' . $file ) ) {
						self::copyemz( $src . '/' . $file, $dst . '/' . $file );
					}
				}
			}
		}
		closedir( $dir );
	}

	/**
	 * Some servers blocks copy, this is a workaround
	 * @param $file1
	 * @param $file2
	 *
	 * @return bool
	 *
	 * @since 3.2.2
	 */
	private static function copyemz($file1,$file2){
		$contentx =@file_get_contents($file1);
		$openedfile = fopen($file2, "w");
		fwrite($openedfile, $contentx);
		fclose($openedfile);
		if ($contentx === FALSE) {
			$status=false;
		}else $status=true;

		return $status;
	}


	/**
	 * Copy directory
	 *
	 * @param $src
	 * @param $dst
	 *
	 * @since 3.2.0
	 */

	public static function copy_dir( $src, $dst ) {
		$dir = opendir( $src );
		@mkdir( $dst, 0777 );
		while ( false !== ( $file = readdir( $dir ) ) ) {
			if ( ( $file != '.' ) && ( $file != '..' ) ) {
				if ( is_dir( $src . '/' . $file ) ) {
					self::copy_dir( $src . '/' . $file, $dst . '/' . $file );
				} else {

					copy( $src . '/' . $file, $dst . '/' . $file );

				}
			}
		}
		closedir( $dir );
	}

	/**
	 * Creates a directory if it is not present
	 *
	 * @param $dir
	 * @param int $mode
	 *
	 * @since 3.2.0
	 */
	public static function create_dir( $dir, $mode = 0777 ) {
		if ( ! file_exists( $dir ) ) {
			mkdir( $dir, $mode );
		}
	}


	/**
	 * Deletes a dir recursively
	 *
	 * @param $src
	 *
	 * @since 3.2.0
	 */
	public static function delete_dir( $src ) {
		if ( file_exists( $src ) ) {
			$dir = opendir( $src );
			while ( false !== ( $file = readdir( $dir ) ) ) {
				if ( ( $file != '.' ) && ( $file != '..' ) ) {
					$full = $src . '/' . $file;
					if ( is_dir( $full ) ) {
						File_System::delete_dir( $full );
					} else {
						unlink( $full );
					}
				}
			}
			closedir( $dir );
			rmdir( $src );
		}
	}

	/**
	 * Moves a dir recursively file by file
	 *
	 * @param $root_path
	 * @param $src
	 * @param $dst
	 *
	 * @since 3.2.0
	 */
	public static function move_dir( $root_path, $src, $dst ) {

		$dir = opendir( $src );
		@mkdir( $dst, 0777 );
		while ( false !== ( $file = readdir( $dir ) ) ) {
			if ( ( $file != '.' ) && ( $file != '..' ) ) {
				if ( is_dir( $src . '/' . $file ) ) {
					self::move_dir( $root_path, $src . '/' . $file, $dst . '/' . $file );
				} else {
					$filename = str_replace( $root_path, "", $src . '/' . $file );
					self::move_file_into_folder( $src . '/' . $file, $filename, $dst );

				}
			}
		}
		closedir( $dir );
	}

	/**
	 * Moves a file into a folder
	 *
	 * @param $file_path
	 * @param $filename
	 * @param $folder
	 *
	 * @since 3.2.0
	 */
	public static function move_file_into_folder( $file_path, $filename, $folder ) {

		$end_path = trailingslashit( $folder ) . $filename;

		rename( $file_path, $end_path );

	}

}