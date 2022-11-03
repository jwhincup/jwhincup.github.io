<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://preventdirectaccess.com/wp-animated-text-plugin/?utm_source=wp.org&utm_medium=post&utm_campaign=plugin-lin
 * @since      1.0.0
 *
 * @package    Wp_Animated_Text_Plugin
 * @subpackage Wp_Animated_Text_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Animated_Text_Plugin
 * @subpackage Wp_Animated_Text_Plugin/admin
 * @author     BWPS <hello@preventdirectaccess.com>
 */
class Wp_Animated_Text_Plugin_Admin {
	
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;
	
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Animated_Text_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Animated_Text_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-animated-text-plugin-admin.css', array(), $this->version, 'all' );
		
	}
	
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Animated_Text_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Animated_Text_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}
	
	/**
	 * Generate short code
	 */
	public function pah_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'selector'      => '',
			'animation'     => '',
			'class'         => '',
			'pretext'       => '',
			'posttext'      => '',
			'animated_text' => '',
		), $atts ) );
		$animation_texts = explode( ',', $animated_text );
		$mapped          = array_map( function ( $text, $key ) {
			$is_visible = ( 0 === $key ? 'class="is-visible"' : '' );
			return "<b {$is_visible}>{$text}</b>";
		}, $animation_texts, array_keys( $animation_texts ) );
		$animation_text  = implode( '', $mapped );
		$css_class = $this->handle_animation( $animation );
		if( ! $css_class ) {
			$html_element    = <<<_end_
		<span>{$pretext}</span>
		<span class="{$animation}">
			{$animation_text}
		</span>
		<span>{$posttext}</span>
	<script>
		(function ($) {
		    $(function() {
		      $('.wp-animated-text').animatedHeadline({
		            animationType: '{$animation}'
        		});
		    });
		})(jQuery);
	</script>
_end_;
			return "<div class='wp-animated-text {$class}'><{$selector} class=\"ah-headline\">{$html_element}</{$selector}></div>";
		} else {
			$html_element    = <<<_end_
		<span>{$pretext}</span>
			<span class="{$css_class[1]}">
				{$animation_text}
			</span>
		<span>{$posttext}</span>
_end_;
			return "<div class='{$css_class[0]} {$class}'><{$selector}>{$html_element}</{$selector}></div>";
		}
		
	}
	
	/**
	 * Handle custom animation
	 *
	 * @param $animation
	 *
	 * @return mixed css class
	 */
	private function handle_animation( $animation ) {
		$css_class = explode( '_', $animation );
		$is_custom = in_array( 'ymese', $css_class, true );
		if ( ! $is_custom ) {
			return false;
		}
		return array_slice( $css_class, 1, count( $css_class ) );
	}
	/**
	 * Generate mce button
	 */
	public function add_pah_btn() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		} elseif ( "true" === get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_external_plugins', array( $this, 'pah_mce_plugins' ) );
			add_filter( 'mce_buttons', array( $this, 'pah_button' ) );
		}
	}
	
	/**
	 * Register a new mce plugin.
	 *
	 * @param array $plugin_array The array of mce plugins.
	 *
	 * @return mixed The array of mce plugins
	 */
	public function pah_mce_plugins( $plugin_array ) {
		$plugin_array['pah'] = plugins_url( 'admin/js/', dirname( __FILE__ ) ) . 'wp-animated-text-plugin-admin.js';
		
		return $plugin_array;
	}
	
	/**
	 * Register a new button for PDA PDF
	 *
	 * @param array $buttons The buttons of mce.
	 *
	 * @return mixed The buttons of mce
	 */
	public function pah_button( $buttons ) {
		array_push( $buttons, '|', 'pah_btn' );
		
		return $buttons;
	}
}
