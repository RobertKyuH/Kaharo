<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 21/12/2017
 * Time: 13:46
 */

namespace MusexPress\Features;
use MusexPress\Theme\Theme;

/**
 * Class Error_Page: manages Error Page features
 * @package MusexPress\Features
 */
class Error_Page {

	/**
	 * Redirects 404 to error page
	 *
	 * @param $template
	 *
	 * @since 3.2.0
	 * @return mixed
	 */
	public function redirect_error_page( $template ) {

		if ( is_404() ) {
			return Theme::get_template_for_page( 'error' );
		}

		return $template;
	}


}