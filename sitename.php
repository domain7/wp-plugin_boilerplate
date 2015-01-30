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
 * You must edit this value. It should match the plugin directory name/plugin name.
 */

$site = 'sitename';


// Creates a constant name for the plugin directory.
$plugin_dir_constant_name = strtoupper($site) . '_PLUGIN_DIR';


// Creates the actual site plugin directory constant, and some others
define($plugin_dir_constant_name, plugin_dir_path( __FILE__ ));
define("SITE_PLUGIN_NAME", $site);


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
require_once(constant($plugin_dir_constant_name) . "includes/utility.php");
require_once(constant($plugin_dir_constant_name) . "includes/acf.php");


/*
	options.php allows you to create options/settings screens which you can add acf fields to.
	Uncomment to use.
	*/
//require_once(constant($plugin_dir_constant_name) . "includes/options.php");

/*
	post-thumbnail.php allows you to customize the admin text for post thumbnails
	Uncomment to use
	*/
//require_once(constant($plugin_dir_constant_name) . "includes/post-thumbnail.php");


/* 
	admin.php adds an admin stylesheet/js file. These are in the plugin directory and the filenames need to be changed
	to match the plugin name/directory name as follows; 

	.js file: js/pluginname.js
	.css file: clone sassyplate (git@bitbucket.org:domain7/sassyplate.git) into plugin dir. Name the main file sitename_admin.scss

	To use once the files are in place, open admin.php and uncomment the add_action calls

   */
require_once(constant($plugin_dir_constant_name) . "includes/admin.php");