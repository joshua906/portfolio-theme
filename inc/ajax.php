<?php
/*
	
@package matthewsportfolio
	
	========================
		AJAX FUNCTIONS
	========================
*/
add_action( 'wp_ajax_nopriv_portfolio_load_more', 'portfolio_load_more' );
add_action( 'wp_ajax_portfolio_load_more', 'portfolio_load_more' );

add_action( 'wp_ajax_nopriv_portfolio_save_user_contact_form', 'portfolio_save_contact' );
add_action( 'wp_ajax_portfolio_save_user_contact_form', 'portfolio_save_contact' );

function portfolio_load_more() {
	
	$paged = $_POST["page"]+1;
	$prev = $_POST["prev"];
	$archive = $_POST["archive"];
	
	if( $prev == 1 && $_POST["page"] != 1 ){
		$paged = $_POST["page"]-1;
	}
	
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
	);
	
	if( $archive != '0' ){
		
		$archVal = explode( '/', $archive );
		$flipped = array_flip($archVal);
		
		switch( isset( $flipped ) ) {
			
			case $flipped["category"] :
				$type = "category_name";
				$key = "category";
				break;
				
			case $flipped["tag"] :
				$type = "tag";
				$key = $type;
				break;
				
			case $flipped["author"] :
				$type = "author";
				$key = $type;
				break;
			
		}
		
		$currKey = array_keys( $archVal, $key );
		$nextKey = $currKey[0]+1;
		$value = $archVal[ $nextKey ];
			
		$args[ $type ] = $value;
		
		//check page trail and remove "page" value
		if( isset( $flipped["page"] ) ){
			
			$pageVal = explode( 'page', $archive );
			$page_trail = $pageVal[0];
			
		} else {
			$page_trail = $archive;
		}
		
	} else {
		$page_trail = '/';
	}
	
	$query = new WP_Query( $args );
	
	if( $query->have_posts() ):
		
		echo '<div class="page-limit" data-page="' . $page_trail . 'page/' . $paged . '/">';
				
		while( $query->have_posts() ): $query->the_post();
		
			get_template_part( 'template-parts/content', get_post_format() );
		
		endwhile;
		
		echo '</div>';
		
	else:
	
		echo 0;
		
	endif;
	
	wp_reset_postdata();
	
	die();
	
}
function portfolio_check_paged( $num = null ){
	
	$output = '';
	
	if( is_paged() ){ $output = 'page/' . get_query_var( 'paged' ); }
	
	if( $num == 1 ){
		$paged = ( get_query_var( 'paged' ) == 0 ? 1 : get_query_var( 'paged' ) );
		return $paged;
	} else {
		return $output;
	}
	
}
function portfolio_save_contact(){
	
	$title = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$company = wp_strip_all_tags($_POST["company"]);
	$message = wp_strip_all_tags($_POST["message"]);
	echo $title . ',' . $email . ',' .$message;
	
  $args = array(
        'post_title' => $title,
        'post_content' => $message,
	  	'post_company' => $company,
        'post_author' => 1,
        'post_status' => 'publish',
        'post_type' => 'portfolio-contact',
        'meta_input' => array(
            '_contact_email_value_key' => $email,
        ),
    );
    $postID = wp_insert_post($args);
	
	
    if ($postID !== 0) {
        $to = get_bloginfo('admin_email');
        $subject = 'Portfolio Contact Form - '.$title;
        $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>'; // 'From: Alex <me@alecaddd.com>'
        $headers[] = 'Reply-To: '.$title.' <'.$email.'>';
        $headers[] = 'Content-Type: text/html: charset=UTF-8';
        wp_mail($to, $subject, $message, $headers);
    }
  
    echo $postID;

	
	
	//wp_insert_post();
	die();
}