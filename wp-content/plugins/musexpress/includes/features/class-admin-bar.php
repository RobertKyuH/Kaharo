<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 15:19
 */

namespace MusexPress\Features;

use MusexPress\i18n\i18n;

/**
 * Class Admin_Bar
 * @package MusexPress\Features
 */
class Admin_Bar {

	/**
     * The @key of Show Admin Bar option
	 * @var string
	 */
	public static $option_key = 'mxp_show_admin_bar';

	/**
	 * Init the Admin Bar options
	 * @since 3.2.0
	 */
	static function init_options() {
		add_option( self::$option_key, 1 );
	}

	/**
	 * Checks if AdminBar is enabled or not
	 * @return bool
	 * @since 3.2.0
	 */
	static function is_enabled() {
		return get_option( self::$option_key ) == 1;
	}

	/**
	 * Prints the checkbox needed to modify the option
	 * @since 3.2.0
	 */
	static function print_option() {
		?>
        <input type="checkbox" value="1" <?php echo checked( 1, get_option( self::$option_key ), true ); ?>
               name="<?php echo self::$option_key; ?>"/> <?php
	}

	/**
	 * handles saving of the Admin Bar option
	 *
	 * @param $form_data : array with all form datas
	 *
	 * @since 3.2.0
	 */
	static function save_option( $form_data ) {
		if ( isset( $form_data[ self::$option_key ] ) ) {
			update_option( self::$option_key, 1 );
		} else {
			update_option( self::$option_key, 0 );
		}
	}

	/**
	 *  Prints label for Show Admin Bar
     * @since 3.2.0
	 */
	static function print_label() {
		echo '<label for="'.self::$option_key.'">' . __( 'Show Admin Bar', i18n::$textdomain ) . '</label>';
	}

	/**
	 * Prints Description for Show Admin Bar
     * @since 3.2.0
	 */
	static function print_description(){
		_e( 'If this option is checked, admin bar will be enabled for Admin users only',  i18n::$textdomain );
    }


}