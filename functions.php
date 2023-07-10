<?php

/**
 * wordpress-project functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress-project
 */

if (!defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

/* defines START */
define('_TP_', get_stylesheet_directory_uri()); //theme path
define('_IMAGES_', _TP_ . '/dist/images'); //images path
/* defines END */

function bato_wp_project_setup()
{
	foreach (glob(get_template_directory() . "/inc/*.php") as $file) {
		require $file;
	}
}
add_action('after_setup_theme', 'bato_wp_project_setup');

/**
 * Uncomment next line to prevent CF7 from wrapping elements with extra tags
 * 
 * add_filter('wpcf7_autop_or_not', '__return_false');
 */
