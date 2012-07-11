<?php

load_theme_textdomain( 'guarddog-theme', TEMPLATEPATH . '/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";

if ( is_readable($locale_file) )
    require_once($locale_file);

function get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __('Page ','guarddog-theme') . get_query_var('paged');
    }
}	
/*
$defaults = array(
	'default-image'          => get_template_directory_uri() . '/images/headers/guard-dog-logo.png',
	'random-default'         => false,
	'width'                  => 350,
	'height'                 => 100,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support('custom-header', $defaults );
*/

#remove support for custom header (only supports 1 image)
#add support for post type "header image" which supports featured images

define('BP_DTHEME_DISABLE_CUSTOM_HEADER', true);

//add support for featured images with post type of header image
add_theme_support( 'post-thumbnails', array('header_image','slideshow_image') ); 


add_action('init', 'header_post_register');

function header_post_register(){
	$labels = array(
		'name' => _x('GuardDog Header Post', 'post type general name'), //this is the (probably plural) name for our new post type
		'singular_name' => _x('GuardDog Header Post', 'post type singular name'), //how you’d refer to this in the singular (such as ‘Add new ****’)
		'add_new' => _x('Add New', 'header post'),
		'add_new_item' => __('Add New Header post'),
		'edit_item' => __('Edit Header Post'),
		'new_item' => __('New Header Post'),
		'view_item' => __('View Header Post'),
		'search_items' => __('Search Header Post'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail', 'editor')
	);
	
	register_post_type( 'header_post' , $args );	
}

add_action('init', 'home_page_posts');
function home_page_posts(){
	$labels = array(
		'name' => _x('Home Page Post', 'post type general name'), 
		'singular_name' => _x('Home Page Post', 'post type singular name'),
		'add_new' => _x('Add New', 'header post'),
		'add_new_item' => __('Add New Header post'),
		'edit_item' => __('Edit Header Post'),
		'new_item' => __('New Header Post'),
		'view_item' => __('View Header Post'),
		'search_items' => __('Search Header Post'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
}


//This registers menu! Makes it available in theme!
register_nav_menus( array(  
    'primary' => __( 'Primary Navigation', 'GuardDog Theme' )
) );

add_action('init', 'footer_post_register');

function footer_post_register(){
	$labels = array(
		'name' => _x('GuardDog Footer Post', 'post type general name'), //this is the (probably plural) name for our new post type
		'singular_name' => _x('GuardDog Footer Post', 'post type singular name'), //how you’d refer to this in the singular (such as ‘Add new ****’)
		'add_new' => _x('Add New', 'footer post'),
		'add_new_item' => __('Add New Footer post'),
		'edit_item' => __('Edit Footer Post'),
		'new_item' => __('New Footer Post'),
		'view_item' => __('View Footer Post'),
		'search_items' => __('Search Footer Post'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail', 'editor')
	);
	
	register_post_type( 'footer_post' , $args );
}

add_action('wp_enqueue_scripts', 'load_scripts');
function load_scripts() {
    wp_enqueue_script('jquery');
	wp_enqueue_script('cycle',get_template_directory_uri().'/scripts/cycle.js', array('jquery'));
	wp_enqueue_script('api',get_template_directory_uri().'/scripts/api.js', array('cycle'));
}

?>