<?php

class Musexpress_Frontend_Editor_Settings{


	public function musexpress_frontend_editor_settings_add_section($sections){

		array_push($sections,'frontend editor');

		return $sections;

	}

	public function musexpress_frontend_editor_settings_show_form($selected_section){

		if($selected_section==='frontend editor'){
			$plugin_settings = get_option( 'musexpress_frontend_editor_settings' );
			include plugin_dir_path(__FILE__).'/partials/musexpress-frontend-editor-settings-loader.php';
		}

	}

	public function musexpress_frontend_editor_settings_save($form_data) {

		if ( isset( $form_data['selected_section'] ) ) {
			if ( $form_data['selected_section'] === 'frontend editor' ) {
				$this->musexpress_frontend_editor_example_setting_save( $form_data );
			}
		}
	}

	private function musexpress_frontend_editor_example_setting_save( $form_data ){
		$plugin_settings = get_option( 'musexpress_frontend_editor_settings' );
		if( isset( $form_data['musexpress_frontend_editor_settings'] ) && $form_data['musexpress_frontend_editor_settings'] == 1 ){
			$plugin_settings['overwrite_on_conversion'] = true;
		}else{
			$plugin_settings['overwrite_on_conversion'] = false;
		}

		update_option('musexpress_frontend_editor_settings', $plugin_settings);
	}

}