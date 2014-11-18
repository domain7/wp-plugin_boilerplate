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

define( 'SITENAME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


/**
 * Custom post types
 */
foreach (glob(SITENAME_PLUGIN_DIR . "posttypes/posttype-*.php") as $filename) {
	require_once($filename);
}


/**
 * Custom taxonomies
 */
foreach (glob(SITENAME_PLUGIN_DIR . "taxonomies/taxonomy-*.php") as $filename) {
	require_once($filename);
}


/**
 * Includes
 */

// If we're using ACF and JSON-REST-API, add custom fields to the API.
require_once(SITENAME_PLUGIN_DIR . "includes/acf-json-api.php");