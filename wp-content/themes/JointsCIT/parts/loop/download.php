<article id="post-<?php the_ID(); ?>" <?php post_class('download'); ?> role="article">


	<section class="entry-content" itemprop="articleBody">
		<?php
		if ( has_post_thumbnail() ) { ?>
			<div class="download-preview-image"><?php the_post_thumbnail('full'); ?></div>
		<?php } ?>

        <h2><?php the_title(); ?></h2>

		<?php the_content(); ?>
	</section> <!-- end article section -->


</article> <!-- end article -->