<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="hero-container">

			<?php if ( is_home() && !is_paged() ) : ?>
				<div class="hero-text">
				<?php echo wpautop( get_theme_mod( 'cit_hero_text', 'No copyright information has been saved yet.' ) ); ?>
				</div>
			<?php else : ?>
				<div class="hero-text">
					<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
					<?php 
					$post_object = get_post( $post->ID );
					echo do_shortcode( wpautop( $post_object->post_content ) );
					?>
				</div>
			<?php endif; ?>

<?php /*
		<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
	<?php endif; ?>
*/ ?>
</div><!-- .site-branding -->
