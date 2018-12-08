<?php
/**
 * Shows the option to enable Admin Bar
 * @since 3.2.0
 */

use MusexPress\Features\Admin_Bar;
?>
<h3><?php _e( 'Admin Bar Options', \MusexPress\i18n\i18n::$textdomain ); ?></h3>

<table class="form-table">
	<tr>
        <th>
	        <?php Admin_Bar::print_label(); ?>
        </th>
		<td>
			<?php Admin_Bar::print_option(); ?>
			<?php Admin_Bar::print_description(); ?>
		</td>
	</tr>
</table>
