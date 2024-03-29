<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav/sidebar' ); ?>

	<div id="content" class="">

		<div id="inner-content" class="grid-x grid-padding-x" data-equalizer="main-side" data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 cell" role="main" data-equalizer-watch="main-side" >

				<header class="article-header">
					<h1 class="entry-title" itemprop="headline">Informes de investigación</h1>

					<p>El esfuerzo conjunto de los miembros del Club a su alcance. Para esto nacimos.<br />Acceda a todos los informes de investigación generados por el intercambio de nuestra comunidad. </p>
				</header>

				<?php 

				echo do_shortcode('[show-download-post id=3031]');

				?>

			    <?php if (have_posts()) : ?>

			    	<div class="list-reports">

					    <?php while (have_posts()) : the_post(); ?>

							<!-- To see additional archive styles, visit the /parts directory -->
							<?php get_template_part( 'parts/loop/report' ); ?>

						<?php endwhile; ?>

					</div>

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