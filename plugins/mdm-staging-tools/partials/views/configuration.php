<div data-git="<?php echo ( $is_git_repo ) ? 'true' : 'false'; ?>" id="gitsettings" class="wrap <?php echo sprintf( '%s_settings', $this->plugin_name ); ?>" data-environment="<?php echo $this->plugin_settings['env']; ?>">
	<div class="mdmpanel">
		<H2><span class="staginglogo"></span> Settings</H2>
		<hr>
		<?php var_dump( ABSPATH . $this->plugin_settings['path']  ); ?>
		<?php if( $is_git_repo === false ) : ?>
			<div class="bootstrapped" id="alerts">
				<p class="alert alert-danger">
					No repository was detected at the root of the project, let's install one now.
				</p>
			</div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php wp_nonce_field( 'update-options' ); ?>
			<?php settings_fields( $this->plugin_name ); ?>
			<?php do_settings_sections( $this->plugin_name ); ?>
			<div class="bootstrapped">
				<div class="col-sm-8">
					<?php submit_button(); ?>
				</div>
				<div class="col-sm-4">
					<?php if( $is_git_repo === false ) : ?>
						<p class="submit">
							<button type="button" id="init" class="button button-secondary pull-right" disabled>Init Repository</button>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</form>
	</div>
</div>
