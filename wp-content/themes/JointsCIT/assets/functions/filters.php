<?php

function clean_up_old_posts ($content) {
	if ( is_single() ) {

		//Check the date
		global $post;
		$compare_date = strtotime( "2017-12-31" ); //cut off date here
	   	$post_date    = strtotime( $post->post_date ); //current post's date

	   	if ( $compare_date > $post_date ) :
	   	  	//it's an old post

	   	  	$pattern = array(

	   	  		//Remove "Por [name]\n[date]" from beginning of posts
	   	  		'/^(<[^>]*>)*(Por)*([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2})*(\s)+([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<[^>]*>)*(\s)*)*/',

	   	  	);

	   	  	$content = preg_replace( $pattern, "", $content, 1 );


	   	  	//Convert remaining <br /> into paragraphs
	   	  	$content = preg_replace("/<br \/>/m", '</p><p>', $content);

	   	endif;

	}
	return $content;
}
add_filter('the_content', 'clean_up_old_posts', 1);