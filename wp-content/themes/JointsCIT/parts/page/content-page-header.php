<?php
$layout = mro_cit_page_layout();
		// // var_dump($layout);
		// if ( $layout == 'hero') :
		// 	get_template_part( 'parts/hero/hero', 'full' );
		// elseif  ( $layout == 'hero-img-left' || $layout == 'hero-img-right') :
		// 	// get_template_part( 'parts/hero/hero', 'side' );
		// endif;
?>
<div class="page-header row" data-equalizer data-equalize-on="medium">

	<?php
	if  ( $layout == 'hero-img-left' ) : ?>

		<div class="page-header-image" data-equalizer-watch>
			<?php the_post_thumbnail( 'full' ); ?>
		</div>

	<?php endif; ?>

	<div class="page-header-text" data-equalizer-watch>
		<header class="article-header">
			<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
		</header>
		<?php
		$post_object = get_post( $post->ID );
		echo do_shortcode( wpautop( $post_object->post_content ) );
		?>
	</div>

	<?php
	if  ( $layout == 'hero-img-right' ) : ?>

		<div class="page-header-image" data-equalizer-watch>
			<?php the_post_thumbnail( 'full' ); ?>
		</div>

	<?php endif; ?>
</div>
