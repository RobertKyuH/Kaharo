<?php use MusexPress\Features\Coming_Soon;
use MusexPress\i18n\i18n; ?>

<h3><?php _e( 'Coming Soon Mode', i18n::$textdomain ); ?></h3>
<table class="form-table">
    <?php Coming_Soon::print_options_form(); ?>
</table>