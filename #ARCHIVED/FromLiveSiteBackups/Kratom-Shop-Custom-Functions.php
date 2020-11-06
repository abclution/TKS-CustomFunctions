<?php
/**
 * Plugin Name:       Kratom Shop Custom Functions
 * Plugin URI:        https://github.com/abclution/TKS-CustomFunctions.git
 * Description:       Custom functions for Kratom Shop.
 * Version:           1.3.1
 * Author:            Kratom Shop
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/abclution/TKS-CustomFunctions.git
 */

/* WOOCOMMERCE */

/* function disable_shipping_calc_on_cart( $show_shipping ) {
if( is_cart() ) {
return false;
}
return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

 */

/* ------------------------------------------------------------------------ */
/* https://stanhub.com/how-to-change-woocommerce-login-redirect-url/ */
/* https://iconicwp.com/blog/redirect-users-woocommerce-login-registration/ */
/**
 * Redirect to shop after login.
 *
 * @param $redirect
 * @param $user
 *
 * @return false|string
 */
// This is broken 
/* function iconic_login_redirect($redirect, $user) {
	$redirect_page_id = url_to_postid($redirect);
	$checkout_page_id = wc_get_page_id('checkout');

	if ($redirect_page_id == $checkout_page_id) {
		return $redirect;
	}

	return wc_get_page_permalink('shop');
}

add_filter('woocommerce_login_redirect', 'iconic_login_redirect');
*/
// This is broken
/* ------------------------------------------------------------------------ */
/* https://iconicwp.com/blog/redirect-users-woocommerce-login-registration/ */
/**
 * Redirect after registration.
 *
 * @param $redirect
 *
 * @return string
 */


/*
function iconic_register_redirect($redirect) {
	return get_permalink(937);

//    return wc_get_page_permalink( 'new-user-approval' ); 
}

add_filter('woocommerce_registration_redirect', 'iconic_register_redirect');

*/
/* 937 New User Registration Link */
/* ------------------------------------------------------------------------ */












/* Show more variations on product back end */

add_filter('woocommerce_admin_meta_boxes_variations_per_page', 'handsome_bearded_guy_increase_variations_per_page');
function handsome_bearded_guy_increase_variations_per_page() {
	return 500;
}

/* WOOCOMMERCE */
/* //Increase in the number of variations to 150  */
define('WC_MAX_LINKED_VARIATIONS', 500);
/* Read more at: https://www.proy.info/create-more-than-50-product-variations-in-woocommerce/  */

/* WOOCOMMERCE */
/* UNCHECK SHIP TO DIFFERENT ADDRESS ON CHECKOUT */
add_filter('woocommerce_ship_to_different_address_checked', '__return_false');

/* WOOCOMMERCE */
/* # Hide out of stock variations # https://stackoverflow.com/questions/46407618/hide-out-of-stock-variations-woocommerce */

/* function custom_wc_ajax_variation_threshold( $qty, $product ) {
return 500; // Enter value that is higher then possible variations.
}
add_filter( 'woocommerce_ajax_variation_threshold',
'custom_wc_ajax_variation_threshold', 10, 2 );

 */

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
add_filter('eonet_mua_avoid_password_reset', '__return_true');

/* disable the admin bar */

// show_admin_bar(false);

/* disable the admin bar */
// add_filter('show_admin_bar', '__return_false');

# ------------------------------------------------------------------------------------------------
# TOOLSET
# Ref:https://toolset.com/forums/topic/post-status-filter-select/
# Ref: https://toolset.com/forums/topic/filter-by-woocommerce-post-status/
# Ref: https://toolset.com/documentation/programmer-reference/views-filters/#wpv_filter_query
# This filter allows the Toolset app to filter results by their post status (Wordpress Woocommerce Status shipped,failed etc)
# First if is for single view, second if is for array of view IDs to run this filter on.
#    if ( $view_id == 1754 ) {
# if ( in_array($view_id, array(1754, 1754, 1754)) ) {

add_filter('wpv_filter_query', 'filter_post_type_status_func', 101, 3);

function filter_post_type_status_func($query_args, $view_settings, $view_id) {
	if (in_array($view_id, array(1754, 1759, 1754, 1770, 1764, 1884, 1885))) {
		if (isset($_GET['my-post-status']) && is_array($_GET['my-post-status'])) {
			$query_args['post_status'] = end($_GET['my-post-status']);
		}
	}
	return $query_args;
}

# ---------------------------------------------------------------------------------
# Elementor Language
# https://github.com/pojome/elementor/issues/5148
#add_action('init', 'unload_textdomain_elementor', 100);function unload_textdomain_elementor() {
#	if (is_admin()) {
#		unload_textdomain('elementor');
#		unload_textdomain('elementor-pro');
#	}
#}


function mg_unload_textdomain_elementor() {
	if ( is_admin() ) {
		$user_locale = get_user_meta( get_current_user_id(), 'locale', true );
		if ( 'en_US' === $user_locale ) {
			unload_textdomain( 'elementor' );
			unload_textdomain( 'elementor-pro' );
		}
	}
}
add_action( 'init', 'mg_unload_textdomain_elementor', 100 );




#--------------------------------------------------
# Qtranslate-XT + Yoast SEO Fix
# https://github.com/qtranslate/qtranslate-xt/issues/877
# Sept 2020
add_filter( 'wpseo_metadesc', function ( $str ) {
	return __( $str );
}, 10, 1 );

add_filter( 'wpseo_opengraph_title', function ( $str ) {
	return __( $str );
}, 10, 1 );

add_filter( 'wpseo_opengraph_desc', function ( $str ) {
	return __( $str );
}, 10, 1 );


// https://themesharbor.com/disabling-css-styles-of-woocommerce-blocks/

// Disable WooCommerce front-end styles
// WooCommerce loads block styles when you or your users visit the site. So, you do not need to worry about styling WooCommerce blocks. It’s already done for you. If you do not need these styles then you can disable it using this code snippet:

/**
 * Disable WooCommerce block styles (front-end).
 */
function slug_disable_woocommerce_block_styles() {
  wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_enqueue_scripts', 'slug_disable_woocommerce_block_styles' );

//Disable WooCommerce back-end styles
//WooCommerce loads block styles in a back-end of your site as well. So, you can use these blocks in Gutenberg (Block editor). The only difference is that it loads two style files instead of one: block editor styles and block styles. It can be disabled using this code snippet:

/**
 * Disable WooCommerce block styles (back-end).
 */
function slug_disable_woocommerce_block_editor_styles() {
  wp_deregister_style( 'wc-block-editor' );
  wp_deregister_style( 'wc-block-style' );
}
add_action( 'enqueue_block_assets', 'slug_disable_woocommerce_block_editor_styles', 1, 1 );
