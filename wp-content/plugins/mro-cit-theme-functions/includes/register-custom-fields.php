<?php
/*
 * Build link to old URL
 */
function link_to_old_url( $field_args, $field ) {
	$post_id = $field->object_id;
	$base = 'http://www.clubdeinvestigacion.com';
	$url = get_post_meta( $post_id, '_mro_old_url', true );
	if ($url) {
		echo '<p style="margin-top:0; margin-bottom: 0.5em;"><a href="' . $base . $url . '" target="_blank">Visit old URL</a></p>';
	}
}

/*
 * Page custom fields: Livestream
 */
add_action( 'cmb2_admin_init', 'cit_livestream_page_metabox' );
function cit_livestream_page_metabox() {
	$prefix = 'mro_cit_livestream_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Livestream information', 'mro-cit-functions' ),
		'object_types'  => array(
			'page'
		), // Post type
		'show_on'   => array( 
			'key' 	=> 'page-template', 
			'value' => 'template-livestream.php' 
		),
		'context'    => 'normal',
		'priority'   => 'high',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'oEmbed', 'demo-functions' ),
		'desc' => sprintf(
			/* translators: %s: link to codex.wordpress.org/Embeds */
			esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'demo-functions' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'   => $prefix . 'embed',
		'type' => 'oembed',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Active?', 'demo-functions' ),
		// 'desc' => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'   => $prefix . 'active',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => esc_html__( 'Show chat?', 'demo-functions' ),
		// 'desc' => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'   => $prefix . 'chat',
		'type' => 'checkbox',
	) );
}


/*
 * Page custom fields: temp subscribers
 */
add_action( 'cmb2_init', 'mro_cit_temp_subscribers_frontend_metabox' );
function mro_cit_temp_subscribers_frontend_metabox() {
	$prefix = 'mro_cit_temp_subscribers_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'frontend',
		// 'title'         => esc_html__( 'Temporary subscribers', 'mro-cit-functions' ),
		'object_types'  => array( 'page' ), // Post type
		'hookup'       => false,
        'save_fields'  => false,
	) );

   $temp_subscribers = $cmb->add_field( array(
        'id'          => $prefix . 'list',
        'type'        => 'group',
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Subscriber {#}', 'mro-cit-functions' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Subscriber', 'mro-cit-functions' ),
            'remove_button' => __( 'Remove Subscriber', 'mro-cit-functions' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );


    $cmb->add_group_field( $temp_subscribers, array(
        'name' => __( 'Subscriber name', 'mro-cit-functions' ),
        'id'   => 'name',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $temp_subscribers, array(
        'name' => __( 'Subscriber last name', 'mro-cit-functions' ),
        'id'   => 'lastname',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $temp_subscribers, array(
        'name' => __( 'Subscriber email', 'mro-cit-functions' ),
        'id'   => 'email',
        'type' => 'text_email',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
}


/*
 * Page custom fields: temp subscribers
 */
add_action( 'cmb2_admin_init', 'mro_cit_temp_subscribers_page_metabox' );
function mro_cit_temp_subscribers_page_metabox() {
	$prefix = 'mro_cit_temp_subscribers_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Temporary subscribers', 'mro-cit-functions' ),
		'object_types'  => array(
			'page'
		), // Post type
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-manage-temp-subscribers.php' ),
		'context'    => 'normal',
		'priority'   => 'high',
	) );

   $temp_subscribers = $cmb->add_field( array(
        'id'          => $prefix . 'list',
        'type'        => 'group',
        'description' => __( 'Manage temporary subscribers to the mailing list', 'mro-cit-functions' ),
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Subscriber {#}', 'mro-cit-functions' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Subscriber', 'mro-cit-functions' ),
            'remove_button' => __( 'Remove Subscriber', 'mro-cit-functions' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );


    $cmb->add_group_field( $temp_subscribers, array(
        'name' => __( 'Subscriber name', 'mro-cit-functions' ),
        'id'   => 'name',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $temp_subscribers, array(
        'name' => __( 'Subscriber last name', 'mro-cit-functions' ),
        'id'   => 'lastname',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $temp_subscribers, array(
        'name' => __( 'Subscriber email', 'mro-cit-functions' ),
        'id'   => 'email',
        'type' => 'text_email',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
}

/*
 * Page custom fields
 */
add_action( 'cmb2_admin_init', 'mro_cit_register_page_metabox' );
function mro_cit_register_page_metabox() {
	$prefix = 'mro_cit_page_';
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Content', 'mro-cit-functions' ),
		'object_types'  => array(
			'page'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );


	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Layout', 'demo-functions' ),
		// 'desc'             => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'               => $prefix . 'layout',
		'type'             => 'radio_inline',
		'show_option_none' => 'Traditional (one block of text)',
		'options'          => array(
			// 'hero' => esc_html__( 'Hero image with text overlaid', 'demo-functions' ),
			'hero-img-left'     => esc_html__( 'Hero image to the left', 'demo-functions' ),
			'hero-img-right'   => esc_html__( 'Hero image to the right', 'demo-functions' ),
		),
	) );


	$cmb_demo->add_field( array(
		'id'      => '_thumbnail', // Saves to WP post thumbnail, allows the_post_thumbnail()
		'name'    => 'Image',
		'desc'    => 'Upload/Select an image.',
		'type'    => 'file',
		'options' => array(
			'url' => false,
		),
		'text' => array(
			'add_upload_file_text' => 'Add Image'
		),
	) );
	
	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Background color', 'demo-functions' ),
		'desc'    => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'      => $prefix . 'bgcolor',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
		// 'attributes' => array(
		// 	'data-colorpicker' => json_encode( array(
		// 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
		// 	) ),
		// ),
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Primary text', 'demo-functions' ),
		'desc'    => esc_html__( 'If there is a hero image, this is the text that goes with it. In the traditional layout, this is the only text.', 'demo-functions' ),
		'id'      => 'post_content',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 10,
		),
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Secondary text', 'demo-functions' ),
		'desc'    => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'      => $prefix . 'secondary_content',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 20,
		),
	) );

    // Repeatable group
    $secondary_blocks = $cmb_demo->add_field( array(
        'id'          => $prefix . 'secondary_blocks',
        'type'        => 'group',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => __( 'Additional content blocks', 'mro-cit-functions' ) . ' {#}', // {#} gets replaced by row number
            'add_button'    => __( 'Add another content block', 'mro-cit-functions' ),
            'remove_button' => __( 'Remove content block', 'mro-cit-functions' ),
            'sortable'      => true, // beta
        ),
    ) );

	$cmb_demo->add_group_field( $secondary_blocks, array(
		'name' => __( 'Block Title', 'mro-cit-functions' ),
		'desc' => __( 'Enter the title for the content block.', 'mro-cit-functions' ),
		'id'   => 'title',
		'type' => 'text',
	) );

	$cmb_demo->add_group_field( $secondary_blocks, array(
		'name' => __( 'Block ID', 'mro-cit-functions' ),
		'desc' => __( 'Lowercase and dashes (-) only', 'mro-cit-functions' ),
		'id'   => 'block_id',
		'type' => 'text',
	) );

	$cmb_demo->add_group_field( $secondary_blocks, array(
		'name' => __( 'Block Content', 'mro-cit-functions' ),
		'desc' => __( 'Enter the content.', 'mro-cit-functions' ),
		'id'   => 'content',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 20,
		),
	) );
}

/*
 * Board members custom fields
 */
add_action( 'cmb2_admin_init', 'mro_cit_register_board_member_metabox' );
function mro_cit_register_board_member_metabox() {
	$prefix = 'mro_cit_board_member_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Additional information', 'mro-cit-functions' ),
		'object_types'  => array(
			'cit_board_members'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Position', 'mro-cit-functions' ),
		// 'desc'       => esc_html__( 'field description (optional)', 'mro-cit-functions' ),
		'id'         => $prefix . 'position',
		'type'       => 'text',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Email', 'mro-cit-functions' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );
}


/*
 * Download reports custom fields
 */
add_action( 'cmb2_admin_init', 'mro_cit_register_report_metabox' );
function mro_cit_register_report_metabox() {
	$prefix = 'mro_cit_report_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'downloads_metabox',
		'title'         => esc_html__( 'Report download information', 'mro-cit-functions' ),
		'object_types'  => array(
			'cit_report'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );


	// $cmb_demo->add_field( array(
	// 	'name'       => esc_html__( 'File path', 'mro-cit-functions' ),
	// 	// 'desc'       => esc_html__( 'field description (optional)', 'mro-cit-functions' ),
	// 	'id'         => $prefix . 'download_path',
	// 	'type'       => 'text',
	// 	'column'          => true,
	// ) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Download ID', 'mro-cit-functions' ),
		'desc' => esc_html__( 'ID de desccarga (bajo Downloads)', 'mro-cit-functions' ),
		'id'   => $prefix . 'download_id',
		'type' => 'text_small',
		'column'          => true,
		// 'repeatable' => true,
		// 'column' => array(
		// 	'name'     => esc_html__( 'Column Title', 'mro-cit-functions' ), // Set the admin column title
		// 	'position' => 2, // Set as the second column.
		// );
		// 'display_cb' => 'mro_cit_demo_display_text_small_column', // Output the display of the column values through a callback.
	) );
}

/*
 * Events custom fields
 */
add_action( 'cmb2_admin_init', 'mro_cit_register_events_rsvp_metabox' );
function mro_cit_register_events_rsvp_metabox() {
	$prefix = 'mro_cit_event_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'rsvp_metabox',
		'title'         => esc_html__( 'Inscripción', 'mro-cit-functions' ),
		'object_types'  => array(
			'cit_past_event',
			'tribe_events'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Incluir formulario de inscripción', 'mro-cit-functions' ),
		// 'desc' => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'   => $prefix . 'include_rsvp',
		'type' => 'checkbox',
		'default' => cmb2_set_checkbox_default_for_new_post( true ),
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Formulario', 'mro-cit-functions' ),
		// 'desc'       => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'         => $prefix . 'form_shortcode',
		'type'       => 'text',
		'default'    => esc_attr__( '[caldera_form id="CF5ec4040cbbab6"]', 'mro-cit-functions' ),
	) );
	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Formulario afiliados personales', 'mro-cit-functions' ),
		// 'desc'       => esc_html__( 'field description (optional)', 'demo-functions' ),
		'id'         => $prefix . 'personal_acct_form_shortcode',
		'type'       => 'text',
		'default'    => esc_attr__( '[caldera_form id="CF5ed7e0f6e05ae"]', 'mro-cit-functions' ),
	) );
}





add_action( 'cmb2_admin_init', 'mro_cit_register_events_metabox' );
function mro_cit_register_events_metabox() {
	$prefix = 'mro_cit_event_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'sections_metabox',
		'title'         => esc_html__( 'Additional information', 'mro-cit-functions' ),
		'object_types'  => array(
			'cit_past_event',
			'tribe_events'
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

    // Repeatable group
    $group_download = $cmb_demo->add_field( array(
        'id'          => $prefix . 'presentations',
        'type'        => 'group',
        'options'     => array(
            'group_title'   => __( 'Presentation', 'mro-cit-functions' ) . ' {#}', // {#} gets replaced by row number
            'add_button'    => __( 'Add another Presentation', 'mro-cit-functions' ),
            'remove_button' => __( 'Remove Presentation', 'mro-cit-functions' ),
            'sortable'      => true, // beta
        ),
    ) );

	$cmb_demo->add_group_field( $group_download, array(
		'name' => esc_html__( 'Upload file', 'mro-cit-functions' ),
		'desc' => esc_html__( 'Upload a PDF or enter a URL for one.', 'mro-cit-functions' ),
		'id'   => $prefix . 'presentation_file',
		'type' => 'file',
		'query_args' => array(
			'type' => 'application/pdf', // Make library only display PDFs.
		),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Video text', 'mro-cit-functions' ),
		'desc' => esc_html__( 'Texto o videos con embeds raros como los de Jimmy.', 'mro-cit-functions' ),
		'id'   => $prefix . 'video_text',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Video', 'mro-cit-functions' ),
		'desc' => sprintf(
			/* translators: %s: link to codex.wordpress.org/Embeds */
			esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'mro-cit-functions' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'   => $prefix . 'video',
		'type' => 'oembed',
		'repeatable'      => true,
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Gallery text', 'mro-cit-functions' ),
		'desc' => esc_html__( 'Texto o embeds de Facebook', 'mro-cit-functions' ),
		'id'   => $prefix . 'gallery_text',
		'type'    => 'wysiwyg',
		'sanitization_cb' => false,
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$cmb_demo->add_field( array(
		'name'         => esc_html__( 'Photos', 'mro-cit-functions' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'mro-cit-functions' ),
		'id'           => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Evaluación de la actividad', 'mro-cit-functions' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'evaluation',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
}


/*
 * Old URL link in sidebar
 */
add_action( 'cmb2_admin_init', 'mro_cit_register_migration_sidebar_metabox' );
function mro_cit_register_migration_sidebar_metabox() {
	$prefix = 'mro_cit_migration_sidebar_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Migration Information', 'mro-cit-functions' ),
		'object_types'  => array(
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
		), // Post type
		'context'    => 'side',
		'priority'   => 'high',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Old URL', 'mro-cit-functions' ),
		// 'desc'       => esc_html__( 'Read-only: URL on old site', 'mro-cit-functions' ),
		'id'         => '_mro_old_url',
		'type'       => 'text',
		// 'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'mro-cit-functions' ),
		// 'save_field' => false, // Disables the saving of this field.
		'attributes' => array(
			// 'disabled' => 'disabled',
			// 'readonly' => 'readonly',
		),
		'before_field'  => 'link_to_old_url',
	) );
}


/*
 * Custo fields with migration information
 */
add_action( 'cmb2_admin_init', 'mro_cit_register_migration_metabox' );
function mro_cit_register_migration_metabox() {
	$prefix = 'mro_cit_migration_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Migration Information', 'mro-cit-functions' ),
		'object_types'  => array(
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
			'cit_report'
		), // Post type
		// 'show_on_cb' => 'mro_cit_migration_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_migration_add_some_classes', // Add classes through a callback.
	) );


	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Manual author', 'mro-cit-functions' ),
		'desc'       => esc_html__( 'Read-only: author', 'mro-cit-functions' ),
		'id'         => '_mro_manual_author',
		'type'       => 'text',
		// 'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'mro-cit-functions' ),
		// 'save_field' => false, // Disables the saving of this field.
		// 'attributes' => array(
		// 	'disabled' => 'disabled',
		// 	'readonly' => 'readonly',
		// ),
		'column'          => true,
	) );

	// $cmb_demo->add_field( array(
	// 	'name'       => esc_html__( 'Old URL', 'mro-cit-functions' ),
	// 	'desc'       => esc_html__( 'Read-only: URL on old site', 'mro-cit-functions' ),
	// 	'id'         => '_mro_old_url',
	// 	'type'       => 'text',
	// 	// 'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'mro-cit-functions' ),
	// 	'save_field' => false, // Disables the saving of this field.
	// 	'attributes' => array(
	// 		'disabled' => 'disabled',
	// 		'readonly' => 'readonly',
	// 	),
	// 	'before_field'  => 'link_to_old_url',
	// ) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Manual date', 'mro-cit-functions' ),
		'desc'       => esc_html__( 'Read-only: date from text itself', 'mro-cit-functions' ),
		'id'         => '_mro_manual_date',
		'type'       => 'text',
		// 'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'mro-cit-functions' ),
		'save_field' => false, // Disables the saving of this field.
		'attributes' => array(
			'disabled' => 'disabled',
			'readonly' => 'readonly',
		),
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Yoast SEO Title', 'mro-cit-functions' ),
		'desc'       => esc_html__( 'Read-only', 'mro-cit-functions' ),
		'id'         => '_yoast_wpseo_title',
		'type'       => 'text',
		// 'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'mro-cit-functions' ),
		'save_field' => false, // Disables the saving of this field.
		'attributes' => array(
			'disabled' => 'disabled',
			'readonly' => 'readonly',
		),
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Yoast SEO Description', 'mro-cit-functions' ),
		'desc'       => esc_html__( 'Read-only', 'mro-cit-functions' ),
		'id'         => '_yoast_wpseo_metadesc',
		'type'       => 'textarea',
		// 'default'    => esc_attr__( 'Hey there, I\'m a read-only field', 'mro-cit-functions' ),
		'save_field' => false, // Disables the saving of this field.
		'attributes' => array(
			'disabled' => 'disabled',
			'readonly' => 'readonly',
		),
	) );
}