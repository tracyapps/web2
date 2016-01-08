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

/* Prevent logged out users from accessing bp activity page */
function nonreg_visitor_redirect() {
	global $bp;
	if ( bp_is_activity_component()
		|| bp_is_groups_component()
		|| bp_is_group_forum()
		|| bp_is_page( BP_MEMBERS_SLUG )
		|| bp_is_profile_component()
		|| bp_is_forums_component()
		|| bbp_is_single_forum()
		|| bbp_is_single_topic()
	) {
		if(!is_user_logged_in()) { //just a visitor and not logged in
			wp_redirect( get_option('siteurl') . '/register' );
		}
	}
}
add_filter( 'get_header', 'nonreg_visitor_redirect' ,1 );