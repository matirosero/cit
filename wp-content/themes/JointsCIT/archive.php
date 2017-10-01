<?php get_header(); ?>

<div id="container" class="row expand">

	<div id="sidebar-menu" class="large-2 columns">
		Side menu hi
	</div><!-- end #sidebar-menu -->

	<div id="content">

		<div id="inner-content" class="row">

		    <main id="main" class="large-8 medium-8 columns" role="main">

		    	<header>
		    		<h1 class="page-title"><?php the_archive_title();?></h1>
					<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
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