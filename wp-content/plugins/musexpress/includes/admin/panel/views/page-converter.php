<?php
/**
 * Handles the page converter page
 * @since 3.2.0
 */

use MusexPress\Converter\Conversion_Logger;
use MusexPress\i18n\i18n;
use MusexPress\Messages\Message;
use MusexPress\Theme\Theme;

function musexpress_page_converter_display() { ?>
    <div class="wrap mxp">
        <div style="width: 100%;text-align: center" id="musexpress-header">
            <img class="mxp_logo"
                 src="<?php echo musexpress()->assets_folder_url . 'img/musexpress-dashboard.png'; ?>">
            <div class="mxp_header">MusexPress <strong>Pages Converter</strong></div>
            <div class="mxp_header subdescription"><?php echo _e( "Select the <strong>Muse</strong> pages from the list below to convert and sync them with <strong>WordPress</strong>", i18n::$textdomain ); ?></div>
        </div>

        <div id="result"></div>
        <form action="" method="post">
			<?php
			$pages_by_category = Theme::get_pages_in_upload_folder();
			if ( ! Theme::has_uploaded_pages() ) {
				if ( Theme::has_uploaded_pages_on_server_root() ) {
					Message::print_admin_notice( "We found wrong files on the server root! Don't forget that you need to upload files in the <strong>mxp_theme</strong> folder!", "error", "true" );
				} else {
					Message::print_admin_notice( "Seems you still didn't upload any page! Don't forget that you need to upload files in the <strong>mxp_theme</strong> folder!", "info", "true" );
				}
			}

			?>
			<?php foreach ( $pages_by_category as $category => $content ): ?>
                <h2><i class="fas fa-<?php echo $category; ?>"></i><?php echo ucfirst( $category ); ?> Pages</h2>
				<?php
				$pages_count = count( $content );
				?>
				<?php if ( $pages_count > 0 ): ?>
                    <div class="tablenav">
                        <div class="tablenav-pages one-page">
                            <span class="displaying-num"><?php echo $pages_count . ' page' . ( $pages_count > 1 ? 's' : null ); ?> <i class="fas fa-file-alt"></i> </span>
                        </div>
                    </div>
				<?php endif; ?>
                <table class="widefat fixed striped">
                    <thead>
                    <tr>
                        <td class="check-column">
                            <input type="checkbox" onchange="checkSubmit()">
                        </td>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php if ( $pages_count === 0 ): ?>
                        <tr>
                            <td colspan="3">No <?php echo $category; ?> pages!</td>
                        </tr>
					<?php endif; ?>
					<?php for ( $index = 0; $index < $pages_count; $index ++ ): ?>
                        <tr>
							<?php

							$filename          = basename( $content[ $index ] );
							$page_id           = $category . "-" . ( $index + 1 );
							$style             = 'style="color:red;"';
							$conversion_logger = new Conversion_Logger();
							$converted         = $conversion_logger->is_page_already_converted( $content[ $index ], $category );
							if ( $converted ) {
								$style = 'style="color:green;"';
							}
							?>
                            <th class="check-column">
                                <input type="checkbox" name="musexpress_page_converter_<?php echo $category; ?>_pages[]"
                                       value="<?php echo $filename; ?>" id="<?php echo $page_id; ?>"
                                       onchange="checkSubmit()"
                                       class="mxp-pages">
                            </th>
                            <td class="column-title">
                                <strong>
                                    <label for="<?php echo $page_id; ?>" <?php echo isset( $style ) ? $style : null ?>><?php echo $filename ?></label>
                                </strong>
                            </td>
                            <td>
								<?php if ( $converted ): ?>
                                    <span>Already converted!</span>
								<?php else: ?>
                                    <span>Not converted yet!</span>
								<?php endif; ?>
                            </td>
                        </tr>
					<?php endfor; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td class="check-column">
                            <input type="checkbox" name="name" value="" onchange="checkSubmit()">
                        </td>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
				<?php if ( $pages_count > 0 ): ?>
                    <div class="tablenav">
                        <div class="tablenav-pages one-page">
                            <span class="displaying-num"><?php echo $pages_count . ' page' . ( $pages_count > 1 ? 's' : null ) ?> <i class="fas fa-file-alt"></i></span>
                        </div>
                    </div>
				<?php endif; ?>
			<?php endforeach; ?>
            <p class="submit mxp-converter-submit">
				<?php wp_nonce_field( 'musexpress_page_converter_nonce', 'nonce', false ); ?>
                <input type="hidden" name="musexpress_action" value="musexpress_page_converter">
				<?php submit_button( 'Convert', 'primary', 'musexpress_page_converter', false ); ?>
            </p>
        </form>
    </div>

    <script>
        function checkSubmit() {
            var $checkboxes = jQuery('input.mxp-pages:checked');
            if ($checkboxes.length == 0) {
                jQuery(':input[type="submit"]').prop('disabled', true);
            } else
                jQuery(':input[type="submit"]').prop('disabled', false);
        }

        jQuery(document).ready(function () {
            checkSubmit();
        });
    </script>

<?php }