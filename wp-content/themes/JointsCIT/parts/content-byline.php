<?php
$author = get_the_author();
if( $author != 'Mat Rosero' ) :
?>
<p class="byline">
	<?php
	if ( !is_post_type_archive('cit_past_event') && !is_singular('cit_past_event') ) {
		if ( is_post_type_archive('cit_report') || is_singular('cit_report') ) {
			_e( 'Prepared by ', 'jointswp' );
		} else {
			_e( 'By ', 'jointswp' );
		}
		if ( function_exists( 'coauthors_posts_links' ) ) {
		    coauthors_posts_links();
		} else {
		    the_author_posts_link();
		}
	} ?>
</p>
<?php endif; ?>

<p class="date">
	<?php
	if ( is_post_type_archive('cit_report') || is_singular('cit_report') ) {
		$date_format = 'F Y';
	} else {
		$date_format = 'F j, Y';
	}
	the_time($date_format);
	if ( !is_singular('cit_past_event') && !is_post_type_archive('cit_past_event') ) {
		echo ' - ';
		the_category(', ');
	} ?>
</p>