<?php

/**
 * These filters are used to change the admin text for post thumbnails.
 * This is useful when 'Add show poster' for example, might be more usefual than
 * 'Set featured image' 
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * @internal only called as `gettext` filter
 *
 */
function d7_change_post_thumbnail_text( $translated_text, $untranslated_text, $domain ) {

	$types_to_change = array(
		'post',
		'page'
		);

  global $typenow;

  if ( is_admin() && in_array($typenow, $types_to_change) ) {


    //make the changes to the text
    switch( $untranslated_text ) {

        case 'Featured Image':
          $translated_text = __( 'Banner photo','vec' );
        break;
        
        case 'Set featured image':
          $translated_text = __( 'Set banner photo','vec' );
        break;

        case 'Use as featured image':
          $translated_text = __( 'Use as banner photo','vec' );
        break;

        default:
        	break;
        
     }

   }
   return $translated_text;
}

add_filter('gettext', 'd7_change_post_thumbnail_text', 20, 3);


/**
 * Changes more text around featured images to allow this to be more customzied
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * @internal only called as `admin_post_thumbnail_html` filter
 *
 */
function d7_admin_post_thumbnail_html( $output, $post_id ) {

	$types_to_change = array(
		'post',
		'page'
		);

	if ( in_array(get_post_type( $post_id ), $types_to_change) ) {
		$output = str_replace( 'Set featured image', 'Set banner photo', $output );
		$output = str_replace( 'Remove featured image', 'Remove banner photo', $output );
	}

	return $output;

}

add_filter('admin_post_thumbnail_html', 'd7_admin_post_thumbnail_html', 10, 2 );
