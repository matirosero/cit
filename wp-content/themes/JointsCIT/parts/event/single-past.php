<?php
global $post;


if ( get_post_meta( $post->ID, 'mro_cit_event_presentations', true ) 
	|| get_post_meta( $post->ID, 'mro_cit_event_video_text', true ) 
	|| get_post_meta( $post->ID, 'mro_cit_event_video', true )
	|| get_post_meta( $post->ID, 'mro_cit_event_gallery_text', true ) 
	|| get_post_meta( $post->ID, 'mro_cit_event_gallery', true ) 
	|| get_post_meta( $post->ID, 'mro_cit_event_evaluation', true ) ) : 

	get_template_part( 'parts/event/stickynav' );
	
	?>

	<div class="sections" id="foo">

		<?php

		get_template_part( 'parts/event/content' );


		//Presentations
		if ( get_post_meta( $post->ID, 'mro_cit_event_presentations', true ) ) : 
			get_template_part( 'parts/event/presentations' );
		endif;


		//Video
		if ( get_post_meta( $post->ID, 'mro_cit_event_video_text', true ) || get_post_meta( $post->ID, 'mro_cit_event_video', true ) ) :
			get_template_part( 'parts/event/video' );
		endif;


		//Gallery
		if ( get_post_meta( $post->ID, 'mro_cit_event_gallery_text', true ) || get_post_meta( $post->ID, 'mro_cit_event_gallery', true ) ) : 
			get_template_part( 'parts/event/gallery' );
		endif;

		//Gallery
		if ( get_post_meta( $post->ID, 'mro_cit_event_evaluation', true ) ) :
			get_template_part( 'parts/event/evaluation' );
		endif;
		?>

	</div>

<?php else: ?>

	<?php the_post_thumbnail('full'); ?>
	<?php the_content(); ?>

<?php endif; ?>