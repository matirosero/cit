<?php
/**
 * Sortable columns.
 * https://code.tutsplus.com/articles/quick-tip-make-your-custom-column-sortable--wp-25095
 * http://justintadlock.com/archives/2011/06/27/custom-columns-for-custom-post-types#comment-2279117)
 *
 * @since 0.1.0
 */



add_filter( 'manage_edit-post_sortable_columns', 'mro_cit_sortable_post_columns' );
function mro_cit_sortable_post_columns( $columns ) {
    $columns['_mro_manual_author'] = '_mro_manual_author';

    $columns['mro_cit_report_download_id'] = 'mro_cit_report_download_id';

    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);

    return $columns;
}



/* Only run our customization on the 'edit.php' page in the admin. */
add_action( 'load-edit.php', 'mro_cit_edit_post_load' );

function mro_cit_edit_post_load() {
	add_filter( 'request', 'mro_cit_sort_posts' );
}

/* Sorts the movies. */
function mro_cit_sort_posts( $vars ) {

	/* Check if we're viewing the 'movie' post type. */
	if ( isset( $vars['post_type'] ) && 'post' == $vars['post_type'] ) {

		/* Check if 'orderby' is set to 'duration'. */
		if ( isset( $vars['orderby'] ) && '_mro_manual_author' == $vars['orderby'] ) {

			/* Merge the query vars with our custom variables. */
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => '_mro_manual_author',
					'orderby' => 'meta_value'
				)
			);
		}
	}

	if ( isset( $vars['post_type'] ) && 'cit_report' == $vars['post_type'] ) {

		/* Check if 'orderby' is set to 'duration'. */
		if ( isset( $vars['orderby'] ) && 'mro_cit_report_download_id' == $vars['orderby'] ) {

			/* Merge the query vars with our custom variables. */
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'mro_cit_report_download_id',
					'orderby' => 'meta_value_num'
				)
			);
		}
	}

	return $vars;
}


/*
add_action( 'pre_get_posts', 'manage_wp_posts_be_qe_pre_get_posts', 1 );
function manage_wp_posts_be_qe_pre_get_posts( $query ) {

    //We only want our code to run in the main WP query
    //AND if an orderby query variable is designated.
   if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {

      switch( $orderby ) {

         // If we're ordering by 'film_rating'
         case '_mro_manual_author':

			$meta_query = array(

				'relation' => 'OR',

				array(

					'key' => '_mro_manual_author',

					'value' => false,

					'type' => 'BOOLEAN',

				),

				array(

					'key' => '_mro_manual_author',

					'compare' => 'NOT EXISTS',

					'value' => '',

				),

				array(

					'key' => '_mro_manual_author',

				)

			);


            $query->set( 'meta_query', $meta_query );

            // set our query's meta_key, which is used for custom fields
            $query->set( 'meta_key', '_mro_manual_author' );


             //If your meta value are numbers, change 'meta_value'
             //to 'meta_value_num'.
            $query->set( 'orderby', 'meta_value' );

            break;

      }

   }

}
*/