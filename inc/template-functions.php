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

function filter_blog_posts($query){
	if ( ! is_admin() && $query->is_main_query() ) {

		if ( $_GET['author'] ) {
			$query->set( 'author__in', explode(' ', $_GET['author']) );
		}

		if ( $_GET['month'] && $_GET['year'] ) {
			$query->set( 'date_query', array(
					array(
						'month' => $_GET['month'],
						'year'	=> $_GET['year']
					)
				)
			);
		}
	}
}
add_action( 'pre_get_posts', 'filter_blog_posts' );

// Sets up archives for dropdown filter
function ddd_get_archives() {
	$formatted_archives = array();

	$args = array(
		'type' => 'monthly',
		'echo' => '0',
		'order' => 'ASC',
		'post_status' => 'publish'
	);
	$archives = wp_get_archives($args);
	$archives = explode('<li>', $archives);

	$months = array(
		'1' => 'January',
		'2'	=> 'February',
		'3'	=> 'March',
		'4' => 'April',
		'5' => 'May',
		'6' => 'June',
		'7' => 'July',
		'8' => 'August',
		'9' => 'September',
		'10' => 'October',
		'11' => 'November',
		'12' => 'December',
	);

	unset($archives[0]);

	foreach ( $archives as $key => $date ) {
		$new_date = $date;
		$new_date = strstr($new_date, '>');
		$new_date = strstr($new_date, '<', true);
		$new_date = str_replace('>', '', $new_date);
		$new_array = explode(' ', $new_date);
		$formatted_date = array(
			'month_name' => $months[array_search($new_array[0], $months)],
			'month' => array_search($new_array[0], $months),
			'year'  => $new_array[1]
		);
		array_push($formatted_archives, $formatted_date);
	}

	return $formatted_archives;
}
