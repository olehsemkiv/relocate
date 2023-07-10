<?php

/* REMOVE EMOJI START */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
/* REMOVE EMOJI END */

/* REMOVE GUTENBERG STYLES START */
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css');
/* REMOVE GUTENBERG STYLES END */

/* REMOVE ATTRS START */
add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start()
{
    ob_start("prefix_output_callback");
}
function prefix_output_callback($buffer)
{
    return preg_replace("%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer);
}
/* REMOVE ATTRS END */

/* hide admin TABS START */
function remove_menu()
{
    remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'remove_menu');
/* hide admin TABS END */