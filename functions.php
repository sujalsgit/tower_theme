<?php
/**
 * Functions and definitions
 *
 */

/* 
Include primary navigation menu
*/
function tower_nav_init() {
	register_nav_menus( array(
		'menu-1' => 'Primary Menu',
	) );
}
add_action( 'init', 'tower_nav_init' );

/**
 * Enqueue scripts and styles.
 */
function tower_scripts() {
	wp_enqueue_style( 'tower-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tower-custom-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_script( 'tower-scripts', get_template_directory_uri() . '/assets/js/scripts.js' );
}
add_action( 'wp_enqueue_scripts', 'tower_scripts' );