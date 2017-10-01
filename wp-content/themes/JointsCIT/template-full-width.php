<?php
/*
Template Name: Full Width (No Sidebar)
*/
?>

<?php get_header(); ?>

<div id="container" class="row expand">

	<div id="sidebar-menu" class="medium-3 large-2 columns hide-for-small-only">
		Side menu hi
	</div><!-- end #sidebar-menu -->

	<div id="content" class="medium-9 large-10 columns">

		<div id="inner-content" class="row">

		    <main id="main" class="large-12 medium-12 columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/loop', 'page' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>
