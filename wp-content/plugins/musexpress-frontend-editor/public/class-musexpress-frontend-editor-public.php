<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       musegain.com
 * @since      1.0.0
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/public
 * @author     MuseGain <musegain.com>
 */
class Musexpress_Frontend_Editor_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Musexpress_Frontend_Editor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Musexpress_Frontend_Editor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//enable the frontend editor for admin
		if ( current_user_can( 'administrator' ) ) {
			wp_enqueue_style( $this->plugin_name . '-content-tools-css', plugin_dir_url( __FILE__ ) . 'css/content-tools.min.css', array(), $this->version, 'all' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/musexpress-frontend-editor-public.css', array( $this->plugin_name . '-content-tools-css' ), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Musexpress_Frontend_Editor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Musexpress_Frontend_Editor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//enable the frontend editor for admin
		if ( current_user_can( 'administrator' ) ) {
			//TODO: FIX per backbone js errors
//			wp_enqueue_script( $this->plugin_name . '-underscore', get_home_url() . '/wp-includes/js/underscore.min.js', array(), $this->version, true );
//			wp_enqueue_script( $this->plugin_name . '-backbone', get_home_url() . '/wp-includes/js/backbone.min.js', array(), $this->version, true );
			wp_enqueue_script( $this->plugin_name . '-content-tools-js', plugin_dir_url( __FILE__ ) . 'js/content-tools.js', array(), $this->version, true );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/musexpress-frontend-editor-public.js', array(
				'jquery',
				$this->plugin_name . '-content-tools-js'
			), $this->version, true );
			wp_localize_script( $this->plugin_name, 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
			wp_enqueue_media();
		}
	}

	public function redirect_musexpress_frontend_editor_pages( $template ) {
		/*if ( is_frontend_editor_page() ) {
			return locate_template(  MUSEXPRESS_USER_THEME_NAME . '/' . get_option( 'musexpress_frontend_editor_pages_settings' )['frontend_editor_page']['value'] . '.php'  );
		}*/
		return $template;
	}

	public function mxp_save_content_editable() {
		//enable the frontend editor for admin
		if ( current_user_can( 'administrator' ) ) {

			$contents_block = $_POST['payload'];
			$images = $_POST['images'];
			$videos = $_POST['videos'];

			foreach ( $contents_block as $id => $block ) {
				// $id = post ID
				// $block = contenuto HTML

				$post_id          = $id;
				$string_to_update = array(
					'ID'           => $post_id,
					'post_content' => $block,
				);
				$contents_block_result = wp_update_post( $string_to_update );

			}

			foreach ( $images as $post_id => $image_id ){

				$string_to_update = array(
					'ID'           => $post_id,
					'post_content' => $image_id,
				);
				$images_result = wp_update_post( $string_to_update );
			}

			foreach ( $videos as $post_id => $video_id ){

				$media_element = get_post($video_id);

				$string_to_update = array(
					'ID'           => $post_id,
					'post_content' => serialize( array( 'source' => $media_element->guid, 'type' => $media_element->post_mime_type ) ),
				);
				$videos_result = wp_update_post( $string_to_update );
			}

			if($contents_block_result != 0 || $images_result != 0 || $videos_result != 0){
				echo true;
			}else{
				echo false;
			}

			wp_die();
		}
	}

	public function mxp_fee_image_shortcode(){
		add_shortcode('mxp_fee_image', function($atts){
			$a = shortcode_atts( array(
				'id' => -1,
			), $atts );

			$id = intval($a['id']);

			if( $id != -1 ){
				$feat_image_url = wp_get_attachment_url( $id );
				echo 'background-image:url('.$feat_image_url.');';
			}
		});
	}

}
