<?php


/**
 * Used for viewing/debugging objects and arrays. Does a `print_r()` wrapped
 * in `pre` tags.
 * 
 * ### Usage
 * <code>
 * pre_var($post);
 * </code>
 * 
 * @package d7
 * @subpackage utility
 * @param mixed $var 	The variable to explore
 * 
 */
function pre_var($var = false){
	foreach( func_get_args() as $var ) {
		echo '<pre>';
			print_r($var);
		echo '</pre>';
	}
}


/**
 * Used for viewing/debugging objects and arrays. Does a `var_dump()` wrapped
 * in `pre` tags.
 * 
 * ### Usage
 * <code>
 * pre_dump($post);
 * </code>
 * 
 * @package d7
 * @subpackage utility
 * @param mixed $var 	The variable to explore
 * 
 */
function pre_dump($var = false) {
	foreach( func_get_args() as $var ) {
		echo '<pre>';
			var_dump($var);
		echo '</pre>';
	}
}


/**
 * Extend default arguments. Allows you to pass associative arrays to template functions with defaults,
 * and merge in with passed in args.
 * 
 * @package d7
 * @subpackage utility
 * 
 * @param array $args 	Associative array of arguments to merge
 * 
 * @link http://gabrieleromanato.name/php-using-associative-arrays-to-handle-default-function-arguments/
 * 
 */
function extend_args($args, $defaults = array()) {

	if ( is_object( $args ) ) {
		$result = get_object_vars( $args );
	} elseif ( is_array( $args ) ) {
		$result =& $args;
	}

	if ( is_array( $defaults ) ) {
		return array_merge( $defaults, $result );
	}

	return $result;
}


/**
 * Check if the site is a local development site. Useful for excluding Google Analytics on local.
 * 
 * @package d7
 * @subpackage utility
 * 
 * @todo make this more bullet proof, also exclude staging.
 * 
 * @return bool
 * 
 */
function is_local() {
	return $_SERVER['SERVER_ADDR'] == '127.0.0.1';
}
