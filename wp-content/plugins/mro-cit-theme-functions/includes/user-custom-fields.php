<?php

add_action( 'cmb2_admin_init', 'mro_cit_register_user_personal_metabox' );
function mro_cit_register_user_personal_metabox() {
	$prefix = 'mro_cit_user_';
	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'afiliado_personal_edit',
		'title'            => __( 'Afiliado Personal Profile Metabox', 'mro-cit-functions' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		'show_on' 			=> array( 
								'key' => 'role', 
								'value' => array(
									'afiliado_personal',
									'afiliado_especial'
									) 
								),
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Afiliado Personal', 'mro-cit-functions' ),
		// 'desc'     => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'       => $prefix . 'afiliado_personal_title',
		'type'     => 'title',
		'on_front' => false,
	) );


	$cmb_user->add_field( array(
		'name' => __( 'Phone number', 'mro-cit-functions' ),
		// 'desc' => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'phone',
		'type' => 'text',
	) );

	$cmb_user->add_field( array(
		'name'             => esc_html__( 'Country', 'mro-cit-functions' ),
		'id'               => $prefix . 'country',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => country_list(),
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Occupation', 'mro-cit-functions' ),
		// 'desc' => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'occupation',
		'type' => 'text',
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Company', 'mro-cit-functions' ),
		// 'desc' => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'company',
		'type' => 'text',
	) );
}


add_action( 'cmb2_admin_init', 'mro_cit_register_user_empresarial_metabox' );
function mro_cit_register_user_empresarial_metabox() {
	$prefix = 'mro_cit_user_';
	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'afiliado_empresarial_edit',
		'title'            => __( 'Afiliado Empresarial Profile Metabox', 'mro-cit-functions' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		'show_on' 			=> array( 
								'key' => 'role', 
								'value' => array(
									'afiliado_empresarial', 
									'afiliado_empresarial_pendiente',
									'afiliado_institucional', 
									'afiliado_institucional_pendiente'
									),
								),
	) );

	$cmb_user->add_field( array(
		'name'     => __( 'Afiliado Empresarial', 'mro-cit-functions' ),
		// 'desc'     => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'       => $prefix . 'afiliado_empresarial_title',
		'type'     => 'title',
		'on_front' => false,
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Phone number', 'mro-cit-functions' ),
		// 'desc' => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'phone',
		'type' => 'text',
	) );

	$cmb_user->add_field( array(
		'name'             => esc_html__( 'Country', 'mro-cit-functions' ),
		'id'               => $prefix . 'country',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => country_list(),
	) );

	$cmb_user->add_field( array(
		'name' => __( 'Business sector', 'mro-cit-functions' ),
		// 'desc' => __( 'Secondary contact\s first name', 'mro-cit-functions' ),
		'id'   => $prefix . 'sector',
		'type' => 'text',
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'CC: Email', 'demo-functions' ),
		'desc' => esc_html__( 'Email address to copy messages to.', 'mro-cit-functions' ),
		'id'   => $prefix . 'secondary_email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );

}



add_action( 'cmb2_admin_init', 'mro_cit_additional_contacts_metabox' );
function mro_cit_additional_contacts_metabox() {
	$prefix = 'mro_cit_user_';

	$cmb = new_cmb2_box( array(
		'id'               => $prefix . 'additional_contacts',
		'title'            => __( 'Additional Contacts Metabox', 'mro-cit-functions' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		'show_on' 			=> array( 
								'key' => 'role', 
								'value' => array(
									'afiliado_empresarial', 
									'afiliado_empresarial_pendiente',
									'afiliado_institucional', 
									'afiliado_institucional_pendiente'
									),
								),
	) );

	$cmb->add_field( array(
		'name'     => __( 'Additional contacts', 'mro-cit-functions' ),
		// 'desc'     => __( 'field description (optional)', 'mro-cit-functions' ),
		'id'       => $prefix . 'additional_contacts_title',
		'type'     => 'title',
		'on_front' => false,
	) );

   $group_contacts = $cmb->add_field( array(
        'id'          => $prefix . 'additional_contacts',
        'type'        => 'group',
        'description' => __( 'Additional contacts', 'cmb2' ),
        'repeatable'  => true, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Contact {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Contact', 'cmb2' ),
            'remove_button' => __( 'Remove Contact', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field( $group_contacts, array(
        'name' => __( 'Contact name', 'cmb2' ),
        'id'   => 'name',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $group_contacts, array(
        'name' => __( 'Contact last name', 'cmb2' ),
        'id'   => 'lastname',
        'type' => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );
    $cmb->add_group_field( $group_contacts, array(
        'name' => __( 'Contact email', 'cmb2' ),
        'id'   => 'email',
        'type' => 'text_email',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

}