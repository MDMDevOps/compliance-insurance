<?php

class Mdm_Staging_Tools_Git {

	const GIT_ROOT = 'wp-content';
	const GIT_ORG  = 'MDMDevOps';
	const GIT_REPO = 'compliance-insurance';

	/**
	 * Constructor Function
	 * Calls parent constructor, which sets common fields
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct();
	}

	public static function get_git_path() {
		return trailingslashit( ABSPATH . self::GIT_ROOT );
	}

	public static function get_git_org() {
		return self::GIT_ORG;
	}

	public static function get_git_repo() {
		return self::GIT_REPO;
	}


	public static function get_project_environment() {
		if( strpos( strtolower( $_SERVER['HTTP_HOST'] ), 'mdmserver' ) !== false ) {
		    return 'staging';
		} elseif( strpos( strtolower( $_SERVER['HTTP_HOST'] ), '.dev' ) !== false  ) {
		    return 'development';
		}
		return 'production';
	}

	public static function is_repo_active() {
		try {
			$set_path = self::get_git_path();
			chdir( $set_path );
			$real_path = shell_exec( 'git rev-parse --show-toplevel' );
			if( trailingslashit( trim( $real_path ) ) === $set_path ) {
				return true;
			}
			return false;
		} catch (Exception $e) {
			// do some type of error reporting
			return false;
		}
	}

	public static function get_remote( ) {
		try {
			chdir( self::get_git_path() );
			return shell_exec( 'git config --get remote.origin.url' );
		} catch (Exception $e) {
			// Later we will do error logging
			return false;
		}
	}

	public static function get_repository_data( $api_key, $path, $queries = array() ) {
		// Set up defaults to avoid index errors
		$default_queries = array(
			'per_page' => 1000,
		);
		// Merge passed arguments with defaults
		$queries = wp_parse_args( $queries, $default_queries );
		// Get data from github API
		try {
			// 1: Build request URI
			$request_uri = sprintf( 'https://api.github.com/repos/%s/%s/%s', self::GIT_ORG, self::GIT_REPO, $path );
			// 2: Append variables
			$request_uri = add_query_arg( 'access_token', $api_key, rtrim( $request_uri, '/' ) );
			// 3. Append additional queries
			foreach( $queries as $key => $query ) {
				$request_uri = add_query_arg( $key, $query, rtrim( $request_uri, '/' ) );
			}
			// 3: Get json response from github and parse it
			return json_decode( wp_remote_retrieve_body( wp_remote_get( $request_uri ) ), true );
		} catch (Exception $e) {
			// Later we will do error logging
			return false;
		}
	}

	public static function initialize_staging( $path ) {
		$config = file_get_contents( $path . 'config' );
		if( strpos( $config, '[merge "ours"]' ) === false ) {
			$config  = $config . "\n";
			$config .= '[merge "ours"]' . "\n";
			$config .= '    name = "Keep ours merge"' . "\n";
			$config .= '    driver = true' . "\n";
			file_put_contents( $path . 'config', $config );
		}
		update_option( 'staging_inilialized', true );
	}

	public static function pull() {
		try {
			chdir( self::get_git_path() );
			$pull_message  = shell_exec( 'git fetch --all' );
			$pull_message .= shell_exec( 'git reset --hard origin/master' );
			return $pull_message;
		} catch (Exception $e) {
			return false;
		}
	}

	public static function push() {
		try {
			chdir( self::get_git_path() );
			$git  = shell_exec( 'git add --all' );
			$git .= shell_exec( sprintf( 'git commit -m %s', $_POST['git_message'] ) );
			$git .= shell_exec( 'git push origin master' );
		} catch (Exception $e) {
			// Do stuff here with the exception
		}
	}

}
