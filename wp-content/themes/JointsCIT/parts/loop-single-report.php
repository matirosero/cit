<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

    	<?php

        /*
         * Download report
         */

    	if ( ( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) && is_numeric( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) ) ) || get_post_meta( $post->ID, 'mro_cit_report_download_shortcode', true ) ) : ?>

    		<div class="callout float-left download-box">

    			<?php
                if ( current_user_can( 'download_report' ) ) :
        			if ( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) && is_numeric( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) ) ) :

        				$download_id = get_post_meta( $post->ID, 'mro_cit_report_download_id', true );
        				// echo 'ID is '.$download_id.'<br />';
        				echo do_shortcode( '[ddownload id="'.$download_id.'"]' );

        			elseif ( get_post_meta( $post->ID, 'mro_cit_report_download_shortcode', true ) ):

        				$shortcode = get_post_meta( $post->ID, 'mro_cit_report_download_shortcode', true );
        				echo apply_filters( 'the_content', $shortcode );
        			endif; ?>
                    <p>Haga click para descargar y leer el informe.</p>
                <?php else: ?>
                    <p  class="callout alert">Debe ser Afiliado e ingresar a su cuenta para descargar el informe.</p>
                    <?php echo do_shortcode( '[members_login_form] ' ); ?>
                <?php endif;
    			?>

    		</div>

    	<?php endif;
    	?>

		<?php the_post_thumbnail('full'); ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php the_post_navigation(); ?>

	<?php comments_template(); ?>

</article> <!-- end article -->