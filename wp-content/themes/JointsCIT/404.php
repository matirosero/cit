<?php get_header(); ?>

<div id="container" class="expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="">

		<div id="inner-content" class="grid-x grid-padding-x" data-equalizer="main-side" data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 cell" role="main" data-equalizer-watch="main-side" >

				<article id="content-not-found" >

					<header class="article-header">
						<h1><i class="alert-text icon-attention-circled"></i><?php _e( 'Article Not Found', 'jointswp' ); ?></h1>
					</header> <!-- end article header -->

					<section class="entry-content">
						<p><?php _e( 'The content you were looking for was not found, but maybe a search would help.', 'jointswp' ); ?></p>
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end article section -->

					<section class="suggestions-404 medium-collapse row">

					    <?php
					        global $wp_query;
					        $wp_query->query_vars['is_search'] = true;
					        $s = str_replace("-", " ", $wp_query->query_vars['name']);
					        $loop = new WP_Query('post_type=any&s=' . $s);
					    ?>

							<h3 class="small-12 column"><?php esc_html_e( 'Here are some suggestions:', 'jointswp' ); ?></h3>



						    <?php if ($loop->have_posts()): ?>

					    		<div class="medium-6 column">
							        <p><?php esc_html_e( 'We tried finding the matching what you\'re looking for:', 'jointswp' ); ?></p>
						            <ul>
						                <?php while ($loop->have_posts()): $loop->the_post(); ?>
						                    <li>
						                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						                        <?php //the_excerpt(); ?>
						                    </li>
						                <?php endwhile; ?>
						            </ul>
						        </div><!-- .column -->

						        <div class="medium-6 column">

						    <?php else: ?>

						    	<div class="small-12 column">

						    <?php endif; ?>

						    	<p><?php esc_html_e( 'Try some of our website\'s top pages:', 'jointswp' ); ?></p>

						    	<ul>
							    	<li>
							    		<a href="<?php echo get_page_link(10); ?>">Afiliación</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(153); ?>">Qué es el Club de Investigación Tecnológica</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(12); ?>">Informes de Investigación</a>
							    	</li>
							    	<li>
							    		<a href="<?php echo get_page_link(469); ?>">Contacto</a>
							    	</li>
						    	</ul>

						    </div><!-- .column -->


					</section> <!-- end search section -->

				</article> <!-- end article -->

			</main> <!-- end #main -->

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>