<?php
$date_format = 'F j, Y';
if ( is_singular('cit_report') ) {
	$date_format = 'F Y';
}
?>
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
	
</p>
<p class="date"><?php the_time($date_format) ?><?php
	if ( !is_singular('cit_report') ) { 
		echo ' - '; 
		the_category(', '); 
	} ?></p>