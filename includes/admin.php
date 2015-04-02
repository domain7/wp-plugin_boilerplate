<?php

/**
 * Add an admin stylesheet
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * @internal only called as `admin_init` action
 * 
 */
function d7_admin_style() {
	wp_register_style('admin_style',  plugin_dir_url(SITE_PLUGIN_NAME . '/' . SITE_PLUGIN_NAME . '.php') . 'stylesheets/css/' . SITE_PLUGIN_NAME . '_admin.css');
	wp_enqueue_style('admin_style');
}


/**
 * Add an admin script
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * @internal only called as `admin_enqueue_scripts` action
 * 
 */
function d7_admin_js() {
	wp_enqueue_script('d7_admin',  plugin_dir_url(SITE_PLUGIN_NAME . '/' . SITE_PLUGIN_NAME . '.php') . 'js/' . SITE_PLUGIN_NAME . '.js', array('jquery'), '1.0', true);
}

//add_action('admin_init', 'd7_admin_style');
//add_action('admin_enqueue_scripts', 'd7_admin_js');


/**
 * Remove some admin menu items
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * @internal only called as `admin_menu` action
 * 
 */
function d7_remove_menus(){
	remove_menu_page('edit.php');
	remove_menu_page('edit-comments.php');
	remove_submenu_page('themes.php', 'theme-editor.php');
	remove_submenu_page('plugins.php', 'plugin-editor.php');
}

//add_action('admin_menu', 'd7_remove_menus', 999);

/**
 * Remove some admin bar menu items
 * 
 * @package d7
 * @subpackage boilerplate-plugin_filters+hooks
 * @internal only called as `admin_bar_menu` action
 * 
 */
function d7_remove_wp_nodes()  {
    global $wp_admin_bar;   
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-link' );
    $wp_admin_bar->remove_node( 'new-media' );
    $wp_admin_bar->remove_node( 'new-user' );
}

//add_action( 'admin_bar_menu', 'd7_remove_wp_nodes', 999 );
