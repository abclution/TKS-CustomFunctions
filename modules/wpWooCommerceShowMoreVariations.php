<?php
/* WOOCOMMERCE */
/* Show more variations on product back end */

add_filter('woocommerce_admin_meta_boxes_variations_per_page', 'handsome_bearded_guy_increase_variations_per_page');
function handsome_bearded_guy_increase_variations_per_page()
{
	return 500;
}
