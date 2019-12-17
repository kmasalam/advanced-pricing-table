<?php
/**
 * Plugin Name: Advanced Pricing for Elementor
 * Plugin URI: https://advancedaddons.com/elementor
 * Description: The most advanced collection of Elementor Pricing widgets.
 * Version: 1.0.0
 * Author: Advanced Addons
 * Author URI: https://advancedaddons.com/
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ap_elementor
 * Domain Path: /languages/
 *
 * @package Advanced_Pricing
 */

    if( !function_exists('add_action') ) {
        die('Elementor not Installed'); // if Elementor not installed kill the page.
    }

    // Define absoulote path
    if( !defined( 'ABSPATH' ) ) exit; // No access of directly access

    define( 'APE_VERSION', '1.0.0' );
    // Define file
    define('APE_FILE', __FILE__);
    // Define url
    define('APE_URL', plugins_url('/', __FILE__ ) );
    // Define path
    define('APE_PATH', plugin_dir_path( __FILE__ ) );
    // Assets
    define( 'APE_DIR_ASSETS', trailingslashit( APE_URL . 'assets' ) );
     // Admin
     define( 'APE_DIR_Admin', trailingslashit( APE_URL . 'admin' ) );
    
    require APE_PATH . 'base/base.php';

    // Class Register
    if (class_exists('Advanced_pricing_table_For_Elementor')) {
        # code...
        $ap_for_elementor = new Advanced_pricing_table_For_Elementor();
        $ap_for_elementor->ape_for_elementor_register();
        $ap_for_elementor->ap_for_elementor_widget_bundle();

    }
    
    // Activation
    register_activation_hook( __FILE__, array($ap_for_elementor, 'activate' ));

    // Deactivation
    register_deactivation_hook( __FILE__, array($ap_for_elementor, 'deactivate' ));
