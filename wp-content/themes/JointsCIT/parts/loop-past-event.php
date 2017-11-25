<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
		<!-- <p class="date"><?php the_time('F j, Y') ?></p> -->
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

<ul class="accordion" data-responsive-accordion-tabs="accordion medium-tabs">
  <li class="accordion-item is-active" data-accordion-item>
    <a href="#" class="accordion-title">Accordion 1</a>
    <div class="accordion-content" data-tab-content >
      <p>Panel 1. Lorem ipsum dolor</p>
      <a href="#">Nowhere to Go</a>
    </div>
  </li>
  <li class="accordion-item" data-accordion-item>
    <a href="#" class="accordion-title">Accordion 2</a>
    <div class="accordion-content" data-tab-content>
      <textarea></textarea>
      <button class="button">I do nothing!</button>
    </div>
  </li>
  <li class="accordion-item" data-accordion-item>
    <a href="#" class="accordion-title">Accordion 3</a>
    <div class="accordion-content" data-tab-content>
      Type your name!
      <input type="text"></input>
    </div>
  </li>
</ul>
		<?php

		//Grab meta
		$pdfs = get_post_meta( $post->ID, 'mro_cit_event_presentations', true );
		$video_text = get_post_meta( $post->ID, 'mro_cit_event_video_text', true );
		$videos = get_post_meta( $post->ID, 'mro_cit_event_video', true );
		$gallery_text = get_post_meta( $post->ID, 'mro_cit_event_gallery_text', true );
		$gallery = get_post_meta( $post->ID, 'mro_cit_event_gallery', true );
		$evaluation = get_post_meta( $post->ID, 'mro_cit_event_evaluation', true );

		if ( $pdfs || $video_text || $videos || $gallery_text || $gallery || $evaluation ) : ?>

		<?php else: ?>

			<?php the_post_thumbnail('full'); ?>
			<?php the_content(); ?>

		<?php endif; ?>

	</section> <!-- end article section -->


	<?php

	if ( get_post_meta( $post->ID, 'mro_cit_event_presentations', true ) ) :

		$presentations = get_post_meta( $post->ID, 'mro_cit_event_presentations', true );

		?>

		<section class="event-presentations">

			<?php

			foreach ($presentations as $key => $presentation) {

				if ( isset( $presentation[ 'mro_cit_event_presentation_file' ] ) ) :
					$file = esc_html( $presentation[ 'mro_cit_event_presentation_file' ] );

					if ( isset( $presentation[ 'mro_cit_event_presentation_name' ] ) ) :
						$file_name = esc_html( $presentation[ 'mro_cit_event_presentation_name' ] );
					else:
						$file_name = 'presentación';
					endif;

					echo do_shortcode( '[pdf-embedder url="'.$file.'" title="'.$file_name.'"]' );

				endif;
			}

			?>
		</section>
	<?php endif; ?>

	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->