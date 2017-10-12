<?php

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function the_excerpt_more_link( $excerpt ){
    $post = get_post();
    $excerpt .= '<p class="read-more"><a class="button round" href="'. get_permalink($post->ID) . '">' . __( 'Read more', 'jointswp' ) . '</a></p>';
    return $excerpt;
}
add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );