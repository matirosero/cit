<?php
/*
Template Name: Livestream
*/
?>

<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav/sidebar' ); ?>

	<div id="content" class="">

		<div id="inner-content" class="grid-x grid-padding-x" data-equalizer="main-side" data-equalize-on="large">

			<main id="main-livestream" class="small-12 cell" role="main" data-equalizer-watch="main-side" >

				<?php cit_view_log_users_on_page(); ?>

				<?php cit_log_users_on_page(); ?> 

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop/livestream' ); ?>

			    <?php endwhile; endif; ?>


			</main> <!-- end #main -->

		    <?php //get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>