<?php


function mro_cit_check_if_me( $post_id ) {
  $me = 'webdev';

  $coauthors = get_coauthors( $post_id );

  $return = false;

  foreach ($coauthors as $key => $coauthor) {
    if ( $coauthor->user_login == $me ) {
      $return = true;
    }
  }

  return $return;
}


function force_relative_url($url) {
    return preg_replace ('/^(http)?s?:?\/\/[^\/]*(\/?.*)$/i', '$2', '' . $url);
}

function mro_cit_page_layout() {
  global $post;
  $layout = get_post_meta( $post->ID, 'mro_cit_page_layout', true );
  // var_dump(get_post_meta( $post->ID, 'mro_cit_page_layout', true ));
  if ( empty($layout) ) {
    return false;
  } else {
    return $layout;
  }
}

function cit_content_filter($content) {
  echo do_shortcode( wpautop( $content ) );
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