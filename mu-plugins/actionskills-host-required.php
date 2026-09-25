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

define( 'ACTIONSKILLS_HOST_REQUIRED', 'actionskills-host/actionskills-host.php' );

// Always treat the plugin as active, so it can't be deactivated or deleted.
add_filter( 'option_active_plugins', function ( $plugins ) {
	$plugins = (array) $plugins;
	if ( ! in_array( ACTIONSKILLS_HOST_REQUIRED, $plugins, true ) && file_exists( WP_PLUGIN_DIR . '/' . ACTIONSKILLS_HOST_REQUIRED ) ) {
		$plugins[] = ACTIONSKILLS_HOST_REQUIRED;
	}
	return $plugins;
} );

// Replace the Deactivate link on the Plugins screen.
add_filter( 'plugin_action_links_' . ACTIONSKILLS_HOST_REQUIRED, function ( $actions ) {
	unset( $actions['deactivate'], $actions['delete'] );
	$actions['actionskills-required'] = '<span>' . esc_html__( 'Required by ActionSkills', 'actionskills-host' ) . '</span>';
	return $actions;
} );
