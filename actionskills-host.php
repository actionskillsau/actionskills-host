<?php
/**
 * Plugin Name:       ActionSkills Host
 * Plugin URI:        https://actionskills.au/host/
 * Description:       Community Hosting
 * Version:           1.2.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            ActionSkills
 * Author URI:        https://actionskills.au
 * License:           GPL-2.0-or-later
 * Text Domain:       actionskills-host
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ACTIONSKILLS_HOST_VERSION', '1.2.0' );
define( 'ACTIONSKILLS_HOST_DIR', plugin_dir_path( __FILE__ ) );
define( 'ACTIONSKILLS_HOST_URL', plugin_dir_url( __FILE__ ) );

/*
 * On activation, install the must-use file that keeps this plugin active.
 * Delete wp-content/mu-plugins/actionskills-host-required.php to unlock it.
 */
register_activation_hook( __FILE__, function () {
	$source = ACTIONSKILLS_HOST_DIR . 'mu-plugins/actionskills-host-required.php';
	$target = WPMU_PLUGIN_DIR . '/actionskills-host-required.php';

	if ( file_exists( $source ) && wp_mkdir_p( WPMU_PLUGIN_DIR ) ) {
		copy( $source, $target );
	}
} );

/*
 * Updates from GitHub releases via Plugin Update Checker.
 * https://github.com/YahnisElsts/plugin-update-checker
 */
if ( file_exists( __DIR__ . '/plugin-update-checker/plugin-update-checker.php' ) ) {
	require __DIR__ . '/plugin-update-checker/plugin-update-checker.php';

	$actionskills_host_updater = YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
		'https://github.com/actionskillsau/actionskills-host/',
		__FILE__,
		'actionskills-host'
	);
	$actionskills_host_updater->setBranch( 'main' );

	// Private repo, or to raise GitHub's rate limit:
	// $actionskills_host_updater->setAuthentication( 'github_pat_xxx' );
}

class ActionSkills_Host {

	public function __construct() {
		add_action( 'load-index.php', array( $this, 'load_dashboard' ) );
	}

	/**
	 * Only hook in on the main Dashboard screen.
	 */
	public function load_dashboard() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'admin_notices', array( $this, 'render_panel' ), 1 );
	}

	public function enqueue_assets() {
		wp_enqueue_style( 'actionskills-host', ACTIONSKILLS_HOST_URL . 'assets/admin.css', array(), ACTIONSKILLS_HOST_VERSION );
		wp_enqueue_script( 'actionskills-host', ACTIONSKILLS_HOST_URL . 'assets/admin.js', array(), ACTIONSKILLS_HOST_VERSION, true );
	}

	public function render_panel() {
		$screen = get_current_screen();
		if ( ! $screen || 'dashboard' !== $screen->base ) {
			return;
		}
		include ACTIONSKILLS_HOST_DIR . 'templates/panel.php';
	}
}

new ActionSkills_Host();
