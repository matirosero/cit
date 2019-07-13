<?php

$pdfs = get_post_meta( $post->ID, 'mro_cit_event_presentations', true );

?>

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