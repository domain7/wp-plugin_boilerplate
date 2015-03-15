# WordPress site plugin boilerplate

A boilerplate for site custom plugin. Custom post types, taxonomies, shortcodes and functionality should be defined in a custom plugin. This repo is a plugin that you can enable, but no functionality is defined by it. This plugin is a template and should be used as such.

For information on how plugins work, visit the 'Writing a Plugin' page in the codex: [http://codex.wordpress.org/Writing_a_Plugin](http://codex.wordpress.org/Writing_a_Plugin).

The contents of this directory should be placed in your plugins directory (usually `wp-content/plugins`). Once cloned this directory should no longer be a repo (remove the `.git` directory).

## sitename.php

This is the main plugin file. From here all other files are included. The meta info at the top needs to be set with all instances of `SITE NAME` & `sitename` replaced with your project's name.

## Custom Post Types.
**Location:** `posttypes/postype-TYPE.php`

Each custom post type is defined in its own file in the `/posttypes` directory. `template.posttype-TYPE.php` is a template for creating custom post types. Post type files should be named posttype-TYPENAME.php. Each of these files gets automatically included. Each instance of TYPENAME should be replaced with the desired slug.

More information about custom post types: [http://codex.wordpress.org/Function_Reference/register_post_type](http://codex.wordpress.org/Function_Reference/register_post_type)

## Custom Taxonomies
**Location:** `taxonomies/taxonomy-TERM.php`

Each custom taxonomy is defined in its own file in the `/taxonomies` directory. `template.taxonomy-TAX.php` is a template for creating custom post types. Post type files should be named taxonomy-TAX.php. Each of these files gets automatically included. Each instance of TAX should be replaced with the desired slug.

## Includes Folder

#### ACF Options Pages ([documentation](http://www.advancedcustomfields.com/resources/acf_add_options_page))

**Location:** `includes/options.php`

Options Pages create new menu items called “Options” which can hold advanced custom field groups (just like any other edit page). You can also register multiple options pages.

**WARNING:** When using the 'position' parameter, if two menu items use the same position attribute, one of the items will be overwritten. You can use a decimal instead of integer values to fix this.

**e.g.** '63.3' instead of 63 (*Note: You must use quotes when using decimals*).

**Default Menu Items & Postions**

- 2 - Dashboard
- 4 - Separator
- 5 - Posts
- 10 - Media
- 15 - Links
- 20 - Pages
- 25 - Comments
- 59 - Separator
- 60 - Appearance
- 65 - Plugins
- 70 - Users
- 75 - Tools
- 80 - Settings
- 99 - Separator﻿