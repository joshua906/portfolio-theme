<h1>Portfolio Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'portfolio-settings-group' ); ?>
	<?php do_settings_sections( 'portfolio_theme' ); ?>
	<?php submit_button(); ?>
</form>