<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package EasyNews
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function easynews_body_classes( $classes ) {
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
add_filter( 'body_class', 'easynews_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function easynews_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'easynews_pingback_header' );


function easynews_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url( home_url( '/' ) ) . '" >
    <label for="s">
    	<input type="text" value="' . get_search_query() . '" placeholder="' . esc_attr__( 'Search &hellip;', 'easynews' ) . '" name="s" id="s" />
    </label>
    <button type="submit" class="search-submit">
        <i class="fa fa-search"></i>
    </button>
    </form>';
	return $form;
}
add_filter( 'get_search_form', 'easynews_search_form' );