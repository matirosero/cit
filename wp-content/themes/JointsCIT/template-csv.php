<?php
/*
Template Name: CSV
*/
?>

<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav/sidebar' ); ?>

	<div id="content" class="">

		<div id="" class="grid-x grid-padding-x">

		    <main id="" class="large-12 medium-12 cell" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/generate/csv', 'redirection' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>
