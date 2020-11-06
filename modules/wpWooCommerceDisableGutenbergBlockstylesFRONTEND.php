<?php
// https://themesharbor.com/disabling-css-styles-of-woocommerce-blocks/

// Disable WooCommerce front-end styles
// WooCommerce loads block styles when you or your users visit the site. So, you do not need to worry about styling WooCommerce blocks. It’s already done for you. If you do not need these styles then you can disable it using this code snippet:

/**
 * Disable WooCommerce block styles (front-end).
 */
function slug_disable_woocommerce_block_styles()
{
  wp_dequeue_style('wc-block-style');
}
add_action('wp_enqueue_scripts', 'slug_disable_woocommerce_block_styles');
