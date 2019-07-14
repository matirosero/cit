<?php

$title = get_the_title();
$pattern = '/\(Por [a-zA-Z0-9\-_.,\)\(\p{L}\s]*/u';
$title = preg_replace( $pattern, "", $title, 1 );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
	
	<div class="list-report-information">
		<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $title; ?></a></h2>

		<p><span class="byline">
			<?php
			_e( 'By ', 'jointswp' );
			if ( function_exists( 'coauthors_posts_links' ) ) {
			    coauthors_posts_links();
			} else {
			    the_author_posts_link();
			}
			?>
		</span> <span class="date">- 
			<?php
			$date_format = 'F Y';
			the_time($date_format);
			?>
		</span>
		</p>
	</div>

	<div class="list-report-buttons">
		<a class="button secondary read-more" href="<?php the_permalink(); ?>" title="<?php _e('Read', 'jointswp'); the_title(); ?>"><?php _e('Read more', 'jointswp'); ?></a>

		<?php
	    /*
	     * Download report
	     */

		// Download exists
	    if ( ( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) && is_numeric( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) ) ) || get_post_meta( $post->ID, 'mro_cit_report_download_shortcode', true ) ) : ?>

	        <?php
	        // Check current user capabilities
	        if ( current_user_can( 'download_report' ) ) :
	            // If download ID is used
	            if ( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) && is_numeric( get_post_meta( $post->ID, 'mro_cit_report_download_id', true ) ) ) :

					$download_id = get_post_meta( $post->ID, 'mro_cit_report_download_id', true );
					// echo 'ID is '.$download_id.'<br />';
					echo do_shortcode( '[ddownload id="'.$download_id.'" text="Descargar"]' );

				endif;
			else:

			endif;
		endif;
		?>
	</div>
</article> <!-- end article -->