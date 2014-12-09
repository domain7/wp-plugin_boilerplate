<?php

function pre_var($var){
	if ( isset($var) ) {
		echo '<pre>';
			print_r($var);
		echo '</pre>';
	}
}

?>