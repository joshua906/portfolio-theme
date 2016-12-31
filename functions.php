<?php 



//css styles
function portfolio_theme_styles() {
	
  wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css' );
	 wp_enqueue_style( 'bootstrap_min_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	 wp_enqueue_style( 'bootstrap-theme_css', get_template_directory_uri() . '/css/bootstrap-theme.css' );
	 wp_enqueue_style( 'bootstrap-theme-min_css', get_template_directory_uri() . '/css/bootstrap-theme.min.css' );
	 wp_enqueue_style( 'portfolio_css', get_template_directory_uri() . '/css/portfolio.css' );
  
}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_styles');

function portfolio_theme_js() {
	  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js' );
  	  wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js' );
	  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js (1)' );
	

}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_js');


//add theme support
add_theme_support('custom-background');
add_theme_support('post-thumbnail');
add_theme_support('menus');


function portfolio_register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
    )
  );
}

add_action( 'init', 'portfolio_register_theme_menus');


?>