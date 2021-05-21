<?php

/**
 * Set up taxonomies.
 *
 * @since 0.1.0
 */

/* Set up taxonomies */
add_action( 'init', 'mro_cit_register_tax' );


/* Register taxonomies */
function mro_cit_register_tax() {

	$trouble_post_types = array(
		'post',
		'cit_archive',
		'cit_unknown',
		'tribe_events',
		'cit_past_event',
		'cit_report'
	);
	$all_post_types = array(
		'page',
		'post',
		'cit_affiliate',
		'cit_alliances',
		'cit_archive',
		'cit_unknown',
		'cit_board_members',
		'cit_past_event',
		'cit_profile',
		'cit_testimonials',
		'cit_report',
		'tribe_events'
	);

	$no_events = array(
		'page',
		'post',
		'cit_affiliate',
		'cit_alliances',
		'cit_archive',
		'cit_unknown',
		'cit_board_members',
		// 'cit_past_event',
		'cit_profile',
		'cit_testimonials',
		'cit_report'
	);



	/*
	 * TAXONOMY: Problems
	 * CPT: Post, Archive, Unknown, Tribe Events, Past Events, Reports
	 */
	$labels = array(
		'name'                       => _x( 'Problems', 'taxonomy general name', 'mro-cit-functions' ),
		'singular_name'              => _x( 'Problem', 'taxonomy singular name', 'mro-cit-functions' ),
		'search_items'               => __( 'Search Problems', 'mro-cit-functions' ),
		'popular_items'              => __( 'Popular Problems', 'mro-cit-functions' ),
		'all_items'                  => __( 'All Problems', 'mro-cit-functions' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Problem', 'mro-cit-functions' ),
		'update_item'                => __( 'Update Problem', 'mro-cit-functions' ),
		'add_new_item'               => __( 'Add New Problem', 'mro-cit-functions' ),
		'new_item_name'              => __( 'New Problem Name', 'mro-cit-functions' ),
		'separate_items_with_commas' => __( 'Separate problems with commas', 'mro-cit-functions' ),
		'add_or_remove_items'        => __( 'Add or remove problems', 'mro-cit-functions' ),
		'choose_from_most_used'      => __( 'Choose from the most used problems', 'mro-cit-functions' ),
		'not_found'                  => __( 'No problems found.', 'mro-cit-functions' ),
		'menu_name'                  => __( 'Problems', 'mro-cit-functions' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'problemas' ),
	);

	register_taxonomy( 'mro_cit_problem', $trouble_post_types, $args );



	/*
	 * TAXONOMY: Sources
	 * CPT: All
	 */
	$labels = array(
		'name'                       => _x( 'Sources', 'taxonomy general name', 'mro-cit-functions' ),
		'singular_name'              => _x( 'Source', 'taxonomy singular name', 'mro-cit-functions' ),
		'search_items'               => __( 'Search Sources', 'mro-cit-functions' ),
		'popular_items'              => __( 'Popular Sources', 'mro-cit-functions' ),
		'all_items'                  => __( 'All Sources', 'mro-cit-functions' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Source', 'mro-cit-functions' ),
		'update_item'                => __( 'Update Source', 'mro-cit-functions' ),
		'add_new_item'               => __( 'Add New Source', 'mro-cit-functions' ),
		'new_item_name'              => __( 'New Source Name', 'mro-cit-functions' ),
		'separate_items_with_commas' => __( 'Separate sources with commas', 'mro-cit-functions' ),
		'add_or_remove_items'        => __( 'Add or remove sources', 'mro-cit-functions' ),
		'choose_from_most_used'      => __( 'Choose from the most used sources', 'mro-cit-functions' ),
		'not_found'                  => __( 'No sources found.', 'mro-cit-functions' ),
		'menu_name'                  => __( 'Sources', 'mro-cit-functions' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		// 'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'source' ),
	);

	// register_taxonomy( 'mro_cit_db_src', $all_post_types, $args );



	/*
	 * TAXONOMY: Years
	 * CPT: Past events, Tribe events
	 */
	$labels = array(
		'name'                       => _x( 'Years', 'taxonomy general name', 'mro-cit-functions' ),
		'singular_name'              => _x( 'Year', 'taxonomy singular name', 'mro-cit-functions' ),
		'search_items'               => __( 'Search Years', 'mro-cit-functions' ),
		'popular_items'              => __( 'Popular Years', 'mro-cit-functions' ),
		'all_items'                  => __( 'All Years', 'mro-cit-functions' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Year', 'mro-cit-functions' ),
		'update_item'                => __( 'Update Year', 'mro-cit-functions' ),
		'add_new_item'               => __( 'Add New Year', 'mro-cit-functions' ),
		'new_item_name'              => __( 'New Year Name', 'mro-cit-functions' ),
		'separate_items_with_commas' => __( 'Separate years with commas', 'mro-cit-functions' ),
		'add_or_remove_items'        => __( 'Add or remove years', 'mro-cit-functions' ),
		'choose_from_most_used'      => __( 'Choose from the most used years', 'mro-cit-functions' ),
		'not_found'                  => __( 'No years found.', 'mro-cit-functions' ),
		'menu_name'                  => __( 'Years', 'mro-cit-functions' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'yearly-events' ),
	);

	register_taxonomy( 'mro_cit_event_year', array('cit_past_event', 'tribe_events'), $args );


	/*
	 * TAXONOMY: Weird dates
	 * CPT: All except events
	 */
	$labels = array(
		'name'                       => _x( 'Weird Dates', 'taxonomy general name', 'mro-cit-functions' ),
		'singular_name'              => _x( 'Weird Date', 'taxonomy singular name', 'mro-cit-functions' ),
		'search_items'               => __( 'Search Weird Dates', 'mro-cit-functions' ),
		'popular_items'              => __( 'Popular Weird Dates', 'mro-cit-functions' ),
		'all_items'                  => __( 'All Weird Dates', 'mro-cit-functions' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Weird Date', 'mro-cit-functions' ),
		'update_item'                => __( 'Update Weird Date', 'mro-cit-functions' ),
		'add_new_item'               => __( 'Add New Weird Date', 'mro-cit-functions' ),
		'new_item_name'              => __( 'New Weird Date Name', 'mro-cit-functions' ),
		'separate_items_with_commas' => __( 'Separate weird dates with commas', 'mro-cit-functions' ),
		'add_or_remove_items'        => __( 'Add or remove weird dates', 'mro-cit-functions' ),
		'choose_from_most_used'      => __( 'Choose from the most used weird dates', 'mro-cit-functions' ),
		'not_found'                  => __( 'No weird dates found.', 'mro-cit-functions' ),
		'menu_name'                  => __( 'Weird Dates', 'mro-cit-functions' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		// 'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'weird-date' ),
	);

	// register_taxonomy( 'mro_cit_weird_date', $no_events, $args );
}