<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 07/10/2017
 * Time: 09:17
 */

class Musexpress_Frontend_Editor_Error_Handler{


	public static function musexpress_not_active_error($title,$message){


		$error_content = '<link rel="stylesheet" id="error-css" href="' . MUSEXPRESS_FRONTEND_EDITOR_DIRECTORY_URL . 'admin/css/error-handler.css" type="text/css" media="all">';
		$error_content.= '<div class="MusexPress-Logo"><svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . MUSEXPRESS_FRONTEND_EDITOR_DIRECTORY_URL . 'includes/assets/icons.svg#mg-logo"></use>
					</svg></div>';
		$error_content .= '<h2 class="MusexPress-Error-Title">' . $title . '</h2><div class="MusexPress-Error-Body">' . $message . '</div>';

		$error_content .='<div class="MusexPress-Actions">
			<ul><li>
				<a href="https://www.musegain.com/adobe-muse/musexpress/" target="_blank">
					<span class="show-for-large blog-lite-action-button">Download Now</span>
				</a>
			</li>
			</ul></div>';

		wp_die( $error_content, $title, array('back_link' => true) );

	}



}