# WP Custom Font Preview

Contributors: Jeff Williams, Jeffery Karbowski\
Requires at least: 3.0.1\
Tested up to: 3.4\
Stable tag: 4.3\
License: GPLv2 or later\
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A wordpress plugin to work with the Custom Font plugin by Brainstorm Force. Offers two shortcodes to display the fonts in real time in your posts and pages.

## Shortcodes

To add the input box for the custom font preview, use the shortcode \[custom\_font\_preview\_input\]
Then you can place a shortcode for the fonts that you would like to see a preview of by using the \[custom\_font\_preview ids="1,2,5"\] shortcode with the ids seperated by a comma.

#### Shortcode Attributes

\[custom\_font\_preview\_input\] shortcode attributes are as follows:

*   **placeholder** - The placeholder for the input defaults to "Type Here".
*   **class** - The class for the input.

\[custom\_font\_preview\] shortcode attributes are as follows:

*   **ids** \* required - The ids of the fonts that you would like to see a preview of seperated by commas.
*   **class** - The class for the wrapping tag of the font preview.
*   **tag** - The tag of the font preview element defaults to "div".
