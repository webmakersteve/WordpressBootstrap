<?php

define('T', dirname(get_stylesheet_uri()) . '/' );
define('THEME_VERSION', 1);

function bootstrap_autoload($class_name) {
	if ( class_exists( $class_name, false )) return;
    $filename = str_replace('_', DIRECTORY_SEPARATOR, strtolower($class_name)).'.php';

    $file = dirname(__FILE__).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'bootstrap'.DIRECTORY_SEPARATOR.$filename;
    if ( ! file_exists($file))
    {
        return FALSE;
    }
    include $file;	
}

if (function_exists('__autoload')) spl_autoload_register( '__autoload' );
spl_autoload_register( 'bootstrap_autoload' );

add_theme_support( 'menus' );
add_theme_support( 'html5' );
add_theme_support( 'post-formats' );
add_theme_support( 'post-thumbnails' );
//add_theme_support( 'admin-bar', array( 'callback' => 'ads') );


register_nav_menus( array(
	'primary'	=> "Top Menu"
));

function bootstrapRegisterHead() {
	
	//first add bootstrap
	wp_register_style('bootstrap-css', T.'public/css/bootstrap.min.css', false, THEME_VERSION, 'all');
	wp_register_style('bootstrap-theme', T.'public/css/bootstrap-theme.min.css', false, THEME_VERSION, 'all');
	wp_register_style('main-css', get_stylesheet_uri(), false, THEME_VERSION, 'all');
	
	$fixed_header = "body {padding-top: 50px;padding-bottom: 20px;}";
	wp_add_inline_style( 'fixed-header', $fixed_header ); //fixed headers only
	
	wp_register_script('modernizr', T.'public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', false, THEME_VERSION, false);
	
}

function bootstrapEnqueueHead() {
	bootstrapRegisterHead();
	
	wp_enqueue_style( 'bootstrap-css' );
	wp_enqueue_style( 'bootstrap-theme' );
	wp_enqueue_style( 'main-css');
	
	wp_enqueue_script( 'modernizr' );
}

add_action( 'wp_enqueue_scripts', 'bootstrapEnqueueHead' );

function bootstrapRegisterFoot() {
	//wp_register_script('jQuery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js", false, THEME_VERSION, true); pretty sure wordpress requires this
	
	//wp_localize_script( 'jQuery', 'hotloaded', "window.jQuery || document.write('<script src=\"js/vendor/jquery-1.10.1.min.js\"><\/script>')" );
	
	wp_register_script('bootstrap', T.'public/js/vendor/bootstrap.min.js', false, THEME_VERSION, true);
	wp_register_script('main', T.'public/js/main.js', false, THEME_VERSION, true);
	
}

function bootstrapEnqueueFoot() {
	bootstrapRegisterFoot();
	
	wp_enqueue_script( 'jQuery' );
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('main');	
}

add_action( 'wp_enqueue_scripts', 'bootstrapEnqueueFoot' );

if (is_admin_bar_showing()) add_action( 'wp_head', function( ) {
	?><style type="text/css">
		.navbar-fixed-top {top: 32px !important;}
	</style><?php 
});