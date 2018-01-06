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
<div class="site-branding">
	<div class="wrap">

		<div class="site-branding-text">
			<?php if ( is_home() && !is_paged() ) : ?>
				<h1 class="site-title">
				<?php echo get_theme_mod( 'cit_hero_text', 'No copyright information has been saved yet.' ); ?>
				</h1>
			<?php else : ?>
				<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
				<?php 
				$post_object = get_post( $post->ID );
				echo do_shortcode( wpautop( $post_object->post_content ) );
				?>
				<?php //echo do_shortcode( wpautop( get_the_content( $more_link_text = null, $strip_teaser = false ) ) ); ?>
			<?php endif; ?>

		</div><!-- .site-branding-text -->
<?php /*
		<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
	<?php endif; ?>
*/ ?>
	</div><!-- .wrap -->
</div><!-- .site-branding -->
