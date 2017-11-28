<?php
/*
Template Name: CSV
*/
?>

<?php get_header(); ?>

<div id="container" class="row expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="columns">

		<div id="" class="row">

		    <main id="" class="large-12 medium-12 columns" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php get_template_part( 'parts/generate', 'csv-unknown' ); ?>

				<?php endwhile; endif; ?>

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>
