<?php


/**
 * pre_var() - used for viewing/debugging objects
 */

function pre_var($var){
	if ( isset($var) ) {
		echo '<pre>';
			print_r($var);
		echo '</pre>';
	}
}


/*
 *	The only thing it does is to var_dump an variable but wraps an pre-tag around it.
 */

function pre_dump() {
	foreach( func_get_args() as $item ) {
		echo '<pre>';
		var_dump($item);
		echo '</pre>';
	}
}


/**
 * Extend default arguments
 * http://gabrieleromanato.name/php-using-associative-arrays-to-handle-default-function-arguments/
 * Allows you to pass associative arrays to template functions with defaults
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


?>