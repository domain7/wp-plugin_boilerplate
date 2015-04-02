<?php


/**
 * Allow ACF fields to be stored in the plugin when exported
 * This uses WP-CLI and the WP-CLI ACF plugin
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * 
 * @link http://wp-cli.org WP-CLI
 * @link https://github.com/hoppinger/advanced-custom-fields-wpcli WP-CLI ACF Plugin
 */
function d7_acfwpcli_fieldgroup_paths( $paths ) {
	global $plugin_dir_constant_name;
	$paths[strtolower($plugin_dir_constant_name)] = __DIR__ . '/acf_fields/';
	return $paths;
  }

add_filter( 'acfwpcli_fieldgroup_paths', 'd7_acfwpcli_fieldgroup_paths' );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/**
 * Makes custom fields created with Advanced Custom Fields available in the
 * WP Rest API
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * 
 * @link http://wp-api.org WP JSON API documentation
 * @link http://codex.wordpress.org/Function_Reference/is_plugin_active is_plugin_active
 * @link http://www.advancedcustomfields.com/resources ACF Resources
 * @link https://wordpress.org/support/topic/custom-meta-data-2 Source for this technique
 * @internal only used as `json_prepare_post` filter
 * 
 */
function d7_add_acf_to_json_api($postaray, $postdata, $context){

	if ( function_exists('get_fields') ) {
		$custom_fields = $postdata['ID'];
		$postaray['meta']['custom_fields'] = get_fields($custom_fields);		
	}

	return $postaray;

}

if ( is_plugin_active('json-rest-api/plugin.php') ) {
	add_filter('json_prepare_post', 'd7_add_acf_to_json_api',10, 3);	
}
