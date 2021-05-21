<?php
// https://github.com/CMB2/CMB2-Snippet-Library/blob/master/misc/replace-wp-title-content-thumbnail-with-cmb2-fields.php

/*
 * Override the title/content field retrieval so CMB2 doesn't look in post-meta.
 */
function cmb2_override_post_title_display( $data, $post_id ) {
	return get_post_field( 'post_title', $post_id );
}
function cmb2_override_post_content_display( $data, $post_id ) {
	return get_post_field( 'post_content', $post_id );
}
add_filter( 'cmb2_override_post_title_meta_value', 'cmb2_override_post_title_display', 10, 2 );
add_filter( 'cmb2_override_post_content_meta_value', 'cmb2_override_post_content_display', 10, 2 );
/*
 * WP will handle the saving for us, so don't save title/content to meta.
 */
add_filter( 'cmb2_override_post_title_meta_save', '__return_true' );
add_filter( 'cmb2_override_post_content_meta_save', '__return_true' );


/*
 * Remove editor and featured image from pages so the above works.
 */
add_action( 'init', 'mro_cit_remove_support' );
function mro_cit_remove_support() {
     remove_post_type_support( 'page', 'editor' );
     remove_post_type_support( 'page', 'thumbnail' );
}