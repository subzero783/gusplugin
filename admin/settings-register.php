<?php // gusplugin - Register Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// register plugin settings
function gusplugin_register_settings() {

	/*

	register_setting(
		string   $option_group,
		string   $option_name,
		callable $sanitize_callback = ''
	);

	*/

	register_setting(
		'gusplugin_options',
		'gusplugin_options',
		'gusplugin_callback_validate_options'
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
		'gusplugin_section_login',
		'Customize Login Page',
		'gusplugin_callback_section_login',
		'gusplugin'
	);

	add_settings_section(
		'gusplugin_section_admin',
		'Customize Admin Area',
		'gusplugin_callback_section_admin',
		'gusplugin'
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
		'gusplugin_callback_field_text',
		'gusplugin',
		'gusplugin_section_login',
		[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
	);

	add_settings_field(
		'custom_style',
		'Custom Style',
		'gusplugin_callback_field_radio',
		'gusplugin',
		'gusplugin_section_login',
		[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
	);

	add_settings_field(
		'custom_hide_login_logo',
		'Hide WP Login Logo',
		'gusplugin_callback_field_radio_hide_wp_logo',
		'gusplugin',
		'gusplugin_section_login',
		[ 'id' => 'custom_hide_login_logo', 'label' => 'Hide WP Login Logo' ]
	);

	add_settings_field(
		'custom_message',
		'Custom Message',
		'gusplugin_callback_field_textarea',
		'gusplugin',
		'gusplugin_section_login',
		[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
	);

	add_settings_field(
		'custom_footer',
		'Custom Footer',
		'gusplugin_callback_field_text',
		'gusplugin',
		'gusplugin_section_admin',
		[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
	);

	add_settings_field(
		'custom_toolbar',
		'Custom Toolbar',
		'gusplugin_callback_field_checkbox',
		'gusplugin',
		'gusplugin_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	);

	add_settings_field(
		'custom_scheme',
		'Custom Scheme',
		'gusplugin_callback_field_select',
		'gusplugin',
		'gusplugin_section_admin',
		[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	);

}
add_action( 'admin_init', 'gusplugin_register_settings' );


