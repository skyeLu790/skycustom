<?php

// Sky custom - Admin Menu

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// add sub-level administrative menu
function sky_custom_add_sublevel_menu() {

	/*

	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);

	*/

	add_submenu_page(
		'options-general.php',
		'Sky Custom Settings',
		'Sky Custom',
		'manage_options',
		'sky_custom',
		'sky_custom_display_settings_page'
	);

}
add_action( 'admin_menu', 'sky_custom_add_sublevel_menu' );
