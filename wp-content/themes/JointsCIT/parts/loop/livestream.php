<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<?php /*
	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->
	*/ ?>

    <section class="entry-content" itemprop="articleBody">

	    <?php 
	    if ( !is_user_logged_in() ) { ?>

	    	<p  class="callout primary">Debe ser Afiliado para accesar esta página.</p>
            <?php echo do_shortcode( '[members_login_form] ' ); ?>

	    <?php } elseif ( current_user_can( 'download_report' ) ) {


	    	if ( !get_post_meta( get_the_ID(), 'mro_cit_livestream_active', 1 ) ) { ?>
	    		
	    		<p>No hay ningún evento en vivo en este momento</p>

	    	<?php } elseif ( get_post_meta( get_the_ID(), 'mro_cit_livestream_embed', 1 ) ) {


	    		// The embedded video
	    		$url = esc_url( get_post_meta( get_the_ID(), 'mro_cit_livestream_embed', 1 ) );
				echo wp_oembed_get( $url );


				if ( get_post_meta( get_the_ID(), 'mro_cit_livestream_chat', 1 ) ) {

					$youtube_id = cit_get_youtube_id(get_post_meta( get_the_ID(), 'mro_cit_livestream_embed', 1 ));
						?>

						<div class="livestream-chat-container">
							<iframe allowfullscreen="" frameborder="0" height="540" src="https://www.youtube.com/live_chat?v=<?php echo $youtube_id; ?>&embed_domain=www.tedxpuravida.org" width="480"></iframe>
						</div>

					<?php
				}
	    	}
	    }
	    //the_content(); 
	    ?>

	</section> <!-- end article section -->

</article> <!-- end article -->