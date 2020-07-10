<?php
/**
 * Plugin Name: JWT Auth
 * Plugin URI:  https://github.com/aircodedesign/jwt-auth
 * Description: WordPress JWT Authentication.
 * Version:     1.4.0
 * Author:      Air Code Design inc. (original author: Useful Team)
 * Author URI:  https://aircodedesign.com
 * License:     GPL-3.0
 * Text Domain: jwt-auth
 * Domain Path: /languages
 *
 * @package jwt-auth
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

// Helper constants.
define( 'JWT_AUTH_PLUGIN_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
define( 'JWT_AUTH_PLUGIN_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
define( 'JWT_AUTH_PLUGIN_VERSION', '1.3.0' );

// Require composer.
require __DIR__ . '/vendor/autoload.php';

// Require classes.
require __DIR__ . '/class-auth.php';
require __DIR__ . '/class-setup.php';

// Disable updating this plugin
add_filter('site_transient_update_plugins', 'remove_update_notification');
function remove_update_notification($value) {
	unset($value->response[ plugin_basename(__FILE__) ]);
	return $value;
}

new JWTAuth\Setup();
