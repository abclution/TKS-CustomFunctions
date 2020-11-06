<?php 
// # Elementor Language
// https://github.com/pojome/elementor/issues/5148
// add_action('init', 'unload_textdomain_elementor', 100);function unload_textdomain_elementor() {
//	if (is_admin()) {
//		unload_textdomain('elementor');
//		unload_textdomain('elementor-pro');
//  }
// }



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
