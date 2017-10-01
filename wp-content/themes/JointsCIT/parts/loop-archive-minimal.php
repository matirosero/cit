<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
	<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> - <small><?php echo get_the_date(); ?>
		<br />
		<?php the_terms( $post->ID, 'mro_cit_event_year', 'Year: ', ', ', ' ' ); ?></small>
	</p>
</article> <!-- end article -->