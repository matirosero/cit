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
<?php endif; 