<?php
/*
Template Name: Dev
*/
?>

<?php get_header(); ?>

<div id="container" class="row expand">

	<div id="sidebar-menu" class="large-2 columns">
		Side menu hi
	</div><!-- end #sidebar-menu -->

	<div id="content">

		<div id="inner-content" class="row">

		    <main id="main" class="large-12 medium-12 columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/content', 'dev' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>
