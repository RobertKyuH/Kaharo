<?php
/**
 * Handles the tab General
 * @since 3.2.0
 */

$selected_section = isset($_REQUEST['section']) ? $_REQUEST['section'] : 'general'; ?>
<?php do_action('musexpress_general_settings_save', $_POST); ?>
<?php

$sections = array();

$sections = apply_filters('musexpress_general_settings_sections',$sections);

?>
<style>
	.form-table label{
		font-weight: bold;
	}
</style>
<ul class="subsubsub">
	<?php foreach ($sections as $section) :?>
		<li><a href="?page=musexpress&tab=general&section=<?php echo $section; ?>" class="<?php echo $selected_section===$section ? 'current' : ''; ?>"><?php echo ucfirst(str_replace('-',' ',$section)); ?></a> | </li>
	<?php endforeach; ?>
</ul>

<br class="clear">
<div class="mxp_wrap">

	<form method="post" action="">
		<input type="hidden" name="selected_section" value="<?php echo $selected_section; ?>">


		<?php do_action('musexpress_general_settings_form_content',$selected_section); ?>

		<p>
			<input type="submit" value="<?php _e('Save Changes','musexpress'); ?>" class="button button-primary button-large">
		</p>
	</form>
</div>
