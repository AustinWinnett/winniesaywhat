<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Desk_Dog_Development
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function desk_dog_development_body_classes( $classes ) {
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
add_filter( 'body_class', 'desk_dog_development_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function desk_dog_development_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'desk_dog_development_pingback_header' );

function ddd_component( $component, $data = array(), $selectors = array() ) {
	if ( $selectors['classes'] && $selectors['id'] ) {
		$component_info = 'class="ddd-'. $component . ' ' . $selectors['classes'] . '" id="' . $selectors['id'] . '"';
	} elseif ( $selectors['classes'] && !$selectors['id'] ) {
		$component_info = 'class="ddd-'. $component . ' ' . $selectors['classes'] . '"';
	} elseif ( !$selectors['classes'] && $selectors['id'] ) {
		$component_info = 'class="ddd-'. $component . '" id="' . $selectors['id'] . '"';
	} else {
		$component_info = 'class="ddd-'. $component . '"';
	}
	include(locate_template('template-parts/components/' . $component . '.php'));
}

function new_excerpt_more($more) {
	global $post;
	return '&hellip;<br /><br /><a href="' . get_permalink() . '" class="styled-link">Read More</a>';
}
add_action('excerpt_more', 'new_excerpt_more');

function change_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'change_excerpt_length', 999 );

function format_comment() {
	include(locate_template('template-parts/modules/comment.php'));
}

function university_adjust_queries($query){
   if ( ! is_admin() && $query->is_main_query() ) {
      $query->set( 'author__in', array(1,2) );
			$query->set( 'date_query', array(
	      array(
		        'month' => '5'
		      )
		    )
			);

   }
}
add_action( 'pre_get_posts', 'university_adjust_queries' );
