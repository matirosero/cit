<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
		<!-- <p class="date"><?php the_time('F j, Y') ?></p> -->
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

		<?php

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
						<ul class="menu section-navigation align-center" data-magellan>

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
							echo wpautop($video_text);
						endif;

						if ( $videos ) :
							foreach ( $videos as $video ) {
								echo wp_oembed_get( $video );
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
							echo wpautop($gallery_text);
						endif;

						if ( $gallery ) : ?>

							<div class="row small-up-2 medium-up-3 large-up-3 xlarge-up-4">

								<?php foreach ( $gallery as $attachment_id => $attachment_url ) {
									echo '<div class="column column-block">';
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

	</section> <!-- end article section -->


	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php //comments_template(); ?>

</article> <!-- end article -->