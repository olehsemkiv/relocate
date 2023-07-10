<?php
// This theme uses wp_nav_menu() in one location.
register_nav_menus(
	array(
		'main-menu' => esc_html__('Main menu', 'wordpress-project'),
	)
);
