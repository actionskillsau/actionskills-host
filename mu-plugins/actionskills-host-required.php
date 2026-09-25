<?php
/**
 * Plugin Name: ActionSkills Host (required)
 * Description: Keeps the ActionSkills Host plugin active. Delete this file from wp-content/mu-plugins to allow deactivation.
 * Author:      ActionSkills
 * Author URI:  https://actionskills.au
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The plugin's basename, e.g. "actionskills-host/actionskills-host.php".
 * Stored by the plugin itself, so it works whatever its folder is called.
 */
function actionskills_host_required_basename() {
	return get_option( 'actionskills_host_basename', 'actionskills-host/actionskills-host.php' );
}

// Always treat the plugin as active, so it can't be deactivated or deleted.
add_filter( 'option_active_plugins', function ( $plugins ) {
	$plugins  = (array) $plugins;
	$basename = actionskills_host_required_basename();
	if ( ! in_array( $basename, $plugins, true ) && file_exists( WP_PLUGIN_DIR . '/' . $basename ) ) {
		$plugins[] = $basename;
	}
	return $plugins;
} );

// Replace the Deactivate and Delete links on the Plugins screen.
add_filter( 'plugin_action_links', function ( $actions, $plugin_file ) {
	if ( actionskills_host_required_basename() === $plugin_file ) {
		unset( $actions['deactivate'], $actions['delete'] );
		$actions['actionskills-required'] = '<span>' . esc_html__( 'Required by ActionSkills', 'actionskills-host' ) . '</span>';
	}
	return $actions;
}, 10, 2 );
