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
        echo '<p>To add the input box for the custom font preview, use the shortcode [custom_font_preview_input] <br>Then, use [custom_font_preview ids="1,2,3"] to display the output for the custom fonts.<br>More help is available in the help tab above.</p>';

    }



    /**
     * Add BSF Custom Fonts Taxonomy admin column.
     *
     * @since    1.0.0
     */
    public function add_bsf_custom_fonts_custom_column( $columns ) {

        $columns['bsf_custom_fonts_preview_shortcode'] = __( 'Shortcode ID', 'wp-custom-font-preview' );
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
                $content = $term_id;
                break;
        }
        return $content;

    }


    /**
     * Add Custom Font Preview Help tab.
     *
     * @since    1.0.0
     */
    public function custom_font_preview_help()
    {
        $screen = get_current_screen();

        if( !isset($_GET['taxonomy']) ) {
            return;
        } else {
            if( $_GET['taxonomy'] != 'bsf_custom_fonts' ) {
                return;
            }
        }

        $content = '
            <h3>Custom Font Preview Help</h3>
            <p>To add the input box for the custom font preview, use the shortcode [custom_font_preview_input] <br>
            Then you can place a shortcode for the fonts that you would like to see a preview of by using the &#91;custom_font_preview ids="1,2,5"&#93; shortcode with the ids seperated by a comma.</p>

            <h4>Shortcode Attributes</h4>
            <p>&#91;custom_font_preview_input&#93; shortcode attributes are as follows:</p>
            <ul>
                <li><strong>placeholder</strong> - The placeholder for the input defaults to "Type Here".</li>
                <li><strong>class</strong> - The class for the input.</li>
            </ul>
            <p>&#91;custom_font_preview&#93; shortcode attributes are as follows:</p>
            <ul>
                <li><strong>ids</strong> * required - The ids of the fonts that you would like to see a preview of seperated by commas.</li>
                <li><strong>class</strong> - The class for the wrapping tag of the font preview.</li>
                <li><strong>tag</strong> - The tag of the font preview element defaults to "div".</li>
            </ul>
            ';

        $screen->add_help_tab( array(
            'id' => 'custom_font_preview',
            'title' => 'Custom Font Preview',
            'content' => $content,
        ));

    }


}
