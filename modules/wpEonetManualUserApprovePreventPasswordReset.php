/* EONET MANUAL USER APPROVE PREVENT PASSWORD RESET UPON APPROVAL */
add_filter( 'eonet_mua_avoid_password_reset', '__return_true');