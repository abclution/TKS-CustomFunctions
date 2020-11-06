/* WOOCOMMERCE */
/* # Hide out of stock variations # https://stackoverflow.com/questions/46407618/hide-out-of-stock-variations-woocommerce */
function custom_wc_ajax_variation_threshold( $qty, $product ) {
return 500; // Enter value that is higher then possible variations.
}
add_filter( 'woocommerce_ajax_variation_threshold', 
'custom_wc_ajax_variation_threshold', 10, 2 );