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


add_action('init', 'register_taxonomy_TAX', 0);

function register_taxonomy_TAX() {

	$taxonomy = array(
		
		// The slug for your custom taxonomy
		'name' => 'TAX',

		// Which post types can use this taxonomy?
		'post_types' => array('TYPE'), // <--- CHANGE ME TOO

		// Configuration for the taxonomy. 
		'args' => array(
			"hierarchical" => true,
			"rewrite" => true,

			// Labels are highly configurable
			// Full into: http://codex.wordpress.org/Function_Reference/register_taxonomy#Arguments
			"label" => "Taxonomy name",
			"singular_label" => "Taxonomy term name"
			)
		);

	register_taxonomy($taxonomy['name'], $taxonomy['post_types'], $taxonomy['args']);
	
}

?>