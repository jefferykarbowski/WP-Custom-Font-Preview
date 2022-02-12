<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jefferykarbowski.com
 * @since             1.0.0
 * @package           Wp_Custom_Font_Preview
 *
 * @wordpress-plugin
 * Plugin Name:       WP Custom Font Preview
 * Plugin URI:        https://jefferykarbowski.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Jeffery Karbowski
 * Author URI:        https://jefferykarbowski.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-custom-font-preview
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_CUSTOM_FONT_PREVIEW_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-custom-font-preview-activator.php
 */
function activate_wp_custom_font_preview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-custom-font-preview-activator.php';
	Wp_Custom_Font_Preview_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-custom-font-preview-deactivator.php
 */
function deactivate_wp_custom_font_preview() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-custom-font-preview-deactivator.php';
	Wp_Custom_Font_Preview_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_custom_font_preview' );
register_deactivation_hook( __FILE__, 'deactivate_wp_custom_font_preview' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-custom-font-preview.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_custom_font_preview() {

	$plugin = new Wp_Custom_Font_Preview();
	$plugin->run();

}
run_wp_custom_font_preview();


require plugin_dir_path( __FILE__ ) . 'vendors/plugin-update-checker/plugin-update-checker.php';
$wp_custom_font_preview_update_checker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/jefferykarbowski/WP-Custom-Font-Preview/',
    __FILE__,
    'WP-Custom-Font-Preview'
);
$wp_custom_font_preview_update_checker->setBranch('main');