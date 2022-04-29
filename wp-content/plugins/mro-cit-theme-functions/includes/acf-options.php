<?php

// if( function_exists('acf_add_options_sub_page') ) {
//     acf_add_options_sub_page();
// }

add_action('acf/init', 'cit_acf_op_init');
function cit_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_sub_page') ) {

        // Add parent.
        // $parent = acf_add_options_page(array(
        //     'page_title'  => __('Theme General Settings'),
        //     'menu_title'  => __('Theme Settings'),
        //     'redirect'    => false,
        // ));

        // Add sub page.
        $child = acf_add_options_sub_page(array(
            'page_title'  => __('Formularios de Inscripción'),
            'menu_title'  => __('Formularios'),
            'parent_slug' => 'edit.php?post_type=tribe_events',
        ));
    }
}