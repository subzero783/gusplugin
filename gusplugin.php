<?php
/*
Plugin Name:  GusPlugin
Description:  Plugin to modify website.
Plugin URI:   https://subzero783.github.io/portfolio
Author:       Gustavo Amezcua
Version:      1.0
Text Domain:  gusplugin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// if admin area
if ( is_admin() ) {

	// include plugin dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';

}


