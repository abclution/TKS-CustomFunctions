<?php 
/**
 * Plugin Name:       Kratom Shop Custom Functions
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.2.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */


/* Show more variations on product back end */

add_filter( 'woocommerce_admin_meta_boxes_variations_per_page', 'handsome_bearded_guy_increase_variations_per_page' );
function handsome_bearded_guy_increase_variations_per_page() {
	return 500;
}

/* //Increase in the number of variations to 150  */
define( 'WC_MAX_LINKED_VARIATIONS', 500 );

/* Read more at: https://www.proy.info/create-more-than-50-product-variations-in-woocommerce/  */


add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );


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

/* # Hide out of stock variations # https://stackoverflow.com/questions/46407618/hide-out-of-stock-variations-woocommerce */

function custom_wc_ajax_variation_threshold( $qty, $product ) {
return 500; // Enter value that is higher then possible variations.
}

add_filter( 'woocommerce_ajax_variation_threshold', 
'custom_wc_ajax_variation_threshold', 10, 2 );




/*
add_filter( ‘restricted_site_access_is_restricted’, ‘my_rsa_feed_override’, 10, 2 );
function my_rsa_feed_override( $is_restricted, $wp ) {
// check query variables to see if this is the feed
if ( is_wc_endpoint_url( ‘lost-password’ ) ) {
$is_restricted = false;
}
return $is_restricted;
}
*/

/* add_filter( 'restricted_site_access_is_restricted', 'my_restricted_check' );
function my_restricted_check( $is_restricted ) {
    global $wp;
    if (
        is_wc_endpoint_url( ‘lost-password’ )
   	$wp->query_vars['pagename'] == 'register' ||
    	$wp->query_vars['name'] == 'a-name-of-a-post'
    )
		$is_restricted = false;

    return $is_restricted;
*/


