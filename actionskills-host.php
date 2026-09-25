<?php
/**
 * Plugin Name:       ActionSkills Host
 * Plugin URI:        https://actionskills.au/host/
 * Description:       Community Hosting
 * Version:           1.4.0
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

define( 'ACTIONSKILLS_HOST_VERSION', '1.4.0' );
define( 'ACTIONSKILLS_HOST_DIR', plugin_dir_path( __FILE__ ) );
define( 'ACTIONSKILLS_HOST_URL', plugin_dir_url( __FILE__ ) );

/*
 * Must-use file that keeps this plugin active.
 * Delete wp-content/mu-plugins/actionskills-host-required.php to unlock it.
 */
define( 'ACTIONSKILLS_HOST_LOCK_SOURCE', ACTIONSKILLS_HOST_DIR . 'mu-plugins/actionskills-host-required.php' );
define( 'ACTIONSKILLS_HOST_LOCK_TARGET', WPMU_PLUGIN_DIR . '/actionskills-host-required.php' );

// Tell the lock file this plugin's real basename (the folder name can vary).
function actionskills_host_store_basename() {
	$basename = plugin_basename( __FILE__ );
	if ( get_option( 'actionskills_host_basename' ) !== $basename ) {
		update_option( 'actionskills_host_basename', $basename );
	}
}

// Install the lock file on activation.
register_activation_hook( __FILE__, function () {
	actionskills_host_store_basename();
	if ( file_exists( ACTIONSKILLS_HOST_LOCK_SOURCE ) && wp_mkdir_p( WPMU_PLUGIN_DIR ) ) {
		copy( ACTIONSKILLS_HOST_LOCK_SOURCE, ACTIONSKILLS_HOST_LOCK_TARGET );
	}
} );

// After an update, keep the basename and an installed lock file current.
// A deleted lock file is not reinstalled, so deleting it still unlocks the plugin.
add_action( 'admin_init', function () {
	actionskills_host_store_basename();
	if ( file_exists( ACTIONSKILLS_HOST_LOCK_TARGET ) && file_exists( ACTIONSKILLS_HOST_LOCK_SOURCE )
		&& md5_file( ACTIONSKILLS_HOST_LOCK_TARGET ) !== md5_file( ACTIONSKILLS_HOST_LOCK_SOURCE ) ) {
		copy( ACTIONSKILLS_HOST_LOCK_SOURCE, ACTIONSKILLS_HOST_LOCK_TARGET );
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
