<?php

$gallery_text = get_post_meta( $post->ID, 'mro_cit_event_gallery_text', true );
$gallery = get_post_meta( $post->ID, 'mro_cit_event_gallery', true );

?>

<section id="event-gallery" data-magellan-target="event-gallery">

	<h2 class="section-title">Galería del evento</h2>

	<?php
	if ( $gallery_text ) :
		echo apply_filters('the_content', $gallery_text);
	endif;

	if ( $gallery ) : ?>

		<div class="grid-x grid-padding-x small-up-2 medium-up-3 large-up-3 xlarge-up-4">

			<?php foreach ( $gallery as $attachment_id => $attachment_url ) {
				echo '<div class="cell column-block">';
				echo wp_get_attachment_image( $attachment_id );
				echo '</div>';
			} ?>
		</div>
	<?php endif;
	?>

</section>