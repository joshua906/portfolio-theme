<?php
/*
	
@package matthewsthemes
	
	========================
		THEME CUSTOM POST TYPES
	========================
*/
$contact = get_option( 'activate_contact' );
if( @$contact == 1 ){
	
	add_action( 'init', 'portfolio_contact_custom_post_type' );
	
	add_filter('manage_portfolio-contact_posts_columns', 'portfolio_contact_columns');
	
	add_action( 'manage_portfolio-contact_posts_custom_column', 'portfolio_contact_custom_column', 10, 2 );
	
	add_action( 'add_meta_boxes', 'portfolio_contact_add_meta_box' );
	add_action( 'save_post', 'portfolio_save_contact_email_data' );
}
/* CONTACT CPT */
function portfolio_contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Messages',
		'singular_name' 	=> 'Message',
		'menu_name'			=> 'Messages',
		'name_admin_bar'	=> 'Message'
	);
	
	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 7,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'author' )
	);
	
	register_post_type( 'portfolio-contact', $args );
	
}

function portfolio_contact_columns( $columns ) {
	
	$newColumns = array();
	$newColumns['title'] = 'Full Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['company'] = 'Company';
	$newColumns['date'] = 'Date';
	return $newColumns;
}



function portfolio_contact_custom_column( $column, $post_id ){
	
	switch( $column ){
		
		case 'message' :
			echo get_the_excerpt();
			break;
			
		case 'email' :
			//email column
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
			
			case 'company' :
			//email column
			echo 'company';
			break;
	}
	
}

//Contact Meta Boxes
function portfolio_contact_add_meta_box() {
	add_meta_box( 'contact_email', 'User Email', 'portfolio_contact_email_callback', 'portfolio-contact', 'side' );
}
function portfolio_contact_email_callback( $post ) {
	wp_nonce_field( 'portfolio_save_contact_email_data', 'portfolio_contact_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
	echo '<label for="portfolio_contact_email_field">User Email Address: </lable>';
	echo '<input type="email" id="portfolio_contact_email_field" name="portfolio_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}


function portfolio_save_contact_email_data( $post_id ) {
	
	if( ! isset( $_POST['portfolio_contact_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['portfolio_contact_email_meta_box_nonce'], 'portfolio_save_contact_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['portfolio_contact_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['portfolio_contact_email_field'] );
	
	update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	
}




?>




















