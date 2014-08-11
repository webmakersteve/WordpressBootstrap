<?php

define('T', dirname(get_stylesheet_uri()) . '/' );
define('THEME_VERSION', 1);

require('src/menu/walker.php');
require('src/comments/walker.php');

add_theme_support( 'menus' );
add_theme_support( 'html5' );
add_theme_support( 'post-formats' );
add_theme_support( 'post-thumbnails' );
//add_theme_support( 'admin-bar', array( 'callback' => 'ads') );

add_theme_support( 'post-formats', array( 'gallery', 'link', 'image', 'video' ) );


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

function bootstrap_nav_menu( $overrides = null ) {
	
    $args = array(
        'theme_location'  => 'primary',
        'menu'            => '',
        'container'       => false,
        'menu_class'      => 'nav navbar-nav navbar-right',
        'menu_id'		  => "main-menu",
        'walker'          => new Bootstrap_Menu_Walker(),
        'echo'            => true
    );

    if ($overrides !== null) {
    	foreach( $overrides as $k=>$v ) {
    		$args[$k] = $v;
    	}
    }

    $defaults = array_merge($args, array('fallback_cb' => Bootstrap_Menu_Walker::fallback($args)));

    wp_nav_menu( $defaults );
}

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function bootstrap_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'bootstrap_wp_title', 10, 2 );