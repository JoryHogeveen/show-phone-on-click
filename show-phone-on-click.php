<?php
/**
 * Plugin Name: Show Phone on Click
 * Description: WordPress Plugin that adds a shortcode to only show phone number by clicking on the text link
 * Version:     1.0
 * Author:      Jory Hogeveen
 * Author URI:  https://www.keraweb.nl
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
	}
}
