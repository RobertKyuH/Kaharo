<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 21/12/2017
 * Time: 13:57
 */

namespace MusexPress\Admin\Toolbar;


use MusexPress\Admin\Panel\Panel;
use MusexPress\i18n\i18n;

/**
 * Class Toolbar: manages toolbar quick menu
 * @package MusexPress\Admin\Toolbar
 */
class Toolbar {


	/**
	 * Renders Toolbar with Quick Actions
	 *
	 * @since 3.2.2 Changed Name for Frontend, and removed icon, since there is no font MusexPress included
	 * @since 3.2.0
	 */
	function render_toolbar() {

		global $wp_admin_bar;

		if ( is_admin() ) {
			$icon_span = '<span class="ab-icon" id="musexpress-toolbar-menu"></span><span class="ab-label">' . __( 'Quick Menu', i18n::$textdomain ) . '</span> ';
		}else{
			$icon_span = '<span class="ab-label">' . __( 'MusexPress', i18n::$textdomain ) . '</span> ';

		}
		$wp_admin_bar->add_menu( array( 'id' => 'musexpress_menu', 'title' => $icon_span, 'href' => false ) );


		$convert_all_form = '<form action="' . admin_url() . '" method="post" style="line-height: 26px!important">' . wp_nonce_field( 'musexpress_page_converter_all_nonce', 'nonce', false ) .
		                    '<input type="hidden" name="musexpress_action" value="musexpress_page_converter_all"><input type="submit" value="Convert All" class="mxp_convert_all_btn"/> </form>';
		if ( is_admin() ) {
			$wp_admin_bar->add_menu( array(
				'parent' => 'musexpress_menu',
				'id'     => 'convert_all',
				'title'  => $convert_all_form,
				'href'   => false
			) );
		} else {
			$wp_admin_bar->add_menu( array(
				'parent' => 'musexpress_menu',
				'id'     => 'page_converter',
				'title'  => __( 'Pages Converter', 'musexpress' ),
				'href'   => admin_url( 'admin.php?page='.Panel::PAGE_CONVERTER_MENU_URL )
			) );
		}

		$wp_admin_bar->add_menu( array(
			'parent' => 'musexpress_menu',
			'id'     => 'extensions_settings',
			'title'  => __( 'Extensions Settings', 'musexpress' ),
			'href'   => admin_url( 'admin.php?page='.MUSEXPRESS_PLUGIN_NAME.'&tab=general' )
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'musexpress_menu',
			'id'     => 'page_settings',
			'title'  => __( 'Page Settings', 'musexpress' ),
			'href'   => admin_url( 'admin.php?page='. Panel::SETTINGS_MENU_URL. '&tab=page_settings' )
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'musexpress_menu',
			'id'     => 'page_converter_settings',
			'title'  => __( 'Converter Settings', 'musexpress' ),
			'href'   => admin_url( 'admin.php?page='. Panel::SETTINGS_MENU_URL. '&tab=page_converter' )
		) );
		$wp_admin_bar->add_menu( array(
			'parent' => 'musexpress_menu',
			'id'     => 'tools',
			'title'  => __( 'Tools', 'musexpress' ),
			'href'   => admin_url( 'admin.php?page='.MUSEXPRESS_PLUGIN_NAME.'&tab=tools' )
		) );

	}


}