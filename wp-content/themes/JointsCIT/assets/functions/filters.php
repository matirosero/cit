<?php

// function mro_cit_social_share ($content) {
// 	global $post;
// 	if ( shortcode_exists( 'Sassy_Social_Share' ) ) {
// 		if ( is_singular('post') || is_singular('cit_report') ) {
// 			$content = do_shortcode( '[Sassy_Social_Share title="Compartir"]' ).$content;
// 		}
// 	}
// 	return $content;
// }
// add_filter('the_content', 'mro_cit_social_share', 1);


function clean_up_old_posts ($content) {

	//Check the date
	global $post;
	$compare_date = strtotime( "2017-11-24" ); //cut off date here
   	$post_date    = strtotime( $post->post_date ); //current post's date

   	if ( $compare_date > $post_date ) :


		//If it is a post
		if ( is_singular('cit_report') ) :

			$pattern = array(

	   	  		//Remove "Por [name]\n[date]" from beginning of posts
	   	  		'/^(<[^>]*>)*(Preparado por)*(:)*([a-zA-Z0-9\-_.,\p{L}\s]*)(<br \/>)*(\s)*(<[^>]*>)*([a-zA-Z]*)[a-zA-Z,\s]*(\d{2,4})(\.)*(<br \/>)*(<\/[^>]+>)*((<br \/>)*(\s)*)*/u',

	   	  		// '/^(<[^>]*>)*(Preparado por)*(:)*([a-zA-Z0-9\-_.\p{L}\s]*)(<br \/>)*([a-zA-Z0-9\-_.\p{L}\s]*)*(<[^>]*>)*(\s)*(<[^>]*>)*([a-zA-Z]*)[a-zA-Z,\s]*(\d{2,4})(.)*(<br \/>)*(<\/[^>]+>)*((<br \/>)*(\s)*)*/u',

	   	  	);

	   	  	$content = preg_replace( $pattern, "", $content, 1 );


	   	  	$pattern = array(

	   	  		'/(<[^>]*>)*(Resumen ejecutivo|Resumen Ejecutivo)(<[^>]*>)*/',

	   	  	);

	   	  	$content = preg_replace( $pattern, '<h2 class="executive-summary-subtitle">Resumen ejecutivo</h2>', $content, 1 );

		endif;


		//If it is a post
		if ( is_singular('post') ) :


	   	  	//Strip all tags except these (for divs)
	   	  	$content = strip_tags( $content, '<p><br><table><th><tr><td><a><strong><b><em><i><img><li><ol><ul><s><u><span><blockquote><cite>' );


	   	  	$pattern = array(

	   	  		//Remove "Por [name]\n[date]" from beginning of posts
	   	  		'/^(<[^>]*>)*(Por)*([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2})*(\s)+([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<[^>]*>)*(\s)*)*/',

	   	  	);

	   	  	$content = preg_replace( $pattern, "", $content, 1 );


	   	  	//Convert remaining <br /> into paragraphs
	   	  	$content = preg_replace("/<br \/>/m", '</p><p>', $content);

	   	endif;

	endif;

	return $content;
}
add_filter('the_content', 'clean_up_old_posts', 1);


/*
 * Get rid of “Category:”, “Tag:”, “Author:”, “Archives:”, etc
 */
function mro_cit_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'mro_cit_archive_title' );


add_action('init', 'mro_cit_setup_cpt_filters');
function mro_cit_setup_cpt_filters() {
    // globalize it so that we can call methods on the returned object
    global $my_cpt_filters;
    // We'll show you what goes in this later
    $filter_array = array();
    $my_cpt_filters = tribe_setup_apm('cit_past_event', $filter_array );
}

/**
 * Widget Titles: Change default H4 to an H3.
 *
 * @author David Decker - DECKERWEB
 * @link   http://deckerweb.de/twitter
 */
// function mro_cit_custom_widget_title_headline( $title ) {
// 	return '<h3>' . $title . '</h3>';
// }
// add_filter( 'widget_title', 'mro_cit_custom_widget_title_headline' );