<?php

//Grab meta
$pdfs = get_post_meta( $post->ID, 'mro_cit_event_presentations', true );
$video_text = get_post_meta( $post->ID, 'mro_cit_event_video_text', true );
$videos = get_post_meta( $post->ID, 'mro_cit_event_video', true );
$gallery_text = get_post_meta( $post->ID, 'mro_cit_event_gallery_text', true );
$gallery = get_post_meta( $post->ID, 'mro_cit_event_gallery', true );
$evaluation = get_post_meta( $post->ID, 'mro_cit_event_evaluation', true );

?>

<div data-sticky-container>
	<div class="title-bar" data-sticky data-anchor="foo" style="width:100%" >

		<div class="title-bar-left">
			<ul class="vertical medium-horizontal menu section-navigation" data-magellan data-options="data-hide-for: large">

				<li><a href="#event-information">Información</a></li>

				<?php if ( $pdfs ) : ?>
					<li><a href="#event-presentations">Presentaciones</a></li>
				<?php endif; ?>

				<?php if ( $video_text || $videos ) : ?>
					<li><a href="#event-videos">Videos</a></li>
				<?php endif; ?>

				<?php if ( $gallery_text || $gallery ) : ?>
					<li><a href="#event-gallery">Galería</a></li>
				<?php endif; ?>

				<?php if ( $evaluation ) : ?>
					<li><a href="#event-evaluation">Evaluación</a></li>
				<?php endif; ?>

			</ul>
		</div>
	</div>
</div>