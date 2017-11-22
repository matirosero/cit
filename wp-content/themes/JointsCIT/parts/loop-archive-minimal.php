<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
	<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> - <small><?php echo get_the_date(); ?>
		<br />
		<?php the_terms( $post->ID, 'mro_cit_event_year', 'Year: ', ', ', ' ' ); ?></small>
		<?php
			$base = 'http://www.clubdeinvestigacion.com';
			$url = get_post_meta( $post->ID, '_mro_old_url', true );
		    if ($url) {
		        echo '<br /><a class="button tiny" href="' . $base .$url . '" target="_blank">Old URL</a><hr />';
		    }
		?>
	</p>
</article> <!-- end article -->