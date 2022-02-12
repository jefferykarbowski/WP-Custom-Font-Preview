<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jefferykarbowski.com
 * @since      1.0.0
 *
 * @package    Wp_Custom_Font_Preview
 * @subpackage Wp_Custom_Font_Preview/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Custom_Font_Preview
 * @subpackage Wp_Custom_Font_Preview/public
 * @author     Jeffery Karbowski <jefferykarbowski@gmail.com>
 */
class Wp_Custom_Font_Preview_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-custom-font-preview-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-custom-font-preview-public.js', array( 'jquery' ), $this->version, true );

	}


    public function wp_custom_font_preview_input_shortcode($atts) {
        $a = shortcode_atts( array(
            'placeholder' => 'Type Here',
            'class' => '',
        ), $atts );
        ob_start();
        echo '<div class="wp-custom-font-preview-input-shortcode-container">';
        echo '<input type="text" id="wp_custom_font_preview_input" class="'. $a['class'] .'" placeholder="' . $a['placeholder'] . '" />';
        echo '</div>';
        return ob_get_clean();

    }


    public function wp_custom_font_preview_shortcode($atts) {
        global $post;
        // Attributes
        $atts = shortcode_atts(
            array(
                'ids' => '',
                'id' => '',
                'class' => '',
                'tag' => 'div',
            ),
            $atts,
            'wp_custom_font_preview'
        );
        if ($atts['id'] == '' && $atts['ids'] == '') {
            return '<p>Please specify an ID or IDs to preview.</p>';
        }
        if ($atts['id'] != '') {
            $ids = explode(',', $atts['id']);
        } else {
            $ids = explode(',', $atts['ids']);
        }
        ob_start();

        if (! has_shortcode( $post->post_content, 'custom_font_preview_input' ) ) {
            echo '<p>The Custom Font Preview Input shortcode must be present on the page to use this shortcode.</p>';
        } else {
            echo '<div class="wp-custom-font-preview-shortcode-container">';
            foreach ($ids as $id) {
                $font_name = get_term( $id  )->name;
                echo '<' . $atts['tag'] . ' class="wp-custom-font-preview ' . $atts['class'] . '" style="font-family: ' . $font_name . '" data-default-text="' . $font_name . '">' . $font_name . '</' . $atts['tag'] . '>';
            }
            echo '</div>';
        }
        return ob_get_clean();

    }


}
