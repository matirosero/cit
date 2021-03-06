<?php
/*
General Single post template
*/
?>

<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav/sidebar' ); ?>

	<div id="content" class="">

		<div id="inner-content" class="grid-x grid-padding-x" data-equalizer="main-side" data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 cell" role="main" data-equalizer-watch="main-side" >

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php
			    	if ( is_singular('cit_report') ) :

			    		get_template_part( 'parts/loop/single', 'report' );

			    	else:

			    		// get_template_part( 'parts/content/dev', 'info' );
			    		get_template_part( 'parts/loop/single' );

			    	endif;
			    	?>

			    <?php endwhile; else : ?>

			   		<?php get_template_part( 'parts/content/missing' ); ?>

			    <?php endif; ?>

			</main> <!-- end #main -->

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>