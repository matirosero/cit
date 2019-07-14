<?php
/*
This is the custom post type taxonomy template.
If you edit the custom taxonomy name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom taxonomy is called
register_taxonomy( 'shoes',
then your single template should be
taxonomy-shoes.php

*/
?>

<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="">

		<div id="inner-content" class="grid-x grid-padding-x" data-equalizer="main-side" data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 cell" role="main" data-equalizer-watch="main-side" >

			    <header>
			    	<h1 class="page-title"><span><?php _e( 'Posts Categorized:', 'jointswp' ); ?></span> <?php single_cat_title(); ?></h1>
			    </header>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop/archive' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content/missing' ); ?>

				<?php endif; ?>

		    </main> <!-- end #main -->

		    <?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>