<?php

/**
 * Fired during plugin activation
 * Registeres custom post types & taxonomies, adds default terms, and flushes rewrite rules
 * @link  http://midwestfamilymarketing.com
 * @since 1.0.0
 */

class Mdm_Staging_Tools_Activator {

    /**
     * Handles all of the activation
     * Register post types, Registers taxonomies, sets default terms, flushes rewrite rules, and sets default plugin settings
     * @param (array) $plugin_args : array that holds plugin arguments
     * @since 1.0.0
     */
    public static function activate() {
        self::activate_settings();
    }

    /**
     * Activates plugin setting defaults
     * @since 1.0.0
     */
    public static function activate_settings() {
        // Include our core file before including the types class which extends it
        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class_mdm_staging_tools.php';
        // Include our types class and instantiate it
        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/class_mdm_staging_tools_settings.php';
        $settings = new Mdm_Staging_Tools_Settings();
        // Run the activation
        $settings->register_default_settings();
    }

} // end class