<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && !is_front_page() ) {
		if ( !in_array( basename( get_permalink() ), $classes ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	// Add class if sidebar is active
	if ( Setup\display_sidebar() ) {
		$classes[] = 'sidebar-primary';
	}

	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '" class="read-more">' . __( 'Continued &raquo;', 'sage' ) . '</a>';
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );


add_filter('logout_url', 'web2_logout_url',100,2);
function web2_logout_url( $logout_url, $redirect) {
	//simply ignore the redirect and set it to the main domain

	$redirect = get_blog_option( SITE_ID_CURRENT_SITE, 'siteurl' );


	$args = array( 'action' => 'logout' );
	if ( !empty($redirect) ) {
		$args['redirect_to'] = $redirect;
	}

	$logout_url = add_query_arg($args, site_url('wp-login.php', 'login'));
	$logout_url = wp_nonce_url( $logout_url, 'log-out' );

	return $logout_url;
}