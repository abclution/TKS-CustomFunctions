<?php
/* Expose shop orders to types and views */
/* https://wp-types.com/forums/topic/woocommerce-shop_order/  */
add_action('init', 'wc_orders_public');
function wc_orders_public()
{
        global $wp_post_types;
        $wp_post_types['shop_order']->public = true;
        $wp_post_types['shop_order']->publicly_queryable = true;
        $wp_post_types['shop_order']->exclude_from_search = false;
        $wp_post_types['shop_order']->rewrite = true;
        $wp_post_types['shop_order']->query_var = 'shop_order';
}
