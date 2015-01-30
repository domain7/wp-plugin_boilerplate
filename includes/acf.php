<?php


/**
 * ACF Fields
 *
 * This uses WP-CLI and the ACF plugin
 * WP-CLI: http://wp-cli.org/
 * WP-CLI ACF Plugin: https://github.com/hoppinger/advanced-custom-fields-wpcli
 */

function acfwpcli_fieldgroup_paths( $paths ) {
	$paths[$plugin_dir_constant_name] = __DIR__ . '/acf_fields/';
	return $paths;
  }

add_filter( 'acfwpcli_fieldgroup_paths', 'acfwpcli_fieldgroup_paths' );


/**
 * Makes custom fields created with Advanced Custom Fields available in the
 * WP Rest API
 * 
 * Source of this method: https://wordpress.org/support/topic/custom-meta-data-2
 * WP Rest API: http://wp-api.org/
 * Advancec CUstom Fields: www.advancedcustomfields.com/resources 
 */

// Required to use is_plugin_active() - http://codex.wordpress.org/Function_Reference/is_plugin_active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

function addACFToJSONAPI($postaray, $postdata, $context){

	if ( function_exists('get_fields') ) {
		$custom_fields = $postdata['ID'];
		$postaray['meta']['custom_fields'] = get_fields($custom_fields);		
	}

	return $postaray;

}

if ( is_plugin_active('json-rest-api/plugin.php') ) {
	add_filter('json_prepare_post', 'addACFToJSONAPI',10, 3);	
}

?>