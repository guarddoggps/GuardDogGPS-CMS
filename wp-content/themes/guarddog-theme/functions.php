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
?>