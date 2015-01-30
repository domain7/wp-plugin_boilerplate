<?php

/**
 * CUSTOM TAXONOMIES: Template.
 *
 * To use, copy and rename file to taxonomy-TAX.php. Replace all instances of 
 * TAX with the desired slug of your taxonomy. All taxonomy-*.php files will be 
 * automatically included.
 * 
 * For full documentation on taxonomies and all arguments and labels available,
 * see http://codex.wordpress.org/Function_Reference/register_taxonomy.
 */


add_action('init', function(){

	/*
	 * These variables define the taxonomy slug, labels, and the post type to be used with.
	 * These must be set.
	 */

	$slug = 'taxonomy';
	$singular = 'Term';
	$plural = 'Terms';
	$type = 'album';

	$taxonomy = array(
		
		// The slug for your custom taxonomy
		'name' => $slug,

		// Which post types can use this taxonomy?
		'post_types' => array($type), // <--- CHANGE ME TOO

		// Configuration for the taxonomy. 
		'args' => array(
			"hierarchical" => true,
			"rewrite" => true,

			// Labels are highly configurable
			// Full into: http://codex.wordpress.org/Function_Reference/register_taxonomy#Arguments
			"label" => $singular,
			"singular_label" => $plural
			)
		);

	register_taxonomy($taxonomy['name'], $taxonomy['post_types'], $taxonomy['args']);

}, 0);

?>