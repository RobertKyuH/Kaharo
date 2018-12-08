<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 31/12/2017
 * Time: 10:24
 */

namespace MusexPress\Ajax;

/**
 * Class Ajax: manages ajax actions
 * @package MusexPress\Ajax
 */
class Ajax {

	/**
	 * Script that retrives Admin notices from transient
     * @since 3.2.0
	 */
	public function ajax_notices() {
		?>
		<script type="text/javascript" >
            jQuery(document).ready(function($) {

                var data = {
                    'action': 'musexpress_notices'
                };

                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                jQuery.post(ajaxurl, data, function (response) {
                    if(jQuery('#musexpress-header').length>0)
                    jQuery('#musexpress-header').after(response);
                    else{
                        jQuery(jQuery('.wrap')[0]).prepend(response);
                    }
                });
            }
            );
		</script> <?php
	}

	/**
	 * Consumes MusexPress admin notices from the transient
     * @since 3.2.0
	 */
	public function musexpress_notices(){

		echo get_transient('musexpress_notices');
		set_transient('musexpress_notices','');
		wp_die();

	}

}