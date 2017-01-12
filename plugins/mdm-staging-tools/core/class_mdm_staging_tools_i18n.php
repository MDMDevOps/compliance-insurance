<?php

/**
 * Define the internationalization functionality
 * @since 1.0.0
 */

class Mdm_Staging_Tools_I18n extends Mdm_Staging_Tools {
    /**
     * Load the plugin text domain for translation.
     * @see https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
     * @since 1.0.0
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( $this->plugin_name, false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/i18n/' );
    }
}