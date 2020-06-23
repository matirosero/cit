<?php
$class = 'livestream-body';

if ( get_post_meta( get_the_ID(), 'mro_cit_livestream_chat', 1 ) ) {
	$class .= ' livestream-with-chat';
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<?php /*
	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->
	*/ ?>

    <section class="entry-content" itemprop="articleBody">

	    <?php 

	    // Add
	    if( function_exists('the_ad_placement') ) { the_ad_placement('leaderboard-livestream'); }

	    if ( !is_user_logged_in() ) { ?>

	    	<p  class="callout primary">Debe ser Afiliado para accesar esta página.</p>
            <?php echo do_shortcode( '[members_login_form] ' ); ?>
            <p><a href="/contrasena-perdida/">¿Olvidó su contraseña?</a></p>

	    <?php } elseif ( current_user_can( 'download_report' ) ) {


	    	if ( !get_post_meta( get_the_ID(), 'mro_cit_livestream_active', 1 ) ) { ?>
	    		
	    		<?php the_content(); ?>

	    	<?php } elseif ( get_post_meta( get_the_ID(), 'mro_cit_livestream_embed', 1 ) ) { ?>

	    		<div class="<?php echo $class; ?>">

	    			<div class="livestream-outer-container">
						<div class="livestream-container-inner">
							<div class="widescreen responsive-embed">

					    		<?php
					    		// The embedded video
					    		$url = esc_url( get_post_meta( get_the_ID(), 'mro_cit_livestream_embed', 1 ) );

								// echo wp_oembed_get( $url );

								echo str_replace('youtube', 'youtube-nocookie', wp_oembed_get( $url ));

								?>
							</div>

							<div class="livestream-block-top"></div>
							<div class="livestream-block-bottom"></div>
						</div>
					</div>

					<?php

					if ( get_post_meta( get_the_ID(), 'mro_cit_livestream_chat', 1 ) ) {

						$youtube_id = cit_get_youtube_id(get_post_meta( get_the_ID(), 'mro_cit_livestream_embed', 1 ));
							?>

							<div class="livestream-chat-container">
								<iframe allowfullscreen="" frameborder="0" height="540" src="https://www.youtube.com/live_chat?v=<?php echo $youtube_id; ?>&embed_domain=www.clubdeinvestigacion.com" width="480"></iframe>
							</div>

						<?php
					} ?>

				</div><!-- .livestream-body -->

	    	<?php }
	    }
	    //the_content(); 
	    ?>

	</section> <!-- end article section -->

</article> <!-- end article -->