<?php

function new_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more', 21 );

function the_excerpt_more_link( $excerpt ){
    $post = get_post();
    if ( !has_excerpt() ) :
	    $excerpt = str_replace('</p>', '...</p>', $excerpt);
	endif;
    $excerpt .= '<p class="text-center"><a class="button round read-more" href="'. get_permalink($post->ID) . '">' . __( 'Read more', 'jointswp' ) . '</a></p>';
    // $excerpt .=  '[.....]';
    return $excerpt;
}
add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );