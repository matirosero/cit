<?php


// if ( ! mro_cit_check_if_me( get_the_ID() ) ) {
// 	echo 'not me';
// }


// $author = get_the_author();
if ( ! mro_cit_check_if_me( get_the_ID() ) ) :
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
	$check_date = get_the_date('Y-m-d');
	if ( $check_date != '2017-08-01' && $check_date != '1990-01-01' ) :
	?>

		<?php
		if ( is_post_type_archive('cit_report') || is_singular('cit_report') ) {
			$date_format = 'F Y';
		} else {
			$date_format = 'F j, Y';
		}
		the_time($date_format);
		echo ' - ';
	endif;
	if ( !is_singular('cit_past_event') && !is_post_type_archive('cit_past_event') ) {
		
		the_category(', ');
	} ?>
</p>
