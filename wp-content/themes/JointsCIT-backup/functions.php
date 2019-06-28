<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php'); 

/*
 * MRo
 */

// Template functions
require_once(get_template_directory().'/assets/functions/template-functions.php'); 

// Hooks
require_once(get_template_directory().'/assets/functions/hooks.php'); 

// Filters
require_once(get_template_directory().'/assets/functions/filters.php'); 

// Actions
require_once(get_template_directory().'/assets/functions/actions.php'); 

// Helpers
require_once(get_template_directory().'/assets/functions/helpers.php'); 
require_once(get_template_directory().'/assets/functions/eventcal-helpers.php'); 
require_once(get_template_directory().'/assets/functions/csv-helpers.php'); 


// Customizer
require_once(get_template_directory().'/assets/functions/custom-header.php'); 


// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/assets/functions/login.php'); 

//Temporary file, these should be moved to plugin
require_once(get_template_directory().'/assets/functions/temp.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 