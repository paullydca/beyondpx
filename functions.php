<?php
/*
 Theme Name:   Beyond the Pixel
 Theme URI:    https://beyondthepx.com
 Description:  A child theme of Twenty Twenty WordPress theme.
 Author:       Elicus Technologies
 Author URI:   https://elicus.com
 Template:     twentytwenty
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'wp_enqueue_scripts', 'twentytwenty_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function twentytwenty_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'twentytwenty-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'pmdigc-twentytwenty-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentytwenty-style' )
	);

}

/**
 * Removes the site description from the header
 * 
 * @link https://developer.wordpress.org/reference/functions/__return_empty_string/
 * @since 0.2.0
 */
add_filter( 'twentytwenty_site_description', '__return_empty_string' );

/**
 * Removes the page title from the homepage
 * 
 * @since 0.2.0
 */
add_filter( 'the_title', 'pmdigc_twentytwenty_singular_title' );

function pmdigc_twentytwenty_singular_title( $title ){
	if ( is_front_page() && !is_page_template('templates/template-cover.php') ){
		return '';
	}
	
	return $title;
}
