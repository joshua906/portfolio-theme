<?php 

// Get other template files

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/ajax.php';

//css styles
function portfolio_theme_styles() {
	

	 wp_enqueue_style( 'bootstrap_min_css', get_template_directory_uri() . '/css/bootstrap.min.css' );

	
	 wp_enqueue_style( 'portfolio_css', get_template_directory_uri() . '/style.css' );
  
}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_styles');

function portfolio_theme_js() {
	 
	wp_enqueue_script( 'portfolio', get_template_directory_uri() . '/js/portfolio.js', array('jquery'), '1.0.0', true );
  	  wp_enqueue_script( 'jquery' );
	  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	  
	

}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_js');


//add theme support
add_theme_support('custom-background');
add_theme_support('post-thumbnail');
add_theme_support('menus');
add_theme_support('post-formats', array('aside','image','video'));



function portfolio_register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
    )
  );
}

add_action( 'init', 'portfolio_register_theme_menus');



///Custom Post Types


function portfolio_custom_post_type() {
	
	$labels = array(
	'name' => 'Portfolio',
		'singular_name' => 'Portfolio',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No items Found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item',
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon'			=> 'dashicons-portfolio',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio',$args);
	
	
}
add_action('init','portfolio_custom_post_type');




















?>