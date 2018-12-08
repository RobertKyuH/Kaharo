<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 18:15
 */

namespace MusexPress\Converter;

use MusexPress\Converter\Utils\CSS_Converter;
use MusexPress\Converter\Utils\Html_Converter;
use MusexPress\Converter\Utils\JS_Converter;
use MusexPress\Converter\Utils\Muse_Converter;
use MusexPress\Converter\Utils\Php_Converter;
use MusexPress\Settings\MusexPress_Settings as PageConverterSettings;
use MusexPress\Theme\Theme;

/**
 * Class Pages_Converter: the main feature of MusexPress
 * @package MusexPress\Converter
 */
class Pages_Converter {

	/**
	 * Array of pages to convert
	 * @var array|null
	 *
	 */
	private $pages_to_convert;

	/**
	 * User theme folder url inside mxp_base_theme
	 * @var string
	 */
	private $base_url;

	/**
	 * User theme root path with trailingslashit
	 * @var string
	 */
	private $root_path;

	/**
	 * Path to mxp_base_theme inside theme folder
	 * @var string
	 */
	private $base_theme_root_path;

	/**
	 * Path to user theme folder inside mxp_base_theme
	 * @var string
	 */
	private $user_theme_root_path;

	/**
	 * All pages inside the upload folder
	 * @var array
	 */
	private $all_pages;

	/**
	 * Title found in the html file
	 * @var string
	 */
	private $muse_page_title;

	/**
	 * Content of the body of html
	 * @var string
	 */
	private $body_content;

	/**
	 * Instance of PageConverterSettings
	 * @var PageConverterSettings
	 */
	private $settings;

	/**
	 * Instance of Php Converter
	 * @var Php_Converter
	 */
	private $php_converter;

	/**
	 * Pages_Converter constructor.
	 *
	 * @param null $pages_to_convert : if no pages passed it converts all pages
	 *
	 * @since 3.2.0
	 */
	public function __construct( $pages_to_convert = null ) {
		require_once MUSEXPRESS_PLUGIN_DIRECTORY_PATH . 'vendor/simple_html_dom.php';

		$this->base_url         = Theme::get_user_theme_folder_uri();
		$this->all_pages        = Theme::get_basename_of_pages_in_upload_folder();
		$this->pages_to_convert = $pages_to_convert == null ? $this->all_pages : $pages_to_convert;

		$this->base_theme_root_path = Theme::get_themes_base_theme_path();
		$this->user_theme_root_path = Theme::get_user_theme_folder_path();
		$this->root_path            = trailingslashit( $this->user_theme_root_path );

		$this->muse_page_title = '';
		$this->body_content    = '';

		$this->settings = new PageConverterSettings();

		$this->php_converter = new Php_Converter();

	}

	/**
	 * Inits conversion
	 * @since 3.2.0
	 */
	public function init() {

		$conversion_logger = new Conversion_Logger();

		foreach ( $this->pages_to_convert as $category => $pages ) {
			foreach ( $pages as $original_page_name ) {

				$converted = $this->page_conversion( $this->base_url, $original_page_name, $this->all_pages[ $category ], $category );

				if ( $converted === true ) {
					$conversion_logger->add_converted_page( $original_page_name, $category );

					$this->sync_page( $original_page_name, $this->muse_page_title, $category );

				}

			}
		}

		$this->set_front_page( 'index' );

		$this->clean_files( $conversion_logger );
		$conversion_logger->save_log();

		if ( $this->settings->get_page_converter_setting( 'robots' ) ) {
			$this->create_robots_file();
		}

	}

	/**
	 * Here happens all the magic of MusexPress
	 *
	 * @param $base_url
	 * @param $original_page_name
	 * @param $all_pages
	 * @param $type
	 *
	 * @return bool
	 * @since 3.2.0
	 */
	private function page_conversion( $base_url, $original_page_name, $all_pages, $type ) {

		if ( $type == 'desktop' ) {
			$original_page_name = $this->root_path . $original_page_name;
		} else {
			$base_url           = $base_url . "/$type";
			$original_page_name = $this->root_path . "$type/" . $original_page_name;
		}

		$output_page_name = str_replace( '.html', '.php', $original_page_name );

		$page = $original_page_name;

		$page_name = str_replace( '.html', '', $page );
		$page_name = basename( $page_name );

		$page_contents = file_get_contents( $page );

		//Replace php tags with placeholders
		$page = $this->php_converter->replace_php_tags( $page_contents );

		//gets html entities from a string
		$page_parse = str_get_html( $page, true, true, DEFAULT_TARGET_CHARSET, false, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT );

		if ( $page_parse === false ) {
			return false;
		}
		//TODO: reinsert this feature with Search Box
		$this->body_content = $page_parse->find( '#page' )[0]->innertext;

		//Redirects phone and tablet pages
		if ( $this->settings->get_page_converter_setting( 'convert_redirect_version_url' ) ) {
			Muse_Converter::convert_redirect_elements( $page_parse, $page_name );
		}

		//Saves Title generated in Muse
		foreach ( $page_parse->find( 'title' ) as $title ) {
			$this->muse_page_title = $title->innertext;
		}


		//Removes Muse Seo
		if ( $this->settings->get_page_converter_setting( 'remove_muse_seo' ) ) {
			Muse_Converter::remove_generated_seo( $page_parse );
		}

		//Converts links
		Html_Converter::convert_links( $page_parse, $base_url, $all_pages );

		//Converts inline css
		CSS_Converter::convert_css( $page_parse, $base_url );

		//Converts all html tags
		Html_Converter::convert_html_tags( $page_parse, $base_url );


		foreach ( $page_parse->find( 'script' ) as $script ) {
			//Converts Muse init scripts, It's necessary $this->base_url instead of $base_url for tablet and phone,
			//scripts are on the root not on tablet/phone
			Muse_Converter::convert_init_script( $script, $this->base_url );
			$noConflict = $this->settings->get_page_converter_setting( 'jquery_no_conflict_head' ) && $this->settings->get_page_converter_setting( 'jquery_no_conflict_footer' );
			JS_Converter::convert_js_rules( $script, $this->base_url, $noConflict );
		}

		Muse_Converter::convert_featured_image( $page_parse );

		$additional_args = array(
			'page_name'            => $page_name,
			'user_theme_root_path' => $this->user_theme_root_path,
			'base_theme_root_path' => $this->base_theme_root_path,
			'matches'              => $this->php_converter->getMatches()
		);

		do_action( 'musexpress_template_creation_action', $page_parse, $additional_args );

		$this->php_converter->insert_wp_head( $page_parse );

		$this->php_converter->insert_wp_footer( $page_parse );


		if ( $this->settings->get_page_converter_setting( 'jquery_no_conflict_head' ) ) {
			JS_Converter::inject_jquery_no_conflict_head( $page_parse );
		}

		//adds correct classes to body
		$page_parse->find( 'body', 0 )->class .= ' ' . Php_Converter::body_classes();

		if ( $this->settings->get_page_converter_setting( 'convert_base_url' ) ) {

			$trailed_base_url                         = trailingslashit( $base_url );
			$inject                                   = "<base href='$trailed_base_url'>";
			$page_parse->find( 'head', 0 )->innertext = $inject . $page_parse->find( 'head', 0 )->innertext;

		}

		$php_page = $this->php_converter->replace_placeholder_pattern( $page_parse );


		if ( $this->settings->get_page_converter_setting( 'muse_jquery' ) ) {
			$php_page = Muse_Converter::remove_muse_jquery( $php_page );
		}

		if ( $this->settings->get_page_converter_setting( 'jquery_no_conflict_footer' ) ) {
			JS_Converter::inject_jquery_no_conflict_footer( $php_page );
		}

		if ( $this->settings->get_page_converter_setting( 'move_require_js' ) ) {
			$php_page = Muse_Converter::move_require_js( $php_page );
		}


		//Registers Template
		$php_page = Php_Converter::setup_template_file( $php_page, $this->root_path, $original_page_name );

		//Reconverts [mxp_php_open] [mxp_php_close]
		$php_page = Php_Converter::convert_mxp_php_tags( $php_page );

		//Removes Network Protocol
		if ( $this->settings->get_page_converter_setting( 'remove_protocol' ) ) {
			$php_page = Html_Converter::remove_network_protocol( $php_page );
		}

		if ( $this->settings->get_page_converter_setting( 'suppress_missing_file' ) ) {
			$php_page = Muse_Converter::suppress_missing_file_error( $php_page );
		}

		if ( $this->settings->get_page_converter_setting( 'alert_to_console' ) ) {
			$php_page = JS_Converter::inject_alert_to_console_log_script( $php_page );
		}

		file_put_contents( $output_page_name, $php_page );

		return true;
	}

	/**
	 * Synces MusexPress pages with WordPress
	 *
	 * @param $page_name
	 * @param string $page_title
	 * @param $category
	 *
	 * @since 3.2.0
	 */
	private function sync_page( $page_name, $page_title = '', $category ) {

		$category = $category !== 'desktop' ? $category . '/' : '';

		$page_name = $category . $page_name;

		$withoutExt = preg_replace( '/\\.[^.\\s]{3,4}$/', '', $page_name );
		if ( strpos( $withoutExt, '/' ) ) {
			$withoutExt = str_replace( '/', '-', $withoutExt );
		}

		$page = mxp_get_page_by_slug( $withoutExt );

		if ( $this->settings->get_page_converter_setting( 'prefill_body_content' ) ) {

			$post_content = wp_strip_all_tags( $this->body_content );
			$pattern      = '/\[MUSEGAIN-CODE\#([\d]+)\]/';
			$post_content = preg_replace( $pattern, '', $post_content );
			$post_content = trim( $post_content );

		} else {

			$post_content = "";

		}


		$post_title  = $page_title !== '' ? $page_title : $withoutExt;
		$page_to_add = array(
			'post_title'    => $post_title,
			'post_name'     => sanitize_title( $withoutExt ),
			'post_content'  => $post_content,
			'post_type'     => 'page',
			'post_status'   => 'publish',
			'page_template' => 'mxp_theme/' . str_replace( '.html', '.php', $page_name ),
		);

		if ( ! isset( $page ) ) {
			wp_insert_post( $page_to_add );
		} else {
			$body        = empty( $page->post_content ) ? $post_content : $page->post_content;
			$page_to_add = array(
				'ID'            => $page->ID,
				'post_name'     => sanitize_title( $withoutExt ),
				'post_content'  => $body,
				'post_type'     => 'page',
				'post_status'   => 'publish',
				'page_template' => 'mxp_theme/' . str_replace( '.html', '.php', $page_name ),
			);
			wp_update_post( $page_to_add );

		}

		update_post_meta( mxp_get_page_by_slug( $withoutExt )->ID, '_wp_page_template', 'mxp_theme/' . str_replace( '.html', '.php', $page_name ) );

	}

	/**
	 * Set front page if not set
	 *
	 * @param $title
	 *
	 * @since 3.2.0
	 */
	private function set_front_page( $title ) {

		$homepage = mxp_get_page_by_slug( $title );

		if ( $homepage && empty( get_option( 'page_on_front' ) ) ) {
			update_option( 'page_on_front', $homepage->ID );
			update_option( 'show_on_front', 'page' );
		}

	}

	/**
	 * Cleans html and php file inside the user theme folder and deletes WordPress Pages
	 * @param $logger
	 * @since 3.2.0
	 */
	private function clean_files( $logger ) {

		$pages_root = Theme::get_basename_of_pages_in_upload_folder();

		$pages_theme = Theme::get_basename_of_pages_in_theme_folder();

		$diff_desktop = array_diff( $pages_theme['desktop'], $pages_root['desktop'] );
		$diff_tablet  = array_diff( $pages_theme['tablet'], $pages_root['tablet'] );
		$diff_phone   = array_diff( $pages_theme['phone'], $pages_root['phone'] );


		foreach ( $diff_desktop as $page ) {
			$html_file = $this->user_theme_root_path . '/' . $page;
			if ( file_exists( $html_file ) ) {
				unlink( trim( $html_file ) );
			}
			$php_file = str_replace( '.html', '.php', $html_file );
			if ( file_exists( $php_file ) ) {
				unlink( trim( $php_file ) );
			}

			$logger->remove_converted_page( $page, 'desktop' );

			$page_path = str_replace( '.html', '', basename( $page ) );
			wp_delete_post( mxp_get_page_by_slug( $page_path )->ID, true );

		}

		foreach ( $diff_tablet as $page ) {
			$html_file = $this->user_theme_root_path . '/tablet/' . $page;
			if ( file_exists( $html_file ) ) {
				unlink( trim( $html_file ) );
			}
			$php_file = str_replace( '.html', '.php', $html_file );
			if ( file_exists( $php_file ) ) {
				unlink( trim( $php_file ) );
			}
			$logger->remove_converted_page( $page, 'tablet' );

			$page_path = str_replace( '.html', '', basename( $page ) );
			wp_delete_post( mxp_get_page_by_slug( 'tablet-' . $page_path )->ID, true );

		}

		foreach ( $diff_phone as $page ) {

			$html_file = $this->user_theme_root_path . '/phone/' . $page;
			if ( file_exists( $html_file ) ) {
				unlink( trim( $html_file ) );
			}
			$php_file = str_replace( '.html', '.php', $html_file );
			if ( file_exists( $php_file ) ) {
				unlink( trim( $php_file ) );
			}

			$logger->remove_converted_page( $page, 'phone' );

			$page_path = str_replace( '.html', '', basename( $page ) );
			wp_delete_post( mxp_get_page_by_slug( 'phone-' . $page_path )->ID, true );

		}

	}

	/**
	 * Creates robot file to prevent undesired indexing
	 * @since 3.2.0
	 */
	private function create_robots_file() {

		$robots_content = 'User-agent: *' . PHP_EOL;
		$robots_content .= 'Disallow: /mxp_theme/' . PHP_EOL;
		$robots_content .= 'Disallow: /wp-content/themes/mxp_base_theme/mxp_theme/' . PHP_EOL;
		$robots_content .= 'Disallow: /mxp_box/' . PHP_EOL;

		file_put_contents( get_home_path() . 'robots.txt', $robots_content );

	}

}