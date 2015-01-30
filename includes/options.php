<?php

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Site Settings',
			'menu_title' 	=> 'Site Settings',
			'menu_slug' 	=> 'site-settings',
			'capability' 	=> 'manage_options',
			'redirect' 	=> false
		));

		acf_add_options_sub_page(array(
			'title' 	=> 'Homepage',
			'parent' 	=> 'site-settings',
			'menu_slug' 	=> 'site-settings-homepage',
			'capability' 	=> 'manage_options',
			'redirect' 	=> false
		));

	}


?>