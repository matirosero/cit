<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_filter( 'body_class','mro_cit_body_classes' );
function mro_cit_body_classes( $classes ) {

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'cit-customizer';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

    return $classes;

}


// Extract YT ID from meta field (must be get_post_meta())
function cit_get_youtube_id($youtube_url) {

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_url, $match);
    $youtube_id = $match[1];

    return $youtube_id;
}

function cit_view_log_users_on_page() {
	global $current_user, $wp_roles;

	if ( is_user_logged_in() && current_user_can( 'edit_others_posts' ) ) {

		$access_log = get_post_meta( get_the_ID(), '_cit_page_users_log', 1 );
		
		echo '<pre>';
		var_dump($access_log);
		echo '<pre>';

	}
}

function cit_log_users_on_page() {
	global $current_user, $wp_roles;


	// if ( is_user_logged_in() && current_user_can( 'edit_others_posts' ) ) {
	// 	$access_log = get_post_meta( get_the_ID(), '_cit_page_users_log', 1 );
	// 		echo '<pre>';
	// 		var_dump($access_log);
	// 		echo '<pre>';
	// }

	if ( is_user_logged_in() && !current_user_can( 'edit_others_posts' ) ) {

		$date = current_datetime();
		$access_log = array();



		if ( get_post_meta( get_the_ID(), '_cit_page_users_log', 1 )) {

			$access_log = get_post_meta( get_the_ID(), '_cit_page_users_log', 1 );

		}

		$access_log[] = array(
			'date'		=> $date,
			'user_id'	=> $current_user->ID
		);
				
		update_post_meta( get_the_ID(), '_cit_page_users_log', $access_log );
	}
}