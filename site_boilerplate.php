<?php
/**
 * @package SITE NAME
 */
/*
Plugin Name: SITE NAME
Plugin URI: http://SITEURL.com
Description: Custom functionality, including post types, for SITE NAME.
Version: 1.0
Author: Domain7
Author URI: http://domain7.com
Text Domain: sitename
*/


/**
 * Site name to creating constants.
 * 
 * Specify an uppercase sitename to be used as the base for constants such as directories.
 * This is the only value you must edit in this file.
 */

$site = 'SITENAME';


// Creates a constant name for the plugin directory.
$plugin_dir_constant_name = strtoupper($site) . '_PLUGIN_DIR';


// Creates the actual site plugin directory constant
define($plugin_dir_constant_name, plugin_dir_path( __FILE__ ));


/**
 * Custom post types
 */
foreach (glob(constant($plugin_dir_constant_name) . "posttypes/posttype-*.php") as $filename) {
	require_once($filename);
}


/**
 * Custom taxonomies
 */
foreach (glob(constant($plugin_dir_constant_name) . "taxonomies/taxonomy-*.php") as $filename) {
	require_once($filename);
}


/**
 * Includes
 */

// If we're using ACF and JSON-REST-API, add custom fields to the API.
require_once(constant($plugin_dir_constant_name) . "includes/acf-json-api.php");