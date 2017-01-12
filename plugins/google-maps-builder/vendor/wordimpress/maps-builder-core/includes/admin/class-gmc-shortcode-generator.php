<?php

/**
 * GMB_Shortcode_Generator class.
 *
 * Adds a TinyMCE button that's clickable
 *
 * @since      2.0
 */
abstract class Google_Maps_Builder_Core_Shortcode_Generator {

	/**
	 * Constructor
	 */
	public function __construct() {

		add_action( 'admin_head', array( $this, 'add_shortcode_button' ), 20 );
		add_filter( 'tiny_mce_version', array( $this, 'refresh_mce' ), 20 );
		add_filter( 'mce_external_languages', array( $this, 'add_tinymce_lang' ), 20, 1 );

		// Tiny MCE button icon
		add_action( 'admin_head', array( $this, 'set_tinymce_button_icon' ) );
		add_action( 'wp_ajax_gmb_shortcode_iframe', array( $this, 'gmb_shortcode_iframe' ), 9 );
	}

	/**
	 * Add a button for the GPR shortcode to the WP editor.
	 */
	public function add_shortcode_button() {
		global $post, $pagenow;

		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		//Be sure to not allow on out post type
		if ( ! isset( $post->post_type ) || $post->post_type === 'google_maps' ) {
			return;
		}

		if ( ! in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
			return;
		}

		// check if WYSIWYG is enabled
		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', array( $this, 'add_shortcode_tinymce_plugin' ), 10 );
			add_filter( 'mce_buttons', array( $this, 'register_shortcode_button' ), 10 );
		}
	}

	/**
	 * Add TinyMCE language function.
	 *
	 * @param array $arr
	 *
	 * @return array
	 */
	public function add_tinymce_lang( $arr ) {
		$arr['gmb_shortcode_button'] = GMB_CORE_PATH . '/includes/admin/shortcode-generator-i18n.php';

		return $arr;
	}

	/**
	 * Register the shortcode button.
	 *
	 * @param array $buttons
	 *
	 * @return array
	 */
	public function register_shortcode_button( $buttons ) {

		array_push( $buttons, '|', 'gmb_shortcode_button' );

		return $buttons;
	}

	/**
	 * Add the shortcode button to TinyMCE
	 *
	 * @param array $plugin_array
	 *
	 * @return array
	 */
	public function add_shortcode_tinymce_plugin( $plugin_array ) {

		$plugin_array['gmb_shortcode_button'] = GMB_CORE_URL . '/assets/js/admin/admin-shortcode.js';

		return $plugin_array;
	}

	/**
	 * Force TinyMCE to refresh.
	 *
	 * @param int $ver
	 *
	 * @return int
	 */
	public function refresh_mce( $ver ) {
		$ver += 3;

		return $ver;
	}

	/**
	 * Adds admin styles for setting the tinymce button icon
	 */
	public static function set_tinymce_button_icon() {
		?>
		<style>
			i.mce-i-gmb {
				font: 400 20px/1 dashicons;

				padding: 0;
				vertical-align: top;
				speak: none;
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
				margin-left: -2px;
				padding-right: 2px
			}

			#gmb_shortcode_dialog-body {
				background: #F1F1F1;
			}

			.gmb-shortcode-submit {
				margin: 0 -15px;
				position: fixed;
				bottom: 0;
				background: #FFF;
				width: 100%;
				padding: 15px;
				border-top: 1px solid #DDD;
			}

			div.place-id-set {
				clear: both;
				float: left;
				width: 100%;
			}

		</style>
		<?php
	}

	/**
	 * Display the contents of the iframe used when the GPR Shortcode Generator is clicked
	 * TinyMCE button is clicked.
	 *
	 * @param int $ver
	 *
	 * @return int
	 */
	public static function gmb_shortcode_iframe() {
		set_current_screen( 'google-maps-builder' );
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		//Shortcode Generator Specific JS
		wp_register_script( 'gmb-shortcode-generator', GMB_CORE_URL . '/assets/js/admin/shortcode-iframe' . $suffix . '.js', array( 'jquery' ) );
		wp_enqueue_script( 'gmb-shortcode-generator' );

		iframe_header(); ?>

		<style>
			#gmb-wrap {
				margin: 0 1em;
				overflow: hidden;
				padding-bottom: 75px;
			}

			/* iFrame Styles */
			#gmb_settings label {
				margin-bottom: 3px;
				display: block;
			}

			div.gmb-shortcode-hidden-fields-wrap {
				display: none;
			}

			.gmb-place-search-wrap > div.gmb-map-select {
				width: 65%;
				margin-right: 2%;
				float: left;
			}

			div.updated {
				width: 100%;
				float: left;
				box-sizing: border-box;
			}

			div.gmb-edit-shortcode {
				border-color: orange;
			}

			<?php
				/**
				* Add styles to the shortcode iFrame
				*
				* Runs inside of the style tag
				*
				* @since 2.1.0
				*/
				do_action( 'gmb_shortcode_iframe_style'  );

			?>
		</style>
		<div class="wrap" id="gmb-wrap">
			<form id="gmb_settings" style="float: left; width: 100%;">
				<?php do_action( 'gmb_shortcode_iframe_before' ); ?>
				<fieldset id="gmb_location_lookup_fields" class="gmb-place-search-wrap clear" style="margin:1em 0;">
					<div class="gmb-map-select">
						<label for="gmb_location_lookup"><strong><?php _e( 'Choose a Map', 'google-maps-builder' ); ?></strong></label>
						<?php echo Google_Maps_Builder()->html->maps_dropdown(); ?>
					</div>
				</fieldset>

				<div class="updated new-shortcode">
					<p><?php _e( '<strong>Insert Shortcode</strong>: Select your desired map from the dropdown above then click create shortcode below.', 'google-maps-builder' ); ?></p>
				</div>

				<div class="updated gmb-edit-shortcode" style="display: none;">
					<p><?php _e( '<strong>Edit Active Shortcode:</strong> Customize the map for this shortcode by modifying the map selection above.', 'google-maps-builder' ); ?></p>
				</div>

				<?php do_action( 'gmb_shortcode_iframe_after' ); ?>

				<fieldset class="gmb-shortcode-submit">
					<input id="gmb_submit" type="submit" class="button-small button-primary" value="<?php _e( 'Create Shortcode', 'google-maps-builder' ); ?>" />
					<input id="gmb_cancel" type="button" class="button-small button-secondary" value="<?php _e( 'Cancel', 'google-maps-builder' ); ?>" />
				</fieldset>

			</form>
			<?php
				/**
				 * Runs after shortcode form in iFrame
				 *
				 * @since 2.1.0
				 */
				do_action( 'gmb_after_shortcode_form' );
			?>
		</div>


		<?php iframe_footer();
		exit();
	}

}
