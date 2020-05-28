<?php
/**
 * Plugin Name:       Sky Custom
 * Description:       This plugin can let you custom the login page and at the footer in admin area, which you can make it us a note.
 * Version:           1.0.0
 * Requires at least: 5.4
 * Author:            Wen LU
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sky-footer
 * Domain Path:       /languages
 */

/*  Copyright

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// load text domain
function sky_custom_load_textdomain() {

	load_plugin_textdomain( 'sky_custom', false, plugin_dir_path( __FILE__ ) . 'languages/' );

}
add_action( 'plugins_loaded', 'sky_custom_load_textdomain' );


if (is_admin()) {
	// include plugin dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';

}
	// include plugin dependencies: admin and public
	require_once plugin_dir_path( __FILE__ ) . 'inc/core-functions.php';

// default plugin options
function sky_custom_options_default() {

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'myplugin'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">'. esc_html__('My custom message', 'myplugin') .'</p>',
		'custom_footer'  => esc_html__('Special message for users', 'myplugin'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);

}
