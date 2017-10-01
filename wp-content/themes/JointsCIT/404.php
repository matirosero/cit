<?php get_header(); ?>

<div id="container" class="row expand">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="medium-9 large-10 columns">

		<div id="inner-content" class="row">

			<main id="main" class="large-8 columns" role="main">

				<article id="content-not-found">

					<header class="article-header">
						<h1><?php _e( 'Epic 404 - Article Not Found', 'jointswp' ); ?></h1>
					</header> <!-- end article header -->

					<section class="entry-content">
						<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'jointswp' ); ?></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->

				</article> <!-- end article -->

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>