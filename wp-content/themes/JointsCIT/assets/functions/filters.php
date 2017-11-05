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
	   	  		'/^(?P<tag><[^>]+>)+Por (?P<name>[a-zA-Z0-9\-_\s]*)<br \/>(?P<day>\d{1,2}) de (?P<month>[a-zA-Z]*)[a-zA-Z\s]*(?P<year>\d{2,4})<\/[^>]+>/',
	   	  	);

	   	  	$content = preg_replace( $pattern, "", $content, 1 );

	   	endif;

	}
	return $content;
}
add_filter('the_content', 'clean_up_old_posts', 1);