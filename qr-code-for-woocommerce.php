<?php
/**
 * Plugin Name:       QR Code tab for WooCommerce
 * Description:       A little plugin to show a QR Code in Single Product Page with a tab.
 * Version:           1.0.0
 * Author:            Manuel Ramirez Coronel
 * Author URI:        https://www.woocommerce.com/
 * Requires at least: 3.0.0
 * Tested up to:      4.4.2
 *
 * @package QR_Code_for_WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main QR_Code_for_WooCommerce Class
 *
 * @class QR_Code_for_WooCommerce
 * @version	1.0.0
 * @since 1.0.0
 * @package	QR_Code_for_WooCommerce
 */
final class QR_Code_for_WooCommerce {

	/**
	 * Set up the plugin
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'qr_code_for_woocommerce_setup' ), -1 );
		require_once( 'custom/functions.php' );
	}

	/**
	 * Setup all the things
	 */
	public function qr_code_for_woocommerce_setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'qr_code_for_woocommerce_css' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'qr_code_for_woocommerce_js' ) );
	}

	/**
	 * Enqueue the CSS
	 *
	 * @return void
	 */
	public function qr_code_for_woocommerce_css() {
		wp_enqueue_style( 'custom-css', plugins_url( '/custom/style.css', __FILE__ ) );
	}

	/**
	 * Enqueue the Javascript
	 *
	 * @return void
	 */
	public function qr_code_for_woocommerce_js() {
		wp_enqueue_script( 'custom-js', plugins_url( '/custom/custom.js', __FILE__ ), array( 'jquery' ) );
	}
} // End Class

/**
 * The 'main' function
 *
 * @return void
 */
function qr_code_for_woocommerce_main() {
	new QR_Code_for_WooCommerce();
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', 'qr_code_for_woocommerce_main' );
