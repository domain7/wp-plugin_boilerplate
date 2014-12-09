<?php


/**
 * ACF Fields
 *
 * This uses WP-CLI and the ACF plugin
 * WP-CLI: http://wp-cli.org/
 * WP-CLI ACF Plugin: https://github.com/hoppinger/advanced-custom-fields-wpcli
 */

function acfwpcli_fieldgroup_paths( $paths ) {
	$paths['mount-baker-theatre'] = __DIR__ . '/acf_fields/';
	return $paths;
  }

add_filter( 'acfwpcli_fieldgroup_paths', 'acfwpcli_fieldgroup_paths' );


?>