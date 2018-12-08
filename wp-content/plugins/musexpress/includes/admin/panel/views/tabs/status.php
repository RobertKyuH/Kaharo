<?php
/**
 * Handles the tab Status
 * @since 3.2.0
 */
use MusexPress\System\System_Status as SystemStatus;

?>
<div class="mxp_wrap">
    <table class="wc_status_table widefat" cellspacing="0">
        <thead>
        <tr>
            <th colspan="3"><h2><?php _e( 'Server directives', 'musexpress' ); ?></h2></th>
        </tr>
        </thead>
        <tbody>
		<?php if ( function_exists( 'apache_get_version' ) ) : ?>
            <tr>
                <td><?php _e( 'Server info', 'musexpress' ); ?>:</td>
                <td><?php echo apache_get_version(); ?></td>
            </tr>
		<?php endif; ?>
        <tr>
            <td><?php _e( 'PHP version', 'musexpress' ); ?>:</td>
            <td><?php
				if ( ! SystemStatus::can_run_musexpress() ) {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . esc_html( phpversion() ) . __( 'Minimuum Php version required is 5.6', 'musexpress' ) . '</mark>';
				} else {
					echo '<mark class="yes">' . esc_html( phpversion() ) . '</mark>';
				}
				?>
            </td>
        </tr>
		<?php if ( function_exists( 'ini_get' ) ) : ?>
            <tr>
                <td><?php _e( 'PHP post max size', 'musexpress' ); ?>:</td>
                <td><?php $post_max_size = ini_get( 'post_max_size' );
					if ( SystemStatus::string_to_bytes( $post_max_size ) < SystemStatus::string_to_bytes( '4M' ) ) {
						echo esc_html( $post_max_size ) . '</td><td><mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( ' Post Max size needs to be higher than 4M', 'musexpress' ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $post_max_size ) . '</mark>';
					}
					?></td>
            </tr>
            <tr>
                <td><?php _e( 'PHP upload max filesize', 'musexpress' ); ?>:</td>
                <td><?php $upload_max_size = ini_get( 'upload_max_filesize' );
					if ( SystemStatus::string_to_bytes( $upload_max_size ) < SystemStatus::string_to_bytes( '4M' ) ) {
						echo esc_html( $upload_max_size ) . '</td><td><mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( ' Upload Max filesize needs to be higher than 4M', 'musexpress' ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $upload_max_size ) . '</mark>';
					}
					?></td>
            </tr>
            <tr>
                <td><?php _e( 'PHP time limit', 'musexpress' ); ?>:</td>
                <td><?php $max_execution_time = ini_get( 'max_execution_time' );
					if ( $max_execution_time < 60 ) {
						echo esc_html( $max_execution_time ) . '</td><td><mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( ' Max execution time should be over 60', 'musexpress' ) . '</mark>';
					} else {
						echo '<mark class="yes">' . esc_html( $max_execution_time ) . '</mark>';
					}
					?></td>
            </tr>
			<?php if ( ! empty( ini_get( 'short_open_tag' ) ) ) : ?>
                <tr>
                    <td><?php _e( 'PHP short open tags', 'musexpress' ); ?>:</td>
                    <td><?php $short_open_tags = ini_get( 'short_open_tag' );
						if ( $short_open_tags == 'On' || $short_open_tags == '1' ) {
							echo esc_html( $short_open_tags ) . '</td><td><mark class="warning"><span class="dashicons dashicons-warning"></span> ' . __( ' Short Open Tags should be Off or 0 to ensure xml compatibility', 'musexpress' ) . '</mark>';
						} else {
							echo '<mark class="yes">' . esc_html( $short_open_tags ) . '</mark>';
						}
						?>
                    </td>
                </tr>
			<?php endif; ?>
            <tr>
                <td><?php _e( 'WP_Debug', 'musexpress' ); ?>:</td>
                <td><?php
					if ( WP_DEBUG ) {
						echo '<mark class="warning"><span class="dashicons dashicons-warning"></span> ' . __( ' WP_Debug should not be set on true on production environment', 'musexpress' ) . '</mark>';
					} else {
						echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
					}
					?></td>
            </tr>
            <tr>
                <td><?php _e( 'PHP remote post', 'musexpress' ); ?>:</td>
                <td><?php
					if ( ! SystemStatus::can_do_post_response() ) {
						echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . __( ' Remote Post check failed', 'musexpress' ) . '</mark>';
					} else {
						echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
					}
					?>
                </td>
            </tr>
		<?php endif; ?>

        </tbody>
    </table>

    <table class="wc_status_table widefat" cellspacing="0">
        <thead>
        <tr>
            <th colspan="3"><h2><?php _e( 'Server modules', 'musexpress' ); ?></h2></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php _e( 'Multibyte string', 'musexpress' ); ?>:</td>
            <td><?php
				if ( extension_loaded( 'mbstring' ) ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span> ' . sprintf( __( 'Your server does not support the %s functions - this is required for better character encoding.', 'musexpress' ), '<a href="https://php.net/manual/en/mbstring.installation.php">mbstring</a>' ) . '</mark>';
				} ?>
            </td>
        </tr>
        <tr>
            <td><?php _e( 'Zip', 'musexpress' ); ?>:</td>
            <td><?php
				if ( extension_loaded( 'zip' ) ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span></mark>';
				} ?>
            </td>
        </tr>
        <tr>
            <td><?php _e( 'MySQLi', 'musexpress' ); ?>:</td>
            <td><?php
				if ( extension_loaded( 'mysqli' ) ) {
					echo '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>';
				} else {
					echo '<mark class="error"><span class="dashicons dashicons-warning"></span></mark>';
				} ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>