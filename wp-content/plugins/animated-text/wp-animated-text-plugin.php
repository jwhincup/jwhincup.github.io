<?php

/**
 *
 * @link              https://preventdirectaccess.com/wp-animated-text-plugin/?utm_source=wp.org&utm_medium=post&utm_campaign=plugin-lin
 * @since             1.0.1
 * @package           Wp_Animated_Text_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:        WordPress Animated Text Plugin
 * Plugin URI:        https://preventdirectaccess.com/extensions/wp-animated-text-plugin/?utm_source=user-website&utm_medium=pluginsite_link&utm_campaign=wp-animated-text-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            ProFaceOff
 * Author URI:        https://www.profaceoff.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-animated-text-plugin
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
define( 'WP_ANIMATED_TEXT_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-animated-text-plugin-activator.php
 */
function activate_wp_animated_text_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-animated-text-plugin-activator.php';
	Wp_Animated_Text_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-animated-text-plugin-deactivator.php
 */
function deactivate_wp_animated_text_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-animated-text-plugin-deactivator.php';
	Wp_Animated_Text_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_animated_text_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_wp_animated_text_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-animated-text-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_animated_text_plugin() {

	$plugin = new Wp_Animated_Text_Plugin();
	$plugin->run();

}
run_wp_animated_text_plugin();
