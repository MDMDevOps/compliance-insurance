<div id="gitsettings" class="wrap <?php echo sprintf( '%s_settings', $this->plugin_name ); ?>">
	<div class="mdmpanel">
		<H2><span class="staginglogo"></span> Settings</H2>
		<hr>
		<form method="post" action="options.php">
			<?php wp_nonce_field( 'update-options' ); ?>
			<?php settings_fields( $this->plugin_name ); ?>
			<?php do_settings_sections( $this->plugin_name ); ?>
			<?php submit_button(); ?>
		</form>

	</div>
	<div class="mdmpanel">
		<H2><span class="staginglogo"></span> GIT Configuration</H2>
		<hr>
		<?php if( Mdm_Staging_Tools_Git::is_repo_active() ) : ?>
			<ul>
				<li><strong>Repository SSH: </strong><?php echo Mdm_Staging_Tools_Git::get_remote(); ?></li>
				<li><strong>Repository HTTPS: </strong><?php echo Mdm_Staging_Tools_Git::get_remote(); ?></li>
				<li><strong>Repository Path: </strong><?php echo Mdm_Staging_Tools_Git::get_git_path(); ?></li>
				<li><strong>Webhook: </strong><?php echo sprintf( '%s/wp-json/staging/v1/pull', get_home_url() ); ?></li>
			</ul>
		<?php else : ?>
				<p class="alert alert-danger">
					Repository not configured
				</p>
		<?php endif; ?>
	</div>
</div>
