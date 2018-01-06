<?php
$layout = mro_cit_page_layout();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<?php if ( !$layout ) : ?>
		<header class="article-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->
	<?php endif; ?>

    <section class="entry-content" itemprop="articleBody">

	    <?php if ( $layout ) :
	    	mro_cit_secondary_content();
	    else :
		    the_content();
	    endif; ?>

	    <?php wp_link_pages(); ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->