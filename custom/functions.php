<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */
/**
 * Add a custom product data tab
 */

add_filter('woocommerce_product_tabs', 'qr_code_for_woocommerce_new_product_tab');

function qr_code_for_woocommerce_new_product_tab($tabs)
{
    // Adds the new tab
    $tabs['qr_code_for_woocommerce'] = array(
        'title' => __('QR Code', 'woocommerce'),
        'priority' => 50,
        'callback' => 'qr_code_for_woocommerce_product_tab_content',
    );
    return $tabs;
}

function qr_code_for_woocommerce_product_tab_content()
{
	$product_url = get_permalink( $product_id );
    ?>
	<h2>
		QR Code
	</h2>
	<?php
	echo "<img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={$product_url}&choe=UTF-8' title='Link to Google.com' />";    
}