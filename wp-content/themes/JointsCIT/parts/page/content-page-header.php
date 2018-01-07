<?php
$layout = mro_cit_page_layout();
		// // var_dump($layout);
		// if ( $layout == 'hero') :
		// 	get_template_part( 'parts/hero/hero', 'full' );
		// endif;
?>
<div class="page-header row" data-equalizer data-equalize-on="medium">

	<?php
	if ( $layout == 'hero-img-left' ) : ?>
		<div class="page-header-image" data-equalizer-watch>
	<?php elseif ( $layout == 'hero-img-right' ) : ?>
		<div class="page-header-image medium-push-8" data-equalizer-watch>
	<?php endif; ?>

		<?php the_post_thumbnail( 'full' ); ?>
	</div>

	<?php
	if ( $layout == 'hero-img-left' ) : ?>
		<div class="page-header-text" data-equalizer-watch>
	<?php elseif ( $layout == 'hero-img-right' ) : ?>
		<div class="page-header-text medium-pull-4" data-equalizer-watch>
	<?php endif; ?>

		<header class="article-header">
			<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
		</header>
		<?php
		$post_object = get_post( $post->ID );
		echo do_shortcode( wpautop( $post_object->post_content ) );
		?>
	</div>

</div>
