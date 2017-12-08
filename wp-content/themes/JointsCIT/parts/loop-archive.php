<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
	<header class="article-header">
		
		<?php 
		//Show post type if search
		if ( is_search() ) : 
			$post_type_object = get_post_type_object( get_post_type() );
			$post_type = esc_html( $post_type_object->labels->singular_name );
			if ( $post_type == 'Entrada' ) :
				$post_type = 'Artículo';
			endif;
			?>
			<p class="post-type secondary label"><?php echo $post_type; ?></p>
		<?php endif; ?>

		<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php 
		if ( is_singular('cit_report') || is_post_type_archive('cit_report') ) : 
			get_template_part( 'parts/content', 'byline-report' ); 
		else:
			get_template_part( 'parts/content', 'byline' ); 
		endif; ?>
	</header> <!-- end article header -->

	<section class="entry-content" itemprop="articleBody">
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		<?php the_excerpt(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->
</article> <!-- end article -->