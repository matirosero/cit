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
	   	  		// '/^(?P<tag><[^>]+>)+Por (?P<name>[a-zA-Z0-9\-_\s]*)<br \/>(?P<day>\d{1,2}) de (?P<month>[a-zA-Z]*)[a-zA-Z\s]*(?P<year>\d{2,4})<\/[^>]+>/',

	   	  		//Original regex
	   	  		// '/^(<[^>]*>)*Por ([a-zA-Z0-9\-_\s]*)(<br \/>)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<\/[^>]+>)*(<br \/>)*/',

	   	  		//There may be  <br /> before closing tabs </ >
	   	  		// '/^(<[^>]*>)*Por ([a-zA-Z0-9\-_\s]*)(<br \/>)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*(<br \/>)*/',

	   	  		//THere may be a space before date
	   	  		// '/^(<[^>]*>)*Por ([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*(<br \/>)*/',

	   	  		//There may be tags opening and closing around line break
	   	  		// '/^(<[^>]*>)*Por ([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*(<br \/>)*/',

	   	  		//There may be spaces after ending <br /> tags, so add space
	   	  		// '/^(<[^>]*>)*Por ([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<br \/>)*(\s)*)*/',

	   	  		//Replace <br /> at end with any tag?
	   	  		// '/^(<[^>]*>)*Por ([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<[^>]*>)*(\s)*)*/',

	   	  		//'Por' may not exist
	   	  		// '/^(<[^>]*>)*(Por)*([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2}) de ([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<[^>]*>)*(\s)*)*/',

	   	  		//'de' (before month) may not exist, but there MUST be at least one space after date, then match any character
	   	  		// '/^(<[^>]*>)*(Por)*([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2})(\s)+([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<[^>]*>)*(\s)*)*/',

	   	  		//THere may be no date, just month
	   	  		'/^(<[^>]*>)*(Por)*([a-zA-Z0-9\-_\s]*)(<br \/>)*(\s)*(<[^>]*>)*(\d{1,2})*(\s)+([a-zA-Z]*)[a-zA-Z\s]*(\d{2,4})(<br \/>)*(<\/[^>]+>)*((<[^>]*>)*(\s)*)*/',
	   	  	);

	   	  	$content = preg_replace( $pattern, "", $content, 1 );

	   	endif;

	}
	return $content;
}
add_filter('the_content', 'clean_up_old_posts', 1);