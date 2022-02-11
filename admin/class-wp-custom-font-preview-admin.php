<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://jefferykarbowski.com
 * @since      1.0.0
 *
 * @package    Wp_Custom_Font_Preview
 * @subpackage Wp_Custom_Font_Preview/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Custom_Font_Preview
 * @subpackage Wp_Custom_Font_Preview/admin
 * @author     Jeffery Karbowski <jefferykarbowski@gmail.com>
 */
class Wp_Custom_Font_Preview_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-custom-font-preview-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-custom-font-preview-admin.js', array( 'jquery' ), $this->version, false );

	}


    /**
     * Add BSF Custom Fonts Content.
     *
     * @since    1.0.0
     */
    public function add_custom_font_preview_content(   ) {

        echo '<h2>WP Custom Font Preview</h2>';
        echo '<p>To add the input box for the custom font preview, use the shortcode [custom_font_preview_input] <br>Then, copy the shortcodes of the fonts that you would like to see a preview of.</p>';

    }



    /**
     * Add BSF Custom Fonts Taxonomy admin column.
     *
     * @since    1.0.0
     */
    public function add_bsf_custom_fonts_custom_column( $columns ) {

        $columns['bsf_custom_fonts_preview_shortcode'] = __( 'Preview Shortcode', 'wp-custom-font-preview' );
        return $columns;

    }


    /**
     * Add shortcode to BSF Custom Fonts Taxonomy admin column.
     *
     * @since    1.0.0
     */
    public function add_bsf_custom_fonts_custom_column_content( $content,$column_name,$term_id ) {

        switch ($column_name) {
            case 'bsf_custom_fonts_preview_shortcode':
                $content = '[wp_custom_font_preview id="'.$term_id.'"]';
                break;
        }
        return $content;

    }

}
