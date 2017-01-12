<?php

/**
 * Defines the settings of the plugin
 * @link  http://midwestfamilymarketing.com
 * @since 1.0.0
 */

class Mdm_Staging_Tools_Settings extends Mdm_Staging_Tools {

    /**
     * Constructor Function
     * Calls parent constructor, which sets common fields
     * @since 1.0.0
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get default settings
     * @since 1.0.0
     * @static
     */
    public static function get_default_settings() {
        $default_options = array(
            'api_key' => null,
        );
        return $default_options;
    }

    public function register_default_settings() {
        // Get settings from database
        if( !isset( $this->plugin_settings ) ) {
            $this->plugin_settings = $this->get_plugin_settings();
        }
        update_option( $this->plugin_name, $this->plugin_settings );
    }

    /**
     * Get the setting fields used for the settings page
     * @since 1.0.0
     * @see https://codex.wordpress.org/Function_Reference/checked
     */
    protected function get_settings_fields() {
        // Get settings from database
        if( !isset( $this->plugin_settings ) ) {
            $this->plugin_settings = $this->get_plugin_settings();
        }
        // Define Fields
        $fields = array(
            'api_key'     => array(
               'title'       => __( 'API Key', $this->plugin_name ),
               'label'       => null,
               'type'        => 'text',
               'field_class' => 'widefat form-control',
               'field_id'    => sprintf( '%s[api_key]', $this->plugin_name ),
               'section'     => 'general',
               'before'      => '<div class="bootstrapped">',
               'after'       => '</div>',
               'description' => null,
               'placeholder' => null,
               'priority'    => array( 'global', 'network' ),
               'value'       => $this->plugin_settings['api_key'],
            ),
        );
        return $fields;
    }

    /**
     * Register plugin settings with WordPress
     * @since 1.0.0
     * @see https://codex.wordpress.org/Function_Reference/register_setting
     * @see https://codex.wordpress.org/Function_Reference/add_settings_section
     * @see https://codex.wordpress.org/Function_Reference/add_settings_field
     */
    public function register_settings() {
        register_setting( $this->plugin_name, $this->plugin_name );
        // Add Section
        add_settings_section( 'general', null, null, $this->plugin_name );
        // Get fields
        $fields = $this->get_settings_fields();
        // Cycle through fields, and register each
        foreach( $fields as $key => $field ) {
            // Add field
            add_settings_field( $field['field_id'], $field['title'], array( $this, 'display_setting_field' ), $this->plugin_name, $field['section'], $field );
        }
    }

    /**
     * Display setting fields
     * Include appropriate markup based on the type of field being displayed
     * @since 1.0.0
     */

    public function display_setting_field( $field ) {
        // Display before text
        if( isset( $field['before'] ) && !empty( $field['before'] ) ) {
            echo $field['before'];
        }
        // Display appropriate input
        switch( $field['type'] ) {
            case 'text' :
                include $this->plugin_path . 'partials/inputs/text.php';
                break;
            case 'number' :
                include $this->plugin_path . 'partials/inputs/number.php';
                break;
            case 'checkbox' :
                include $this->plugin_path . 'partials/inputs/checkbox.php';
                break;
            case 'radio' :
                include $this->plugin_path . 'partials/inputs/radio.php';
                break;
            case 'password' :
                include $this->plugin_path . 'partials/inputs/password.php';
                break;
            case 'textarea' :
                include $this->plugin_path . 'partials/inputs/textarea.php';
                break;
            case 'select' :
                include $this->plugin_path . 'partials/inputs/select.php';
                break;
            case 'group' : // Recursively call this function with single fields
                foreach( $field['fields'] as $single ) {
                    $this->display_field( $single );
                }
                break;
            default :
                break;
        }
        // Display after text
        if( isset( $field['after'] ) && !empty( $field['after'] ) ) {
            echo $field['after'];
        }
    }
} // end class