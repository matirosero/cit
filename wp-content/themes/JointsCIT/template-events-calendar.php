<?php
/*
Template Name: For Events Calendar
*/
?>

<?php get_header(); ?>

<div id="container" class="row expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="columns">

		<div id="inner-content" class="row">

			<main id="main" class="large-8 xlarge-9 columns" role="main">

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'single' ); ?>

			    <?php endwhile; else : ?>

			   		<?php get_template_part( 'parts/content', 'missing' ); ?>

			    <?php endif; ?>

			</main> <!-- end #main -->

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>