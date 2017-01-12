<?php
/**
 * The plugin bootstrap file
 * This file is read by WordPress to generate the plugin information in the plugin admin area.
 * This file also defines plugin parameters, registers the activation and deactivation functions, and defines a function that starts the plugin.
 * @link    http://midwestfamilymarketing.com
 * @since   1.0.0
 * @package dev_sandbox
 *
 * @wordpress-plugin
 * Plugin Name: MDM Staging Tools
 * Plugin URI:  http://midwestfamilymarketing.com
 * Description: Tools for staging with GIT
 * Version:     1.0.0
 * Author:      Mid-West Family Marketing
 * Author URI:  http://midwestfamilymarketing.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: mdm_staging_tools
 * Domain Path: /i18n
 */

// If this file is called directly, ABORT ABORT ABORT
if ( !defined( 'WPINC' ) ) {
    die( 'Bugger Off Script Kiddies!' );
}

/**
 * The code that runs during plugin activation.
 * @since 1.0.0
 */
if( !function_exists( 'activate_mdm_staging_tools_plugin' ) ) {
    function activate_mdm_staging_tools_plugin() {
        include_once plugin_dir_path( __FILE__ ) . 'core/class_mdm_staging_tools_activator.php';
        Mdm_Staging_Tools_Activator::activate();
    }
    register_activation_hook( __FILE__, 'activate_mdm_staging_tools_plugin' );
}

/**
 * Begins execution of the plugin.
 * @since 1.0.0
 */
if( !function_exists( 'init_mdm_staging_tools_plugin' ) ) {
    function init_mdm_staging_tools_plugin() {
        // Include our main plugin file
        include_once plugin_dir_path( __FILE__ ) . 'core/class_mdm_staging_tools.php';
        // Instantiate our plugin
        $plugin = new Mdm_Staging_Tools();
        // And finally, run it...
        $plugin->run();
    }
    // Let's kick this puppy off...
    init_mdm_staging_tools_plugin();
}