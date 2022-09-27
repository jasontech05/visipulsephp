<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://smartan.ca
 * @since             1.0.0
 * @package           Visipulse
 *
 * @wordpress-plugin
 * Plugin Name:       Visipulse Visitor Manager
 * Plugin URI:        https://visipulse.com
 * Description:       Keep track of visitors: know who is in your office at all times and keep an accurate log of when they arrived and left.
 * Version:           1.0.0
 * Author:            Jason & Orleane Abdi
 * Author URI:        https://smartan.ca
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       visipulse
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VISIPULSE_VERSION', '1.0.0' );

define( 'VISIPULSE_NAME', 'visipulse' );

//plugin Directory Path

define ('VISIPULSE_BASE_DIR', plugin_dir_path( __FILE__ ));

//Plugin Directory URL

define ('VISIPULSE_PLUGIN_URL', plugin_dir_url( __FILE__ ));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-visipulse-activator.php
 */
function activate_visipulse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-visipulse-activator.php';
	Visipulse_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-visipulse-deactivator.php
 */
function deactivate_visipulse() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-visipulse-deactivator.php';
	Visipulse_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_visipulse' );
register_deactivation_hook( __FILE__, 'deactivate_visipulse' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-visipulse.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_visipulse() {

	$plugin = new Visipulse();
	$plugin->run();

}
run_visipulse();
