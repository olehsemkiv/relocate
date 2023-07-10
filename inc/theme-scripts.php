<?php

/**
 * Enqueue scripts and styles.
 */
function wordpress_project_scripts()
{
    wp_enqueue_style('wordpress-project-styles', get_template_directory_uri() . '/dist/css/bundle.min.css', array(), _S_VERSION);
    wp_enqueue_style('wordpress-project-styles-rewrite', get_template_directory_uri() . '/style.css', array(), _S_VERSION);

    wp_enqueue_script('wordpress-project-scripts', get_template_directory_uri() . '/dist/js/bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'wordpress_project_scripts');
