# WordPress site plugin boilerplate

A boilerplate for site custom plugin. Custom post types, taxonomies, shortcodes and functionality should be defined in a custom plugin. This repo is a plugin that you can enable, but no functionality is defined by it. This plugin is a template and should be used as such.

For information on how plugins work, visit the 'Writing a Plugin' page in the codex: [http://codex.wordpress.org/Writing_a_Plugin](http://codex.wordpress.org/Writing_a_Plugin).

## site_boilerplate.php

This is the main plugin file. From here all other files are included. The meta info at the top needs to be set with all instances of SITE NAME replaced with your project's name.

## Custom post types.

Each custom post type is defined in its own file in the `/posttypes` directory. `template.posttype-TYPE.php` is a template for creating custom post types. Post type files should be named posttype-TYPENAME.php. Each of these files gets automatically included. Each instance of TYPENAME should be replaced with the desired slug.

More information about custom post types: [http://codex.wordpress.org/Function_Reference/register_post_type](http://codex.wordpress.org/Function_Reference/register_post_type)

## Custom taxonomies

Each custom taxonomy is defined in its own file in the `/taxonomies` directory. `template.taxonomy-TAX.php` is a template for creating custom post types. Post type files should be named taxonomy-TAX.php. Each of these files gets automatically included. Each instance of TAX should be replaced with the desired slug.