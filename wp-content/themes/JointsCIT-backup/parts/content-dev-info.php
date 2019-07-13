<div class="callout primary" data-closable>
	<button class="close-button" aria-label="Close alert" type="button" data-close>
		<span aria-hidden="true">&times;</span>
	</button>
	<?php
		$base = 'http://www.clubdeinvestigacion.com';
		$url = get_post_meta( $post->ID, '_mro_old_url', true );
        if ($url) {
            echo '<a href="' . $base .$url . '" target="_blank">Old URL</a><hr />';
        }
	?>
	<?php the_post_navigation(); ?>
</div>