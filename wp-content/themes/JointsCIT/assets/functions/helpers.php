<?php

function crunchify_print_scripts_styles() {

    $result = [];
    $result['scripts'] = [];
    $result['styles'] = [];

    // Print all loaded Scripts
    // global $wp_scripts;
    // foreach( $wp_scripts->queue as $script ) :
    //    $result['scripts'][] =  $wp_scripts->registered[$script]->src . ";";
    // endforeach;

    // Print all loaded Styles (CSS)
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) :
       $result['styles'][] =  array(
       		'name' => $style,
       		'src' => $wp_styles->registered[$style]->src . ";",
       	);
    endforeach;

    return $result;
}