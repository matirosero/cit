<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">

		<div class="custom-header-media">
			<?php 
			if ( is_home() && !is_paged() ) {
				the_custom_header_markup();
			} elseif ( is_page() && has_post_thumbnail() ) {
				the_post_thumbnail( 'cit-hero-image' );
			} ?>
		</div>

	<?php get_template_part( 'parts/hero/hero', 'text' ); ?>

</div><!-- .custom-header -->
