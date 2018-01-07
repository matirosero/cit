<?php get_header(); ?>

<div id="container" class="row expand small-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="columns">

		<?php
		if ( has_header_image() ) :
			get_template_part( 'parts/hero/hero', 'full' );
		endif;
		?>

		<div id="inner-content" class="row" data-equalizer data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 columns" role="main" data-equalizer-watch>

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