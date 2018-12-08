<?php


class Mxp_blog_error_handler{

   public static function musexpress_error($title,$message){


   	    $error_content = '<link rel="stylesheet" id="error-css" href="' . MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_URL . 'admin/css/error-handler.css" type="text/css" media="all">';
   	    $error_content.= '<div class="MusexPress-Logo"><svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_URL . 'includes/assets/icons.svg#mg-logo"></use>
					</svg></div>';
   	    $error_content .= '<h2 class="MusexPress-Error-Title">' . $title . '</h2><div class="MusexPress-Error-Body">' . $message . '</div>';

   	    $error_content .='<div class="MusexPress-Actions">
			<ul><li>
				<a href="https://www.musegain.com/documentation/" target="_blank">
					<svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_URL . 'includes/assets/icons.svg#mg-documentation"></use>
					</svg>
					<span class="show-for-large">Documentation</span>
				</a>
			</li>
			<li>
				<a href="https://www.youtube.com/channel/UCozlJtbWQao1N_ViGp7BmuA" target="_blank">
					<svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_URL . 'includes/assets/icons.svg#mg-video-tutorials"></use>
					</svg>
					<span class="show-for-large">Tutorials</span>
				</a>
			</li>
			</ul></div>';

	   wp_die( $error_content, $title, array('back_link' => true) );

   }

   public static function musexpress_breakpoint_pretty_name($breakpoint){
	   $mess = substr($breakpoint, 3);

	   if($mess!=='infinity'){
	   	    return 'breakpoint ' . $mess;
	   }else{
	   	    return 'bigger breakpoint';
	   }

   }

}