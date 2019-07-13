<section id="event-information" data-magellan-target="event-information">

	<!-- Event featured image, but exclude link -->
	<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

	<?php if ( shortcode_exists( 'Sassy_Social_Share' ) ) {
        echo do_shortcode( '[Sassy_Social_Share title="Compartir"]' );
    } ?>

	<?php the_content(); ?>

</section>