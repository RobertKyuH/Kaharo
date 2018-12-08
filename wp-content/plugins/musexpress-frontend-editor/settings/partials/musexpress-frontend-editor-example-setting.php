<!--TODO: fare traduzione POT-->
<h3><?php _e('Frontend Editor Options','musexpress-frontend_editor'); ?></h3>

<table class="form-table">
	<tr>
		<td>
			<label for="musexpress_frontend_editor_example_setting"><?php _e('Overwrite contents','musexpress-frontend_editor'); ?></label>
		</td>
		<td>
            <input type="checkbox" value="1" <?php checked( $plugin_settings['overwrite_on_conversion'], true ); ?> name="musexpress_frontend_editor_settings" />
		</td>
		<td>
			<?php _e('If checked all of your website contents (text and images) will be overwritten by Muse project contents','musexpress-frontend_editor'); ?>
		</td>
	</tr>
</table>