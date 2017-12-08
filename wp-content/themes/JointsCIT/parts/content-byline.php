<?php /*
if ( is_search() ) : 
	$post_type_object = get_post_type_object( get_post_type() );
	$post_type = esc_html( $post_type_object->labels->singular_name );
	if ( $post_type == 'Entrada' ) :
		$post_type = 'Artículo';
	endif;
	?>
	<p class="post-type secondary label"><?php echo $post_type; ?></p>
<?php endif; */?>

<?php
$date_format = 'F j, Y'; ?>
	<p class="byline">
	<?php
	if ( !is_post_type_archive('cit_past_event') ) {
		_e( 'By ', 'jointswp' );
		if ( function_exists( 'coauthors_posts_links' ) ) {
		    coauthors_posts_links();
		} else {
		    the_author_posts_link();
		}
	} ?>
</p>

<p class="date"><?php the_time($date_format) ?><?php
	if ( !is_singular('cit_past_event') && !is_post_type_archive('cit_past_event') ) { 
		echo ' - '; 
		the_category(', '); 
	} ?></p>