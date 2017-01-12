<?php

/**
 * Defines admin functions
 * @link  http://midwestfamilymarketing.com
 * @since 1.0.0
 */

class Mdm_Staging_Tools_Admin extends Mdm_Staging_Tools {

    /**
     * Constructor Function
     * Calls parent constructor, which sets common fields
     * @since 1.0.0
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Enqueue admin site css files
     * @since 1.0.0
     * @see https://developer.wordpress.org/reference/functions/wp_enqueue_style/
     */
    public function enqueue_styles() {
        wp_enqueue_style( sprintf( '%s_admin', $this->plugin_name ), $this->plugin_url . 'styles/dist/admin.min.css', array(), $this->plugin_version, 'all' );
    }

    /**
     * Enqueue and localize admin site javascript
     * @since 1.0.0
     * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
     * @see https://developer.wordpress.org/reference/functions/wp_localize_script/
     */
    public function enqueue_scripts() {
        wp_enqueue_script( sprintf( '%s_admin', $this->plugin_name ), $this->plugin_url . 'scripts/dist/admin.min.js', array( 'jquery' ), $this->plugin_version, true );
        wp_localize_script( sprintf( '%s_admin', $this->plugin_name ), 'wpgitajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

    /**
     * Admin notices
     * Display notices to users on the admin interface
     * @since 1.0.0
     * @see https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
     */
    public function admin_notices() {
        if( !isset( $_GET['page'] ) || $_GET['page'] !== $this->plugin_name ) {
            return;
        }
    }

    public function add_admin_pages() {
        //add_submenu_page( $this->plugin_name, __( 'Deployment History', $this->plugin_name ), __( 'Deployments', $this->plugin_name ), 'manage_options', sprintf( '%s_deployments', $this->plugin_name ), array( $this, 'display_deployments' ) );
        add_menu_page( __( 'Staging Tools', $this->plugin_name ), __( 'Staging', $this->plugin_name ), 'manage_options', $this->plugin_name, array( $this, 'display_deployments' ), 'dashicons-admin-generic', 0 );
    }

    public function display_deployments(){
        if( !isset( $this->plugin_settings ) ) {
            $this->plugin_settings = $this->get_plugin_settings();
        }
        // Include configuration markup
        include $this->plugin_path . 'partials/views/init.php';
        if( Mdm_Staging_Tools_Git::is_repo_active() ) {
        	// Get list of all issues
        	$issues = Mdm_Staging_Tools_Git::get_repository_data( $this->plugin_settings['api_key'], 'issues', array( 'state' => 'all' ) );
        	// Get list of all commits
        	$commits = Mdm_Staging_Tools_Git::get_repository_data( $this->plugin_settings['api_key'], 'commits' );
        	// Include markup
        	include $this->plugin_path . 'partials/views/dashboard.php';
        }
        // // Determines path if git repo is configured
        // $path = Mdm_Staging_Tools_Git::get_project_repo_path();
        // if( $path !== false ) {
        // 	if( Mdm_Staging_Tools_Git::is_configured( $this->plugin_settings ) !== false ) {
        // 		if( get_option( 'staging_inilialized' ) ) {
        // 			Mdm_Staging_Tools_Git::initialize_staging( $path );
        // 		}
        // 		include $this->plugin_path . 'partials/views/dashboard.php';
        // 	}
        // }
    }


} // end class