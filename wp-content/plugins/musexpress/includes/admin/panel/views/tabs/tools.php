<?php

/**
 * Handles the tab Tools
 * @since 3.2.0
 */

use MusexPress\Messages\Message;
use MusexPress\System\File_System as FS;
use MusexPress\Theme\Theme;
use MusexPress\Utilities\Wp_Utilities;

if (isset($_POST['tool_action'])){

	$action = $_POST['tool_action'];
	switch ( $action ) {
		case 'clear_user_theme_files':
			$theme_path = Theme::get_user_theme_folder_path();
			FS::delete_dir( $theme_path );
			FS::create_dir( $theme_path );
			Message::print_admin_notice( 'User Theme deleted! Reconvert again your pages', 'success', true );
			break;
		case 'move_muse_files':
			Theme::move_muse_files_to_upload_folder();
			break;
		case 'reg_htaccess':
			Wp_Utilities::regenerate_htaccess();
			Message::print_admin_notice( '.htaccess generated successfully', 'success', true );
			break;
		case 'reg_index':
			Wp_Utilities::restore_index();
			Message::print_admin_notice( 'WordPress original index.php restored successfully', 'success', true );
			break;
	}

}

?>
<style>
    span{
        vertical-align: middle;
    }
    .widefat td, .widefat th {
        padding: 25px 10px!important;
    }
    .widefat th{
        font-weight: bold!important;
    }
</style>
<div class="mxp_wrap">
	<?php Message::print_admin_notice( 'If you don\'t know what the options below are, please use them only when required by our Support team', 'error', false ); ?>
    <table class="mxp_status_table widefat striped" cellspacing="0">
        <tbody class="tools">
        <tr>
            <th>Clear User Theme</th>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="tool_action" value="clear_user_theme_files">
                    <button class="button" type="submit">Clear User Theme files</button>
                    <span class="description">This tool will clear the musexpress user theme files.</span>
                </form>
            </td>
        </tr>
        <?php if(extension_loaded('simplexml')) : ?>
        <tr>
            <th>Move Muse File</th>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="tool_action" value="move_muse_files">
                    <button class="button" type="submit">Move Muse files</button>
                    <span class="description">Moves muse file uploaded in the root of the server.</span>
                </form>
            </td>
        </tr>
        <?php endif; ?>
        <tr>
                <th>Regenerate .htaccess</th>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="tool_action" value="reg_htaccess">
                        <button class="button" type="submit">Regenerate</button>
                        <span class="description">Regenerates .htaccess file if needed.</span>
                    </form>
                </td>
        </tr>
        <tr>
            <th>Restore original WordPress index.php</th>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="tool_action" value="reg_index">
                    <button class="button" type="submit">Restore</button>
                    <span class="description">Restores WordPress original index.php file.</span>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>