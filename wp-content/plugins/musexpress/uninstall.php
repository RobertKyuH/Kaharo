<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'musegain_id' );
delete_option( 'page_converter_settings' );
delete_option( 'musexpress_version' );
delete_option( 'mxp_page_settings' );