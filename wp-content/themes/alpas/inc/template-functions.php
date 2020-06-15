<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Alpas
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function alpas_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'alpas_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function alpas_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'alpas_pingback_header' );

/**
 * Your Domain RTL
 */
if( ! function_exists( 'alpas_rtl' ) ):
	function alpas_rtl() {
		global $alpas_opt;

		if(	isset( $alpas_opt['alpas_enable_rtl'])  ):
			$alpas_rtl_opt = $alpas_opt['alpas_enable_rtl'];
		else:
			$alpas_rtl_opt = 'disable';
		endif;

		if ( isset( $_GET['rtl'] ) ) {
			$alpas_rtl_opt = $_GET['rtl'];
		}

		if( $alpas_rtl_opt == 'enable' ):
			$alpas_rtl = true;
		else:
			$alpas_rtl = false;
		endif;
		
		return $alpas_rtl;
	}
endif;
