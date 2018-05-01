<?php 
/**
 * Plugin Name:       TKS Custom Functions + Autoupdate
 * Plugin URI:        https://github.com/abclution/TKS-CustomFunctions.git
 * Description:       Custom functions for TKS.
 * Version:           1.5.0
 * Author:            ABCLUTION
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/abclution/TKS-CustomFunctions.git
 */
include( dirname( __FILE__ ) . '/github-updater.php' );

/* Autoupdate check if works */

/* https://nicola.blog/2015/05/14/how-to-edit-processing-orders/   */
/* WOOCOMMERCE */
/* ENABLE EDITING FOR "PROCCESSING ORDERS" */
add_filter( 'wc_order_is_editable', 'wc_make_processing_orders_editable', 10, 2 );
function wc_make_processing_orders_editable( $is_editable, $order ) {
    if ( $order->get_status() == 'processing' ) {
        $is_editable = true;
    }

    return $is_editable;
}

/* WOOCOMMERCE */
/* Show more variations on product back end */

add_filter( 'woocommerce_admin_meta_boxes_variations_per_page', 'handsome_bearded_guy_increase_variations_per_page' );
function handsome_bearded_guy_increase_variations_per_page() {
	return 500;
}

/* WOOCOMMERCE */
/* //Increase in the number of variations to 150  */
define( 'WC_MAX_LINKED_VARIATIONS', 500 );
/* Read more at: https://www.proy.info/create-more-than-50-product-variations-in-woocommerce/  */

/* WOOCOMMERCE */
/* UNCHECK SHIP TO DIFFERENT ADDRESS ON CHECKOUT */
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

/* WOOCOMMERCE */
/* # Hide out of stock variations # https://stackoverflow.com/questions/46407618/hide-out-of-stock-variations-woocommerce */
function custom_wc_ajax_variation_threshold( $qty, $product ) {
return 500; // Enter value that is higher then possible variations.
}
add_filter( 'woocommerce_ajax_variation_threshold', 
'custom_wc_ajax_variation_threshold', 10, 2 );



/* Expose shop orders to types and views */
/* https://wp-types.com/forums/topic/woocommerce-shop_order/  */
add_action('init', 'wc_orders_public');
function wc_orders_public() {
        global $wp_post_types;
        $wp_post_types['shop_order']->public = true;
        $wp_post_types['shop_order']->publicly_queryable = true;
        $wp_post_types['shop_order']->exclude_from_search = false;
        $wp_post_types['shop_order']->rewrite = true;
        $wp_post_types['shop_order']->query_var = 'shop_order';
}


/* EONET MANUAL USER APPROVE PREVENT PASSWORD RESET UPON APPROVAL */
add_filter( 'eonet_mua_avoid_password_reset', '__return_true');



