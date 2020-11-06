<?php

* https://nicola.blog/2015/05/14/how-to-edit-processing-orders/   */
/* WOOCOMMERCE */
/* ENABLE EDITING FOR "PROCCESSING ORDERS" */
add_filter( 'wc_order_is_editable', 'wc_make_processing_orders_editable', 10, 2 );
function wc_make_processing_orders_editable( $is_editable, $order ) {
    if ( $order->get_status() == 'processing' ) {
        $is_editable = true;
    }

    return $is_editable;
}
?>