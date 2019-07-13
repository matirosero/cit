<?php

$video_text = get_post_meta( $post->ID, 'mro_cit_event_video_text', true );
$videos = get_post_meta( $post->ID, 'mro_cit_event_video', true );

?>

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