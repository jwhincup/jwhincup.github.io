<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://preventdirectaccess.com/wp-animated-text-plugin/?utm_source=wp.org&utm_medium=post&utm_campaign=plugin-lin
 * @since      1.0.0
 *
 * @package    Wp_Animated_Text_Plugin
 * @subpackage Wp_Animated_Text_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Animated_Text_Plugin
 * @subpackage Wp_Animated_Text_Plugin/includes
 * @author     BWPS <hello@preventdirectaccess.com>
 */
class Wp_Animated_Text_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-animated-text-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
