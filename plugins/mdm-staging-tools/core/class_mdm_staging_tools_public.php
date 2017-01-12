<?php

/**
 * Defines public functions
 * @link  http://midwestfamilymarketing.com
 * @since 1.0.0
 */

class Mdm_Staging_Tools_Public extends Mdm_Staging_Tools {

    /**
     * Exceptions
     * @since 1.0.0
     * @access protected
     * @var (object) $exception : Used to flag if an exception has occured
     */
    protected $user_agent;

    /**
     * Database Connection
     * @since 1.0.0
     * @access protected
     * @var (pdo object) $dbconnection : The connection to the database
     */
    protected $update;

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
        wp_enqueue_style( sprintf( '%s_public', $this->plugin_name ), $this->plugin_url . 'styles/dist/staging.public.min.css', array(  ), $this->plugin_version, 'all' );
    }

    /**
     * Enqueue and localize admin site javascript
     * @since 1.0.0
     * @see https://developer.wordpress.org/reference/functions/wp_enqueue_script/
     * @see https://developer.wordpress.org/reference/functions/wp_localize_script/
     */
    public function enqueue_scripts() {
        wp_enqueue_script( sprintf( '%s_public', $this->plugin_name ), $this->plugin_url . 'scripts/dist/staging.public.min.js', array( 'jquery' ), $this->plugin_version, true );
        wp_localize_script( sprintf( '%s_public', $this->plugin_name ), 'wpgcajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php') ) );
    }

    /**
     * Register Routes with WP Rest API
     * @since 1.0.0
     */
    public function register_rest_routes() {
    	register_rest_route( 'staging/v1', '/pull', array(
    	    'methods' => 'POST',
    	    'callback' => array( $this, 'update_project' ),
    	) );

        register_rest_route( 'gitupdate/v1', '/themes/(?P<id>[\w-]+)', array(
            'methods' => 'POST',
            'callback' => array( $this, 'update_project' ),
            'args' => array(
                'id' => array(
                    'description' => 'The id of a registered sidebar',
                    'type' => 'string',
                ),
            ),
        ) );
    }

    public function update_project( $request ) {
        // do type checking here as the method declaration must be compatible with parent
        if ( !$request instanceof WP_REST_Request ) {
            throw new InvalidArgumentException( __METHOD__ . ' expects an instance of WP_REST_Request' );
        }
        // If we're not pushing to the master branch, we can bail
        if( !isset( $request['ref'] ) || strpos( $request['ref'], 'master' ) === false ) {
            return new WP_REST_Response( 'Push not on master branch', 200 );
        }
        // Mdm_Staging_Tools_Git::pull();
        return new WP_REST_Response(  Mdm_Staging_Tools_Git::pull(), 200 );
    }

    public function bust_browser_cache( $src ) {
        // Add a hash of a random number
        $random_version_string = sha1( rand ( 100 , 10000 ) + rand ( 100 , 10000 ) );
        // Append to src
        $src = add_query_arg( 'ver', $random_version_string, $src );
        return $src;
    }

    public function style_guide_shortcode( $atts = array() ) {
    	ob_start();
    	include $this->plugin_path . 'partials/pages/styleguide.php';
    	return ob_get_clean();
    }
} // end class