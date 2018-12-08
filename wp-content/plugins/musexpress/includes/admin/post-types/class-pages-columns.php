<?php
/**
 * Created by PhpStorm.
 * User: sydre
 * Date: 01/02/2018
 * Time: 21:33
 */

namespace MusexPress\Admin\Post_Types;


use MusexPress\i18n\i18n;

class Pages_Columns {

	/**
	 * Adds Type to each page to better distinguish between Muse created Pages and WordPress ones
	 *
	 * @param $column_name
	 * @param $post_id
	 *
	 * @since 3.2.2
	 */
	public function custom_page_column_content( $column_name, $post_id ) {
		$slug = get_page_template_slug( $post_id );
		if ( $column_name == 'page-type' ) {
			if ( strpos( $slug, 'mxp_theme/phone/' ) !== false ) {
				echo '<i class="fas fa-phone fa-fw fa-lg"></i>' . __( 'Phone', i18n::$textdomain );
			} elseif ( strpos( $slug, 'mxp_theme/tablet/' ) !== false ) {
				echo '<i class="fas fa-tablet-alt fa-fw fa-lg"></i>' . __( 'Tablet', i18n::$textdomain );
			}elseif ( strpos( $slug, 'mxp_theme' ) !== false){
				echo '<i class="fas fa-desktop fa-fw fa-lg"></i>' . __( 'Desktop', i18n::$textdomain );
			}else{
				echo '<i class="fab fa-wordpress fa-fw fa-lg"></i>' . __( 'WordPress', i18n::$textdomain );
			}
		}

	}

	/**
	 * Adds Type Column
	 *
	 * @param $columns
	 *
	 * @return mixed
	 *
	 * @since 3.2.2
	 */
	public function type_pages_column( $columns ) {
		$columns['page-type'] = __( 'Type', i18n::$textdomain );

		return $columns;
	}

}