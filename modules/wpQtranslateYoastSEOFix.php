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