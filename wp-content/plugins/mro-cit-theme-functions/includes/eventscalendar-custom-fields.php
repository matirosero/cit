<?php

add_action( 'cmb2_admin_init', 'mro_cit_register_venue_extra_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function mro_cit_register_venue_extra_metabox() {
	$prefix = 'mro_cit_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Additional information', 'mro-cit-functions' ),
		'object_types'  => array( 
			'tribe_venue' 
		), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Dirección tica', 'mro-cit-functions' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-functions' ),
		'id'   => $prefix . 'event-venue-direccion-tica',
		'type' => 'textarea_small',
	) );
}

/**
 * Outputs all WP post meta fields (except those prefixed "_"), feel
 * free to tweak the formatting!
 */
function show_wp_custom_fields() {
	foreach ( get_post_meta( get_the_ID() ) as $field => $value ) {
		$field = trim( $field );
		if ( is_array( $value ) ) $value = implode( ', ', $value );
		if ( 0 === strpos( $field, '_' ) ) continue; // Don't expose "private" fields
		echo '<strong>' . esc_html( $field ) . '</strong> ' . esc_html( $value ) . '<br/>';
	}
}

// Hooks the above function up so it runs in the single organizer and venue pages
add_action( 'tribe_events_single_organizer_before_upcoming_events', 'show_wp_custom_fields' );
add_action( 'tribe_events_single_venue_before_upcoming_events', 'show_wp_custom_fields' );