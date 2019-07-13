<?php
$evaluation = get_post_meta( $post->ID, 'mro_cit_event_evaluation', true );
?>

<section id="event-evaluation" data-magellan-target="event-evaluation">
	<h2 class="section-title">Evaluación del evento</h2>

	<?php
	if ( $evaluation ) :
		echo wpautop($evaluation);
	endif;
	?>
</section>