<?php

function clean_up_old_posts ($content) {

	//Check the date
	global $post;
	$compare_date = strtotime( "2017-12-31" ); //cut off date here
   	$post_date    = strtotime( $post->post_date ); //current post's date

   	if ( $compare_date > $post_date ) :


		//If it is a post
		if ( is_singular('cit_report') ) :

			$pattern = array(

	   	  		//Remove "Por [name]\n[date]" from beginning of posts
	   	  		'/^(<[^>]*>)*(Preparado por)*(:)*([a-zA-Z0-9\-_.\p{L}\s]*)(<br \/>)*(\s)*(<[^>]*>)*([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<br \/>)*(\s)*)*/u',

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