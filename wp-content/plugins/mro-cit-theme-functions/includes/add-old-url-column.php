<?php
/**
 * Add new column for URL.
 * https://code.tutsplus.com/articles/add-a-custom-column-in-posts-and-custom-post-types-admin-screen--wp-24934
 *
 * @since 0.1.0
 */

// ADD NEW COLUMN

add_filter('manage_posts_columns', 'mro_cit_add_old_url_columns_head');

function mro_cit_add_old_url_columns_head($defaults) {
    $defaults['old_url'] = 'Old URL';

    return $defaults;
}



// SHOW THE FEATURED IMAGE

add_action('manage_posts_custom_column', 'mro_cit_add_old_url_columns_content', 10, 2);

function mro_cit_add_old_url_columns_content($column_name, $post_ID) {
    if ($column_name == 'old_url') {
        $base = 'http://www.clubdeinvestigacion.com';
		$url = get_post_meta( $post_ID, '_mro_old_url', true );
        if ($url) {
            echo '<a href="' . $base .$url . '" target="_blank">Old URL</a>';
        }
    }
}