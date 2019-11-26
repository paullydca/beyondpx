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

/**
 * Add support for page excerpts
 * 
 * @since 0.2.2
 */
add_post_type_support( 'page', 'excerpt' );


/**
 * Display the site title even when custom logo is set
 * 
 * @since 0.2.3
 */
add_filter( 'twentytwenty_site_logo_args', 'pmdigc_twentytwenty_site_logo_args' );

function pmdigc_twentytwenty_site_logo_args( $args ){
	// Create a title link
	$args['title'] = '<a href="%1$s" class="custom-logo-title-link">%2$s</a>';
	$site_title = get_bloginfo( 'name' );
	$title_link = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
	
	// Add title after the logo link
	$args['logo'] = '%1$s' . $title_link;
	$args['logo_class'] = 'site-logo site-title';
	
	return $args;
}