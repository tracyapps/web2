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


/**
 * buddypress things
 */

function bp_guest_redirect() {
	global $bp;
	if ( bp_is_activity_component()
		|| bp_is_groups_component()
		/*|| bbp_is_single_forum()*/
		|| bp_is_forums_component()
		|| bp_is_blogs_component()
		|| bp_is_page( BP_MEMBERS_SLUG ) ) {
		// enter the slug or component conditional here
		if(!is_user_logged_in()) {
			wp_redirect( get_option('siteurl') . '/register' );
		}
	}
}
add_filter( 'get_header', 'bp_guest_redirect', 1 );