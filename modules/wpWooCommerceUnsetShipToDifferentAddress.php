<?php
/* WOOCOMMERCE */
/* UNCHECK SHIP TO DIFFERENT ADDRESS ON CHECKOUT */
add_filter('woocommerce_ship_to_different_address_checked', '__return_false');
