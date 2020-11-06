<?php
/* TOOLSET
# Ref:https://toolset.com/forums/topic/post-status-filter-select/
# Ref: https://toolset.com/forums/topic/filter-by-woocommerce-post-status/
# Ref: https://toolset.com/documentation/programmer-reference/views-filters/#wpv_filter_query
# This filter allows the Toolset app to filter results by their post status (Wordpress Woocommerce Status shipped,failed etc)
# First if is for single view, second if is for array of view IDs to run this filter on.
    if ( $view_id == 1754 ) {
 if ( in_array($view_id, array(1754, 1754, 1754)) ) {
*/
add_filter('wpv_filter_query', 'filter_post_type_status_func', 101, 3);

function filter_post_type_status_func($query_args, $view_settings, $view_id)
{
	if (in_array($view_id, array(1754, 1759, 1754, 1770, 1764, 1884, 1885))) {
		if (isset($_GET['my-post-status']) && is_array($_GET['my-post-status'])) {
			$query_args['post_status'] = end($_GET['my-post-status']);
		}
	}
	return $query_args;
}
