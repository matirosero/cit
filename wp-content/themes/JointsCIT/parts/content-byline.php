<p class="byline">
	<?php
	if ( is_singular('cit_report') ) { 
		_e( 'Prepared by ', 'jointswp' );
	} else {
		_e( 'By ', 'jointswp' );
	} ?>
	<?php if ( function_exists( 'coauthors_posts_links' ) ) {
	    coauthors_posts_links();
	} else {
	    the_author_posts_link();
	} ?>
	<?php
	if ( !is_singular('cit_report') ) { 
		echo ' - '; 
		the_category(', '); 
	} ?>
	
</p>