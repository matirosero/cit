<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single<?php if ( tribe_is_past_event() ) { echo ' past-event-content'; } ?>">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'jointswp' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<!-- MRo header container -->
	<header class="article-header">
		<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

		<div class="tribe-events-schedule tribe-clearfix">
			<?php
			/*
			 * MRo: if is past event, show only start date and no time
			 */
			if ( tribe_is_past_event() ) : ?>
				<h2>
					<span class="tribe-event-date-start"><?php
				echo tribe_get_start_date( $event_id, false, 'F j, Y' ); 
				?></span>
				</h2>
			<?php else : ?> 
				<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
				<?php if ( tribe_get_cost() ) : ?>
					<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
				<?php endif; ?>
			<?php endif; ?>
		</div>

	</header> <!-- end article header -->


	<?php
	/*
	 * Removed next/prev event navigation
	 * Was #tribe-events-header
	 */
	?>

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ); 

			/*
			 * MRo: if is past event, show content part for past event
			 */
			if ( tribe_is_past_event() ) :
				get_template_part( 'parts/event/single', 'past' );
			else:
				get_template_part( 'parts/event/single', 'future' );
			endif;

			do_action( 'tribe_events_single_event_after_the_content' ) ?>


			<?php
			/*
			 * MRo: Show event meta only on future events
			 */
			if ( !tribe_is_past_event() ) { ?>
				<!-- Event meta -->
				<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
				<?php tribe_get_template_part( 'modules/meta' ); ?>
				<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			<?php } ?>


		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<?php

	if ( get_field('cit_event_waitlist_exists') ) {
		echo '<div id="sugiera-invitado" class="box">';
		echo '<h3>Sugiera un invitado</h3>'; 
		echo '<p>En caso de que haya espacios disponibles, estaremos enviando invitaciones adicionales.</p>';
		echo do_shortcode('[ninja_form id=9]');
		echo '</div>';
	}
	/*
	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'jointswp' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->
	*/
	?>

</div><!-- #tribe-events-content -->
