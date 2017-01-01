<?php
/*
	
@package matthewsthemes
	
	========================
		ADMIN PAGE
	========================
*/
function portfolio_add_admin_page() {
	
	//Generate Sunset Admin Page
	add_menu_page( 'Portfolio Theme Options', 'Portfolio', 'manage_options', 'portfolio_theme', 'portfolio_theme_create_page', get_template_directory_uri() . '/img/matthews-small.png', 110 );
	
	//Generate Sunset Admin Sub Pages
	add_submenu_page( 'portfolio_theme', 'Portfolio Theme Options', 'General', 'manage_options', 'portfolio_sunset', 'portfolio_theme_create_page' );
	add_submenu_page( 'portfolio_theme', 'Portfolio CSS Options', 'Custom CSS', 'manage_options', 'portfolio_sunset_css', 'portfolio_theme_settings_page');
	add_submenu_page( 'portfolio_theme', 'Portfolio Contact Form', 'Contact Form', 'manage_options', 'portfolio_theme_contact', 'portfolio_contact_form_page' );
	
	
	
}
add_action( 'admin_menu', 'portfolio_add_admin_page' );

//Activate custom settings
	add_action( 'admin_init', 'portfolio_custom_settings' );
function portfolio_custom_settings() {
	register_setting( 'portfolio-settings-group', 'first_name' );
	add_settings_section( 'portfolio-sidebar-options', 'Sidebar Option', 'portfolio_sidebar_options', 'portfolio_theme');
	add_settings_field( 'sidebar-name', 'First Name', 'portfolio_sidebar_name', 'portfolio_theme', 'portfolio-sidebar-options');
	
	//Contact Form Options
	register_setting( 'portfolio-contact-options', 'activate_contact' );
	
	add_settings_section( 'portfolio-contact-section', 'Contact Form', 'portfolio_contact_section', 'portfolio_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'portfolio_activate_contact', 'portfolio_theme_contact', 'portfolio-contact-section' );
	
	
}

function portfolio_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}
function portfolio_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}
function portfolio_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}




//Template submenu functions

function portfolio_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/portfolio-contact-form.php' );
}









function portfolio_sidebar_options() {
	echo 'Customize your Sidebar Information';
}
function portfolio_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}
function portfolio_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/portfolio-admin.php' );
}
function portfolio_theme_settings_page() {
	
	echo '<h1>Portfolio Custom CSS</h1>';
	
}

?>