<?php
/**
 * Handles the settings page
 * @since 3.2.0
 */

use MusexPress\i18n\i18n;

function musexpress_panel_settings_display() { ?>
	<?php
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$tabs_headers = array(
		'musegain_id' => 'MuseGain <strong>ID</strong>',
		'page_settings' => 'Page <strong>Settings</strong>',
		'page_converter' => 'Converter <strong>Settings</strong>',
	);

	$tabs_description = array(
		'musegain_id' => __('Validate the mail you used for your subscription\'s purchase on <strong>MuseGain.com</strong>',i18n::$textdomain),
		'page_settings' => __('For each page below you have to select the related page of your <strong>Muse</strong> project',i18n::$textdomain),
		'page_converter' => __('Use the settings below if you need to enable specific options in the conversion process',i18n::$textdomain),
	);

	?>
	<div class="wrap mxp">
		<?php $active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'musegain_id'; ?>
        <div style="width: 100%;text-align: center" id="musexpress-header">
            <img class="mxp_logo"
                 src="<?php echo musexpress()->assets_folder_url . 'img/musexpress-dashboard.png'; ?>">
            <div class="mxp_header"><?php echo $tabs_headers[$active_tab]; ?></div>
            <div class="mxp_header subdescription"><?php echo $tabs_description[$active_tab]; ?></div>
        </div>
		<h2 class="nav-tab-wrapper">
			<a href="?page=musexpress_settings&amp;tab=musegain_id"
			   class="nav-tab <?php echo $active_tab == 'musegain_id' ? 'nav-tab-active' : '' ?>"><i class="fas fa-id-card"></i>MuseGain ID</a>
			<a href="?page=musexpress_settings&amp;tab=page_settings"
			   class="nav-tab <?php echo $active_tab == 'page_settings' ? 'nav-tab-active' : '' ?>"><i class="fas fa-cog"></i>Page Settings</a>
			<a href="?page=musexpress_settings&amp;tab=page_converter"
			   class="nav-tab <?php echo $active_tab == 'page_converter' ? 'nav-tab-active' : '' ?>"><i class="fas fa-sync"></i>Converter Settings</a>
		</h2>
		<form action="" method="post">
			<?php
			switch ( $active_tab ) {
				case 'musegain_id':
					?>
					<h3>MuseGain ID Settings</h3>
					<p>To enable <i>"MusexPress"</i> automatic updates you should verify your <i>"MuseGain ID"</i>.</p>
					<table class="form-table">
						<tr>
							<th>
								<label for="musegain-id">MuseGain ID</label>
							</th>
							<td>
								<?php $musegain_id = get_option( 'musegain_id' ); ?>
								<input type="text" name="musegain_id" value="<?php echo $musegain_id ?>" class="regular-text"
								       id="musegain-id">
								<?php if ( empty( $musegain_id ) ): ?>
									<?php wp_nonce_field( 'verify_musegain_id_nonce', 'nonce', false ); ?>
									<input type="hidden" name="musexpress_action" value="verify_musegain_id">
									<?php submit_button( 'Verify your ID', 'primary', 'verify_musegain_id', false ); ?>
								<?php else: ?>
									<?php wp_nonce_field( 'delete_musegain_id_nonce', 'nonce', false ); ?>
									<input type="hidden" name="musexpress_action" value="delete_musegain_id">
									<?php submit_button( 'Delete your ID', 'delete', 'delete_musegain_id', false ); ?>
								<?php endif; ?>
								<p class="description">The ID is your registration email on <a
										href="http://www.musegain.com">MuseGain.com</a></p>
							</td>
						</tr>
					</table>
					<?php
					break;
				case 'page_settings':
					$page_settings = apply_filters('musexpress_page_settings_option',get_option( 'mxp_page_settings' ));

					$args = array(
						'sort_order'   => 'asc',
						'sort_column'  => 'post_title',
						'hierarchical' => 1,
						'exclude'      => '',
						'include'      => '',
						'meta_key'     => '',
						'meta_value'   => '',
						'authors'      => '',
						'child_of'     => 0,
						'parent'       => - 1,
						'exclude_tree' => '',
						'number'       => '',
						'offset'       => 0,
						'post_type'    => 'page',
						'post_status'  => 'publish'
					);

					$pages = get_pages( $args );

					?>

					<h3>Page Settings</h3>
					<p>These pages need to be set to ensure your site functionality.</p>
					<table class="form-table">
						<?php foreach ( $page_settings as $settings_name => $settings ): ?>

							<tr>
								<th>
									<label for="<?php echo $settings_name ?>"><?php echo $settings['label'] ?></label>
								</th>
								<td>
									<fieldset>
										<select name="mxp_page_settings[<?php echo $settings_name ?>]"
										        id="<?php echo $settings_name ?>">
											<option value=" ">
												<?php echo esc_attr( __( 'Select page' ) ); ?></option>
											<?php
											foreach ( $pages as $page ) {
												$option = '<option value="' . $page->post_name . '"';
												if ( $page->post_name === $settings['value'] ) {
													$option .= 'selected="selected"';
												}
												$option .= '>';
												$option .= $page->post_title;

												$option .= '</option>';
												echo $option;
											}
											?>
										</select>
									</fieldset>
								</td>
							</tr>

						<?php endforeach; ?>
					</table>

					<p class="submit">
						<?php wp_nonce_field( 'update_page_settings_nonce', 'nonce', false ); ?>
						<input type="hidden" name="musexpress_action" value="update_page_settings">
						<?php submit_button( 'Save Changes', 'primary', 'update_page_settings', false ); ?>
					</p>

					<?php
					break;

				case 'page_converter':
					$page_converter_settings = apply_filters('musexpress_page_converter_settings_option',get_option( 'page_converter_settings' ));
					?>
					<h3>Page Converter Settings</h3>
					<p>We suggest using this default configuration.</p>
					<table class="form-table">
						<?php foreach ( $page_converter_settings as $settings_name => $settings ): ?>
							<tr>
								<th>
									<label for="<?php echo $settings_name ?>"><?php echo $settings['label'] ?></label>
								</th>
								<td>
									<fieldset>
										<input type="checkbox"
										       name="page_converter_settings[<?php echo $settings_name ?>]"
										       id="<?php echo $settings_name ?>" <?php echo checked( 1, $settings['value'], false ); ?>>
										<span class="description"><?php echo $settings['description'] ?></span>
									</fieldset>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
					<p class="submit">
						<?php wp_nonce_field( 'update_page_converter_settings_nonce', 'nonce', false ); ?>
						<input type="hidden" name="musexpress_action" value="update_page_converter_settings">
						<?php submit_button( 'Save Changes', 'primary', 'update_page_converter_settings', false ); ?>
					</p>
					<?php
					break;
			}
			?>
		</form>
	</div>
<?php }