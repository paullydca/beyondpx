<?php
/**
 * PMDIGC 2020 Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pmdigc-twentytwenty
 */

add_action( 'wp_enqueue_scripts', 'pmdigc_twentytwenty_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function pmdigc_twentytwenty_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'twentytwenty-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'pmdigc-twentytwenty-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentytwenty-style' )
	);

}
