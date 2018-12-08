<?php
/**
 * Created by IntelliJ IDEA.
 * User: Pietro Falco
 * Date: 02/08/2017
 * Time: 15:10
 */

function mxp_get_page_by_slug( $page_slug, $output = OBJECT, $post_type = 'page' ) {
	global $wpdb;
	$page_slug = sanitize_title($page_slug);
	if ( is_array( $post_type ) ) {
		$post_type = esc_sql( $post_type );
		$post_type_in_string = "'" . implode( "','", $post_type ) . "'";
		$sql = $wpdb->prepare( "
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type IN ($post_type_in_string)
		", $page_slug );
	} else {
		$sql = $wpdb->prepare( "
			SELECT ID
			FROM $wpdb->posts
			WHERE post_name = %s
			AND post_type = %s
		", $page_slug, $post_type );
	}
	$page = $wpdb->get_var( $sql );
	if ( $page )
		return get_post( $page, $output );
	return null;
}
