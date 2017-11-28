<?php $date_format = 'F Y'; ?>

<p class="byline">
	<?php _e( 'Prepared by ', 'jointswp' ); ?>
	<?php if ( function_exists( 'coauthors_posts_links' ) ) {
	    coauthors_posts_links();
	} else {
	    the_author_posts_link();
	} ?>
</p>

<p class="date"><?php the_time($date_format) ?></p>