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

<?php
$layout = mro_cit_page_layout();
?>

<div class="custom-header hero-full">
		<div class="custom-header-media">
			<?php 
			// if ( is_home() && !is_paged() ) {
				the_custom_header_markup();
			// } elseif ( is_page() && has_post_thumbnail() && $layout == 'hero' ) {
			// 	echo '<div class="page-hero-image">';
			// 	the_post_thumbnail( 'cit-hero-image' );
			// 	echo '</div>';
			// } 
			?>
		</div>

	<?php get_template_part( 'parts/hero/hero', 'text' ); ?>

</div><!-- .custom-header -->
