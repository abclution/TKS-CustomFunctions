<?php

/**
 * Plugin Name:       TKS Custom Functions + Autoupdate
 * Plugin URI:        https://github.com/abclution/TKS-CustomFunctions.git
 * Description:       Custom functions for TKS.
 * Version:           1.6.0
 * Author:            ABCLUTION
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/abclution/TKS-CustomFunctions.git
 * GitHub URI: abclution/TKS-CustomFunctions
 */
// include(dirname(__FILE__) . '/github-updater.php');


/* Autoupdate check if works */


/* WORDPRESS CORE */

// Prevents the "You are attempting to logout prompt."
include(dirname(__FILE__) . '/modules/wpCoreLogoutWithoutPrompt.php');

// WORDPRESS CORE: DISABLE ADMIN BAR FOR ALL USERS EXCEPT ADMINISTRATORS
include(dirname(__FILE__) . '/modules/wpCoreDisableAdminBarForAllUsersExceptAdmins.php');

// WORDPRESS CORE: DISABLE ADMIN BAR FOR ALL USERS 
// include( dirname( __FILE__ ) . '/modules/wpCoreDisableAdminBarForAllUsers.php' );

/* WOOCOMMERCE */

// WOOCOMMERCE: ENABLE EDITING OF IN PROGRESS ORDERS
include(dirname(__FILE__) . '/modules/wpWooCommerceEnableEditOfInProcessOrders.php');

// WOOCOMMERCE: SHOW MORE VARIATIONS IN PRODUCT BACKEND 
include(dirname(__FILE__) . '/modules/wpWooCommerceShowMoreVariations.php');

// LIVE
// WOOCOMMERCE: INCREASE NUMBER OF LINKED VARIATIONS, https://www.proy.info/create-more-than-50-product-variations-in-woocommerce/  
include(dirname(__FILE__) . '/modules/wpWooCommerceMoreLinkedVariations.php');

// LIVE
// WOOCOMMERCE: UNCHECK SHIP TO DIFFERENT ADDRESS ON CHECKOUT 
include(dirname(__FILE__) . '/modules/wpWooCommerceUnsetShipToDifferentAddress.php');

// DISABLED on LIVE
// WOOCOMMERCE: HIDE OUT OF STOCK VARIATIONS, https://stackoverflow.com/questions/46407618/hide-out-of-stock-variations-woocommerce
// include(dirname(__FILE__) . '/modules/wpWooCommerceHideOutOfStockVariations.php');

// LIVE
// WOOCOMMERCE + TYPES AND VIEWS: EXPOSE SHOP ORDERS TO TYPES AND VIEWS, https://wp-types.com/forums/topic/woocommerce-shop_order/
include(dirname(__FILE__) . '/modules/wpWooCommerceExposeToTypesAndViews.php');


/* OTHER WORDPRESS PLUGINS */

// LIVE
// EONET MANUAL USER APPROVE PLUGIN: PREVENT PASSWORD RESET UPON APPROVAL, https://wordpress.org/plugins/eonet-manual-user-approve/
include(dirname(__FILE__) . '/modules/wpEonetManualUserApprovePreventPasswordReset.php');


/* ------------------------------------------------------------------------------------------------------------------- */

// LIVE
// TOOLSET: This filter allows the Toolset app to filter results by their post status (Wordpress Woocommerce Status shipped,failed etc)
include(dirname(__FILE__) . '/modules/wpToolsetFilterResultsByPostStatus.php');

// LIVE
// ELEMENTOR: FIX ELEMENTOR EDITOR LANGUAGE 
include(dirname(__FILE__) . '/modules/wpElementorFixElementorEditorLanguage.php');

// LIVE
// QTRANSLATE + YOAST SEO FIX:  
include(dirname(__FILE__) . '/modules/wpQtranslateYoastSEOFix.php');

// LIVE
// WOOCOMMERCE + GUTENBERG: DISABLE BACK END BLOCK STYLES  
include(dirname(__FILE__) . '/modules/wpWooCommerceDisableGutenbergBlockstylesBACKEND.php');


// LIVE
// WOOCOMMERCE + GUTENBERG: DISABLE FRONT END BLOCK STYLES  
include(dirname(__FILE__) . '/modules/wpWooCommerceDisableGutenbergBlockstylesFRONTEND.php');

// WOOCOMMERCE : REDIRECT AFTER LOGIN, BROKEN? NOT IN USE  
// include(dirname(__FILE__) . '/modules/wpWooCommerceRedirectAfterLogin-Iconic.php');
?>
