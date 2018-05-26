<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nsclick.cl
 * @since             1.0.0
 * @package           Davila_Trabajando_Connector
 *
 * @wordpress-plugin
 * Plugin Name:       Davila y Trabajando Connector
 * Plugin URI:        https://nsclick.cl
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Cesar Reyes
 * Author URI:        https://nsclick.cl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       davila-trabajando-connector
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-davila-trabajando-connector-activator.php
 */
function activate_davila_trabajando_connector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-davila-trabajando-connector-activator.php';
	Davila_Trabajando_Connector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-davila-trabajando-connector-deactivator.php
 */
function deactivate_davila_trabajando_connector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-davila-trabajando-connector-deactivator.php';
	Davila_Trabajando_Connector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_davila_trabajando_connector' );
register_deactivation_hook( __FILE__, 'deactivate_davila_trabajando_connector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-davila-trabajando-connector.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_davila_trabajando_connector() {

	$plugin = new Davila_Trabajando_Connector();
	$plugin->run();

}
run_davila_trabajando_connector();
