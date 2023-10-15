<?php

/*
 * Options page page for RSVP forms for events
 */

// if( function_exists('acf_add_options_sub_page') ) {
//     acf_add_options_sub_page();
// }

add_action('acf/init', 'cit_acf_op_init');
function cit_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Formularios de Inscripción'),
            'menu_title'  => __('Formularios'),
            'parent_slug' => 'edit.php?post_type=tribe_events',
        ));
    }
}