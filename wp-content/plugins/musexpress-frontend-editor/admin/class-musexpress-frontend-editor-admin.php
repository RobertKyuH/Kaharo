<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       musegain.com
 * @since      1.0.0
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Musexpress_Frontend_Editor
 * @subpackage Musexpress_Frontend_Editor/admin
 * @author     MuseGain <musegain.com>
 */
class Musexpress_Frontend_Editor_Admin {


	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/musexpress-frontend_editor-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/musexpress-frontend_editor-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Controlla la versione del plugin, e se necessario triggera l'activator
	 *
	 * @since    1.0.0
	 */
	public function check_musexpress_frontend_editor_version() {


		if ( empty( get_option( 'musexpress_frontend_editor_version' ) ) || get_option( 'musexpress_frontend_editor_version' ) != MUSEXPRESS_FRONTEND_EDITOR_VERSION ) {
			require_once MUSEXPRESS_FRONTEND_EDITOR_DIRECTORY_PATH . 'includes/class-musexpress-frontend-editor-activator.php';
			Musexpress_Frontend_Editor_Activator::activate();
		}

	}

	public function register_mxp_frontend_editor_post_type(){

		$args = array(
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => false,
			'show_in_menu'       => false,
			'query_var'          => false,
			'has_archive'        => false,
			'hierarchical'       => false
		);

		register_post_type( 'mxp-frontend-editor', $args );
	}

	public function getElementForPage($page_name, $media_type){
		global $wpdb;
		$results = array();
		if(!empty($page_name)) {
			$results = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->posts . ' WHERE `post_title` LIKE \'%' . $page_name . '_mxp_frontend_editor_' . $media_type . '%\' AND `post_type` LIKE \'mxp-frontend-editor\'', OBJECT );
		}
		return $results;
	}

	public function mxp_frontend_editor_add_meta_box( $post ){
		add_meta_box( 'frontend_editor_meta_box', __( 'Frontend Editor', 'mxp-frontend-editor' ), array($this,'mxp_frontend_editor_meta_box'), 'page', 'normal', 'high' );
	}

    public function mxp_frontend_editor_meta_box($post){
        $text_elements = $this->getElementForPage($post->post_name, 'text');
        $image_elements = $this->getElementForPage($post->post_name, 'image');
        $video_elements = $this->getElementForPage($post->post_name, 'video');
        ?>
        <p>These are the frontend elements present in this page</p>
        <table class="widefat">
            <tbody>
            <thead>
            <th>Texts</th>
            <th>Images</th>
            <th>Videos</th>
            <th></th>
            </thead>
                <tr>
                    <td><?php echo count($text_elements); ?></td>
                    <td><?php echo count($image_elements); ?></td>
                    <td><?php echo count($video_elements); ?></td>
                    <td style="width: 100px;"><a class="button button-primary button-large" href="<?php echo get_permalink($_GET['post']); ?>" target="_blank">Edit with frontend editor</a></td>
                </tr>
            </tbody>
        </table>
        <?php
    }

}
