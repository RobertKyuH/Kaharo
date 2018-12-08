<?php


class Blog_Plugin_Activator {


	public static function activate() {



		if(!is_plugin_active('musexpress/musexpress.php')){
			wp_die('To use this plugin you need MusexPress.','Musexpress Not active', array( 'back_link' => true) );
		}


		add_option( 'mxp_blog_page_saved' , false );

		if(MUSEXPRESS_BLOG_UPDATE_DB){
			update_option('mxp_blog_page_settings', array(

				'archive_page' => array(
					'label' => 'Posts List Page',
					'value' => 'post_list'
				),
				'post_page'    => array(
					'label' => 'Single Post Page',
					'value' => 'post'
				),

			));
		}else{
			add_option('mxp_blog_page_settings', array(

				'archive_page' => array(
					'label' => 'Posts List Page',
					'value' => 'post_list'
				),
				'post_page'    => array(
					'label' => 'Single Post Page',
					'value' => 'post'
				),

			));
		}

		add_option( 'mxp_posts_excerpt_lenght', 55 );
		add_option( 'mxp_posts_excerpt_more', '[...]' );


		update_option( 'musexpress_blog_version', MUSEXPRESS_BLOG_PLUGIN_VERSION );




	}

}
