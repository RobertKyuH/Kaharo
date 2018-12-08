<?php

class Musexpress_Frontend_Editor_Converter {

	private $page_parse;
	private $base_theme_root_path;
	private $user_theme_root_path;
	private $page_name;
	private $matches;

	public function set_data( $page_parse, $base_theme_root_path, $user_theme_root_path, $page_name, $matches ) {

		$this->page_parse           = $page_parse;
		$this->base_theme_root_path = $base_theme_root_path;
		$this->user_theme_root_path = $user_theme_root_path;

		$this->page_name = $page_name;
		$this->matches   = $matches;

	}

	public static function musexpress_frontend_editor_conversion( $page_parse, $additional_args ) {

		$page_name            = $additional_args['page_name'];
		$base_theme_root_path = $additional_args['base_theme_root_path'];
		$user_theme_root_path = $additional_args['user_theme_root_path'];
		$matches              = $additional_args['matches'];

		$frontend_editor_converter = new Musexpress_Frontend_Editor_Converter();
		$frontend_editor_converter->set_data( $page_parse, $base_theme_root_path, $user_theme_root_path, $page_name, $matches );

		$frontend_editor_converter->conversion_init();

	}


	public function conversion_init() {

		global $wpdb;
		$page_elements = array();

		foreach ( $this->page_parse->find( '.mxp-frontend-editor-text' ) as $text_container ) {
			$name                                      = $this->page_name . '_mxp_frontend_editor_text_' . $text_container->attr['mxp-data-name'];
			$post_id                                   = $this->createString( $name, trim($text_container->innertext));
			$text_container->attr[' mxp-frontend-editor-postid'] = $post_id;
			$text_container->innertext                 = "<?php _e(get_post({$post_id})->post_content, 'mxp_base_theme'); ?>";
			
			$page_elements[] = $name;
		}

		$index = 1;
		foreach ( $this->page_parse->find( '.mxp-frontend-editor-image' ) as $image_container ) {
			$name                                      = $this->page_name . '_mxp_frontend_editor_image_' . $image_container->attr['mxp-data-name'];
			$post_id                                   = $this->createString( $name, -1);
			$image_container->attr[' mxp-frontend-editor-postid'] = $post_id;

			$is_museBGSize = false;
			$parent = $image_container->parent();
			$custom_class = "-1";
			if(isset($image_container->attr['mxp-custom-class'])){
				$custom_class =$image_container->attr['mxp-custom-class'];
			}

			if($custom_class == "-1") {
				while ( ! $is_museBGSize ) {
					if ( isset( $parent->attr['class'] ) && strpos( $parent->attr['class'], 'museBGSize' ) !== false ) {
						$is_museBGSize = true;
					} else {
						//TODO: possibile fix per blocco del loop in caso $parent sia null
						if($parent) {
							$parent = $parent->parent();
						}else{
							break;
						}
					}
				}
			}else{
				while ( ! $is_museBGSize ) {
					if ( isset( $parent->attr['class'] ) && strpos( $parent->attr['class'], $custom_class ) !== false ) {
						$is_museBGSize = true;
					} else {
						//TODO: possibile fix per blocco del loop in caso $parent sia null
						if($parent) {
							$parent = $parent->parent();
						}else{
							break;
						}
					}
				}
			}

			//TODO: possibile fix per blocco del loop in caso $parent sia null
			if($parent) {
				$index ++;

				$parent_id = $parent->attr['id'];
				$css_style = ' <?php $post_content = get_post(' . $post_id . ')->post_content; echo do_shortcode(\'[mxp_fee_image id="\'.$post_content.\'"]\'); ?>';
				if ( $parent_id !== null ) {
					foreach ( $this->page_parse->find( '[data-orig-id="' . $parent_id . '"]' ) as $item ) {
						$item->{'style'} = $css_style;
					}
				}
				$parent->{'style'} = $css_style;
				$page_elements[]   = $name;
			}
		}

		foreach ( $this->page_parse->find( '.mxp-frontend-editor-video' ) as $video_container ) {
			$name                                      = $this->page_name . '_mxp_frontend_editor_video_' . $video_container->attr['mxp-data-name'];

			$media = array();
			foreach ($video_container->find('source') as $source){
				$media['source'] = $source->{'src'};
				$media['type'] = $source->{'type'};
			}

			$post_id                                   = $this->createString( $name, serialize( $media ) );
			$video_container->attr[' mxp-frontend-editor-postid'] = $post_id;

			foreach ($video_container->find('source') as $source){
				$source->{'src'} = '<?php $post_content = unserialize(get_post('.$post_id.')->post_content); echo $post_content["source"]; ?>';
				$source->{'type'} = '<?php $post_content = unserialize(get_post('.$post_id.')->post_content); echo $post_content["type"]; ?>';
			}
			$page_elements[] = $name;
		}

		if(!empty($page_elements)) {

			$wpdb->query( "DELETE FROM $wpdb->posts WHERE post_type = 'mxp-frontend-editor' AND post_title LIKE '%".$this->page_name . "_mxp_frontend_editor_%' AND post_title NOT IN ('" . join( "','", $page_elements ) . "')" );
			
		}
	}

	//Questo metodo è statico, non ha accesso ai campi di sopra, quei campi sono disponibili solo durante la conversione
	public static function musexpress_frontend_editor_after_page_conversion() {
		//tutte le azioni che devono accadere dopo la conversione

	}

	public function createString( $title, $content ) {
		$plugin_settings = get_option( 'musexpress_frontend_editor_settings' );
		$overwrite = $plugin_settings['overwrite_on_conversion'];

		$string = get_page_by_title( $title, OBJECT, 'mxp-frontend-editor' );

		if ( isset( $string ) ) {
			$post_id          = $string->ID;
			if($overwrite) {
				$string_to_update = array(
					'ID'           => $post_id,
					'post_content' => $content,
				);
				wp_update_post( $string_to_update );
			}
		} else {
			$post_id = wp_insert_post( array(
				'post_type'    => 'mxp-frontend-editor',
				'post_title'   => $title,
				'post_content' => $content,
				'post_status'  => 'publish',
			) );
		}

		return $post_id;
	}

}