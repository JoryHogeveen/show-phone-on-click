<?php
/**
 * Plugin Name:       Show Phone on Click
 * Description:       WordPress Plugin that adds a shortcode to only show actual phone number by clicking on the text link. Perfect for tracking leads on phone calls. Usage example: [show-phone-on-click id="customer-phone-lead" link="tel:0031131234567" text="Call Us Now" onclick="013 123 4567"]
 * Version:           1.0
 * Author:            Jory Hogeveen
 * Author URI:        https://www.keraweb.nl
 * Text Domain:       show-phone-on-click
 * GitHub Plugin URI: JoryHogeveen/show-phone-on-click
 * License:           GNU General Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined ( 'ABSPATH' ) ) {
	die;
}

Keraweb_Show_Phone_On_Click::get_instance();

class Keraweb_Show_Phone_On_Click
{
	/**
	 * @var Keraweb_Show_Phone_On_Click
	 */
	private static $_instance = null;

	/**
	 * @return Keraweb_Show_Phone_On_Click
	 */
	public static function get_instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Keraweb_Show_Phone_On_Click constructor.
	 */
	protected function __construct() {
		add_shortcode( 'show-phone-on-click', array( $this, 'shortcode' ) );
	}

	/**
	 * Shortcode callback.
	 *
	 * @param array $atts
	 * @return string
	 */
	public static function shortcode( $atts ) {

		$pairs = array(
			'id'      => '',
			'link'    => '',
			'text'    => '',
			'onclick' => '',
		);

		$atts = shortcode_atts( $pairs, $atts );

		// Escape values.
		$atts = array_map( 'esc_attr', $atts );

		$func = 'document.getElementById( \'' . $atts['id'] . '\' ).innerHTML = \'' . $atts['onclick'] . '\'';

		return '<a class="show-phone-on-click" id="' . $atts['id'] . '" href="' . $atts['link'] . '" onclick="' . $func .  '">' . $atts['text'] . '</a>';
	}
}
