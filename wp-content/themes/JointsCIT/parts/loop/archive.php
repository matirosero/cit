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
		if ( is_singular('cit_report') || is_post_type_archive('cit_report') || get_post_type() == 'cit_report' ) :

			get_template_part( 'parts/content/byline' );

		elseif ( is_singular('post') || is_post_type_archive('post') || get_post_type() == 'post' ) :

			get_template_part( 'parts/content/byline' );

		endif; ?>
	</header> <!-- end article header -->

	<section class="entry-content" itemprop="articleBody">
		<?php
		if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink() ?>" class="article-image"><?php the_post_thumbnail('full'); ?></a>
		<?php } ?>

		<?php the_excerpt(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->
</article> <!-- end article -->