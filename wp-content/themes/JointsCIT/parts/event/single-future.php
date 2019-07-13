<div class="tribe-events-single-event-description tribe-events-content">
	
	<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

	<?php if ( shortcode_exists( 'Sassy_Social_Share' ) ) {
        echo do_shortcode( '[Sassy_Social_Share title="Compartir"]' );
    } ?>
    
	<?php the_content(); ?>
</div>
<!-- .tribe-events-single-event-description -->