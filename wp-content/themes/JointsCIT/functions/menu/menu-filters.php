<?php

add_filter( 'wp_nav_menu_items', 'mro_cit_add_loginout_link', 10, 2 );
function mro_cit_add_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'mobile-nav') {
        $items .= '<li><a href="' . wp_logout_url() . '">' . __( 'Log out', 'jointswp' ) . '</a></li>';
    }
    return $items;
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    
    $url = strpos( $item->url, '/sobre-el-club/#' );

    if ( $item->url === "#" ) {
        $classes[] = 'no-hover';
    }
    if ( ( $item->current == 1 || $item->current_item_ancestor == true ) && $url=== false ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );
