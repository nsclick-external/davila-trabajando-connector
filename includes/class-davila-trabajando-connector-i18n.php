<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://nsclick.cl
 * @since      1.0.0
 *
 * @package    Davila_Trabajando_Connector
 * @subpackage Davila_Trabajando_Connector/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Davila_Trabajando_Connector
 * @subpackage Davila_Trabajando_Connector/includes
 * @author     Cesar Reyes <cesar.cesarreyes@gmail.com>
 */
class Davila_Trabajando_Connector_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'davila-trabajando-connector',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
