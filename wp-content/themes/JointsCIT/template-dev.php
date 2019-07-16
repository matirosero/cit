<?php
/*
Template Name: Dev
*/
?>

<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav/sidebar' ); ?>

	<div id="content" class="">

		<div id="inner-content" class="grid-x grid-padding-x">

		    <main id="main" class="large-12 medium-12 cell" role="main">


					<?php 
					// get_template_part( 'parts/dev/events' ); 
					get_template_part( 'parts/dev/reports' ); 
					?>


			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>
