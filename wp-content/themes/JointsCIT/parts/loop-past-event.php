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

			<ul class="accordion" data-responsive-accordion-tabs="accordion large-tabs">

				<li class="accordion-item is-active" data-accordion-item>
					<a href="#" class="accordion-title">Información</a>
					<div class="accordion-content" data-tab-content >

						<?php the_post_thumbnail('full'); ?>
						<?php the_content(); ?>

					</div>
				</li>

				<?php

				//Presentations
				if ( $pdfs ) : ?>

					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title" data-load-content="load-presentation">Presentaciones</a>
						<div id="tab-presentation" class="accordion-content" data-tab-content>

						</div>
					</li>
				<?php endif; 

				//Video
				if ( $video_text || $videos ) : ?>

					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Video</a>
						<div id="tab-presentation" class="accordion-content" data-tab-content>

						</div>
					</li>
				<?php endif;

				//Gallery
				if ( $gallery_text || $gallery ) : ?>

					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Fotos</a>
						<div id="tab-presentation" class="accordion-content" data-tab-content>

						</div>
					</li>
				<?php endif;

				//Gallery
				if ( $evaluation ) : ?>

					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title">Evaluación</a>
						<div id="tab-presentation" class="accordion-content" data-tab-content>

						</div>
					</li>
				<?php endif;
				?>

			</ul><!-- end accordion -->

			<?php
			if ( $pdfs ) : ?>

				<div id="load-presentation" class="hide">

					<div class="load-content">

					<?php

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
					</div>
				</div>
			<?php endif; ?>

		<?php else: ?>

			<?php the_post_thumbnail('full'); ?>
			<?php the_content(); ?>

		<?php endif; ?>

	</section> <!-- end article section -->


	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->