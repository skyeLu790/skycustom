<?php
// Sky-custom - Register Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// register plugin settings
function sky_custom_register_settings() {

	/*

	register_setting(
		string   $option_group,
		string   $option_name,
		callable $sanitize_callback = ''
	);

	*/

	register_setting(
		'sky_custom_options',
		'sky_custom_options',
		'sky_custom_callback_validate_options'
	);

	/*

	add_settings_section(
		string   $id,
		string   $title,
		callable $callback,
		string   $page
	);

	*/

	add_settings_section(
		'sky_custom_section_login',
		'Customize Login Page',
		'sky_custom_callback_section_login',
		'sky_custom'
	);

	add_settings_section(
		'sky_custom_section_admin',
		'Customize Admin Area',
		'sky_custom_callback_section_admin',
		'sky_custom'
	);

	/*

	add_settings_field(
    string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);

	*/

	add_settings_field(
		'custom_url',
		'Custom URL',
		'sky_custom_callback_field_text',
		'sky_custom',
		'sky_custom_section_login',
		[ 'id' => 'custom_url', 'label' => 'URL link for the login page logo' ]
	);

	add_settings_field(
		'custom_title',
		'Custom Title',
		'sky_custom_callback_field_text',
		'sky_custom',
		'sky_custom_section_login',
		[ 'id' => 'custom_title', 'label' => 'Custom title for the login page' ]
	);

	add_settings_field(
		'custom_style',
		'Custom Style',
		'sky_custom_callback_field_radio',
		'sky_custom',
		'sky_custom_section_login',
		[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login page' ]
	);

	add_settings_field(
		'custom_message',
		'Custom Message',
		'sky_custom_callback_field_textarea',
		'sky_custom',
		'sky_custom_section_login',
		[ 'id' => 'custom_message', 'label' => 'Special message!' ]
	);

	add_settings_field(
		'custom_footer',
		'Custom Footer',
		'sky_custom_callback_field_textarea',
		'sky_custom',
		'sky_custom_section_admin',
		[ 'id' => 'custom_footer', 'label' => 'Add custom txt into admin footer' ]
	);

	add_settings_field(
		'custom_toolbar',
		'Custom Toolbar',
		'sky_custom_callback_field_checkbox',
		'sky_custom',
		'sky_custom_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	);

	add_settings_field(
		'custom_scheme',
		'Custom Scheme',
		'sky_custom_callback_field_select',
		'sky_custom',
		'sky_custom_section_admin',
		[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	);

}
add_action( 'admin_init', 'sky_custom_register_settings' );
