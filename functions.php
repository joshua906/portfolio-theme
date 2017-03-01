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
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array('jquery'), '1.0.0', true );
	
  	  wp_enqueue_script( 'jquery' );
	  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/3.1.2/masonry.pkgd.js' );
	  wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery') );
	

}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_js');


//add theme support
add_theme_support('custom-background');
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('post-formats', array('aside','image','video','audio', 'quote', 'link', 'gallery',));

/// register template types


///theme menus

function portfolio_register_theme_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __( 'Primary Menu' ),
    )
  );
}

add_action( 'init', 'portfolio_register_theme_menus');



///Custom Post fields


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
			'content',
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

/// custom taxonomies

function portfolio_custom_taxonomies() {
	$labels = array(
		'name' => 'Fields',
		'singular_name' => 'Fields',
		'search_items'=> 'Search Fields',
		'all_items' => 'All Items',
		'parent_items' => 'Parent Fields',
		'parent_item_colon' => 'Parent Fields:',
		'edit_item' => 'Edit Fields',
		'update_item' => 'Update Fields',
		'add_new_item' => 'Add New Item',
		'new_item_name' => 'New Fields Name',
		'menu_name' => 'Fields',
		
	);
	
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'Fields'),
		
	);
	
	register_taxonomy('fields', array('portfolio'), $args);
	
}

add_action('init', 'portfolio_custom_taxonomies');



/******* Register Widget Links **********/
function portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hedmark' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Sidebar widget areas for blog', 'hedmark' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2><div class="kt-smart-divider"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Instagram', 'hedmark' ),
		'id'            => 'footer-a',
		'description'   => esc_html__('Instagram Widget Area', 'hedmark'),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'portfolio_widgets_init' );



include_once( get_template_directory() . '/widgets/kt-about-me.php' );
include_once( get_template_directory() . '/widgets/kt-social.php' );
include_once( get_template_directory() . '/widgets/kt-latest-posts.php' );
include_once( get_template_directory() . '/widgets/kt-image-banner.php' );
include_once( get_template_directory() . '/widgets/kt-code-banner.php' );
include_once( get_template_directory() . '/widgets/kt-facebook-like.php' );








?>