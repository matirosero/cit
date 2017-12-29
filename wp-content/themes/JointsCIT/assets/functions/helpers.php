<?php

function force_relative_url($url) {
    return preg_replace ('/^(http)?s?:?\/\/[^\/]*(\/?.*)$/i', '$2', '' . $url);
}


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


// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
  add_filter('show_admin_bar', '__return_false');
}
function hideAdminBar() { ?>
  <style type="text/css">.show-admin-bar { display: none; }</style>
<?php 
}
add_action('admin_print_scripts-profile.php', 'hideAdminBar');