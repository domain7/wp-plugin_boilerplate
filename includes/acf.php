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


/**
 * Makes custom fields created with Advanced Custom Fields available in the
 * WP Rest API V2
 *
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 *
 * @link http://wp-api.org WP JSON API documentation
 * @link http://codex.wordpress.org/Function_Reference/is_plugin_active is_plugin_active
 * @link http://www.advancedcustomfields.com/resources ACF Resources
 * @link http://v2.wp-api.org/extending/modifying
 * @internal only used as `register_api_field` `get_callback` callback
 *
 */
function d7_add_acf_to_json_api_v2($object, $field_name, $request){
	if ( function_exists('get_fields') ) {
		return get_fields($object['id']);
	}
}

if ( is_plugin_active('rest-api/plugin.php') ) {
	add_filter('rest_api_init', function(){

		// Get all post types
		$types = get_post_types(array('_builtin' => false), 'objects');

		// Find post types that are in the api
		foreach ( $types as $slug => $type ) {
			if ( isset($type->show_in_rest) && $type->show_in_rest ) {

				// Register the type's ACF fields
				register_api_field($slug, 'custom_fields', array(
					'get_callback' => 'd7_add_acf_to_json_api_v2',
					'update_callback' => null,
					'schema' => null
				));

			}
		}
	});
}
