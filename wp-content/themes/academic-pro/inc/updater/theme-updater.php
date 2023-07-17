<?php
/**
 * Theme Palace Theme Updater
 *
 * @package Theme Palace Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	require get_template_directory() . '/inc/updater/theme-updater-admin.php';
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'http://themepalace.com', // Site where EDD is hosted
		'item_name'      => 'Academic Pro', // Name of theme
		'theme_slug'     => 'academic-pro', // Theme slug
		'version'        => '2.3.5', // The current version of this theme
		'author'         => 'Theme Palace', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'http://themepalace.com/my-account' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'academic-pro' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'academic-pro' ),
		'license-key'               => __( 'License Key', 'academic-pro' ),
		'license-action'            => __( 'License Action', 'academic-pro' ),
		'deactivate-license'        => __( 'Deactivate License', 'academic-pro' ),
		'activate-license'          => __( 'Activate License', 'academic-pro' ),
		'status-unknown'            => __( 'License status is unknown.', 'academic-pro' ),
		'renew'                     => __( 'Renew?', 'academic-pro' ),
		'unlimited'                 => __( 'unlimited', 'academic-pro' ),
		'license-key-is-active'     => __( 'License key is active.', 'academic-pro' ),
		'expires%s'                 => __( 'Expires %s.', 'academic-pro' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'academic-pro' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'academic-pro' ),
		'license-key-expired'       => __( 'License key has expired.', 'academic-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'academic-pro' ),
		'license-is-inactive'       => __( 'License is inactive.', 'academic-pro' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'academic-pro' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'academic-pro' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'academic-pro' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'academic-pro' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'academic-pro' )
	)

);
