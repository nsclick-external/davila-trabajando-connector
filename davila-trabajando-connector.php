<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
// if ( ! defined( 'WPINC' ) ) {
// 	die;
// }

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

define( 'PROD_API_URL', 'http://wsbcknd.trabajando.com/jobs-v1.4/' );
define( 'DEV_API_URL', 'http://services.demotbj.com/jobs-v1.4/' );
define( 'QUERY_PARAMS', serialize([
			'domainId' => '2566',
			'country' => 'CL',
			'client' => 'CLINICADAVILA-CL',
			'token' => '342a54d0ba20ebe951857712eaf0326a',
			'api_key' => '1e0178ad6c8b559bb7f054e98aaf97c0'
		]));

/**
 * The code that runs during plugin activation.
 */
function activate_davila_trabajando_connector() {
	
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_davila_trabajando_connector() {
	
}

// register_activation_hook( __FILE__, 'activate_davila_trabajando_connector' );
// register_deactivation_hook( __FILE__, 'deactivate_davila_trabajando_connector' );

// 

function _set_job_data($json_payload, $method=NULL) {
	$payload = json_decode($json_payload);
	$query_params = unserialize(QUERY_PARAMS);
	$api_key = $query_params['api_key'];
	unset($query_params['api_key']);

	foreach ($query_params as $key => $value) {
		$payload->$key = $value;
	}
	
	$url = PROD_API_URL . "rest/json?api_key=$api_key";
	return rest_call($url, $payload, $method);
}

function create_job($json_payload) {
	return _set_job_data($json_payload);
}

function update_job($json_payload) {
	return _set_job_data($json_payload, 'PUT');
}

function activate_job($job_id) {
	return set_job_state($job_id, 'activate');
}

function deactivate_job($job_id) {
	return set_job_state($job_id, 'deactivate');
}

function get_applications($job_id, $from = NULL) {
	$options = array_merge(unserialize(QUERY_PARAMS), [
		'jobId' => $job_id,
		'from' => $from
	]) ;

	$query = '?' . http_build_query($options);
	$url = PROD_API_URL . 'rest/Applications/json/forJob' . $query;
	return rest_get($url);
}


function set_job_state($job_id, $state='activate') {
	$query_params = unserialize(QUERY_PARAMS);
	$api_key = $query_params['api_key'];
	unset($query_params['api_key']);

	$payload = array_merge($query_params, ['jobId' => $job_id]);
	$url = PROD_API_URL . "rest/json/$state?api_key=$api_key";
	return rest_call($url, $payload, 'PUT');
}

function rest_get($url) {
	//  Initiate curl
	$ch = curl_init();
	// Disable SSL verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL, $url);
	// Execute
	$result=curl_exec($ch);
	// Closing
	curl_close($ch);

	// Will dump a beauty json :3
	return json_decode($result, true);
}

function rest_call ($url, $payload, $method='POST') {

	$data_string = json_encode($payload);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
	);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);

	return $result;
}


