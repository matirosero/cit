<?php
?>
<div class="page-header row" data-equalizer data-equalize-on="medium">
	<div class="page-header-image" data-equalizer-watch>
		<?php
		the_post_thumbnail( 'full' );
		?>
	</div>
	<div class="page-header-text" data-equalizer-watch>
		<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
		<?php 
		$post_object = get_post( $post->ID );
		echo do_shortcode( wpautop( $post_object->post_content ) );
		?>
	</div>
</div>
