<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       asd
 * @since      1.0.0
 *
 * @package    Blog_Plugin
 * @subpackage Blog_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blog_Plugin
 * @subpackage Blog_Plugin/admin
 * @author     asd <sad>
 */
class Blog_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
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
		 * defined in Blog_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blog_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/blog-plugin-admin.css', array(), $this->version, 'all' );

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
		 * defined in Blog_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Blog_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/blog-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function check_mxp_blog_version() {


		if ( empty( get_option( 'musexpress_blog_version' ) ) || get_option( 'musexpress_blog_version' ) != MUSEXPRESS_BLOG_PLUGIN_VERSION ) {
			require_once MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_PATH . 'includes/class-blog-plugin-activator.php';
			Blog_Plugin_Activator::activate();
		}

	}



	public function musexpress_blog_page_settings(){

		$page_settings = get_option( 'mxp_blog_page_settings' );



		foreach ( $page_settings as $settings_name => $settings ) {

			$page_settings[ $settings_name ]['value'] = $_POST['mxp_page_settings'][ $settings_name ];

		}

		update_option( 'mxp_blog_page_settings', $page_settings );

		//Setta la pagina articoli
		$blog_page = get_page_by_path( get_option( 'mxp_blog_page_settings' )['archive_page']['value'] );
		if ( isset( $blog_page ) ) {
			update_option( 'page_for_posts', $blog_page->ID );

			if ( $blog_page->post_title == 'index' ) {
				update_option( 'show_on_front', 'posts' );
			} else {
				update_option( 'show_on_front', 'page' );
			}

		}

		update_option( 'mxp_blog_page_saved', true );


	}

	public function musexpress_add_blog_page_settings($options){

		return array_merge($options, get_option('mxp_blog_page_settings',true));

	}

	public function musexpress_blog_template_create( $page_parse, $additional_args) {

		require_once MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_PATH . 'admin/class-blog-page-converter.php';


		$page_name = $additional_args['page_name'];
		$base_theme_root_path = $additional_args['base_theme_root_path'];
		$user_theme_root_path = $additional_args['user_theme_root_path'];
		$matches = $additional_args['matches'];

		$page_converter = new Blog_Page_Converter( $page_parse, $base_theme_root_path, $user_theme_root_path, $page_name ,$matches );

		$page_converter->create_template();

	}

	public function main_blog_category_add_meta_box( $post ){
	    add_meta_box( 'main_blog_category_meta_box', __( 'Main Category', 'blog-plugin' ), array($this,'main_blog_category_build_meta_box'), 'post', 'side', 'high' );
    }

    public function main_blog_category_build_meta_box( $post ) {
	    wp_nonce_field( basename( __FILE__ ), 'main_blog_category_meta_box_nonce' );
	    $current_main_category = get_post_meta( $post->ID, '_mxp_main_blog_category', true );

	    wp_dropdown_categories( array( 'show_option_none' => __('No Main Category','blog-plugin'), 'include' => wp_get_post_categories( $post->ID ),
        'selected' => $current_main_category , 'name' => 'mxp_blog_main_cat') );


    }

    public function main_blog_category_save_meta_boxes_data( $post_id ){
	    if ( !isset( $_POST['main_blog_category_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['main_blog_category_meta_box_nonce'], basename( __FILE__ ) ) ){
		    return;
	    }
	    if(isset($_REQUEST['mxp_blog_main_cat'])){
		    update_post_meta( $post_id, '_mxp_main_blog_category', $_REQUEST['mxp_blog_main_cat'] );

	    }



    }

	public function mxp_featured_post_add_meta_box( $post ){
		add_meta_box( 'mxp_featured_posts_meta_box', __( 'Featured Post', 'blog-plugin' ), array($this,'mxp_featured_post_build_meta_box'), 'post', 'side', 'high' );


	}

	public function mxp_featured_post_build_meta_box( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'mxp_featured_post_meta_box_nonce' );

		$checked = get_post_meta( $post->ID, '_mxp_featured_post', true ) ? 1 : 0;


        ?>
        <label for="mxp_featured_post"><?php _e('Featured?','blog-plugin'); ?></label>
        <input type="checkbox" name="mxp_featured_post" value="1" <?php echo checked( 1, $checked, true ); ?>/>

<?php
	}

	public function mxp_featured_post_save_meta_boxes_data( $post_id ){
		if ( !isset( $_POST['mxp_featured_post_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['mxp_featured_post_meta_box_nonce'], basename( __FILE__ ) ) ){
			return;
        }
		if(isset($_POST['mxp_featured_post'])){
			update_post_meta( $post_id, '_mxp_featured_post', true );
		}else{
			update_post_meta( $post_id, '_mxp_featured_post', false );
        }



	}

	public function lock_blog_category_pages(){

		$pages = get_pages();


		$pages_to_private = array();

		foreach ($pages as $page){

			if(strpos($page->post_title,'blog_')!==false){

				array_push($pages_to_private,$page);
			}
		}



		foreach ($pages_to_private as $page){

			wp_update_post(array('ID'    =>  $page->ID, 'post_status'   =>  'private'));

		}


	}

	public function blog_settings_add_section($sections){

		array_push($sections,'blog');

		return $sections;

	}

	public function blog_settings_show_form($selected_section){

		if($selected_section==='blog'){
			include plugin_dir_path(__FILE__).'/partials/blog-settings-loader.php';
		}

	}

	public function blog_settings_save($form_data){

        if(isset($form_data['selected_section'])){
            if($form_data['selected_section']==='blog'){
                $this->blog_post_excerpt_settings_save($form_data);
                $this->blog_archive_title_settings_save($form_data);
            }
        }
	}

	function blog_post_excerpt_settings_save($form_data){

            if(isset($form_data['mxp_posts_excerpt_lenght'])){
                update_option('mxp_posts_excerpt_lenght',$form_data['mxp_posts_excerpt_lenght']);
            }
		if(isset($form_data['mxp_posts_excerpt_more'])){
			update_option('mxp_posts_excerpt_more',$form_data['mxp_posts_excerpt_more']);
		}

	}

	function blog_archive_title_settings_save($form_data){

		if(isset($form_data['mxp_blog_archive_title'])) {
			update_option('mxp_blog_archive_title',$form_data['mxp_blog_archive_title']);
		}
		if(isset($form_data['mxp_blog_category_title'])) {
			update_option('mxp_blog_category_title',$form_data['mxp_blog_category_title']);
		}
		if(isset($form_data['mxp_blog_tag_title'])) {
			update_option('mxp_blog_tag_title',$form_data['mxp_blog_tag_title']);
		}
		if(isset($form_data['mxp_blog_author_title'])) {
			update_option('mxp_blog_author_title',$form_data['mxp_blog_author_title']);
		}

    }




}
