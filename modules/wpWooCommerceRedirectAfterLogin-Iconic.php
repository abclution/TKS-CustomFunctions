
/* ------------------------------------------------------------------------ */
/* https://stanhub.com/how-to-change-woocommerce-login-redirect-url/ */
/* https://iconicwp.com/blog/redirect-users-woocommerce-login-registration/ */
/**
* Redirect to shop after login.
 *
 * @param $redirect
 * @param $user
 *
 * @return false|string
 */
function iconic_login_redirect( $redirect, $user ) {
    $redirect_page_id = url_to_postid( $redirect );
    $checkout_page_id = wc_get_page_id( 'checkout' );
    
    if( $redirect_page_id == $checkout_page_id ) {
        return $redirect;
    }
 
    return wc_get_page_permalink( 'shop' );
}
 
add_filter( 'woocommerce_login_redirect', 'iconic_login_redirect' );

/* ------------------------------------------------------------------------ */
/* https://iconicwp.com/blog/redirect-users-woocommerce-login-registration/ */
/**
 * Redirect after registration.
 *
 * @param $redirect
 *
 * @return string
 */
function iconic_register_redirect( $redirect ) {
    return get_permalink( 937 ); 

/*    return wc_get_page_permalink( 'new-user-approval' ); */
}
 
add_filter( 'woocommerce_registration_redirect', 'iconic_register_redirect' );

/* 937 New User Registration Link */
/* ------------------------------------------------------------------------ */

