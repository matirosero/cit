<p class="byline">
	<?php _e( 'Posted by', 'jointswp' );  ?> <?php if ( function_exists( 'coauthors_posts_links' ) ) {
	    coauthors_posts_links();
	} else {
	    the_author_posts_link();
	} ?> - <?php the_category(', ') ?>
</p>