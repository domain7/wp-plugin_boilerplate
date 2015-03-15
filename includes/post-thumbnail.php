<?php

/**
 * These filters are used to change the admin text for post thumbnails.
 * This is useful when 'Add show poster' for example, might be more usefual than
 * 'Set featured image' 
 */

function d7_change_post_thumbnail_text( $translated_text, $untranslated_text, $domain ) {

  global $typenow;

  // Put the slugs of the post types you want to effect in $types_to_change
  $types_to_change = array('');

//  if( is_admin() && 'MY_CPT' == $typenow )  {
  if ( is_admin() && in_array($typenow, $types_to_change) ) {


	// Make the changes to the text. In the example we're changing it to 'banner photo' but it can be anything

	switch( $untranslated_text ) {

		case 'Featured Image':
		  $translated_text = __( 'Banner Photo', $plugin_dir_constant_name );
		break;
		
		case 'Set featured image':
		  $translated_text = __( 'Set banner photo', $plugin_dir_constant_name );
		break;

		case 'Use as featured image':
		  $translated_text = __( 'Use as banner photo', $plugin_dir_constant_name );
		break;

		case 'Remove featured image':
		  $translated_text = __( 'Remove banner photo', $plugin_dir_constant_name );
		break;

		default:
			break;
		
	 }

   }
   return $translated_text;
}

add_filter('gettext', 'd7_change_post_thumbnail_text', 20, 3);


function d7_admin_post_thumbnail_html( $output, $post_id ) {
  $types_to_change = array('');
  if ( in_array(get_post_type($post_id), $types_banner) ) {
	$output = str_replace( 'Set featured image', 'Set banner photo', $output );
	$output = str_replace( 'Remove featured image', 'Remove banner photo', $output );
  }

  return $output;
}

add_filter('admin_post_thumbnail_html', 'd7_admin_post_thumbnail_html', 10, 2 );
