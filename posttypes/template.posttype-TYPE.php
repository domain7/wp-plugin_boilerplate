<?php

/**
 * CUSTOM POST TYPES: Template.
 *
 * To use, copy and rename file to posttype-TYPENAME.php. Replace all instances of 
 * TYPENAME with the slug of your post type. All posttype-*.php files will be 
 * automatically included.
 * 
 * For full documentation on post types and all arguments and labels available,
 * see http://codex.wordpress.org/Function_Reference/register_post_type.
 */


add_action('init', function(){

	/*
		Labels for your post type.
		Note that many more are available, as detailed in the codex.

		$singular and $plural are the only variables you must set.
	*/
		
	$singular = 'Widget';
	$plural = 'Widgets';


	$labels = array(
		'name' => _x($plural, 'post type general name'),
		'singular_name' => _x($singular, 'post type singular name'),
		'add_new' => _x('Add New', $singular),
		'add_new_item' => __('Add New ' . $singular),
		'edit_item' => __('Edit ' . $singular),
		'new_item' => __('New ' . $singular),
		'view_item' => __('View ' . $singular),
		'search_items' => __('Search ' . $plural),
		'not_found' =>  __('no ' . strtolower($plural) . ' found'),
		'not_found_in_trash' => __('No ' . strtolower($plural) . ' in Trash'),
		'parent_item_colon' => ''
	);


	// For all available arguments go to http://codex.wordpress.org/Function_Reference/register_post_type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => str_replace(" ", "_", strtolower($plural))), // Cal be true or more custom
		'capability_type' => 'post',
		// 'menu_icon' => 'dashicons-carrot', // Custom post type icons -> https://developer.wordpress.org/resource/dashicons/
		//'taxonomies' => array('category'), // Uses the custom taxonomy created in this template
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail')
	  ); 

	register_post_type(str_replace(" ", "_", strtolower($singular)), $args);	

}, 0);


/**
 * Example of chaning the 'Enter title here' text. Set the post type and the new title.
 * This will be moved to a permenant place for snippets once that is established.
 */ 
/*add_filter('enter_title_here', function($title){

     $screen = get_current_screen();
 
     if  ( 'POST_TYPE' == $screen->post_type ) {
          $title = 'NEW TEXT HERE';
     }
 
     return $title;

});
*/