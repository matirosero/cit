<?php

/**
 * Embed support for Forbes videos
 *
 * Usage Example:
 *
 *     http://www.forbes.com/video/5049647995001/
 */
add_action( 'init', function() {
    wp_embed_register_handler( 
        'forbes', 
        '#http://www\.forbes\.com/video/([\d]+)/?#i', 
        'wp_embed_handler_forbes' 
    );

} );

function wp_embed_handler_forbes( $matches, $attr, $url, $rawattr ) {
    $embed = sprintf(
        '<iframe class="forbes-video" src="https://players.brightcove.net/2097119709001/598f142b-5fda-4057-8ece-b03c43222b3f_default/index.html?videoId=%1$s" width="600" height="400" frameborder="0" scrolling="no"></iframe>',
        esc_attr( $matches[1] ) 
     );

    return apply_filters( 'embed_forbes', $embed, $matches, $attr, $url, $rawattr );
}