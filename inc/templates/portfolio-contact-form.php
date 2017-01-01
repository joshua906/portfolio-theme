<h1>Portfolio Contact Form</h1>
<?php settings_errors(); ?>
<code>[contact_form]</code>
<form method="post" action="options.php" class="portfolio-general-form">
	<?php settings_fields( 'portfolio-contact-options' ); ?>
	<?php do_settings_sections( 'portfolio_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>