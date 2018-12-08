<?php
/**
 * Prints Tabs System for dashboard Page
 * @since 3.2.0
 */
use MusexPress\i18n\i18n;

function musexpress_panel_dashboard() {

	$current_tab = ! empty( $_REQUEST['tab'] ) ? sanitize_title( $_REQUEST['tab'] ) : 'welcome';

	$tabs      = array(
		'welcome' => __( 'Welcome', i18n::$textdomain ),
		'plugins' => __( 'Extensions', i18n::$textdomain ),
		'general' => __( 'Extensions Settings', i18n::$textdomain ),
		'status'  => __( 'Status', i18n::$textdomain ),
		'tools'   => __( 'Tools', i18n::$textdomain ),

	);

	$icons = array(
	  'welcome' => 'home',
	  'general' => 'cogs',
	  'plugins' => 'plug',
	  'status'  => 'heartbeat',
	  'tools'   => 'wrench',

    );

	$tabs_headers = array(
		'welcome' => __('MusexPress <strong>Dashboard</strong>',i18n::$textdomain),
		'plugins' => __('MusexPress <strong>Extensions</strong>',i18n::$textdomain),
		'general' => __('Extensions <strong>Settings</strong>',i18n::$textdomain),
		'status'  => __('Server <strong>Status</strong>',i18n::$textdomain),
		'tools'   => __('MusexPress <strong>Tools</strong>',i18n::$textdomain),
    );

	$tabs_description = array(
		'welcome' => __('Find here a <strong>MusexPress overview</strong>',i18n::$textdomain),
		'plugins' => __('Explore all the <strong>available extensions</strong> for the MusexPress CMS',i18n::$textdomain),
		'general' => __('Set some <strong>advanced options</strong> for MusexPress and its plugins',i18n::$textdomain),
		'status'  => __('Take a quick look at your <strong>server status</strong>',i18n::$textdomain),
		'tools'   => __('This section is only for <strong>advanced users</strong>.',i18n::$textdomain),
    );

	$tabs = apply_filters( 'musexpress_admin_status_tabs', $tabs );
	?>
    <div class="wrap mxp">
        <div style="width: 100%;text-align: center" id="musexpress-header">
            <img class="mxp_logo"
                 src="<?php echo musexpress()->assets_folder_url . 'img/musexpress-dashboard.png'; ?>">
            <div class="mxp_header"><?php echo $tabs_headers[$current_tab]; ?></div>
            <div class="mxp_header subdescription"><?php echo $tabs_description[$current_tab]; ?></div>
        </div>
        <nav class="nav-tab-wrapper mxp-nav-tab-wrapper">
			<?php
			foreach ( $tabs as $name => $label ) {
				echo '<a href="?page=musexpress&tab=' . $name . '" class="nav-tab ';
				if ( $current_tab == $name ) {
					echo 'nav-tab-active';
				}
				echo '"><i class="fas fa-'.$icons[$name].'"></i>' . $label . '</a>';
			}
			?>
        </nav>
        <h1 class="screen-reader-text"><?php echo esc_html( $tabs[ $current_tab ] ); ?></h1>
		<?php
		$tabs_path = plugin_dir_path( __FILE__ ) . 'tabs/';
		switch ( $current_tab ) {
			case "welcome":
				include $tabs_path . 'welcome.php';
				break;
			case "general":
				include $tabs_path . 'general-settings.php';
				break;
			case "plugins":
				include $tabs_path . 'plugins.php';
				break;
			case "tools" :
				include $tabs_path . 'tools.php';
				break;
			case "status":
				include $tabs_path . 'status.php';
				break;
		}
		?>
    </div>


<?php }