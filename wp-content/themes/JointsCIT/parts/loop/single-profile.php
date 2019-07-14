<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<?php the_post_thumbnail('thumbnail'); ?>
		<h1 class="entry-title single-title" itemprop="headline">jhdf ksdf<?php the_title(); ?></h1>
		<?php
		if ( get_post_meta( $post->ID, 'mro_cit_board_member_email', true )) : ?>
			<p class="profile-meta">
				<?php $email = get_post_meta( $post->ID, 'mro_cit_board_member_email', true ); ?>
				<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
			</p>
		<?php endif; ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
		<?php //the_post_thumbnail('thumbnail'); ?>
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<?php //the_post_navigation(); ?>

	<?php //comments_template(); ?>

</article> <!-- end article -->