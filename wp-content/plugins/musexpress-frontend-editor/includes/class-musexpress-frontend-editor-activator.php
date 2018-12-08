<?php

/**
 * Fired during plugin activation
 *
 * @link       musegain.com
 * @since      1.0.0
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/includes
 * @author     MuseGain <musegain.com>
 */
class Musexpress_Frontend_Editor_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( __FILE__ ) .'class-musexpress-frontend-editor-error-handler.php';

		//L'add on ha bisogno di MusexPress per funzionare quindi se non è attivo, si spara l'errore, per farlo scaricare
		if(!is_plugin_active('musexpress/musexpress.php')){
			Musexpress_Frontend_Editor_Error_Handler::musexpress_not_active_error('MusexPress Not Active', 'To use this plugin you need to install and activate MusexPress CMS. It seems it is not active on your WordPress Admin Panel. You can download MusexPress freely from our Website!');
		}

		//Questo check ci permette di cambiare le pagine registrate durante gli update se è necessario
		if ( MUSEXPRESS_FRONTEND_EDITOR_UPDATE_DB ) {
			//Se necessario si aggiungono le pagine controllate dal plugin ({custom} post type)

			update_option('musexpress_frontend_editor_settings', array(
				'overwrite_on_conversion' => false,
			));

		}else{
			//Add option nel caso in cui non serve aggiornare il database

			add_option('musexpress_frontend_editor_settings', array(
				'overwrite_on_conversion' => false,
			));

		}

		//teniamo traccia della versione del plugin in questo modo, durante l'update possiamo triggerare l'attivazione
		update_option( 'musexpress_frontend_editor_version', MUSEXPRESS_FRONTEND_EDITOR_VERSION );
		//Tutto il resto delle opzioni va qui



	}

}
