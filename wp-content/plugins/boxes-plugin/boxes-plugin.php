<?php
/*
Plugin Name:       MusexPress Boxes
Plugin URI:        https://www.musegain.com/adobe-muse/boxes/
Description:       Managing the contents of your Muse pages with a CMS has never been so easy
Version:           1.0.2
Author:            MuseGain.com
Author URI:        http://www.musegain.com
License:           MuseGain.com
License URI:       http://www.musegain.com/terms-conditions-of-use/
Documentation URI: https://www.musegain.com/documentation/boxes/
Text Domain:       boxes-plugin
Domain Path:       /languages

All the products on Musegain.com are copyrighted and are the properties of
Eclipse s.r.l.

You acknowledge that by Your download the ownership of MusexPress
(and/or its plugins) does not get transferred to You and You must not claim
that it is Yours.

What You get includes an ongoing, non-exclusive, non transferable, worldwide
license to use the plugins on the terms and conditions available here
http://www.musegain.com/terms-conditions-of-use/ . Please read them carefully,
any violation will not be tolerated.
*/


/**
 *
 */
function create_post_type() {
        register_post_type( 'mxp_box',
          array(
            'labels' => array(
              'name' => __( 'Boxes', 'boxes-plugin' ),
              'singular_name' => __( 'Box', 'boxes-plugin' )
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon'   => plugin_dir_url(__FILE__).'icona-boxes.png',
            'exclude_from_search' => true,
            'show_in_nav_menus' => false,
          )
        );
    }
add_action( 'init', 'create_post_type' );

/**
 *
 */
function change_post_type_labels() {
  global $wp_post_types;

  // Get the post labels
  $postLabels = $wp_post_types['mxp_box']->labels;
  $postLabels->name = 'Boxes';
  $postLabels->singular_name = 'Box';
  $postLabels->add_new = 'Add New Box';
  $postLabels->add_new_item = 'Add Box';
  $postLabels->edit_item = 'Edit Boxes';
  $postLabels->new_item = 'Boxes';
  $postLabels->view_item = 'View Box';
  $postLabels->search_items = 'Search Boxes';
  $postLabels->not_found = 'No Boxes found';
  $postLabels->not_found_in_trash = 'No Boxes found in Trash';
}
add_action( 'init', 'change_post_type_labels' );

/**
 * @param $bulk_actions
 *
 * @return mixed
 */
function register_pages_to_boxes_actions( $bulk_actions ) {
	$bulk_actions['pages_to_boxes'] = __( 'Move to Boxes', 'musexpress' );

	return $bulk_actions;
}

add_filter( 'bulk_actions-edit-page', 'register_pages_to_boxes_actions' );

/**
 * @param $redirect_to
 * @param $doaction
 * @param $post_ids
 *
 * @return string
 */
function pages_to_boxes_action_handler( $redirect_to, $doaction, $post_ids ) {
	if ( $doaction !== 'pages_to_boxes' ) {
		return $redirect_to;
	}
	foreach ( $post_ids as $post_id ) {
		global $wpdb;
		$table_wp_posts = $wpdb->posts;
		$wpdb->query( "UPDATE {$table_wp_posts} SET post_type='mxp_box' WHERE ID='{$post_id}'" );
	}
	$redirect_to = add_query_arg( 'bulk_pages_to_boxes', count( $post_ids ), $redirect_to );

	return $redirect_to;
}

add_filter( 'handle_bulk_actions-edit-page', 'pages_to_boxes_action_handler', 10, 3 );

/**
 *
 */
function pages_to_boxes_action_admin_notice() {
	if ( ! empty( $_REQUEST['bulk_pages_to_boxes'] ) ) {
		$moved_count = intval( $_REQUEST['bulk_pages_to_boxes'] );
		printf( '<div id="message" class="updated fade">' .
		        _n( 'Moved %s page to boxes.',
			        'Moved %s pages to boxes.',
			        $moved_count,
			        'pages_to_boxes'
		        ) . '</div>', $moved_count );
	}
}

add_action( 'admin_notices', 'pages_to_boxes_action_admin_notice' );

/**
 * @param $bulk_actions
 *
 * @return mixed
 */
 function register_boxes_to_pages_actions( $bulk_actions ) {
	$bulk_actions['boxes_to_pages'] = __( 'Move to Pages', 'musexpress' );

	return $bulk_actions;
}
add_filter( 'bulk_actions-edit-mxp_box', 'register_boxes_to_pages_actions' );

/**
 * @param $redirect_to
 * @param $doaction
 * @param $post_ids
 *
 * @return string
 */
 function boxes_to_pages_action_handler( $redirect_to, $doaction, $post_ids ) {
	if ( $doaction !== 'boxes_to_pages' ) {
		return $redirect_to;
	}
	foreach ( $post_ids as $post_id ) {
		global $wpdb;
		$table_wp_posts = $wpdb->posts;
		$wpdb->query( "UPDATE {$table_wp_posts} SET post_type='page' WHERE ID='{$post_id}'" );
	}
	$redirect_to = add_query_arg( 'bulk_boxes_to_pages', count( $post_ids ), $redirect_to );

	return $redirect_to;
}


add_filter( 'handle_bulk_actions-edit-mxp_box', 'boxes_to_pages_action_handler', 10, 3 );


/**
 *
 */
function boxes_to_pages_action_admin_notice() {
	if ( ! empty( $_REQUEST['bulk_boxes_to_pages'] ) ) {
		$moved_count = intval( $_REQUEST['bulk_boxes_to_pages'] );
		printf( '<div id="message" class="updated fade">' .
		        _n( 'Moved %s box to pages.',
			        'Moved %s boxes to pages.',
			        $moved_count,
			        'boxes_to_pages'
		        ) . '</div>', $moved_count );
	}
}

add_action( 'admin_notices', 'boxes_to_pages_action_admin_notice' );





