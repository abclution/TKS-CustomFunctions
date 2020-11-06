
// https://themesharbor.com/disabling-css-styles-of-woocommerce-blocks/

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
