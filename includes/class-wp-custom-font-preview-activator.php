<?php

/**
 * Fired during plugin activation
 *
 * @link       https://jefferykarbowski.com
 * @since      1.0.0
 *
 * @package    Wp_Custom_Font_Preview
 * @subpackage Wp_Custom_Font_Preview/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Custom_Font_Preview
 * @subpackage Wp_Custom_Font_Preview/includes
 * @author     Jeffery Karbowski <jefferykarbowski@gmail.com>
 */
class Wp_Custom_Font_Preview_Activator {

	public static function activate() {

        if (!is_plugin_active('custom-fonts/custom-fonts.php')) {
            wp_die(__('You must install and activate the Custom Fonts plugin before activating this plugin. <br><a href="' . admin_url('plugins.php') .'">&laquo; Return to Plugins</a>', 'wp-custom-font-preview'));
        }

	}

}
