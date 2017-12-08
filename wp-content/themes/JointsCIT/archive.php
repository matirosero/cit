<?php get_header(); ?>

<div id="container" class="row expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="columns">

		<div id="inner-content" class="row" data-equalizer data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 columns" role="main" data-equalizer-watch>

		    	<!-- <header>
		    		<h1 class="page-title"><?php the_archive_title();?></h1>
					<?php the_archive_description('<p class="taxonomy-description">', '</p>');?>
		    	</header> -->

				<header class="article-header">
					<h1 class="archive-title" itemprop="headline"><?php the_archive_title();?></h1>

					<?php the_archive_description('<p class="taxonomy-description">', '</p>');?>    
				</header>

		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'archive' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</main> <!-- end #main -->

			<?php get_sidebar(); ?>

	    </div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>