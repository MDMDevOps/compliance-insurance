<?php

/**
 * The core plugin class.
 * Registers all filters, actions, shortcodes, etc and orchastrates their execution
 * @since   1.0.0
 * @package mdm_staging_tools
 * @author  Mid-West Family Marketing
 */

class Mdm_Staging_Tools {

    /**
     * Plugin Path
     * @since 1.0.0
     * @access protected
     * @var (string) $plugin_path : The path to the plugins location on the server, is inherited by child classes
     */
    protected $plugin_path;

    /**
     * Plugin URL
     * @since 1.0.0
     * @access protected
     * @var (string) $plugin_url : The URL path to the location on the web, accessible by a browser
     */
    protected $plugin_url;

    /**
     * Plugin File
     * @since 1.0.0
     * @access protected
     * @var (string) $plugin_file : The reference to the core plugin file, used by Wordpress to build the slug
     */
    protected $plugin_file;

    /**
     * Plugin Slug
     * @since 1.0.0
     * @access protected
     * @var (string) $plugin_slug : Basename of the plugin, needed for Wordpress to set transients, and udpates
     */
    protected $plugin_slug;

    /**
     * Plugin Name
     * @since 1.0.0
     * @access protected
     * @var (string) $plugin_name : The unique identifier for this plugin
     */
    protected $plugin_name;

    /**
     * Plugin Version
     * @since 1.0.0
     * @access protected
     * @var (string) $plugin_version : The version number of the plugin, used to version scripts / styles
     */
    protected $plugin_version;

    /**
     * Plugin Options
     * @since 1.0.0
     * @access protected
     * @var (array) $plugin_options : The array that holds plugin options
     */
    protected $plugin_settings;

    /**
     * Constructor
     * Set required plugin fields
     */
    public function __construct() {
        $this->plugin_path = plugin_dir_path( __DIR__ );
        $this->plugin_url  = plugin_dir_url( __DIR__ );
        $this->plugin_file = $this->plugin_path . 'mdm_staging_tools.php';
        $this->plugin_slug = plugin_basename( $this->plugin_file );
        $this->plugin_name = 'mdm_staging_tools';
        $this->plugin_version = '1.0.0';
    }

    /**
     * Run
     * Run the plugin, and orchastrate the execution of modules
     * @since 1.0.0
     */
    public function run() {
        $this->load_dependencies();
        $this->register_internationalization_hooks();
        $this->register_settings_hooks();
        $this->register_admin_hooks();
        $this->register_public_hooks();
    }

    /**
     * Load dependencies
     * Include all the necessary classes / modules used by the plugin
     * @since 1.0.0
     * @access private
     */
    private function load_dependencies() {
    	include_once $this->plugin_path . 'core/class_mdm_staging_tools_git.php';
        include_once $this->plugin_path . 'core/class_mdm_staging_tools_i18n.php';
        include_once $this->plugin_path . 'core/class_mdm_staging_tools_settings.php';
        include_once $this->plugin_path . 'core/class_mdm_staging_tools_admin.php';
        include_once $this->plugin_path . 'core/class_mdm_staging_tools_public.php';
    }

    /**
     * Register internationalization (i18n) hooks
     * Orchastrate the execution of functions related to translation / internationalization
     * @since 1.0.0
     * @access private
     */
    private function register_internationalization_hooks() {
        $plugin_i18n = new Mdm_Staging_Tools_I18n();
        add_action( 'plugins_loaded', array( $plugin_i18n, 'load_plugin_textdomain' ) );
    }

    /**
     * Register Settings Hooks
     * Orchastrate the execution of functions related to plugin settings
     * @since  1.0.0
     * @access private
     */
    private function register_settings_hooks() {
        $plugin_settings = new Mdm_Staging_Tools_Settings();
        // Register menu item & hook into settings API
        add_action( 'admin_init', array( $plugin_settings, 'register_settings' ) );
    }

    /**
     * Register admin hooks
     * Orchastrate the execution of functions related to administration
     * @since 1.0.0
     * @access private
     */
    private function register_admin_hooks() {
        $plugin_admin = new Mdm_Staging_Tools_Admin();
        // Control scripts / style enqueing
        add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $plugin_admin, 'enqueue_scripts' ) );
        add_action( 'admin_menu', array( $plugin_admin, 'add_admin_pages' ) );
        // Control notices
        add_action( 'admin_notices', array( $plugin_admin, 'admin_notices' ) );
    }

    /**
     * Register public hooks
     * Orchastrate the execution of functions related to the public output
     * @since 1.0.0
     * @access private
     */
    private function register_public_hooks() {
        $plugin_public = new Mdm_Staging_Tools_Public();
        // Control scripts / style enqueing
        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_styles' ) );
        add_action( 'wp_enqueue_scripts', array( $plugin_public, 'enqueue_scripts' ) );
        add_action( 'rest_api_init',array( $plugin_public, 'register_rest_routes' ) );
        add_shortcode( 'styleguide', array( $plugin_public, 'style_guide_shortcode' ) );
        // add_filter( 'style_loader_src', array( $plugin_public, 'bust_browser_cache' ), 999999 );
        // add_filter( 'script_loader_src', array( $plugin_public, 'bust_browser_cache' ), 999999 );

    }

    /**
     * Register update hooks
     * Orchastrate the execution of functions related to performing updates
     * @since  1.0.0
     * @access private
     */
    private function register_update_hooks() {
        $plugin_updater = new Mdm_Staging_Tools_Updater();
        // Actions
        add_action( 'admin_init', array( $plugin_updater, 'set_plugin_properties' ) );
        // Filters
        add_filter( 'pre_set_site_transient_update_plugins', array( $plugin_updater, 'modify_transient' ), 10, 1 );
        add_filter( 'upgrader_post_install', array( $plugin_updater, 'after_install' ), 10, 3  );
        add_filter( 'plugins_api', array( $plugin_updater, 'plugin_popup' ), 10, 3 );
    }

    /**
     * Get plugin options from the database
     * @since  1.0.0
     * @access protected
     */
    protected function get_plugin_settings() {
        $default_settings  = Mdm_Staging_Tools_Settings::get_default_settings();
        return wp_parse_args( get_option(  $this->plugin_name, array() ), $default_settings );
    }

    /**
     * Pretty Debug Statement
     * Little helper function to print prettier debug statements
     * @param (any) $statement : Object, array, string, etc...anything to be printed to screen
     */
    protected function expose( $statement ) {
        echo '<div class="pretty_plugin_debug"><pre>';
        print_r( $statement );
        echo '</pre></div>';
    }
}