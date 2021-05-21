<?php

/**
 * Set up post types.
 *
 * @since 0.1.0
 */

/* Set up post types */
add_action( 'init', 'mro_cit_register_cpt' );


/* Register post types */
function mro_cit_register_cpt() {


	/*
	 * Affiliate
	 */
	register_post_type( 'cit_affiliate',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Affiliates', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Affiliate', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Affiliates', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Affiliate', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Affiliate', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Affiliate', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Affiliate', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Affiliates', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No affiliates found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No affiliates found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Affiliate items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 40, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-groups', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite' 	=> array( 'slug' => 'afiliados' ),
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => false,  //change to false?
	 	) /* end of options */
	); /* end of register post type */


	/*
	 * Alliances
	 */
	register_post_type( 'cit_alliances',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Alliances', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Alliance', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Alliances', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Alliance', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Alliance', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Alliance', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Alliance', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Alliances', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No alliances found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No alliances found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Alliance items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 40, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-admin-links', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite' 	=> array( 'slug' => 'alianzas' ),
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => false,  //change to false?
	 	) /* end of options */
	); /* end of register post type */


	/*
	 * Archive
	 */
	register_post_type( 'cit_archive',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Archives', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Archive', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Archives', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Archive', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Archive', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Archive', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Archive', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Archives', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No archives found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No archives found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Archive items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 29, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-archive', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> false, /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'author' ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => true,  //change to false?
	 	) /* end of options */
	); /* end of register post type */


	/*
	 * Unknown
	 */
	register_post_type( 'cit_unknown',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Unknowns', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Unknown', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Unknowns', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Unknown', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Unknown', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Unknown', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Unknown', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Unknowns', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No unknowns found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No unknowns found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Unknown items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 50, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-editor-help', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> false, /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'author' ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => true,  //change to false?
	 	) /* end of options */
	); /* end of register post type */


	/*
	 * Board Members
	 */
	register_post_type( 'cit_board_members',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Board members', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Board member', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Board members', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Board member', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Board member', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Board member', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Board member', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Board members', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No board members found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No board members found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Board member items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 40, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-businessman', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite' 	=> array( 'slug' => 'junta-directiva' ),
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => false,  //change to false?
	 	) /* end of options */
	); /* end of register post type */



	/*
	 * Profile
	 */
	register_post_type( 'cit_profile',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Profiles', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Profile', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Profiles', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Profile', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Profile', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Profile', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Profile', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Profiles', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No profiles found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No profiles found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Profile items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 40, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-id-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite' 	=> array( 'slug' => 'biografias' ),
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => false,  //change to false?
	 	) /* end of options */
	); /* end of register post type */


	/*
	 * Testimonial
	 */
	register_post_type( 'cit_testimonials',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Testimonials', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Testimonial', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Testimonials', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Testimonial', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Testimonial', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Testimonial', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Testimonial', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Testimonials', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No testimonials found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No testimonials found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Testimonial items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 40, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-format-quote', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> false, /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => false,  //change to false?
	 	) /* end of options */
	); /* end of register post type */


	/*
	 * Report
	 */
	register_post_type( 'cit_report',

	 	// let's now add all the options for this post type
		array('labels' => array(
				'name' => __('Reports', 'mro-cit-functions'), /* This is the Title of the Group */
				'singular_name' => __('Report', 'mro-cit-functions'), /* This is the individual type */
				'all_items' => __('All Reports', 'mro-cit-functions'), /* the all items menu item */
				'add_new' => __('Add New', 'mro-cit-functions'), /* The add new menu item */
				'add_new_item' => __('Add New Report', 'mro-cit-functions'), /* Add New Display Title */
				'edit' => __( 'Edit', 'mro-cit-functions' ), /* Edit Dialog */
				'edit_item' => __('Edit Report', 'mro-cit-functions'), /* Edit Display Title */
				'new_item' => __('New Report', 'mro-cit-functions'), /* New Display Title */
				'view_item' => __('View Report', 'mro-cit-functions'), /* View Display Title */
				'search_items' => __('Search Reports', 'mro-cit-functions'), /* Search Custom Type Title */
				'not_found' =>  __('No reports found', 'mro-cit-functions'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('No reports found in Trash', 'mro-cit-functions'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Report items', 'mro-cit-functions' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true, //change to false?
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 25, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-book-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite' 	=> array( 'slug' => 'informes' ),
			'has_archive' => true, /* you can rename the slug here */
			'taxonomies' => array( 'category' ),
			// 'capability_type' => 'post',
			'hierarchical' => false, //false = post
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'revisions' ),
			'show_in_menu'        => TRUE,
        	'show_in_nav_menus'   => true,  //change to false?
	 	) /* end of options */
	); /* end of register post type */

}