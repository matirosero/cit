<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
?>

<?php get_header(); ?>

<div id="container" class="row expand medium-collapse ">

	<?php get_template_part( 'parts/nav', 'sidebar' ); ?>

	<div id="content" class="columns">

		<div id="inner-content" class="row" data-equalizer data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 columns" role="main" data-equalizer-watch>

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