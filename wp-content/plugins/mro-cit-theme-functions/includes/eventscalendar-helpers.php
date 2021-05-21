<?php

// First solution - links below the organizer section
// add_action( 'tribe_events_single_meta_organizer_section_end', array( 'TribeiCal', 'single_event_links' ) );
// remove_action( 'tribe_events_single_event_after_the_content', array( 'TribeiCal', 'single_event_links' ) );

// // Second solution - links on the right of the organizer box (after)
// add_action( 'tribe_events_single_event_meta_primary_section_end', array( 'TribeiCal', 'single_event_links' ) );
// remove_action( 'tribe_events_single_event_after_the_content', array( 'TribeiCal', 'single_event_links' ) );

function tribe_add_admin_email_to_rsvp_email_recipient( $to ) {
 
    if ( ! is_string( $to ) ) {
        return $to;
    }
 
    $combined_to = array(
        $to,
        'matirosero@icloud.com'
    );
 
    return $combined_to;
}
 
add_filter( 'tribe_rsvp_email_recipient', 'tribe_add_admin_email_to_rsvp_email_recipient' );