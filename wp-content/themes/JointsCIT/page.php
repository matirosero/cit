<?php get_header(); ?>

<div id="container" class="row expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="columns">

		<?php
		$layout = mro_cit_page_layout();
		// var_dump($layout);
		if ( $layout == 'hero') :
			get_template_part( 'parts/hero/hero', 'full' );
		elseif  ( $layout == 'hero-img-left' || $layout == 'hero-img-right') :
			// get_template_part( 'parts/hero/hero', 'side' );
		endif;
		?>

		<div id="inner-content" class="row" data-equalizer data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 columns" role="main" data-equalizer-watch>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php if ( is_singular('tribe_events') || is_archive('tribe_events') ) :
			    		get_template_part( 'parts/loop', 'empty-page' );
			    	else:
				    	get_template_part( 'parts/loop', 'page' );
				    endif; ?>

			    <?php endwhile; endif; ?>

			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

</div><!-- end #container -->

<?php get_footer(); ?>