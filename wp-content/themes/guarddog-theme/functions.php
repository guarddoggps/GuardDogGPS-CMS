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

add_action( 'init', 'header_image_register' );
function header_image_register() {
	
	$labels = array(
		'name' => _x('GuardDog Header Image', 'post type general name'), //this is the (probably plural) name for our new post type
		'singular_name' => _x('GuardDog Header Image', 'post type singular name'), //how you’d refer to this in the singular (such as ‘Add new ****’)
		'add_new' => _x('Add New', 'header image'),
		'add_new_item' => __('Add New Header Image'),
		'edit_item' => __('Edit Header Image'),
		'new_item' => __('New Header Image'),
		'view_item' => __('View Header Image'),
		'search_items' => __('Search Header Images'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true, //should they be shown in the admin UI
		'publicly_queryable' => true,
		'show_ui' => true, //should we display an admin panel for this custom post type
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png', //a custom icon for the admin panel
		'rewrite' => true, // rewrites permalinks using the slug 'header_image'
		'capability_type' => 'post', //WordPress will treat this as a ‘post’ for read, edit, and delete capabilities
		'hierarchical' => false, // is it hierarchical, like pages
		'menu_position' => null,
		'supports' => array('thumbnail') //which items do we want to display on the add/edit post page
	);
		
	register_post_type( 'header_image' , $args );
}


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
		'supports' => array('editor')
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


add_action('init', 'menu_register');

function menu_register() {
  register_nav_menus(
    array(
	      'header-menu' => __( 'Header Menu' )
	    )
  );
}

add_action('wp_enqueue_scripts', 'load_scripts');
function load_scripts() {
    wp_enqueue_script('jquery');
	wp_enqueue_script('cycle',get_template_directory_uri().'/scripts/cycle.js', array('jquery'));
	wp_enqueue_script('api',get_template_directory_uri().'/scripts/api.js', array('cycle'));
}


?>