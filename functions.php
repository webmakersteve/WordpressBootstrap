<?php

define('T', dirname(get_stylesheet_uri()) . '/' );
define('THEME_VERSION', 1);

require('src/menu/walker.php');

add_theme_support( 'menus' );
add_theme_support( 'html5' );
add_theme_support( 'post-formats' );
add_theme_support( 'post-thumbnails' );
//add_theme_support( 'admin-bar', array( 'callback' => 'ads') );


register_nav_menus( array(
	'primary'	=> "Top Menu"
));

function bootstrap_register_defaults() {
	
	//first add bootstrap
	wp_register_style('main-css', get_stylesheet_uri(), false, THEME_VERSION, 'all');
	
	$fixed_header = "main {min-height: 100%;}";
	wp_add_inline_style( 'fixed-header', $fixed_header ); //fixed headers only
	
	wp_register_script('modernizr', T.'public/js/modernizr.min.js', false, THEME_VERSION, false);


    // Now we can localize the script with our data.
    wp_localize_script( 'modernizr', 'bootstrap', array( '__dirname' => get_template_directory_uri() ) );

}

function bootstrap_enqueue_defaults() {
	bootstrap_register_defaults();
	
	wp_enqueue_style( 'main-css');
	wp_enqueue_script( 'modernizr' );
}

add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_defaults' );


if (is_admin_bar_showing()) add_action( 'wp_head', function( ) {
	?><style type="text/css">
		.navbar-fixed-top {top: 32px !important;}
	</style><?php 
});