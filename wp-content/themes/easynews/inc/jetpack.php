<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package EasyNews
 */
/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/content-options/
 */
function easynews_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'easynews_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'easynews-style',
			'author'     => '.byline',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links'
		),
		'featured-images' => array(
			'post' => true
		),
	) );
}

add_action( 'after_setup_theme', 'easynews_jetpack_setup' );
/**
 * Custom render function for Infinite Scroll.
 */
function easynews_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}