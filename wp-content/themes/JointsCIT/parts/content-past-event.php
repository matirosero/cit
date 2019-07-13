<?php
global $post;

//Grab meta
$pdfs = get_post_meta( $post->ID, 'mro_cit_event_presentations', true );
$video_text = get_post_meta( $post->ID, 'mro_cit_event_video_text', true );
$videos = get_post_meta( $post->ID, 'mro_cit_event_video', true );
$gallery_text = get_post_meta( $post->ID, 'mro_cit_event_gallery_text', true );
$gallery = get_post_meta( $post->ID, 'mro_cit_event_gallery', true );
$evaluation = get_post_meta( $post->ID, 'mro_cit_event_evaluation', true );

if ( $pdfs || $video_text || $videos || $gallery_text || $gallery || $evaluation ) : ?>

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

	<div class="sections" id="foo">

		<section id="event-information" data-magellan-target="event-information">

			<?php the_post_thumbnail('full'); ?>
			<?php if ( shortcode_exists( 'Sassy_Social_Share' ) ) {
	            echo do_shortcode( '[Sassy_Social_Share title="Compartir"]' );
	        } ?>
			<?php the_content(); ?>

		</section>

		<?php

		//Presentations
		if ( $pdfs ) : ?>

			<section id="event-presentations" data-magellan-target="event-presentations">

				<?php

				if ( count($pdfs) == 1) :
					echo '<h2 class="section-title">Presentación del evento</h2>';
				else:
					echo '<h2 class="section-title">Presentaciones del evento</h2>';
				endif;

				foreach ($pdfs as $key => $presentation) {

					if ( isset( $presentation[ 'mro_cit_event_presentation_file' ] ) ) :
						$file = esc_html( $presentation[ 'mro_cit_event_presentation_file' ] );

						if ( isset( $presentation[ 'mro_cit_event_presentation_name' ] ) ) :
							$file_name = esc_html( $presentation[ 'mro_cit_event_presentation_name' ] );
						else:
							$file_name = 'presentación';
						endif;

						echo do_shortcode( '[pdf-embedder url="'.$file.'" title="'.$file_name.'"]' );

					endif;
				} ?>

			</section>
		<?php endif;

		//Video
		if ( $video_text || $videos ) : ?>

			<section id="event-videos"  data-magellan-target="event-videos">

				<h2 class="section-title">Videos del evento</h2>

				<?php
				if ( $video_text ) :
					echo apply_filters('the_content', $video_text);
				endif;

				if ( $videos ) :
					foreach ( $videos as $video ) {
						if( wp_oembed_get( $video ) ) {
							echo wp_oembed_get( $video );
						} else {
							echo apply_filters('the_content',$video);
						}	
					}
				endif;
				?>

			</section>
		<?php endif;

		//Gallery
		if ( $gallery_text || $gallery ) : ?>

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
		<?php endif;

		//Gallery
		if ( $evaluation ) : ?>

			<section id="event-evaluation" data-magellan-target="event-evaluation">
				<h2 class="section-title">Evaluación del evento</h2>

				<?php
				if ( $evaluation ) :
					echo wpautop($evaluation);
				endif;
				?>
			</section>
		<?php endif;
		?>

	</div>

<?php else: ?>

	<?php the_post_thumbnail('full'); ?>
	<?php the_content(); ?>

<?php endif; ?>