<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package montblanc
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function montblanc_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'montblanc_jetpack_setup' );
