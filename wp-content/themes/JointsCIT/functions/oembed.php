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
        'zoom', 
        '#(https://zoom\.us/recording/[a-z]+/[a-zA-Z0-9_-]+)/?#i', 
        'wp_embed_handler_zoom' 
    );

} );

function wp_embed_handler_zoom( $matches, $attr, $url, $rawattr ) {
    $embed = sprintf(
        '<div class="zoom-container"><iframe class="zoom-embed" src="%1$s" width="640" height="360" frameborder="0" scrolling="no"></iframe></div>',
        esc_attr( $matches[1] ) 
     );

    return apply_filters( 'embed_zoom', $embed, $matches, $attr, $url, $rawattr );
}


function my_increase_oembed_timeout($args) {
    $args["timeout"] = 30;
    return $args;
}
add_filter( 'oembed_remote_get_args', 'my_increase_oembed_timeout');