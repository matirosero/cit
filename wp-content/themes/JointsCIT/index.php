<?php get_header(); ?>

<div id="container" class="expand small-collapse ">

	<?php get_template_part( 'parts/nav/sidebar' ); ?>

	<div id="content" class="">

		<?php
		if ( has_header_image() && ! is_paged() ) :
			get_template_part( 'parts/hero/hero', 'full' );
		endif;
		?>

		<div id="inner-content" class="grid-x grid-padding-x" data-equalizer="main-side" data-equalize-on="large">

			<main id="main" class="large-8 xlarge-9 cell" role="main" data-equalizer-watch="main-side" >

				<?php
				

				// Grab the 5 next "party" events (by tag)
				$events = tribe_get_events( [
					'eventDisplay' => 'upcoming',
					'start_date' => 'now',
					'posts_per_page' => 5,
				] );

				if ( !$events ) {
					
					$event_heading = "Evento más reciente";
					$events = tribe_get_events( [
						'eventDisplay' => 'past',
						'start_date' => '',
						'posts_per_page' => 1,
						// 'events' => 'past'
					] );
				} else {
					$event_heading = "Próximo evento";
				}


			
				

				foreach ( $events as $post ) {
					setup_postdata( $post );
				  
					// This time, let's throw in an event-specific
					// template tag to show the date after the title!
					?>
					<div class="home-event">
						<div class="home-event__event-date-tag">
							<time class="home-event__event-date-tag-datetime" datetime="2020-09-24">
								<span class="home-event__event-date-tag-weekday">
									<?php echo tribe_get_start_date($post, false, 'M'); ?>
								</span>
								<span class="home-event__event-date-tag-daynum">
									<?php echo tribe_get_start_date($post, false, 'j'); ?>
								</span>
								
							</time>
						</div>

						<div class="home-event__event-wrapper">

							<header class="home-event__event-header">

								<h3 class="home-event__event-meta"><?php echo $event_heading; ?></h3>

								<time class="home-event__event-datetime">
									<?php
									echo ' ' . tribe_get_start_date($post, false, 'F j, Y @ g:i a') . ' '; 
									?>
								</time>
								<?php
								echo '<h4 class="home-event__event-title"><a href="'.get_permalink($post->ID).'">' . $post->post_title . '</a></h4>';
								?>

							</header>

							<?php
							if (get_field('cit_speaker',$post->ID )) {

								echo '<p class="home-event__event-meta">Ponente</p>';
								the_field('cit_speaker',$post->ID );
							}

							if (has_excerpt( $post->ID )) {
								the_excerpt();
							}

							// if (get_field('cit_target_audience',$post->ID )) {
							// 	the_field('cit_target_audience',$post->ID );
							// }
							
							?>

						</div>
					</div>	

				<?php }

				wp_reset_postdata();
				?>

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop/archive' ); ?>

				<?php endwhile; ?>

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