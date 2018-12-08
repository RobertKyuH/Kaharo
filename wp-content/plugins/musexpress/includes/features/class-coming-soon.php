<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 15:44
 */

namespace MusexPress\Features;

use MusexPress\Messages\Message;
use MusexPress\Theme\Theme;

use MusexPress\i18n\i18n;

/**
 * Class Coming_Soon
 * @package MusexPress\Features
 */
class Coming_Soon {

	/**
     * the @key of coming soon mode
	 * @var string
     * @since 3.2.0
	 */
	public static $option_key = "mxp_coming_soon_mode";

	/**
     * the @key of coming soon mode title
	 * @var string
     * @since 3.2.0
	 */
	public static $option_title_key = "mxp_coming_soon_mode_title";

	/**
	 * Inits Coming Soon options
	 * @since 3.2.0
	 */
	static function init_options() {
		add_option( self::$option_key, 0 );
		add_option( self::$option_title_key, "Coming Soon" );
	}

	/**
     * Returns the title
	 * @return mixed
     * @since 3.2.0
	 */
	static function get_title(){
	    return get_option(self::$option_title_key, "Coming Soon");
    }

	/**
	 * Prints Coming Soon options form
     * @since 3.2.0
	 */
	static function print_options_form(){
		?>
        <tr>
            <th>
                <label for="<?php echo self::$option_key; ?>"><?php _e( 'Enable Coming Soon Mode', i18n::$textdomain ); ?></label>
            </th>
            <td>
                <input type="checkbox" value="1" <?php echo checked( 1, get_option( self::$option_key ), true ); ?>
                       name="<?php echo self::$option_key; ?>"/>
	            <?php _e( 'If this option is checked, Coming Soon mode will be enabled for all users but Admins',  i18n::$textdomain ); ?>
            </td>
        </tr>

        <tr>
            <th>
                <label for='<?php echo self::$option_title_key; ?>'><?php _e( 'Coming Soon title', i18n::$textdomain ); ?></label>
            </th>
            <td>
                <input type="text" name="<?php echo self::$option_title_key; ?>" value="<?php echo self::get_title(); ?>"/>
	            <?php _e( 'The title metatag you will see if the Coming Soon mode is enabled',  i18n::$textdomain ); ?>
            </td>
        </tr>
		<?php
	}

	/**
	 * handles saving of the Coming Soon option
	 *
	 * @param $form_data : array with all form datas
	 *
	 * @since 3.2.0
	 */
	static function save_option( $form_data ) {
		if ( isset( $form_data[ self::$option_key ] ) ) {
			self::enable();
		} else {
			self::disable();
		}
		if( isset($form_data[self::$option_title_key])){
		    update_option(self::$option_title_key,$form_data[self::$option_title_key]);
        }
	}

	/**
	 * Enables Coming Soon mode
	 * @since 3.2.0
	 */
	public static function enable() {
		update_option( self::$option_key, 1 );
	}

	/**
	 * Disables Coming Soon Mode
	 * @since 3.2.0
	 */
	public static function disable() {
		update_option( self::$option_key, 0 );
	}

	/**
	 * Prints Coming Soon Enabled Notice
	 * @since 3.2.0
	 */
	public function coming_soon_notice() {
		if ( self::is_enabled() ) {
			Message::print_admin_notice( 'Coming Soon Mode is enabled! You can <a href="' . menu_page_url( MUSEXPRESS_PLUGIN_NAME, false ) . '&tab=general" >disable it here!</a>', 'info', false );
		}
	}

	/**
	 * @return bool
	 * @since 3.2.0
	 */
	public static function is_enabled() {
		return intval( get_option( 'mxp_coming_soon_mode' ) ) == 1;
	}

	/**
	 * Redirects Page if Coming Soon Mode is enabled
	 *
	 * @param $template
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	function coming_soon_mode_redirect( $template ) {

		$is_coming_soon_mode = self::is_enabled() && ! current_user_can( 'administrator' );

		if ( $is_coming_soon_mode ) {
			status_header( 503 );

			return Theme::get_template_for_page( 'coming_soon' );
		} else {
			return $template;
		}

	}

	/**
	 * Changes title if Coming Soon Mode is enabled
	 *
	 * @param $title
	 *
	 * @return mixed
	 */
	function coming_soon_mode_title( $title ) {

		$is_coming_soon_mode = self::is_enabled();

		if ( $is_coming_soon_mode ) {
			$title['title'] = self::get_title();
		}

		return $title;

	}


}